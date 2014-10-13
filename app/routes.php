<?php


// Photo Controller | Index, Browse and Upload Photo
Route::get('users/profiles/picture/{nickname}', 'PhotoController@index')->before('auth');
Route::post('users/profiles/picture/update/{nickname}', 'PhotoController@update')->before('auth');

//Search Controller | Search User
Route::get('users/search', 'SearchController@index')->before('auth');

//Tweet Controller | Home Tweets Index, Post Tweets, Delete Tweets
Route::get('tweet/delete/{id}', 'TweetController@Delete');
Route::get('/', 'TweetController@index');
Route::resource('tweet', 'TweetController');

//Session Controller | Login, Logout
Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');
Route::resource('session', 'SessionController');

//User Controller | Registration
Route::get('signup', 'UserController@create');
Route::resource('users', 'UserController');

//Profile Controller
Route::get('users/profiles/{nickname}', 'ProfileController@show')->before('auth');
Route::get('users/profiles/following/{nickname}', 'ProfileController@followingIndex')->before('auth');
Route::get('users/profiles/followers/{nickname}', 'ProfileController@followersIndex')->before('auth');

//Follower Controller
Route::get('follow/{nickname}', 'FollowerController@store')->before('auth');
Route::get('unfollow/{nickname}', 'FollowerController@delete')->before('auth');





