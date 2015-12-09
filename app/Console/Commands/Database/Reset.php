<?php

namespace App\Console\Commands\Database;

use Illuminate\Console\Command;
use Schema;

class Reset extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'db:reset';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Reset the database by rolling back, re-migrating, and seeding.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$this->info('Resetting database...');

		// Raw tables.
		//$this->call('db:load', ['dump' => 'assets/table.sql']);

		if (Schema::hasTable('migrations')) {
			$this->call('migrate:rollback');
		}
		$this->call('migrate');
		$this->call('db:seed');

		// Drop raw tables.
		//Schema::drop('table');

		$this->info('Database reset.');
	}
}
