<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('type')->default('user');
			$table->string('email')->unique()->nullable();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('nickname')->unique()->nullable();
			$table->string('password', 60);
			$table->timestamps();
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET foreign_key_checks = 0');
		Schema::drop('users');
		DB::statement('SET foreign_key_checks = 1');
	}
}
