<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';

	protected $hidden = array('password');

	// UserInterface, don't care if you want to learn about model and database only
	public function getAuthIdentifier() {
		return $this->getKey();
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function getReminderEmail() {
		return $this->email;
	}
	// end UserInterface

	// relationship with model Group
	public function group() {
		return $this->belongsTo('Group');
	}

	// relationship with model Room
	public function room() {
		return $this->belongsTo('Room');
	}

	// check if User is in any Room
	public function is_customer() {
		return ($this->room_id > -1);
	}

	// check if User is in an admin Group
	public function is_admin() {
		return $this->group->admin;
	}

}