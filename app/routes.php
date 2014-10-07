<?php
//tweets

//index


// Route::get('/sample', function(){
// 	// $tweets = User::find(1)->tweets()->orderBy('id', 'DESC')->get();
// 	// //$tweets = User::where('nickname', 'Jed')->tweets;
// 	// //$tweets = User::where('nickname', '=', 'Jed')->tweets()->get();
	 
// 	//  foreach ($tweets as $tweet) {
// 	//  	echo $tweet->tweet, '</br>';
// 	//  }


// 	$user = User::where('nickname', '=', 'Jed')->orderBy('id', 'DESC')->first();

// 	return $user->tweets;

// 	// foreach ($user->tweets as $tweet) {
// 	// 	echo $tweet->tweet, '</br>';
// 	// }
// });


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



