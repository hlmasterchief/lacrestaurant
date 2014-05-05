<?php

class ReservationController extends BaseController {

    protected $layout = 'layout.master';

    public function __construct() {
        //$this->beforeFilter('auth');
    }

    public function getIndex() {
        $this->layout->body = View::make('admin.all_reservation');
    }

    public function getReservation($id) {
        $reservation = Reservation::find($id);
        if (!$reservation)
            return Redirect::to('admin/reservation');
        $this->layout->body = View::make('admin.reservation')->with('reservation', $reservation);
    }

    public function postCreateReservation() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "date"    =>  "required|date_format:Y-m-d",
            "time"    =>  "required|time_format:H:m",
            "number"  =>  "required|integer|between:1,64"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $reservation = new Reservation();
            $reservation->user_id = Input::get("user_id");
            $reservation->date    = Input::get("date");
            $reservation->time    = Input::get("time");
            $reservation->number  = Input::get("number");
            $reservation->comment = Input::get("comment");
            $reservation->save();
            return Response::json(array('message'=>'The form has been sent. Thank you!'), 200);
        } else {
            return Response::json(array('message'=>'Error! Cannot send the form.'), 400);
        } // end validation
    }

}