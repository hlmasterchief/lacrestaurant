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

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
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

    // relationship with model Reservation
    public function reservations() {
        return $this->hasMany('Reservation');
    }

    // check if User is in any Room
    public function is_customer() {
        return ($this->room_id > -1);
    }

    // check if User is in an admin Group
    public function is_admin() {
        return $this->group->admin;
    }

    public function permissionDishes() {
        return in_array(1, $this->group->getFeaturesArray());
    }

    public function permissionMenu() {
        return in_array(2, $this->group->getFeaturesArray());
    }

    public function permissionManageReserve() {
        return in_array(3, $this->group->getFeaturesArray());
    }

    public function permissionManageUser() {
        return in_array(4, $this->group->getFeaturesArray());
    }

    public function permissionManageFeedback() {
        return in_array(5, $this->group->getFeaturesArray());
    }

    public function permissionManageNews() {
        return in_array(6, $this->group->getFeaturesArray());
    }

    public function permissionReserve() {
        return in_array(10, $this->group->getFeaturesArray());
    }

}