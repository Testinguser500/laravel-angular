<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('admin/login', 'Admin\HomeController@index');
Route::post('admin/log_user', 'Admin\HomeController@log_user');
Route::get('admin/log_out', 'Admin\HomeController@log_out');
Route::get('admin/dashboard', 'Admin\HomeController@dashboard');
Route::get('admin/category', 'Admin\CategoryController@index');
Route::get('admin/category/add', 'Admin\CategoryController@add');
Route::post('admin/category/store', 'Admin\CategoryController@store');
Route::post('admin/category/delete', 'Admin\CategoryController@delete');
Route::get('admin/category/edit/{id}', 'Admin\CategoryController@edit');
Route::post('admin/category/update', 'Admin\CategoryController@update');
Route::get('admin/brand', 'Admin\BrandController@index');
Route::get('admin/brand/add', 'Admin\BrandController@add');
Route::post('admin/brand/store', 'Admin\BrandController@store');
Route::post('admin/brand/delete', 'Admin\BrandController@delete');
Route::get('admin/brand/edit/{id}', 'Admin\BrandController@edit');
Route::post('admin/brand/update', 'Admin\BrandController@update');

Route::get('admin/user', 'Admin\UserController@index');
Route::get('admin/user/add', 'Admin\UserController@add');
Route::post('admin/user/store', 'Admin\UserController@store');