<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

abstract class AdminController extends Controller
{
	// The data array that is passed to the views.
	protected $data = [];

	public function __construct()
	{
		$this->data['successes'] = session('successes', []);
	}
}
