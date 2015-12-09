<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function (Blueprint $table) {
			$table->increments('id');
			$table->string('commentable_type');
			$table->integer('commentable_id')->unsigned();
			$table->string('subject', 200);
			$table->string('content', 1000);
			$table->integer('author')->unsigned();
			$table->dateTime('date');
			$table->boolean('approved');
			$table->integer('approved_by')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('author')
				->references('id')->on('users')
				->onDelete('cascade');

			// Do not cascade deletes here; however, they will need to be handled in some way.
			$table->foreign('approved_by')
				->references('id')->on('users');

			$table->index(['commentable_type', 'commentable_id']);
		});

		DB::statement('
			ALTER TABLE `comments` ADD FULLTEXT search(
				`subject`,
				`content`
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
		Schema::drop('comments');
		DB::statement('SET foreign_key_checks = 1');
	}
}
