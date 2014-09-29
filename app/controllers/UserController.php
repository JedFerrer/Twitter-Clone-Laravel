<?php

class UserController extends BaseController {

	protected $user;
	public static $userInfo;

	public function __construct(User $user) {
		$this->user = $user;
	}

	public function index() {

	}

	public function show($id) {

	}

	public function create() {
		//if (Auth::check()) return Redirect::to('/');
		return View::make('users.create');

	}

	public function store() {

		if (!$this->user->isValid($input = Input::all())) {
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}

		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
			return Redirect::to('/');
		} 
			return Redirect::back()->withInput()->with("errMessage", "Invalid username or password");

		//return 'Failed';
	}


	public function destroy() {
		Auth::logout();
		return Redirect::to('/');
	}

}
