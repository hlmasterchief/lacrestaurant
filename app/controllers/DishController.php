<?php

class DishController extends BaseController {

	protected $layout = 'layout.master';

	public function postDish() {
		$this->layout->body = View::make('page.dish');
	}

}