<?php

class ContactController extends BaseController {

    protected $layout = 'layout.master';

    public function __construct() {
        //$this->beforeFilter('auth');
    }

    public function getIndex() {
        $this->layout->body = View::make('page.all_contact');
    }

    public function getContact($id) {
        $contact = Contact::find($id);
        if (!$contact)
            return Redirect::to('contact');
        $this->layout->body = View::make('page.contact')->with('contact', $contact);
    }

    public function postCreateContact() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "name"    =>  "required",
            "email"   =>  "required|email",
            "type"    =>  "required|in:0,1",
            "subject" =>  "required",
            "comment" =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $contact = new Contact();
            $contact->name    = Input::get("name");
            $contact->email   = Input::get("email");
            $contact->type    = Input::get("type");
            $contact->subject = Input::get("subject");
            $contact->comment = Input::get("comment");
            $contact->save();
            return "";
        } else {
            return $validator->messages()->toJson();
        } // end validation
    }

}