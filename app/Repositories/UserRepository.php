<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\User;
use App\Meta\UserMeta;

class UserRepository extends Repository
{
	public function __construct(UserMeta $meta)
	{
		$this->meta = $meta;
	}

	/**
	 * Create a guest user for people who want to try before registering.
	 * (No email, password, etc.)
	 */
	public function createGuestUser()
	{
		return User::create([]);
	}

	//-----------------------------------
	// Admin Panel Functions
	//-----------------------------------
	public function find($id)
	{
		return User::find($id);
	}

	public function create(Request $request)
	{
		return User::create($request->all());
	}
}