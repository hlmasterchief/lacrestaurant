<?php

class Contact extends Eloquent {

    protected $table = 'contacts';

    public function getType() {
        return $this->type === 0 ? "Contact" : "Feedback";
    }

    public function getCreatedDateAttribute() {
        return date("F j, Y",strtotime($this->created_at));
    }
   
}