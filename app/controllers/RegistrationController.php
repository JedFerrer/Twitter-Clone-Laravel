<?php

class RegistrationController extends BaseController {

	protected $register;

	public function __construct(Register $register) {
		$this->register = $register;
	}

	public function index() {
		
	}

	public function show() {
		
	}

	public function create() {
		if (Auth::check()) return Redirect::to('/');
		return View::make('registration.create');
	}

	public function store() {
		if (!$this->register->isValid($input = Input::all())) {
			return Redirect::back()->withInput()->withErrors($this->register->errors);
		}

		$this->register->create(array(
			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'password' => Hash::make(Input::get('password'))
		));

		return Redirect::to('/login')->with("message", "You have been registered and can now log in!");
	}

}

?>