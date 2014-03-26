<?php

class DishCategory extends Eloquent {

    protected $table = 'dish_categories';

    public function dishes() {
    	return $this->hasMany('Dish');
    }

    public function getCategoryLinkAttribute() {
        $link = $this->id."-".Str::slug($this->name);
        return "blog/category/$link";
    }

    public static function formSelect() {
        $result = array();
        foreach (DishCategory::all() as $category) {
            $result[$category->id] = $category->name;
        }
        return $result;
    }
   
}