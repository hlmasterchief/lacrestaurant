<?php

class Menu extends Eloquent {

    protected $table = 'menus';

    public function dishes() {
        return $this->belongsToMany('Dish');
    }

    public function recommendations() {
   		return $this->hasMany('Recommendation');
   	}

    public function hasDish($id) {
        foreach ($this->dishes as $dish)
            if ($dish->id == $id) return true;
        return false;
    }
 
}