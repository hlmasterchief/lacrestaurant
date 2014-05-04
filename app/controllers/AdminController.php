<?php

class AdminController extends BaseController {

    protected $layout = 'layout.admin';

    public function __construct() {
        // $this->beforeFilter('auth');
        // $this->beforeFilter('admin');
    }

    // public function getIndex() {
    //     return Redirect::to('admin/user');
    // }

    public function getIndex() {
        $this->layout->content = View::make('admin.dashboard');
    }

    public function getManageDishes() {
        $this->layout->content = View::make('admin.manage_dishes')
                                    ->with('dishes', Dish::orderBy('id', 'desc')->paginate(20));
    }

    public function getManageUsers() {
        $this->layout->content = View::make('admin.manage_users')
                                    ->with('users', User::orderBy('id', 'desc')->paginate(10));
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