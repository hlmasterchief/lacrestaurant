<?php

class AdminController extends BaseController {

    protected $layout = 'layout.master';

    public function __construct() {
        $this->beforeFilter('auth');
        $this->beforeFilter('admin');
    }

    public function getIndex() {
        return Redirect::to('admin/user');
    }

    public function getCreateUser() {
        $this->layout->body = View::make('admin.create_user');
    }

    public function postCreateUser() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "username"  =>  "required|unique:users",
            "password"  =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $user = new User();
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('username'));
            $user->group_id = Input::get('group_id');
            $user->room_id  = Input::get('room_id');
            $user->save();

            /* check login */
            return Redirect::to('admin/create_user')->with('message', "User created!")->with('user', $user);
        } else {
            return Redirect::to('admin/create_user')->withErrors($validator);
        } // end validation
    }

}