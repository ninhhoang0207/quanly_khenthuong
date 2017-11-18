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

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {
	Route::group(['prefix'=>'user'], function() {
		Route::get('', 'Admin\UserController@index')->name('admin.user');
	});
});


Route::get('/nhanvien/profile', 'NhanVienController@index')->name('admin.nhanvien.profile');
Route::patch('/nhanvien/profile/updateThongTinCaNhan/{nhanvien}', 'NhanVienController@updateThongTinCaNhan')->name('nhanvien.profile.updateThongTinCaNhan');
Route::patch('/nhanvien/profile/updateThongTinNguoiThan', 'NhanVienController@updateThongTinNguoiThan')->name('nhanvien.profile.updateThongTinNguoiThan');
Route::patch('/nhanvien/profile/updateQuaTrinhCongTac', 'NhanVienController@updateQuaTrinhCongTac')->name('nhanvien.profile.updateQuaTrinhCongTac');
Route::get('/nhanvien/cuocthi/download/{cuocthi}', 'NhanVienController@download')->name('nhanvien.profile.download');