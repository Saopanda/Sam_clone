<?php

/*
|--------------------------------------------------------------------------
| 		SAM system route rules
|--------------------------------------------------------------------------
*/

#################  前台展示    ################
// 前台展示
Route::get('/','indexController@index');
// 列表页
Route::get('/list/{id}.html','indexController@list');
// 商品详情
Route::get('/{id}.html','GoodsController@show');
//购物车
Route::get('/cart','CartController@index');


################### 注册 ########################
Route::get('/signup','signupController@signup');

	//验证重名
Route::get('/signup/name','signupController@name');
	//短信验证码创建
Route::get('/signup/sms_create','signupController@sms_create');
	//短信验证
Route::get('/signup/sms','signupController@sms');
	//注册操作
Route::post('/signup','signupcontroller@store');
	//激活邮件发送
Route::get('/signup/send/{id}','signupController@send');
	//激活邮件验证
Route::get('/signup/yz/{id}','signupController@yz');



Route::get('/test','testController@test');


################### 登陆 ########################

// 前台登陆
Route::get('/login','indexController@login');
	//登陆验证
Route::post('/login','indexController@dologin');


// 前台已登陆界面
Route::group(['middleware'=>'Login'],function(){

	//注销登陆
	Route::get('/logout','indexController@logout');
	//个人中心
	Route::get('/home','HomeController@index');
	//修改个人中心的数据提交到数据库
	Route::post('/home/bianji','HomeController@bianji');
	//订单管理
	Route::get('/home/order','HomeController@order');
	//购物车
	Route::get('/home/cart/num','CartController@num');
	Route::resource('/home/cart','CartController');
	//去结算
	Route::get('/home/jiesuan','HomeController@jiesuan');
	//支付成功跳转页面
	Route::get('/home/zfsuccess','HomeController@zfsuccess');
	//选择支付方式
	Route::get('/home/payment','HomeController@payment');

	//地址管理
	Route::get('/home/address/getarea','AddressController@getarea');
	Route::resource('/home/address','AddressController');
	//评论管理
	Route::get('/pinglun','HomeController@pinglun');

});


###################  后台登陆   #####################

//登陆
Route::get('/admin/login','adminController@login');
	//登陆验证
Route::post('/admin/login','adminController@dologin');

// 后台已登陆界面
Route::group(['middleware'=>'Admin_Login'],function(){

	// 后台首页
	Route::get('/admin','adminController@index');
	//后台注销
	Route::get('/admin/logout','adminController@logout');	
	//用户管理
	Route::resource('/admin/user','UserController');
	//用户激活提醒
	Route::get('/admin/user/{id}/tx','UserController@tx');
	//商品管理
	Route::resource('/admin/goods','GoodsController');
	//分类管理
	Route::resource('/admin/class','ClassController');
	//分类联动
	Route::get('/getwomenu','ClassController@getwomenu');
	Route::get('/getwo','GoodsController@getwo');	
	Route::get('/gettwo','GoodsController@gettwo');
	//站点设置
	Route::resource('/admin/samsite','samController');
	//广告管理
	Route::resource('/admin/ad','AdController');
	//订单管理
	Route::resource('/admin/order','OrderController');
	//评价管理
	Route::resource('/admin/pinglun','PinglunController');
	//后台管理员
	Route::resource('/admin/manager','ManagerController');
});





