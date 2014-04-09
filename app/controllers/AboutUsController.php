<?php

class AboutUsController extends BaseController {

    protected $layout = "layout.master";

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function getIndex() {
        $this->layout->body = View::make('page.about_us');
    }

    public function getContact() {
        $this->layout->body = View::make('page.contact');
    }

    public function getFeedback() {
        $this->layout->body = View::make('page.feedback');
    }

}