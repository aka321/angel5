<?php

namespace App\Console\Commands;

use Mail;
use Illuminate\Console\Command;

class MailTest extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'mail:test {to?}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Send a test email from the application.';

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
		$to = $this->argument('to');
		$to = ($to) ? $to : "nobody@nowhere.com";
		echo "Sending test email to $to...\n";
		$success = Mail::send('emails.test', [], function ($m) use ($to) {
			$m->to($to)->subject('Test Email');
		});
		if ( ! $success) {
			echo "The email failed.\n";
		}
		echo "...finished.\n";
	}
}
