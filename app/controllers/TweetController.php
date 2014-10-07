<?php

class TweetController extends BaseController {

	protected $tweet,
			  $follower;

	public function __construct(Tweet $tweet,
								Follower $follower) 
	{
		$this->tweet = $tweet;
		$this->follower = $follower;
	}

	public function index() {
		if (!Auth::check()) return Redirect::to('login');

		//$posts = $this->tweet->orderBy('id', 'DESC')->get();
		$queryCheck = Follower::where('user_id', '=', Auth::user()->id)->get();

		$dept = array();
		$dept[] = Auth::user()->id;
		foreach ($queryCheck as $key) {
			$dept[] = $key->following_id;
		}

		$posts = $this->tweet->whereIn('user_id', $dept)->orderBy('id', 'DESC')->get();
	
		$tweetCount = Auth::user()->tweets()->count();
	  	$followingCount = Auth::user()->following()->count(); 
	  	$followersCount = Auth::user()->followers()->count();


		return View::make('tweets.index', [
		   'posts' => $posts, 
		   'tweetCount' => $tweetCount,
		   'followingCount' => $followingCount,
		   'followersCount' => $followersCount
		]); 
	
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