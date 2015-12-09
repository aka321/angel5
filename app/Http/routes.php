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

require_once('routes-admin.php');

//---------------------
// Users
//---------------------
Route::group(['prefix' => 'lessons'], function() {
	Route::get('{slug?}', 'LessonController@getLesson');
});

//---------------------
// Guests
//---------------------
Route::get('/', 'PageController@getPage');
Route::group(['prefix' => 'blog'], function() {
	Route::get('/', 'BlogController@getIndex');
	Route::get('{slug}', 'BlogController@getBlog');
});
Route::controller('auth', 'Auth\AuthController');
Route::get('switch-locale', 'LocaleController@switchLocale');

// MUST be the last route, for obvious reasons (base level variable).
Route::get('{slug}', 'PageController@getPage');