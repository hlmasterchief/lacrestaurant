<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';

	protected $hidden = array('password');

	public function getAuthIdentifier() {
		return $this->getKey();
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function getReminderEmail() {
		return $this->email;
	}

	public function group() {
		return $this->belongsTo('Group');
	}

	public function room() {
		return $this->is_customer() ? $this->belongsTo('Room') : null;
	}

	public function is_customer() {
		return ($this->room_id > -1);
	}

	public function is_admin() {
		return $this->group->admin;
	}

}