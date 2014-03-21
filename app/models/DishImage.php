<?php

class DishImage extends Eloquent {

    protected $table = 'dishImages';

    public function dish() {
        return $this->belongsTo('Dish');
    }
   
}