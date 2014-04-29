<?php

class NewsController extends BaseController {

    protected $layout = 'layout.master';

    public function __construct() {
        //$this->beforeFilter('auth');
    }

    public function getIndex() {
        if (Input::get('_request', 'http') == "http") {
            $this->layout->body = View::make('page.all_news');
        } elseif (Input::get('_request', 'http') == "ajax") {
            return News::all()->toJson();
        }
    }

    public function getNews($id) {
        $news = News::find($id);
        if (!$news)
            return Redirect::to('admin/news');
        $this->layout->body = View::make('page.news')->with('news', $news);
    }

    public function getCreateNews() {
        $this->layout->body = View::make('admin.create_news');
    }

    public function postCreateNews() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "title"       => "required",
            "description" => "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $news = new News();
            $news->title       = Input::get("title");
            $news->description = Input::get("description");
            $news->save();

            return Redirect::to('admin/news/create_news')->with('message', 'News added!')
                                                   ->with('news', $news);
        } else {
            return Redirect::to('admin/news/create_news')->withErrors($validator);
        } // end validation
    }

    public function getEditNews($id) {
        $news = News::find($id);
        $this->layout->body = View::make('admin.edit_news')->with('news', $news);
    }

    public function postEditNews($id) {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "title"       => "required",
            "description" => "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $news = News::find($id);
            $news->title       = Input::get("title");
            $news->description = Input::get("description");
            $news->save();

            return Redirect::to("admin/ews/edit_news/$news->id")->with('message', 'News edited!');
        } else {
            return Redirect::to("admin/news/edit_news/$news->id")->withErrors($validator);
        } // end validation
    }

}