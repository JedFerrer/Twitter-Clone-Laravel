<?php

class TweetController extends BaseController {

	protected $tweet;

	public function __construct(Tweet $tweet) {
		$this->tweet = $tweet;
	}

	public function index() {
		if (!Auth::check()) return Redirect::to('login');
		$posts = $this->tweet->orderBy('id', 'DESC')->get();
		return View::make('tweets.index')->with('posts', $posts);
	
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