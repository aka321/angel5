<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = ['id'];

	/**
	 * Get the owning commentable model.
	 */
	public function commentable()
	{
		return $this->morphTo();
	}

	/**
	 * Get all of the comment's comments (child comments).
	 */
	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}
}
