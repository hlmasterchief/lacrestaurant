<?php

class Reservation extends Eloquent {

    protected $table = 'reservations';

    public function user() {
        return $this->belongsTo('User');
    }

    public static function getNew() {
        $result = array();
        foreach (Reservation::all() as $reservation) {
            if ($reservation->status == 0) {
                $result[] = $reservation;
            }
        }
        return $result;
    }

    public static function countNew() {
        return count(Reservation::getNew());
    }

    public static function getOngoing() {
        $result = array();
        foreach (Reservation::all() as $reservation) {
            if ($reservation->status == 1) {
                $result[] = $reservation;
            }
        }
        return $result;
    }

    public static function countOngoing() {
        return count(Reservation::getOngoing());
    }

    public function getType() {
        if ($this->status == 0) {
            return "New";
        } elseif ($this->status == 1) {
            return "Ongoing";
        } else {
            return "Closed";
        }
    }
}