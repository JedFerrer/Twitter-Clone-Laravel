<?php

class TweetController extends BaseController {

	protected $tweet;

	public function __construct(Tweet $tweet) {
		$this->tweet = $tweet;
	}

	public function index() {
		if (!Auth::check()) return Redirect::to('login');
		//$userId = Auth::user()->id;
		//$posts = $this->tweet->where('user_id', '=', $userId)->orderBy('id', 'DESC')->get();
		$posts = $this->tweet->orderBy('id', 'DESC')->get();
		//$posts = $this->tweet->find(1)->names;
		//return $posts->users->name;
		return View::make('tweets.index')->with('posts', $posts);

		// foreach ($posts->users as $user) {
		// 	echo $user->name;
		// }
	}

	public function show() {
		
	}

	public function create() {
		//if (!Auth::check()) return Redirect::to('login');		
		
	}

	public function store() {
		if (!$this->tweet->isValid($input = Input::all(), 'Registration')) {
			return Redirect::back()->withInput()->withErrors($this->tweet->errors);
		}

		$this->tweet->create(array(
			'tweet' => Input::get('tweet'),
			'user_id' => Auth::user()->id,
		));

		return Redirect::to('/');
	}

}

?>