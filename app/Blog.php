<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $guarded = ['id'];

	public function URL_en()
	{
		return 'blog/' . $this->slug;
	}
	public function URL_es()
	{
		return 'blog/' . $this->slug_es;
	}

	/**
	 * Get all of the blog's comments.
	 */
	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}

	//----------------------------------
	// Admin required functions.
	//----------------------------------
	public function editURL()
	{
		return 'admin/blogs/edit/' . $this->id;
	}

	/**
	 * Get the blog's change log.
	 */
	public function changes()
	{
		return $this->morphMany('App\Change', 'loggable');
	}
}
