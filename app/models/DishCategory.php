<?php

class DishCategory extends Eloquent {

    protected $table = 'dish_categories';

    public function dishes() {
    	return $this->hasMany('Dish');
    }
   
}