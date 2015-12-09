<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends CrudController
{
	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
		parent::__construct();
	}
}
