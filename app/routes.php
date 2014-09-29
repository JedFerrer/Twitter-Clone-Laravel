<?php

Route::get('/', function()
{
	return View::make('hello');
});

//User login
Route::get('login', 'UserController@create');
Route::get('logout', 'UserController@destroy');
Route::resource('user', 'UserController');
