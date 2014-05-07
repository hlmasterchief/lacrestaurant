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
        $max_table = 40;
        $today = date('Y-m-d');

        $valid_table = $max_table - (Reservation::all()->sum('table'));
        $valid_number = 2 * $valid_table;

        /* validate input */
        $validator = Validator::make(Input::all(), array(
            'date'    =>  'required|date_format:Y-m-d|after:$today',
            'time'    =>  'required|date_format:H:i',
            'numbers' =>  'required|integer|between:1,$valid_number'
        ), array(
            'required'            =>  'We need to know your :attribute.',
            'date.date_format'    =>  'The date need to be formatted "dd-mm-yyyy"',
            'date.after'          =>  'You date is invalid.',
            'time.date_format'    =>  'The time need to be formatted "hh:mm"',
            'numbers.integer'     =>  'We need to know numbers of people in your reservation.',
            'numbers.between'     =>  'Our restaurant has full of slot now. Please make a new reservation if you are interested in.' 
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $reservation = new Reservation();
            $reservation->user_id = Input::get('user_id');
            $reservation->date    = Input::get('date');
            $reservation->time    = Input::get('time');
            $reservation->number  = Input::get('numbers');
            $reservation->comment = Input::get('requirements');
            $reservation->save();
            return Response::json(array('message'=>'Your reservation is sent successfully. We will contact with you soon to confirm. Thank you!'), 200);
        } else {
            return Response::json(array('message'=>$validator->message()), 400);
        } // end validation
    }

}