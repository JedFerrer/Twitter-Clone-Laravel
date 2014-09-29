<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps = false;

	protected $hidden = array('password', 'remember_token');
	protected $table = 'users';

	public static $rules = [
		'email' => 'required|email',
		'password' => 'required'
	];

	public $errors;

	public function isValid($data) {

		$validation = Validator::make($data, static::$rules);
		if ($validation->passes()) return true;
	
		$this->errors = $validation->messages();
		return false;
	}

}
