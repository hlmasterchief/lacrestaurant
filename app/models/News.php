<?php

class News extends Eloquent {

    protected $table = 'news';
    protected $appends = array('created_date', 'created_time');

    public function getCreatedDateAttribute() {
    	return date("F j, Y",strtotime($this->created_at));
    }

    public function getCreatedTimeAttribute() {
    	return date("H:i",strtotime($this->created_at));
    }

    public function user() {
        return $this->belongsTo('User');
    }

    public function br2nl() {
        return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $this->description);
    }

    public static function nl2br($text) {
        return preg_replace('/\r?\n/', "<br/>", $text);
    }
}