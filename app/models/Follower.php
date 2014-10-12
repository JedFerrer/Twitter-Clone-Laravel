<?php


class Follower extends Eloquent {
	// public $timestamps = false;
	protected $fillable = ['user_id','following_id'];
	protected $table = 'followers';

    public $followersIdCollection,
           $followingIdCollection;

	public static function checkByIfAlreadyFollowed($nickname, $userId)
    {				
    	$userCheck = Follower::where('user_id', '=', Auth::user()->id)
				->where('following_id', '=', $userId)
				->first();
    	return $userCheck;
    }

    public function listOftheFollowersId(){

        $queryCheckToLabel = Follower::where('following_id', '=', Auth::user()->id)->get();
        //gets all the followers ID's
        $followersIdCollection = array();
        foreach ($queryCheckToLabel as $key) {
            $followersIdCollection[] = $key->user_id;
        }
        
        $this->followersIdCollection = $followersIdCollection;
        return true;
    }

    public function listOftheFollowingId(){

        $queryCheck = Follower::where('user_id', '=', Auth::user()->id)->get();
        //gets all the following ID's
        $followingIdCollection = array();
        foreach ($queryCheck as $key) {
            $followingIdCollection[] = $key->following_id;
        }
        $this->followingIdCollection = $followingIdCollection;
        return true;
    }


    public function followingAuthorInfo() {
        return $this->belongsTo('User', 'following_id');
    }

    public function followerAuthorInfo() {
        return $this->belongsTo('User', 'user_id');
    }

}
