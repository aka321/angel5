<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Blog;
use App\Meta\BlogMeta;

class BlogRepository extends Repository
{
	public function __construct(BlogMeta $meta)
	{
		$this->meta = $meta;
	}

	//-----------------------------------
	// Admin Panel Functions
	//-----------------------------------
	public function find($id)
	{
		return Blog::find($id);
	}

	public function create(Request $request)
	{
		return Blog::create($request->all());
	}
}