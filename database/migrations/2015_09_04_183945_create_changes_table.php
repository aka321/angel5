<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('changes', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('loggable_type');
		    $table->integer('loggable_id')->unsigned();
		    $table->string('column');
		    $table->text('content');
		    $table->integer('user_id')->unsigned();
		    $table->timestamp('created_at');

		    // Do not cascade deletes here; however, they will need to be handled in some way.
		    $table->foreign('user_id')
			    ->references('id')->on('users');

		    $table->index(['loggable_type', 'loggable_id', 'column']);
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
	    Schema::drop('changes');
	    DB::statement('SET foreign_key_checks = 1');
    }
}
