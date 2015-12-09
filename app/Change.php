<?php

/**
 * Remember:  the content in a change respresents the state that is being *overwritten* by the new content at the
 * created_at timestamp (it does not contain the new content itself).
 * The new content only exists in the model until it is overwritten again, when it becomes the next change in the
 * log.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
	public $timestamps = false;

	protected $guarded = ['id'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the owning loggable model.
	 */
	public function loggable()
	{
		return $this->morphTo();
	}
}
