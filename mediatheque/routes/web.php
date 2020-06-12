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

Route::resource('admin/type', 'TypeController');

Route::resource('admin/category', 'CategoryController');

Route::get('admin/resource/take/{id}','ResourceController@takeResource');
Route::get('admin/resource/remove/{id}','ResourceController@removeResource');

Route::resource('admin/resource','ResourceController');


Route::get('admin', 'AdminProfile')->name('admin');
