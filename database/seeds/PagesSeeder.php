<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesSeeder extends Seeder
{
	public function run()
	{
		// Create the pages.
		Page::create([
			'slug'  => 'home',
			'title' => 'Home',
			'html'  => '<p>This text is rendered from the database.</p>',
		]);
		Page::create([
			'slug'  => 'sign-in',
			'title' => 'Sign In',
		]);
		Page::create([
			'slug'  => 'about',
			'title' => 'About',
		]);
	}
}
