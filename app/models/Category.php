<?php

class Category extends Eloquent {

    protected $table = 'categories';

    public function dishes() {
    	return $this->hasMany('Dish');
    }
   
}