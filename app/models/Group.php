<?php

class Group extends Eloquent {

	protected $table = 'groups';

	public function getFeaturesArray() {
		return array_map(function($val) {
			return (int) $val;
		}, explode(",", $this->features));
	}

	public function users() {
		return $this->hasMany('User');
	}
	
}