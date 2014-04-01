<?php

class HomeController extends BaseController {

    protected $layout = "layout.master";

    public function index() {
        $this->layout->body = View::make('ascii');
    }

}