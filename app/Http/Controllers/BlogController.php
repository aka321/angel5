<?php namespace App\Http\Controllers;

use App\Blog;

class BlogController extends FrontEndController
{
	public function getIndex()
	{
		$this->data['blogs'] = Blog::paginate();
		return view('guest.blogs.index', $this->data);
	}

	public function getBlog($slug)
	{
		$blog = Blog::where('slug', $slug)->first();

		if ( ! $blog) {
			return response()->view('errors.404', $this->data, 404);
		}

		$this->data['blog'] = $blog;
		return view('guest.blogs.generic', $this->data);
	}
}
