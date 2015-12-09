<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
	public function run()
	{
		// Create test / developer accounts:
		User::create([
			'type'       => 'admin',
			'email'      => 'admin@admin',
			'first_name' => 'Admin',
			'last_name'  => 'Istrator',
			'nickname'   => 'admin',
			'password'   => Hash::make('admin'),
		]);
		User::create([
			'type'       => 'user',
			'email'      => 'user@user',
			'first_name' => 'User',
			'last_name'  => 'Guy',
			'nickname'   => 'user',
			'password'   => Hash::make('user'),
		]);
	}
}
