<?php

class DishImage extends Eloquent {

    protected $table = 'dish_images';

    public function dish() {
        return $this->belongsTo('Dish');
    }
   
}