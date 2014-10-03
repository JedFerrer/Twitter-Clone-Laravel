<?php

class ProfileController extends BaseController {

	protected $tweet;

	public function __construct(Tweet $tweet) {
		$this->tweet = $tweet;
	}

	public function index() {
		
	}

	public function show($nickname) {
		// if($user = User::where('nickname', '=', $nickname)->first()) {
		// 	$user->tweets = $user->tweets()->orderBy('id', 'DESC')->get();
		// 	return View::make('profile.index', ['user' => $user]);
		// }
		// 	return Redirect::to('/');


		// if ($user = User::findByNickname($nickname)) {
		// 	$user->tweets = Tweet::getByUser($user);
		// 	return View::make('profile.index', ['user' => $user]); 
		// }


		if ($user = User::findByNickname($nickname, true)) {
			return View::make('profile.index', ['user' => $user]); 
		}



		// if($user = User::where('nickname', '=', $nickname)->with(array('tweets' => function($query)
		// {
		// 	$query->orderBy('id', 'DESC');
		// }))->first()) {
		// 	//return $user->tweets;
		// 	return View::make('profile.index', ['user' => $user]);
		// }
		// 	return Redirect::to('/');

	}

	public function create() {
		
	}

	public function store() {
		
	}

}

?>