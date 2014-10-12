<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps = false;
	protected $fillable = ['name','nickname','email','password','img_path'];
	protected $hidden = array('password', 'remember_token');
	protected $table = 'users';

	public static $signInRules = [
		'email' => 'required|email',
		'password' => 'required'
	];

	public static $registrationRules = [
		'name' => 'required', 
		'nickname' => 'required|alpha_num|max:10|unique:users,nickname',
		'email' => 'required|email|unique:users,email',
		'password' => 'required',
		'rpass' => 'required|same:password'
	];

	public static $uploadImgRules = [
		'image' => 'required|mimes:jpeg,bmp,png|max:2000'
	];

	public $errors;

	public function isValid($data, $form) {

		$customMessages = array(
		    'rpass.required' => 'Confirmation Password is Required',
		    'rpass.same' => 'Password and Confirmation Password doesn\'t match'
		);

		if ($form == 'SignIn') {
			$validation = Validator::make($data, static::$signInRules);
		} else if($form == 'Registration') {
			$validation = Validator::make($data, static::$registrationRules, $customMessages);
		} else {
			$validation = Validator::make($data, static::$uploadImgRules);
			
		}
		
		if ($validation->passes()) return true;
	
		$this->errors = $validation->messages();
		return false;
	}

	public function tweets()
    {
        return $this->hasMany('Tweet', 'user_id');
    }

    public function followers()
    {
        return $this->hasMany('Follower', 'following_id');
    }

    public function following()
    {
        return $this->hasMany('Follower', 'user_id');
    }

    public static function findByNickname($nickname, $withTweetsOrderBy = false)
    {	
    	$user = User::where('nickname', '=', $nickname)->first();
    	if ($withTweetsOrderBy) {
    		$user->tweets = $user->tweets()->orderBy('id', 'DESC')->get();
    	}
    	return $user;
    }

}
