<?php

class SearchController extends BaseController {

	protected $user,
			  $follower;

	public function __construct(User $user,
								Follower $follower) 
	{
		$this->user = $user;
		$this->follower = $follower;
	}

	public function index() {
		$searchKeyValue = Input::get('q');

		$query = $this->user->where('name', 'LIKE', '%'.$searchKeyValue.'%')
		->orwhere('nickname', 'LIKE', '%'.$searchKeyValue.'%')
		->get();

		// $queryCheck = $this->follower->where('user_id', '=', Auth::user()->id)->get();
		// $queryCheckToLabel = $this->follower->where('following_id', '=', Auth::user()->id)->get();

		if ($this->follower->listOftheFollowersId()) {
			$followersIdCollection = $this->follower->followersIdCollection;
		}

		if ($this->follower->listOftheFollowingId()) {
			$followingIdCollection = $this->follower->followingIdCollection;
		}

		return View::make('search.index', [
			'query' => $query,
			'followersIdCollection' => $followersIdCollection,
			'followingIdCollection' => $followingIdCollection,
			'searchKeyValue' => $searchKeyValue
		]);
	}
}

?>