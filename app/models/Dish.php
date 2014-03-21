<?php

class Dish extends Eloquent {

   	protected $table = 'dishes';

   	public function dishImages() {
   		return $this->hasMany('DishImages');
    }
   
   	public function category() {
        return $this->belongsTo('Category');
    }
   
}