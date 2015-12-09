<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Carbon;
use App\Lesson;
use App\Page;
use App\Blog;
use App\User;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'App\Events\SomeEvent' => [
			'App\Listeners\EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		Page::saving(function($page) {
			$page->plaintext = strip_tags($page->html);
		});
		Blog::saving(function($blog) {
			$blog->plaintext = strip_tags($blog->html);
		});
	}
}
