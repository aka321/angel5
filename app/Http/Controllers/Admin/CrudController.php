<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

abstract class CrudController extends AdminController
{
	// The meta information about the model.
	protected $meta;

	public function __construct()
	{
		parent::__construct();
		$this->meta = $this->data['meta'] = $this->repository->meta;
	}

	public function getIndex()
	{
		$models = $this->repository->index();
		$this->data += compact('models');
		if (view()->exists('admin.' . $this->meta->handle . '.index')) {
			return view('admin.' . $this->meta->handle . '.index', $this->data);
		}
		return view('admin.generic.index', $this->data);
	}

	public function postSearch(Request $request)
	{
		session(['admin.' . $this->meta->handle . '.search' => $request->search]);
		return redirect()->back();
	}

	public function getOrderBy($column)
	{
		$direction = 'ASC';

		$columnKey    = 'admin.' . $this->meta->handle . '.order.column';
		$directionKey = 'admin.' . $this->meta->handle . '.order.direction';

		// Flip the direction if they clicked on the same column again.
		$oldColumn    = session($columnKey);
		$oldDirection = session($directionKey);
		if ($oldColumn == $column) {
			$direction = ($oldDirection == 'ASC') ? 'DESC' : 'ASC';
		}

		// Update the session.
		session([$columnKey    => $column]);
		session([$directionKey => $direction]);

		return redirect()->back();
	}

	public function getAdd()
	{
		$this->data['action'] = 'add';
		if (view()->exists('admin.' . $this->meta->handle . '.add-or-edit')) {
			return view('admin.' . $this->meta->handle . '.add-or-edit', $this->data);
		}
		return view('admin.generic.add-or-edit', $this->data);
	}

	public function postAdd(Request $request)
	{
		$this->validate($request, $this->meta->validationRules(), [], $this->meta->validationAttributes());
		$model = $this->repository->create($request);
		return redirect()->to($model->editURL())
			->with('successes', [$this->meta->singular . ' created.']);
	}

	public function getEdit($id)
	{
		$model = $this->repository->find($id);
		$this->data['action'] = 'edit';
		$this->data += compact('model');
		if (view()->exists('admin.' . $this->meta->handle . '.add-or-edit')) {
			return view('admin.' . $this->meta->handle . '.add-or-edit', $this->data);
		}
		return view('admin.generic.add-or-edit', $this->data);
	}

	public function postEdit(Request $request, $id)
	{
		$this->validate($request, $this->meta->validationRules($id), [], $this->meta->validationAttributes());
		$model = $this->repository->find($id);
		$this->repository->logChanges($model, $request->all());
		$model->update($request->all());
		return redirect()->back()
			->with('successes', [$this->meta->singular . ' saved.']);
	}
}
