<?php

class FollowerController extends BaseController {

	protected $follower;

	public function __construct(Follower $follower) {
		$this->follower = $follower;
	}

	public function create() {
		
	}

	public function store($nickname) {

		$user = User::where('nickname', '=', $nickname)->first();
		if($user = Follower::where('user_id', '=', $user->id)
			->where('following_id', '=', Auth::user()->id)
			->first()) 
		{
			return App::abort(500);
		} 

		
		$this->follower->create(array(
			'user_id' => Auth::user()->id,
			'following_id' => $user->id
		));

		return Redirect::to("users/profiles/{$nickname}");

	}

}
