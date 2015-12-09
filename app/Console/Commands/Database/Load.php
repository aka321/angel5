<?php

namespace App\Console\Commands\Database;

use Illuminate\Console\Command;

class Load extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'db:load {dump}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Load a dump file into the database.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	private function exec($command)
	{
		echo 'Executing: ' . $command . "\n";
		echo shell_exec($command);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$file = $this->argument('dump');
		echo "Loading from dump file " . $file . "...\n";
		$host	   = config('database.connections.mysql.host');
		$database  = config('database.connections.mysql.database');
		$username  = config('database.connections.mysql.username');
		$password  = config('database.connections.mysql.password');
		chdir(base_path());
		$this->exec('mysql -h ' . $host . ' -u ' . $username . ' -p\'' . $password . '\' ' . $database . ' < ' . $file);
		echo "...finished.\n";
	}
}
