<?php

class SearchController extends BaseController {

	protected $tweet,
			  $follower;

	public function __construct(Tweet $tweet,
								Follower $follower) 
	{
		$this->tweet = $tweet;
		$this->follower = $follower;
	}

	public function index() {
		$searchKeyValue = Input::get('q');

		$query = User::where('name', 'LIKE', '%'.$searchKeyValue.'%')
		->orwhere('nickname', 'LIKE', '%'.$searchKeyValue.'%')
		->get();

		return View::make('search.index', [
			'query' => $query,
			'searchKeyValue' => $searchKeyValue
		]);

		foreach ($query as $key) {
			echo $key->name . '</br>';
		}
	}

	public function store() {
		// dd();
		// return 'boom1';

	}

	public function show() {
		// $searchKeyValue = Input::get('search');
		// return Redirect::to('users/search/'. $searchKeyValue);
	}


}

?>