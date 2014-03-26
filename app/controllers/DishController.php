<?php

class DishController extends BaseController {

	protected $layout = 'layout.master';

	public function __construct() {
        $this->beforeFilter('auth');
    }

	public function getIndex() {
		$this->layout->body = View::make('page.dish');
	}

	public function getCreatDish() {
		$this->layout->body = View::make('page.create_dish');
	}

	public function postCreatDish() {
		/* validate input */
		$validator = Validator::make(Input::all(), array(
			"name"	=>	"required",
			"price"	=>	"required",
			"description"	=>	"required"
		));

		/* if validated */
		if ($validator->passes()) {
			/* get input */
			$dish = new Dish();
			$dish->name        = Input::get("name");
			$dish->price       = Input::get("price");
			$dish->description = Input::get("description");
			$dish->save();

			return Redirect::to('dish/create_dish')->with('message', 'Dish added!');
		} else {
			return Redirect::to('dish/create_dish')->withErrors($validator);
		} // end validation
	}

}