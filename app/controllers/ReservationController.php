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
        // $today = date("Y-m-d");

        /* validate input */
        $validator = Validator::make(Input::all(), array(
            'date'        =>  'required|date_format:Y-m-d',
            'time'        =>  'required|date_format:H:i',
            'numbers'     =>  'required|integer|between:1,64',
            'phonenumber' =>  'required'
        ), array(
            'required'               =>  'The :attribute is required.',
            'date.date_format:Y-m-d' =>  'The date need to be formatted "dd-mm-yyyy".',
            'date.after'     =>  'You date is invalid.',
            'time.date_format:H:i'   =>  'The time need to be formatted "hh:mm".',
            'numbers.integer'        =>  'We need to know number of people in your reservation.',
            'numbers.between:1,64'   =>  'We can only serve maximum 64 people.'
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $reservation = new Reservation();
            $reservation->user_id      = Input::get('user_id');
            $reservation->date         = Input::get('date');
            $reservation->time         = Input::get('time');
            $reservation->numbers      = Input::get('numbers');
            $reservation->phonenumber  = Input::get('phonenumber');
            $reservation->requirements = (Input::has('requirements')?Input::get('requirements'):'');
            $reservation->save();
            return Response::json(array('message'=>array('Your reservation is sent successfully. We will contact with you soon to confirm. Thank you!')), 200);
        } else {
            $messages = $validator->messages()->all();
            return Response::json(array('message'=>$messages), 400);
        } // end validation
    }

    public function getLogin() {
        if (Auth::check()) {
            return Response::json(array('message'=>'Already logged in!', 'user_id' => Auth::user()->id), 200);
        } else {
            return Response::json(array('message'=>'Not logged in!', 'user_id' => 0), 401);
        }
    }

    public function postLogin() {
        /* validate input */
        $validator = Validator::make(Input::all(), array(
            "username" =>  "required",
            "password" =>  "required"
        ));

        /* if validated */
        if ($validator->passes()) {
            /* get input */
            $login = array(
                "username" =>  Input::get("username"),
                "password" =>  Input::get("password")
            );

            /* check login */
            if (Auth::attempt($login)) {
                return Response::json(array('message'=>'Login success!', 'user_id' => Auth::user()->id), 200);
            } else {
                return Response::json(array('message'=>'Error! Login fail.  '), 400);
            } // end auth
        } else {
            return Response::json(array('message'=>'Error! Cannot login.'), 400);
        } // end validation
    }

    public function getLogout() {
        Auth::logout();
        return Response::json(array('message'=>'Logout success!'), 200);
    }

}