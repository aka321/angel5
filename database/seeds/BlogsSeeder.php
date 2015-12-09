<?php

use Illuminate\Database\Seeder;
use App\Blog;

class ScrapeBlogs extends Seeder
{
	public function run()
	{
		// Create the pages.
		Blog::create([
			'slug'  => 'new-website',
			'title' => 'New Website Incoming!',
		]);
		Blog::create([
			'slug'  => 'good-times',
			'title' => 'Good Times Ahead!',
		]);
	}
}
