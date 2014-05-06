<?php

class Dish extends Eloquent {

    protected $table = 'dishes';

    public function dishImage() {
        return $this->hasOne('DishImage');
    }

    public function dishImageLink() {
        return $this->dishImage ? $this->dishImage->link : $this->defaultImg();
    }

    public function defaultImg() {
        return "/img/800px-No_Image_Wide.svg.png";
    }
   
    public function dishCategory() {
        return $this->belongsTo('DishCategory');
    }

    public function menus() {
        return $this->belongsToMany('Menu');
    }

    public function br2nl() {
        return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $this->description);
    }

    public static function nl2br($text) {
        return preg_replace('/\r?\n/', "<br/>", $text);
    }
   
}