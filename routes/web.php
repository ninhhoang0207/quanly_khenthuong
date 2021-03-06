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


Route::get('/nhanvien/profile', 'NhanVienController@index')->name('admin.nhanvien.profile');
Route::patch('/nhanvien/profile/updateThongTinCaNhan/{nhanvien}', 'NhanVienController@updateThongTinCaNhan')->name('nhanvien.profile.updateThongTinCaNhan');
Route::patch('/nhanvien/profile/updateThongTinNguoiThan', 'NhanVienController@updateThongTinNguoiThan')->name('nhanvien.profile.updateThongTinNguoiThan');
Route::patch('/nhanvien/profile/updateQuaTrinhCongTac', 'NhanVienController@updateQuaTrinhCongTac')->name('nhanvien.profile.updateQuaTrinhCongTac');
Route::get('/nhanvien/cuocthi/download/{cuocthi}', 'NhanVienController@download')->name('nhanvien.profile.download');


Route::group(['prefix' => 'tinh'], function() {
    Route::get('/','Admin\TinhController@admin_index')->name('admin.tinh.index');
    Route::get('create','Admin\TinhController@create')->name('admin.tinh.create');
    Route::post('create','Admin\TinhController@store')->name('admin.tinh.store');
    Route::get('edit/{id?}','Admin\TinhController@edit')->name('admin.tinh.edit');
    Route::put('edit/{id?}','Admin\TinhController@update')->name('admin.tinh.update');
    Route::get('delete/{id?}','Admin\TinhController@delete')->name('admin.tinh.delete');
});

Route::group(['prefix' => 'huyen'], function() {
    Route::get('/','Admin\HuyenController@admin_index')->name('admin.huyen.index');
    Route::get('create','Admin\HuyenController@create')->name('admin.huyen.create');
    Route::post('create','Admin\HuyenController@store')->name('admin.huyen.store');
    Route::get('edit/{id?}','Admin\HuyenController@edit')->name('admin.huyen.edit');
    Route::put('edit/{id?}','Admin\HuyenController@update')->name('admin.huyen.update');
    Route::get('delete/{id?}','Admin\HuyenController@delete')->name('admin.huyen.delete');
});

Route::group(['prefix' => 'xa'], function() {
    Route::get('/','Admin\XaController@admin_index')->name('admin.xa.index');
    Route::get('create','Admin\XaController@create')->name('admin.xa.create');
    Route::post('create','Admin\XaController@store')->name('admin.xa.store');
    Route::get('edit/{id?}','Admin\XaController@edit')->name('admin.xa.edit');
    Route::put('edit/{id?}','Admin\XaController@update')->name('admin.xa.update');
    Route::get('delete/{id?}','Admin\XaController@delete')->name('admin.xa.delete');
});

Route::group(['prefix' => 'cuocthi'], function() {
    Route::get('/','Admin\CuocThiController@admin_index')->name('admin.cuocthi.index');
    Route::get('create','Admin\CuocThiController@create')->name('admin.cuocthi.create');
    Route::post('create','Admin\CuocThiController@store')->name('admin.cuocthi.store');
    Route::get('edit/{id?}','Admin\CuocThiController@edit')->name('admin.cuocthi.edit');
    Route::put('edit/{id?}','Admin\CuocThiController@update')->name('admin.cuocthi.update');
    Route::get('delete/{id?}','Admin\CuocThiController@destroy')->name('admin.cuocthi.delete');
});

Route::group(['prefix' => 'cuocthi-file'], function() {
    Route::get('/','Admin\CuocThiFileController@admin_index')->name('admin.cuocthifile.index');
    Route::get('create','Admin\CuocThiFileController@create')->name('admin.cuocthifile.create');
    Route::post('create','Admin\CuocThiFileController@store')->name('admin.cuocthifile.store');
    Route::get('edit/{id?}','Admin\CuocThiFileController@edit')->name('admin.cuocthifile.edit');
    Route::put('edit/{id?}','Admin\CuocThiFileController@update')->name('admin.cuocthifile.update');
    Route::get('delete/{id?}','Admin\CuocThiFileController@destroy')->name('admin.cuocthifile.delete');
});


