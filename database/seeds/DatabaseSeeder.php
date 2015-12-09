<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use ED100\User;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('UsersSeeder');
		$this->call('PagesSeeder');
		Model::reguard();
	}
}
