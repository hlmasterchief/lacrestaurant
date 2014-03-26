<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

// user routes
Route::get('user', 'UserController@getIndex');
Route::get('user/login', 'UserController@getLogin');
Route::post('user/login', 'UserController@postLogin');
Route::get('user/logout', 'UserController@getLogout');

// admin routes
Route::get('user/admin', 'AdminController@getIndex');
Route::get('user/admin/create_user', 'AdminController@getCreateUser');
Route::post('user/admin/create_user', 'AdminController@postCreateUser');

Route::get('dish', 'DishController@getIndex');
Route::get('dish/create_dish', 'DishController@getCreateDish');
Route::post('dish/create_dish', 'DishController@postCreateDish');