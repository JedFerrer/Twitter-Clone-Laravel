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
		$queryCheck = $this->follower->where('user_id', '=', Auth::user()->id)->get();

		$userIdToFetch = array();
		$userIdToFetch[] = Auth::user()->id;
		foreach ($queryCheck as $key) {
			$userIdToFetch[] = $key->following_id;
		}

		$posts = $this->tweet->whereIn('user_id', $userIdToFetch)->orderBy('id', 'DESC')->paginate(10);
		$tweetCount = Auth::user()->tweets()->count();
	  	$followingCount = Auth::user()->following()->count(); 
	  	$followersCount = Auth::user()->followers()->count();

	  	//retrive profile picture path

		if($imgPathProfile = Auth::user()->img_path){
		} else {
			$imgPathProfile = "default/avatar1.png";
		}
		
		return View::make('tweets.index', [
		   'posts' => $posts, 
		   'tweetCount' => $tweetCount,
		   'followingCount' => $followingCount,
		   'followersCount' => $followersCount,
		   'imgPathProfile' => $imgPathProfile
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

	public function Delete($id) {
		$tweetId = $this->tweet->find($id);
		if($tweetId->user_id == Auth::user()->id){
			$tweetId->delete();
			return Redirect::to('/');
		} 
			return Redirect::to('/');
	}

}

?>