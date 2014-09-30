<?php

class RegistrationController extends BaseController {

	protected $user;

	public function __construct(User $user) {
		$this->user = $user;
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
		if (!$this->user->isValid($input = Input::all(), 'Registration')) {
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}

		$this->user->create(array(
			'name' => Input::get('name'),
			'email' => Input::get('email'),
			'password' => Hash::make(Input::get('password'))
		));

		return Redirect::to('/login')->with("message", "You have been registered and can now log in!");
	}

}

?>