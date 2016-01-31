<?php
/* -------------------------------------------- Home Routes ------------------------------------------------*/
// Home
Route::get('/', 'Home\HomeController@index');
Route::get('/home', 'Home\HomeController@index');
Route::get('/index', 'Home\HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/verify/{key}', 'Auth\AuthController@confirm');
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Member Account
Route::get('account/{id}', 'Home\MemberController@account');
Route::get('account/{id}/history', 'Home\MemberController@history');
Route::put('account/{id}/update','Home\MemberController@update');

// Product in front end
Route::get('product/{id}/{name?}','Home\ProductController@product');


// Category
Route::get('category/{id}/{name?}','Home\CategoryController@category');
Route::get('category/{id}/{type}/{order}/{name?}','Home\CategoryController@category');

// Producer
Route::get('producer/{id}/{name?}','Home\ProducerController@producer');
Route::get('producer/{id}/{type}/{order}/{name?}','Home\ProducerController@producer');

// Search
Route::post('search','Home\SearchController@search');

// Cart
Route::post('cart/insert','Home\CartController@insert');
Route::get('cart/view','Home\CartController@viewCart');
Route::post('cart/updateCart','Home\CartController@updateCart');
Route::get('cart/remove/{id}','Home\CartController@removeCart');
Route::get('cart/empty','Home\CartController@emptyCart');
Route::get('cart/checkout','Home\CartController@checkout');
Route::post('cart/checkout','Home\CartController@checkoutOrder');


/* -------------------------------------------- Admin Routes ------------------------------------------------*/

// Dashboard
Route::get('admin/dashboard','Admin\DashboardController@index');

// User
Route::any('admin/users/getDataAjax','Admin\UsersController@getDataAjax');
Route::get('admin/users','Admin\UsersController@index');
Route::get('admin/users/create','Admin\UsersController@create');
Route::post('admin/users','Admin\UsersController@store');
Route::get('admin/users/{id}/edit','Admin\UsersController@edit');
Route::put('admin/users/{id}','Admin\UsersController@update');
Route::get('admin/users/{id}/del','Admin\UsersController@destroy');

// Role
Route::any('admin/role/getDataAjax','Admin\RoleController@getDataAjax');
Route::get('admin/role','Admin\RoleController@index');
Route::get('admin/role/create','Admin\RoleController@create');
Route::post('admin/role','Admin\RoleController@store');
Route::get('admin/role/{id}/edit','Admin\RoleController@edit');
Route::put('admin/role/{id}','Admin\RoleController@update');
Route::get('admin/role/{id}/del','Admin\RoleController@destroy');

// Permission
Route::any('admin/permission/getDataAjax','Admin\PermissionController@getDataAjax');
Route::get('admin/permission','Admin\PermissionController@index');
Route::get('admin/permission/create','Admin\PermissionController@create');
Route::post('admin/permission','Admin\PermissionController@store');
Route::get('admin/permission/{id}/edit','Admin\PermissionController@edit');
Route::put('admin/permission/{id}','Admin\PermissionController@update');
Route::get('admin/permission/{id}/del','Admin\PermissionController@destroy');



// Category
Route::any('admin/category/getDataAjax','Admin\CategoryController@getDataAjax');
Route::get('admin/category','Admin\CategoryController@index');
Route::get('admin/category/create','Admin\CategoryController@create');
Route::post('admin/category','Admin\CategoryController@store');
Route::get('admin/category/{id}/edit','Admin\CategoryController@edit');
Route::put('admin/category/{id}','Admin\CategoryController@update');
Route::get('admin/category/{id}/del','Admin\CategoryController@destroy');

Route::get('admin/category/{id}/index','Admin\CategoryController@ProductList');
Route::any('admin/category/list','Admin\CategoryController@getProductList');

// Product in backend
Route::any('admin/product/getDataAjax','Admin\ProductController@getDataAjax');
Route::get('admin/product','Admin\ProductController@index');
Route::get('admin/product/create','Admin\ProductController@create');
Route::post('admin/product','Admin\ProductController@store');
Route::get('admin/product/{id}/edit','Admin\ProductController@edit');
Route::put('admin/product/{id}','Admin\ProductController@update');
Route::get('admin/product/{id}/del','Admin\ProductController@destroy');
Route::get('admin/product/thumbnail','Admin\ProductController@setThumbnail');

// List Product Stock
Route::get('admin/product/stock','Admin\ProductController@stock');
// List Product Stock
Route::get('admin/product/closed','Admin\ProductController@closed');



// Producer
Route::any('admin/producer/getDataAjax','Admin\ProducerController@getDataAjax');
Route::get('admin/producer','Admin\ProducerController@index');
Route::get('admin/producer/create','Admin\ProducerController@create');
Route::post('admin/producer','Admin\ProducerController@store');
Route::get('admin/producer/{id}/edit','Admin\ProducerController@edit');
Route::put('admin/producer/{id}','Admin\ProducerController@update');
Route::get('admin/producer/{id}/del','Admin\ProducerController@destroy');

Route::get('admin/producer/{id}/index','Admin\ProducerController@ProductList');
Route::any('admin/producer/list','Admin\ProducerController@getProductList');



// Order
Route::any('admin/order/getDataAjax','Admin\OrderController@getDataAjax');
Route::get('admin/order','Admin\OrderController@index');
Route::get('admin/order/pending','Admin\OrderController@pending');
Route::get('admin/order/on_hold','Admin\OrderController@on_hold');
Route::get('admin/order/closed','Admin\OrderController@closed');
Route::get('admin/order/cancelled','Admin\OrderController@cancelled');

Route::post('admin/order','Admin\OrderController@store');
Route::get('admin/order/{id}/edit','Admin\OrderController@edit');
Route::put('admin/order/{id}','Admin\OrderController@update');
Route::get('admin/order/{id}/invoice','Admin\OrderController@invoice');
Route::get('admin/order/{id}/del','Admin\OrderController@destroy');

// Images
Route::any('admin/images/{key}/getDataAjax','Admin\ImagesController@getDataAjax');
Route::get('admin/images/{key}','Admin\ImagesController@index');
Route::get('admin/images/{key}/create','Admin\ImagesController@create');
Route::post('admin/images/{key}','Admin\ImagesController@store');
Route::get('admin/images/{key}/edit/{id}','Admin\ImagesController@edit');
Route::get('admin/images/del/{id}','Admin\ImagesController@destroy');

// Slider
Route::get('admin/slider','Admin\SliderController@index');
Route::post('admin/slider','Admin\SliderController@store');
Route::get('admin/slider/del/{id}','Admin\SliderController@destroy');

// Config
Route::get('admin/config','Admin\ConfigController@index');
Route::put('admin/config/update','Admin\ConfigController@update');

// Pages
Route::any('admin/pages/getDataAjax','Admin\PagesController@getDataAjax');
Route::get('admin/pages','Admin\PagesController@index');
Route::get('admin/pages/create','Admin\PagesController@create');
Route::post('admin/pages','Admin\PagesController@store');
Route::get('admin/pages/{id}/edit','Admin\PagesController@edit');
Route::put('admin/pages/{id}','Admin\PagesController@update');
Route::get('admin/pages/{id}/del','Admin\PagesController@destroy');

/* -------------------------------------------- Demo Routes ------------------------------------------------*/
// Demo
Route::get('admin/demo', 'DemoController@index');
Route::get('/demo/{id}/page', 'DemoController@page');
Route::get('/demo/image_upload', 'DemoController@getImageUpload');
Route::post('/demo/image_upload', 'DemoController@postImageUpload');

// Display all SQL executed in Eloquent
//Event::listen('illuminate.query', function($query)
//{
//    var_dump($query);
//});