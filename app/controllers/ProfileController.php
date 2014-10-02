<?php

class ProfileController extends BaseController {

	protected $tweet;

	public function __construct(Tweet $tweet) {
		$this->tweet = $tweet;
	}

	public function index() {
		
	}

	public function show($nickname) {
		if($user = User::where('nickname', '=', $nickname)->orderBy('id', 'DESC')->first()) {
			//return $user->tweets;
			return View::make('profile.index', ['user' => $user]);
		}
			return Redirect::to('/');

	}

	public function create() {
	
	}

	public function store() {
		
	}

}

?>