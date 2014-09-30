<?php
//tweets

//index
Route::get('/', function()
{
 	$message = 'successful';
	return View::make('tweets.index')->with('message', $message);
})->before('auth');

//User login
Route::get('login', 'UserController@create');
Route::get('logout', 'UserController@destroy');
Route::resource('user', 'UserController');

//Registration
Route::get('signup', 'RegistrationController@create');
Route::resource('registration', 'RegistrationController');
