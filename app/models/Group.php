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
	
	public static function formSelect() {
		$result = array();
		foreach (Group::all() as $group) {
			$result[$group->id] = $group->name;
		}
		return $result;
	}

}