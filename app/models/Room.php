<?php

class Room extends Eloquent {

	protected $table = 'rooms';

	public function users() {
		return $this->hasMany('User');
	}
	
}