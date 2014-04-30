<?php

class MenuController extends BaseController {

    protected $layout = 'layout.master';

    public function __construct() {
        // $this->beforeFilter('csrf', array('on' => 'post'));
        // $this->beforeFilter('auth');
    }

    public function getIndex() {
        $this->layout->body = View::make('page.all_menu');
    }

    public function getMenu($id) {
        $menu = Menu::find($id);
        if (!$menu)
            return Redirect::to('menu');
        $this->layout->body = View::make('page.menu')->with('menu', $menu);
    }

    public function getMenuDate($date) {
        $data = Menu::with('dishes.dishImages')->where('menu_date', "=", $date)->first();
        if ($data) {
            return $data->dishes->toJson();
        } else {
            return "";
        }
    }

    public function getCreateMenu() {
        $this->layout->body = View::make('admin.create_menu');
    }

    public function postCreateMenu() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "menu_date"      =>  "required|date_format:Y-m-d",
            "dishes"         =>  "required",
            "recommendation" =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $menu = new Menu();
            $menu->menu_date = Input::get("menu_date");
            $menu->save();

            $recommendation = new Recommendation();
            $recommendation->menu_id = $menu->id;
            $recommendation->recommendation = Input::get("recommendation");
            $recommendation->save();

            foreach (Input::get('dishes') as $dishId) 
                $menu->dishes()->save(Dish::find((int) $dishId));

            return Redirect::to('admin/menu/create_menu')->with('message', 'Menu added!');
        } else {
            return Redirect::to('admin/menu/create_menu')->withErrors($validator);
        } // end validation
    }

    public function getEditMenu($id) {
        $menu = Menu::find($id);
        $this->layout->body = View::make('admin.edit_menu')->with('menu', $menu);
    }

    public function postEditMenu($id) {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "menu_date"      =>  "required|date_format:Y-m-d",
            "dishes"         =>  "required",
            "recommendation" =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $menu = Menu::find($id);
            $menu->menu_date = Input::get("menu_date");
            $menu->dishes()->sync(Input::get('dishes'));
            $menu->save();

            $recommendation = Menu::find($id)->recommendation;
            $recommendation->recommendation = Input::get("recommendation");
            $recommendation->save();

            return Redirect::to("admin/menu/edit_menu/$id")->with('message', 'Menu edited!');
        } else {
            return Redirect::to("admin/menu/edit_menu/$id")->withErrors($validator);
        } // end validation
    }

}