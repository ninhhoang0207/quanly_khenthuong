<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function() {
	Route::group(['prefix'=>'user'], function() {
		Route::get('', 'UserController@index')->name('user');
		Route::get('create', 'UserController@create')->name('user.create');
		Route::post('create', 'UserController@store');
		Route::post('get-user-not-active', 'UserController@getUserNotActive')->name('user.getUserNotActive');
		Route::post('get-user-actived', 'UserController@getUserActived')->name('user.getUserActived');
	});
});