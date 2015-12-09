<?php

//---------------------
// Admin Panel
//---------------------
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function() {
	Route::get('/', function() {
		return redirect('admin/pages');
	});
	Route::get('logout', function() {
		session()->flush();
		return redirect('auth/logout');
	});

	Route::controller('blogs', 'BlogController');
	Route::controller('pages', 'PageController');
	Route::controller('users', 'UserController');

	Route::get('changes/{Model}/{id}/{column}', 'ChangesController@log');
});
