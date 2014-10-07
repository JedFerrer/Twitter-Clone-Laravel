<?php


class Follower extends Eloquent {
	public $timestamps = false;
	protected $fillable = ['user_id','following_id'];
	protected $table = 'followers';

	public static function checkByIfAlreadyFollowed($nickname, $userId)
    {				
    	$userCheck = Follower::where('user_id', '=', Auth::user()->id)
				->where('following_id', '=', $userId)
				->first();
    	return $userCheck;
    }


    public function followingAuthorInfo() {
        return $this->belongsTo('User', 'following_id');
    }

    public function followerAuthorInfo() {
        return $this->belongsTo('User', 'user_id');
    }

}
