<?php

class UserController extends BaseController {

	protected $layout = 'layout.master';

	public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('except' => array('getLogin', 'postLogin')));
        $this->beforeFilter('logged', array('only' => array('getLogin', 'postLogin')));
    }

	public function getIndex() {
		$this->layout->body = View::make('page.user')->with('user', Auth::user());
	}

	public function getLogin() {
		$this->layout->body = View::make('page.login');
	}

	public function postLogin() {
		/* validate input */
		$validator = Validator::make(Input::all(), array(
			"username"	=>	"required",
			"password"	=>	"required"
		));

		/* if validated */
		if ($validator->passes()) {
			/* get input */
			$login = array(
				"username"	=>	Input::get("username"),
				"password"  =>	Input::get("password")
			);

			/* check login */
			if (Auth::attempt($login)) {
				return Redirect::intended('user');
			} else {
				return Redirect::to('user/login')->with('message', trans('user.login_fail'));
			} // end auth
		} else {
			return Redirect::to('user/login')->withErrors($validator);
		} // end validation
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::intended('user');
	}

}