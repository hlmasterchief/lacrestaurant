<?php

class Reservation extends Eloquent {

    protected $table = 'reservations';

    public function user() {
        return $this->belongsTo('User');
    }

    public static function getUnread() {
        $result = array();
        foreach (Reservation::all() as $reservation) {
            if (!$reservation->is_read) {
                $result[] = $reservation;
            }
        }
        return $result;
    }

    public static function countUnread() {
        return count(Reservation::getUnread());
    }

    public function getTableAttribute() {
        return ceil($this->numbers / 2);
    }
   
}