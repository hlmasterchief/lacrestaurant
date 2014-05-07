<?php

class AdminController extends BaseController {

    protected $layout = 'layout.admin';

    public function __construct() {
        $this->beforeFilter('auth', array('except' => array('getLogin', 'postLogin')));
        $this->beforeFilter('admin', array('except' => array('getLogin', 'postLogin')));
    }

    public function getIndex() {
        $this->layout->content = View::make('admin.dashboard');
    }

    public function getLogin() {
        $this->layout->content = View::make('admin.login');
    }

    public function postLogin() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "username" =>  "required",
            "password" =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $login = array(
                "username" =>  Input::get("username"),
                "password" =>  Input::get("password")
            );

            /* check login */
            if (Auth::attempt($login)) {
                return Redirect::to('admin');
            } else {
                return Redirect::to('admin/login')->with('message', trans('user.login_fail'));
            } // end auth
        } else {
            return Redirect::to('admin/login')->with('message', trans('user.login_fail'));
        } // end validation
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::intended('admin');
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

    public function getCreateNews() {
        $this->layout->content = View::make('admin.create_news');
    }

    public function getEditNews($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/news');
        $query = News::find($id);
        if (is_null($query))
            return Redirect::to('/admin/news');
        $this->layout->content = View::make('admin.edit_news')->with('new', $query);
    }

    public function getDeleteNews($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/news');
        $query = News::find($id);
        if (is_null($query))
            return Redirect::to('/admin/news');
        $this->layout->content = View::make('admin.delete_news')->with('new', $query);
    }

    public function postDeleteNews($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/news');
        $new = News::find($id);
        if (is_null($new))
            return Redirect::to('/admin/news');

        $new->delete();
        return Redirect::to('/admin/news');
    }

    public function getCreateUser() {
        $this->layout->content = View::make('admin.create_user');
    }

    public function getEditUser($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/users');
        $query = User::find($id);
        if (is_null($query))
            return Redirect::to('/admin/users');
        $this->layout->content = View::make('admin.edit_user')->with('user', $query);
    }

    public function getDeleteUser($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/users');
        $query = User::find($id);
        if (is_null($query))
            return Redirect::to('/admin/users');
        $this->layout->content = View::make('admin.delete_user')->with('user', $query);
    }

    public function getReadFeedback($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/feedback');
        $query = Contact::find($id);
        if (is_null($query))
            return Redirect::to('/admin/feedback');
        $this->layout->content = View::make('admin.read_feedback')->with('feedback', $query);
    }

    public function getDeleteFeedback($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/feedback');
        $query = Contact::find($id);
        if (is_null($query))
            return Redirect::to('/admin/feedback');
        $this->layout->content = View::make('admin.delete_feedback')->with('feedback', $query);
    }

    public function postEditNews($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/news');
        $news = News::find($id);
        if (is_null($news))
            return Redirect::to('/admin/news');

        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "title"       =>  "required",
            "description" =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            $news->title       = Input::get('title');
            $news->description = News::nl2br(Input::get('description'));
            $news->save();

            return Redirect::to('admin/news/edit/' . $id)->with('message', "Successfully edited news!");
        } else {
            return Redirect::to('admin/news/edit/' . $id)
                    ->with('message', "")->withErrors($validator);
        } // end validation
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

    public function postCreateNews() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "title"       =>  "required",
            "description" =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            $user = Auth::user();
            $news = new News();

            $news->title       = Input::get('title');
            $news->description = News::nl2br(Input::get('description'));
            $news->user_id     = $user->id;

            $news->save();

            return Redirect::to('admin/news/create')->with('message', "Successfully posted news!");
        } else {
            return Redirect::to('admin/news/create')
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

    public function getCreateDish() {
        $this->layout->content = View::make('admin.create_dish');
    }

    public function postCreateDish() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "name"        => "required|unique:dishes",
            "price"       => "required|numeric",
            "description" => "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            $dish = new Dish();
            $img  = new DishImage();

            $dish->name        = Input::get('name');
            $dish->description = Dish::nl2br(Input::get('description'));
            $dish->price       = Input::get('price');

            if (Input::hasFile('image')) {
                $destination = public_path() . "/upload-img";
                $filename    = md5(time());
                $extension   = Input::file('image')->getClientOriginalExtension();

                Input::file('image')->move($destination, $filename.".".$extension);
            }

            $dish->save();

            if (Input::hasFile('image')) {
                $img->dish_id = $dish->id;
                $img->link    = "/upload-img/".$filename.".".$extension;
                $img->save();
            }

            return Redirect::to('admin/dishes/create')->with('message', "Successfully created a new dish!");
        } else {
            return Redirect::to('admin/dishes/create')
                    ->with('message', "")->withErrors($validator);
        } // end validation
    }

    public function getEditDish($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/dishes');
        $query = Dish::find($id);
        if (is_null($query))
            return Redirect::to('/admin/dishes');
        $this->layout->content = View::make('admin.edit_dish')->with('dish', $query);
    }

    public function postEditDish($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/dishes');
        $dish = Dish::find($id);
        if (is_null($dish))
            return Redirect::to('/admin/dishes');
        $img  = $dish->dishImage;
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "name"        => "required",
            "price"       => "required|numeric",
            "description" => "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            $dish->name        = Input::get('name');
            $dish->description = Dish::nl2br(Input::get('description'));
            $dish->price       = Input::get('price');

            if (Input::hasFile('image')) {
                $destination = public_path() . "/upload-img";
                $filename    = md5(time());
                $extension   = Input::file('image')->getClientOriginalExtension();

                Input::file('image')->move($destination, $filename.".".$extension);
            }

            $dish->save();

            if (Input::hasFile('image')) {
                $img->link    = "/upload-img/".$filename.".".$extension;
                $img->save();
            }

            return Redirect::to('admin/dishes/edit/'.$dish->id)->with('message', "Successfully edited dish!");
        } else {
            return Redirect::to('admin/dishes/edit/'.$dish->id)
                    ->with('message', "")->withErrors($validator);
        } // end validation
    }

    public function getDeleteDish($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/dishes');
        $query = Dish::find($id);
        if (is_null($query))
            return Redirect::to('/admin/dishes');
        $this->layout->content = View::make('admin.delete_dish')->with('dish', $query);
    }

    public function postDeleteDish($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/dishes');
        $dish = Dish::find($id);
        if (is_null($dish))
            return Redirect::to('/admin/dishes');

        $dish->delete();
        return Redirect::to('/admin/dishes');
    }

    public function getEditMenu($date = null) {
        if (!isset($date) or is_null($date))
            return Redirect::to('/admin/menu');
        $query = Menu::where('menu_date', $date)->first();
        if (is_null($query)) {
            $query = new Menu();
            $query->menu_date = $date;
        }
        $this->layout->content = View::make('admin.edit_menu')->with('menu', $query);
    }

    public function postEditMenu($date = null) {
        if (!isset($date) or is_null($date))
            return Redirect::to('/admin/menu');
        $menu = Menu::where('menu_date', $date)->first();
        if (is_null($menu))
            $menu = new Menu();

        $menu->menu_date = $date;
        $menu->save();
        
        $menu->dishes()->sync(Input::get('dishes'));

        return Redirect::to('admin/menu/edit/'.$date)->with('message', "Successfully edited menu!");
    }

    public function getManageReserve() {
        $query = Reservation::orderBy('status')->paginate(10);
        $this->layout->content = View::make('admin.manage_reservation')
                                    ->with('reserves', $query);
    }

    public function getReserve($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/reserve');
        $query = Reservation::find($id);
        if (is_null($query))
            return Redirect::to('/admin/reserve');
        $this->layout->content = View::make('admin.read_reservation')->with('reserve', $query);
    }

    public function getReserveOngoing($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/reserve');
        $query = Reservation::find($id);
        if (is_null($query))
            return Redirect::to('/admin/reserve');

        $query->status = 1;
        $query->save();

        return Redirect::to('admin/reserve/'.$id)->with('message', "The reservation has been confirmed!");
    }

    public function getReserveClose($id = null) {
        if (!isset($id) or is_null($id))
            return Redirect::to('/admin/reserve');
        $query = Reservation::find($id);
        if (is_null($query))
            return Redirect::to('/admin/reserve');

        $query->status = 2;
        $query->save();
        
        return Redirect::to('admin/reserve/'.$id)->with('message', "The reservation has been closed!");
    }
}