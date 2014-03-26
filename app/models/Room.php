<?php

class Room extends Eloquent {

    protected $table = 'rooms';

    public function users() {
        return $this->hasMany('User');
    }

    public static function formSelect() {
        $result = array();
        $result[-1] = "No room";
        foreach (Room::all() as $room) {
            $result[$room->id] = "Room ".$room->room_code;
        }
        return $result;
    }
    
}