<?php

class Contact extends Eloquent {

    protected $table = 'contacts';

    public static function getUnread() {
        $result = array();
        foreach (Contact::all() as $contact) {
            if (!$contact->is_read) {
                $result[] = $contact;
            }
        }
        return $result;
    }

    public static function countUnread() {
        return count(Contact::getUnread());
    }
   
}