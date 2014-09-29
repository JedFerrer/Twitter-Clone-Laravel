<?php
class Register extends Eloquent {

	public $timestamps = false;
	protected $fillable = ['name','email','password'];
	protected $table = 'users';

	public static $rules = [
		'name' => 'required', 
		'email' => 'required|email|unique:users,email',
		'password' => 'required',
		'rpass' => 'required|same:password'
	];

	public $errors;
	
	public function isValid($data) {
		$customMessages = array(
		    'rpass.required' => 'Confirmation Password is Required',
		    'rpass.same' => 'Password and Confirmation Password doesn\'t match'
		);

		$validation = Validator::make($data, static::$rules, $customMessages);
		if ($validation->passes()) return true;
	
		$this->errors = $validation->messages();
		return false;
	}

}
