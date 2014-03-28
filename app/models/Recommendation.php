<?php

class Recommendation extends Eloquent {

    protected $table = 'recommendations';

    public function menu() {
        return $this->belongsTo('Menu');
    }
   
}