<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Page;
use App\Meta\PageMeta;

class PageRepository extends Repository
{
	public function __construct(PageMeta $meta)
	{
		$this->meta = $meta;
	}

	//-----------------------------------
	// Admin Panel Functions
	//-----------------------------------
	public function find($id)
	{
		return Page::find($id);
	}

	public function create(Request $request)
	{
		return Page::create($request->all());
	}
}