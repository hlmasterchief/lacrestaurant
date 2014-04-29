<?php

class News extends Eloquent {

    protected $table = 'news';
    protected $appends = array('created_date', 'created_time', 'short_content', 'full_content');
    protected $hidden = array('description');
    protected $shortPattern = "/\s+\S*$/";

    public function getCreatedDateAttribute() {
    	return date("F j, Y",strtotime($this->created_at));
    }

    public function getCreatedTimeAttribute() {
    	return date("H:i",strtotime($this->created_at));
    }

    public function getShortContentAttribute() {
    	$first = substr($this->description, 0, 140);
    	return preg_replace($this->shortPattern, "", $first);
    }

    public function getFullContentAttribute() {
    	$last = strlen($this->getShortContentAttribute());
    	return substr($this->description, $last);
    }
}