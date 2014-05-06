<?php

class DishController extends BaseController {

    protected $layout = 'layout.master';

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getIndex() {
        $this->layout->body = View::make('page.all_dish');
    }

    public function getDish($id) {
        $dish = Dish::find($id);
        if (!$dish)
            return Redirect::to('admin/dish');
        $this->layout->body = View::make('page.dish')->with('dish', $dish);
    }

    public function getCreateDish() {
        $this->layout->body = View::make('admin.create_dish');
    }

    public function postCreateDish() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "name"        => "required|unique:dishes",
            "price"       => "required|integer",
            "description" => "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $dish = new Dish();
            $dish->name        = Input::get("name");
            $dish->price       = Input::get("price");
            $dish->description = Input::get("description");
            if (Input::has("new_category")) {
                $category = DishCategory::where("name", "=", Input::get("new_category"))->first();
                if ($category) {
                    $dish->dish_category_id = $category->id;
                } else {
                    $category = new DishCategory();
                    $category->name = Input::get("new_category");
                    $category->save();

                    $dish->dish_category_id = $category->id;
                }
            } else {
                $dish->dish_category_id = Input::get("dish_category_id");
            }
            $dish->save();

            return Redirect::to('admin/dish/create_dish')->with('message', 'Dish added!')
                                                   ->with('dish', $dish);
        } else {
            return Redirect::to('admin/dish/create_dish')->withErrors($validator);
        } // end validation
    }

    public function getEditDish($id) {
        $dish = Dish::find($id);
        $this->layout->body = View::make('admin.edit_dish')->with('dish', $dish);
    }

    public function postEditDish($id) {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "name"        => "required|unique:dishes",
            "price"       => "required|integer",
            "description" => "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $dish = Dish::find($id);
            $dish->name        = Input::get("name");
            $dish->price       = Input::get("price");
            $dish->description = Input::get("description");
            if (Input::has("new_category")) {
                $category = DishCategory::where("name", "=", Input::get("new_category"))->first();
                if ($category) {
                    $dish->dish_category_id = $category->id;
                } else {
                    $category = new DishCategory();
                    $category->name = Input::get("new_category");
                    $category->save();

                    $dish->dish_category_id = $category->id;
                }
            } else {
                $dish->dish_category_id = Input::get("dish_category_id");
            }
            $dish->save();

            return Redirect::to("admin/dish/edit_dish/$dish->id")->with('message', 'Dish edited!');
        } else {
            return Redirect::to("admin/dish/edit_dish/$dish->id")->withErrors($validator);
        } // end validation
    }

}