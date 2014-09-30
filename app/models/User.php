<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps = false;
	protected $fillable = ['name','email','password'];
	protected $hidden = array('password', 'remember_token');
	protected $table = 'users';

	public static $signInRules = [
		'email' => 'required|email',
		'password' => 'required'
	];

	public static $registrationRules = [
		'name' => 'required', 
		'email' => 'required|email|unique:users,email',
		'password' => 'required',
		'rpass' => 'required|same:password'
	];

	public $errors;

	public function isValid($data, $form) {

		$customMessages = array(
		    'rpass.required' => 'Confirmation Password is Required',
		    'rpass.same' => 'Password and Confirmation Password doesn\'t match'
		);

		if ($form == 'SignIn') {
			$validation = Validator::make($data, static::$signInRules);
		} else {
			$validation = Validator::make($data, static::$registrationRules, $customMessages);
		}
		
		if ($validation->passes()) return true;
	
		$this->errors = $validation->messages();
		return false;
	}

}
