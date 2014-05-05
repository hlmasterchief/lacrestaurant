<?php

class AdminController extends BaseController {

    protected $layout = 'layout.admin';

    public function __construct() {
        // $this->beforeFilter('auth');
        // $this->beforeFilter('admin');
    }

    public function getIndex() {
        $this->layout->content = View::make('admin.dashboard');
    }

    public function getManageDishes() {
        $query = Dish::orderBy('id', 'asc')->paginate(10);
        $this->layout->content = View::make('admin.manage_dishes')
                                    ->with('dishes', $query);
    }

    public function getManageMenu() {
        $query = Dish::orderBy('id', 'asc')->paginate(10);
        $this->layout->content = View::make('admin.manage_menu')
                                    ->with('dishes', $query);
    }

    public function getManageUsers() {
        $query = User::whereHas('group', function($query) {
            $query->where('admin', '1');
        })->orderBy('id', 'asc')->paginate(10);
        $this->layout->content = View::make('admin.manage_users')
                                    ->with('users', $query);
    }

    public function getManageNews() {
        $query = News::orderBy('id', 'desc')->paginate(10);
        $this->layout->content = View::make('admin.manage_news')
                                    ->with('news', $query);
    }

    public function getManageFeedback() {
        $query = Contact::orderBy('id', 'desc')->paginate(10);
        $this->layout->content = View::make('admin.manage_feedback')
                                    ->with('feedbacks', $query);
    }

    public function getCreateUser() {
        $this->layout->body = View::make('admin.create_user');
    }

    public function getEditUser($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/users');
        $query = User::find($id);
        if (is_null($query))
            return Redirect::to('/admin/users');
        $this->layout->body = View::make('admin.edit_user')->with('user', $query);
    }

    public function getDeleteUser($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/users');
        $query = User::find($id);
        if (is_null($query))
            return Redirect::to('/admin/users');
        $this->layout->body = View::make('admin.delete_user')->with('user', $query);
    }

    public function getReadFeedback($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/feedback');
        $query = Contact::find($id);
        if (is_null($query))
            return Redirect::to('/admin/feedback');
        $this->layout->body = View::make('admin.read_feedback')->with('feedback', $query);
    }

    public function getDeleteFeedback($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/feedback');
        $query = Contact::find($id);
        if (is_null($query))
            return Redirect::to('/admin/feedback');
        $this->layout->body = View::make('admin.delete_feedback')->with('feedback', $query);
    }

    public function postCreateUser() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "username"  =>  "required|unique:users",
            "password"  =>  "required",
            "email"     =>  "required|unique:users",
            "birthday"  =>  "required|date_format:Y-m-d",
            "realname"  =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get group admin */
            $group = Group::where('name', 'Admin')->first();

            /* get input */
            $user = new User();
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->email    = Input::get('email');
            $user->realname = Input::get('realname');
            $user->birthday = Input::get('birthday');
            $user->group_id = $group->id;
            $user->room_id  = -1;
            $user->save();

            return Redirect::to('admin/users/create')->with('message', "Successfully created new user!");
        } else {
            return Redirect::to('admin/users/create')
                    ->with('message', "")->withErrors($validator);
        } // end validation
    }

    public function postEditUser($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/users');
        $user = User::find($id);
        if (is_null($user))
            return Redirect::to('/admin/users');

        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "email"     =>  "required",
            "birthday"  =>  "required|date_format:Y-m-d",
            "realname"  =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            if (Input::has('password') && Input::get('password') != "")
                $user->password = Hash::make(Input::get('password'));
            $user->email    = Input::get('email');
            $user->realname = Input::get('realname');
            $user->birthday = Input::get('birthday');
            $user->save();

            return Redirect::to('admin/users/edit/' . $id)->with('message', "Successfully edited user!");
        } else {
            return Redirect::to('admin/users/edit/' . $id)
                    ->with('message', "")->withErrors($validator);
        } // end validation
    }

    public function postDeleteUser($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/users');
        $user = User::find($id);
        if (is_null($user))
            return Redirect::to('/admin/users');

        $user->delete();
        return Redirect::to('/admin/users');
    }

    public function postDeleteFeedback($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/feedback');
        $feedback = Contact::find($id);
        if (is_null($feedback))
            return Redirect::to('/admin/feedback');

        $feedback->delete();
        return Redirect::to('/admin/feedback');
    }

}