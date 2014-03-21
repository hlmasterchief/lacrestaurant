<?php

class UserController extends BaseController {

	protected $layout = 'layout.master';

	public function __construct() {
		/* for csrf, anti attack */
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	public function getIndex() {
		if (Auth::check()) {
			$this->layout->body = View::make('page.user')->with('user', Auth::user());
		} else {
			return Redirect::guest('user/login');
		}
	}

	public function getLogin() {
		if (Auth::check()) {
			return Redirect::intended('user');
		} else {
			$this->layout->body = View::make('page.login');
		}
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
		if (Auth::check()) {
			Auth::logout();
			return Redirect::intended('/');
		} else {
			return Redirect::to('user');
		}
	}

}