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
// 前台展示
Route::get('/','indexController@index');
// 列表页
Route::get('/list','indexController@list');
// 商品详情
Route::get('/{id}.html','GoodsController@show');

//前台注册
Route::get('/signup','indexController@signup');
// 前台登陆
Route::get('/login','indexController@login');


// 前台已登陆界面
Route::group([],function(){

	//个人中心
	Route::get('/home','HomeController@index');
	//订单管理
	Route::get('/home/order','HomeController@order');


});



// 后台登陆
Route::get('/admin/login','adminController@login');

// 后台已登陆界面
Route::group([],function(){
	// 后台首页
	Route::get('/admin','adminController@index');
	//后台用户管理
	Route::resource('/admin/user','UserController');
	//商品管理
	Route::resource('/admin/goods','GoodsController');
	//分类管理
	Route::resource('/admin/class','ClassController');
	//广告管理
	Route::resource('/admin/ad','AdController');
	//订单管理
	Route::resource('/admin/order','OrderController');
	//评价管理
	Route::resource('/admin/pinglun','PinglunController');

	//后台管理员
	Route::resource('/admin/manager','ManagerController');


});





