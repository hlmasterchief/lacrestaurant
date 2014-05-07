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

// singlepage render, thằng nào xóa bố đấm phát chết luôn
Route::get('/', function() {
    return View::make('singlepage');
});

// làm trò con bò
Route::get('ascii', function() {
	return View::make('layout.master')->nest('body', 'ascii');
});

// admin routes
Route::get('/admin', 'AdminController@getIndex');


Route::get('/admin/login', 'AdminController@getLogin');
Route::post('/admin/login', 'AdminController@postLogin');
Route::get('/admin/logout', 'AdminController@getLogout');


Route::get('/admin/menu', 'AdminController@getManageMenu');
Route::get('/admin/menu/edit/{date?}', 'AdminController@getEditMenu');
Route::post('/admin/menu/edit/{date?}', 'AdminController@postEditMenu');


Route::get('/admin/dishes', 'AdminController@getManageDishes');

Route::get('/admin/dishes/create', 'AdminController@getCreateDish');
Route::post('/admin/dishes/create', 'AdminController@postCreateDish');

Route::get('/admin/dishes/edit/{id?}', 'AdminController@getEditDish');
Route::post('/admin/dishes/edit/{id?}', 'AdminController@postEditDish');

Route::get('/admin/dishes/delete/{id?}', 'AdminController@getDeleteDish');
Route::post('/admin/dishes/delete/{id?}', 'AdminController@postDeleteDish');


Route::get('/admin/users', 'AdminController@getManageUsers');


Route::get('/admin/users/create', 'AdminController@getCreateUser');
Route::post('/admin/users/create', 'AdminController@postCreateUser');

Route::get('/admin/users/edit/{id?}', 'AdminController@getEditUser');
Route::post('/admin/users/edit/{id?}', 'AdminController@postEditUser');

Route::get('/admin/users/delete/{id?}', 'AdminController@getDeleteUser');
Route::post('/admin/users/delete/{id?}', 'AdminController@postDeleteUser');


Route::get('/admin/news', 'AdminController@getManageNews');

Route::get('/admin/news/create', 'AdminController@getCreateNews');
Route::post('/admin/news/create', 'AdminController@postCreateNews');

Route::get('/admin/news/edit/{id?}', 'AdminController@getEditNews');
Route::post('/admin/news/edit/{id?}', 'AdminController@postEditNews');

Route::get('/admin/news/delete/{id?}', 'AdminController@getDeleteNews');
Route::post('/admin/news/delete/{id?}', 'AdminController@postDeleteNews');


Route::get('/admin/feedback', 'AdminController@getManageFeedback');
Route::get('/admin/feedback/{id}', 'AdminController@getReadFeedback');

Route::get('/admin/feedback/delete/{id?}', 'AdminController@getDeleteFeedback');
Route::post('/admin/feedback/delete/{id?}', 'AdminController@postDeleteFeedback');

// front-end routes
Route::get('/ajax/news', 'NewsController@getIndex');
Route::get('/ajax/menu/{date}', 'MenuController@getMenuDate');

// reservation routes
Route::get('admin/reservation', 'ReservationController@getIndex');
Route::get('admin/reservation/{id}', 'ReservationController@getReservation');
Route::post('admin/reservation', 'ReservationController@postCreateReservation');

// news routes
Route::get('admin/news', 'NewsController@getIndex');
Route::get('admin/news/create_news', 'NewsController@getCreateNews');
Route::post('admin/news/create_news', 'NewsController@postCreateNews');
Route::get('admin/news/edit_news/{id}', 'NewsController@getEditNews');
Route::post('admin/news/edit_news/{id}', 'NewsController@postEditNews');
Route::get('admin/news/{id}', 'NewsController@getNews');

// front-end routes
Route::get('ajax/login', 'ReservationController@getLogin');
Route::post('ajax/login', 'ReservationController@postLogin');
Route::get('ajax/logout', 'ReservationController@getLogout');

App::missing(function($exception) {
    return View::make('singlepage');
});

HTML::macro('is_active', function($route) {    
    if( (Request::is($route."/*") AND $route != "admin") OR Request::is($route) ) {
        $active = " class = 'active'";
    }
    else {
        $active = '';
    }
 
    return $active;
});