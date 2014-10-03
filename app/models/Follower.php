<?php


class Follower extends Eloquent {
	public $timestamps = false;
	protected $fillable = ['user_id','following_id'];
	protected $table = 'followers';

	

}
