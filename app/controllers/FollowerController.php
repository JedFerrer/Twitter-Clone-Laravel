<?php

class FollowerController extends BaseController {

	protected $follower,
			  $user;

	public function __construct(Follower $follower,
								User $user)
	{
		$this->follower = $follower;
		$this->user = $user;
	}

	public function create() {
		
	}

	public function store($nickname) {

		if ($user = $this->user->findByNickname($nickname, false)) {
			if ($this->follower->checkByIfAlreadyFollowed($nickname, $userInfo = $user->id)) {
				return App::abort(500);
			} 

			$this->follower->create(array(
				'user_id' => Auth::user()->id,
				'following_id' => $user->id
			));
			return Redirect::back();
		}

	}

	public function Delete($nickname) {

		if ($user = $this->user->findByNickname($nickname, false)) {
			if ($userCheck = $this->follower->checkByIfAlreadyFollowed($nickname, $userInfo = $user->id)) {
				$userCheck->delete();
				// return Redirect::to("users/profiles/{$nickname}");
				return Redirect::back();
			} else {
				return App::abort(500);
			}
		}
		
	}

}
