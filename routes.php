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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/index', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/admin/dashboard', [
    'middleware' => 'auth',
    'uses' => 'DashBoardController@index'
]);

// User
Route::any('admin/users/getDataAjax','UsersController@getDataAjax');
Route::get('admin/users','UsersController@index');
Route::get('admin/users/create','UsersController@create');
Route::post('admin/users','UsersController@store');
Route::get('admin/users/{id}/edit','UsersController@edit');
Route::put('admin/users/{id}','UsersController@update');
Route::get('admin/users/{id}/del','UsersController@destroy');

// Role
Route::any('admin/role/getDataAjax','RoleController@getDataAjax');
Route::get('admin/role','RoleController@index');
Route::get('admin/role/create','RoleController@create');
Route::post('admin/role','RoleController@store');
Route::get('admin/role/{id}/edit','RoleController@edit');
Route::put('admin/role/{id}','RoleController@update');
Route::get('admin/role/{id}/del','RoleController@destroy');

// Permission
Route::any('admin/permission/getDataAjax','PermissionController@getDataAjax');
Route::get('admin/permission','PermissionController@index');
Route::get('admin/permission/create','PermissionController@create');
Route::post('admin/permission','PermissionController@store');
Route::get('admin/permission/{id}/edit','PermissionController@edit');
Route::put('admin/permission/{id}','PermissionController@update');
Route::get('admin/permission/{id}/del','PermissionController@destroy');

// Demo
Route::get('/demo', 'DemoController@index');
Route::get('/demo/{id}/page', 'DemoController@page');