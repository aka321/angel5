<?php

namespace App\Http\Controllers;

use App\Page;

class PageController extends FrontEndController
{
	public function getPage($slug = 'home')
	{
		$page = Page::where('slug', $slug)->first();

		if ( ! $page) {
			return response()->view('errors.404', $this->data, 404);
		}

		$this->data['page'] = $page;

		// If a blade exists, load that blade.
		if (view()->exists('guest.pages.' . $page->slug)) {
			return view('guest.pages.' . $page->slug, $this->data);
		}

		// Otherwise, load the generic page.
		return view('guest.pages.generic', $this->data);
	}
}
