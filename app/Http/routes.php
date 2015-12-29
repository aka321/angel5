<?php
//---------------------
// Debug
//---------------------
Route::get('flush-session', function() {
	if (config('app.debug')) {
		session()->flush();
	}
	return redirect()->back();
});

//---------------------
// Admin
//---------------------
require_once('routes-admin.php');

//---------------------
// Users
//---------------------
// Place routes here that will sit behind the authentication
// filter.

//---------------------
// Guests
//---------------------
// Routes anyone can view.
Route::get('/', 'PageController@getPage');
Route::group(['prefix' => 'blog'], function() {
	Route::get('/', 'BlogController@getIndex');
	Route::get('{slug}', 'BlogController@getBlog');
});
Route::controller('auth', 'Auth\AuthController');

// Password reset link request routes.
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes.
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// MUST be the last route, for obvious reasons (base level variable).
Route::get('{slug}', 'PageController@getPage');