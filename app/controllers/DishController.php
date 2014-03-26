<?php

class DishController extends BaseController {

	protected $layout = 'layout.master';

	public function getIndex() {
		$this->layout->body = View::make('page.dish');
	}

}