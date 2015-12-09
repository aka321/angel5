<?php

namespace App\Repositories;

use Auth;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Change;

/**
 * Used to access data from the database in a uniform way, especially in the administrative panel.
 * CrudController relies on this a lot.
 */
abstract class Repository
{
	abstract public function find($id);
	abstract public function create(Request $request);

	public function index()
	{
		$query = $this->indexQuery();
		return $query->paginate();
	}

	/**
	 * Do ordering and searching, return the query builder.
	 */
	public function indexQuery()
	{
		// Grab the current order from the session if it exists.
		$Model = $this->meta->Model;
		$order = session('admin.' . $this->meta->handle . '.order');

		// If not, put the default in the session.
		if (empty($order)) {
			$order = $this->meta->indexOrder;
			session(['admin.' . $this->meta->handle . '.order' => $order]);
		}

		// Order by it.
		$query = $Model::orderBy($order['column'], $order['direction']);

		// Do searching as well and return the query builder for later pagination.
		return $this->searchQuery($query);
	}

	public function searchQuery($query)
	{
		$search = session('admin.' . $this->meta->handle . '.search');
		if (empty($search)) return $query;

		$cols  = $this->meta->searchCols;
		$terms = explode(' ', $search);
		$query->where(function($query) use ($cols, $terms) {
			foreach ($cols as $col) {
				foreach ($terms as $term) {
					$query->orWhere($col, 'LIKE', '%' . $term . '%');
				}
			}
		});
		return $query;
	}

	/**
	 * Log changes to a model.
	 *
	 * @param Model $model - The model *before* updates have been applied.
	 * @param array $updates - The array of updates from user input.
	 */
	public function logChanges(Model $model, array $updates)
	{
		$created_at = Carbon::now();
		$changes = [];
		foreach ($this->meta->cols() as $colName => $col) {
			// If change logging is enabled...
			if (isset($col['logChanges']) && $col['logChanges'] &&
				// And an update was posted...
				isset($updates[$colName]) &&
				// And it is, in fact, an update...
				$model->$colName != $updates[$colName]) {

				// Add the change to the array.
				$changes []= new Change([
					'column'     => $colName,
					'user_id'    => Auth::user()->id,
					'content'    => $model->$colName,
					'created_at' => $created_at
				]);
			}
		}
		if (count($changes)) {
			$model->changes()->saveMany($changes);
		}
	}
}