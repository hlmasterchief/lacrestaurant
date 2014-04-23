<?php

class AboutController extends BaseController {

    protected $layout = 'layout.master';

    public function __construct() {
        $this->beforeFilter('auth');
    }
}