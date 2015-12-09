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
			'html'  => '
<section>
	<div class="row">
		<div class="column small-12">
			<p>This text is rendered from the database.</p>
		</div>
	</div>
</section>
			',
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
