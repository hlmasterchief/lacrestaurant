<?php

class Recommendation extends Eloquent {

    protected $table = 'recommendation';

    public function menu() {
        return $this->hasOne('Menu');
    }
   
}