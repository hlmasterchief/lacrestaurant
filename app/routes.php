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

// Route::get('/', 'HomeController@index');

Route::get('/', function() {
    return View::make('singlepage');
});

Route::get('ascii', function() {
	return View::make('layout.master')->nest('body', 'ascii');
});

// user routes
Route::get('admin/user', 'UserController@getIndex');
Route::get('admin/user/login', 'UserController@getLogin');
Route::post('admin/user/login', 'UserController@postLogin');
Route::get('admin/user/logout', 'UserController@getLogout');

// admin routes
Route::get('admin', 'AdminController@getIndex');
Route::get('admin/create_user', 'AdminController@getCreateUser');
Route::post('admin/create_user', 'AdminController@postCreateUser');

// dish routes
Route::get('admin/dish', 'DishController@getIndex');
Route::get('admin/dish/create_dish', 'DishController@getCreateDish');
Route::post('admin/dish/create_dish', 'DishController@postCreateDish');
Route::get('admin/dish/edit_dish/{id}', 'DishController@getEditDish');
Route::post('admin/dish/edit_dish/{id}', 'DishController@postEditDish');
Route::get('admin/dish/{id}', 'DishController@getDish');

// menu routes
Route::get('admin/menu', 'MenuController@getIndex');
Route::get('admin/menu/create_menu', 'MenuController@getCreateMenu');
Route::post('admin/menu/create_menu', 'MenuController@postCreateMenu');
Route::get('admin/menu/edit_menu/{id}', 'MenuController@getEditMenu');
Route::post('admin/menu/edit_menu/{id}', 'MenuController@postEditMenu');
Route::get('admin/menu/{id}', 'MenuController@getMenu');

Route::get('date_menu/{date}', 'MenuController@getMenuDate');

// contact routes
Route::get('admin/contact', 'ContactController@getIndex');
Route::get('admin/contact/{id}', 'ContactController@getContact');
Route::post('admin/contact', 'ContactController@postCreateContact');

// news routes
Route::get('admin/news', 'NewsController@getIndex');
Route::get('admin/news/create_news', 'NewsController@getCreateNews');
Route::post('admin/news/create_news', 'NewsController@postCreateNews');
Route::get('admin/news/edit_news/{id}', 'NewsController@getEditNews');
Route::post('admin/news/edit_news/{id}', 'NewsController@postEditNews');
Route::get('admin/news/{id}', 'NewsController@getNews');

App::missing(function($exception) {
    return View::make('singlepage');
});