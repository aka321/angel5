<?php

namespace App\Http\Controllers;

use LaravelGettext;
use App\Meta\LocaleMeta;

abstract class FrontEndController extends Controller
{
	// The data array that is passed to the views.
	protected $data = [];

	public function __construct()
	{
		$this->data['successes'] = session('successes', []);

		// @TODO: Replace with agent checker.
		$this->data['mobile'] = false;
	}
}
