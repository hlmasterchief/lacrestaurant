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
            'date'        =>  'required|date_format:Y-m-d|after:$today',
            'time'        =>  'required|date_format:H:i',
            'numbers'     =>  'required|integer|between:1,$valid_number',
            'phonenumber' =>  'required'
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
            $reservation->numbers  = Input::get('numbers');
            $reservation->requirements = Input::get('requirements');
            $reservation->save();
            return Response::json(array('message'=>'Your reservation is sent successfully. We will contact with you soon to confirm. Thank you!'), 200);
        } else {
            $messages = $validator->messages()->all();
            return Response::json(array('message'=>$messages), 400);
        } // end validation
    }

}