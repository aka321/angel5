<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function (Blueprint $table) {
			$table->increments('id');
			$table->string('slug')->unique();
			$table->string('title');
			$table->string('image');
			$table->string('og_desc', 300);
			$table->text('html');
			$table->text('plaintext');
			$table->integer('author')->unsigned();
			$table->boolean('publish')->default(1);
			$table->dateTime('publish_date');
			$table->timestamps();

			$table->foreign('author')
				->references('id')->on('users')
				->onDelete('cascade');
		});

		DB::statement('
			ALTER TABLE `blogs` ADD FULLTEXT search(
				`title`,
				`plaintext`
		)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET foreign_key_checks = 0');
		Schema::drop('blogs');
		DB::statement('SET foreign_key_checks = 1');
	}
}
