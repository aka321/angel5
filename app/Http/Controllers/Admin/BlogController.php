<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\BlogRepository;

class BlogController extends CrudController
{
	public function __construct(BlogRepository $repository)
	{
		$this->repository = $repository;
		parent::__construct();
	}
}
