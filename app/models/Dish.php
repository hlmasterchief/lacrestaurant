<?php

class Dish extends Eloquent {

    protected $table = 'dishes';

    public function dishImages() {
        return $this->hasMany('DishImage');
    }
   
    public function dishCategory() {
        return $this->belongsTo('DishCategory');
    }

    public function menus() {
        return $this->belongsToMany('Menu');
    }
   
}