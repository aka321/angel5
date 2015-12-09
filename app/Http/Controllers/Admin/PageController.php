<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PageRepository;

class PageController extends CrudController
{
	public function __construct(PageRepository $repository)
	{
		$this->repository = $repository;
		parent::__construct();
	}
}
