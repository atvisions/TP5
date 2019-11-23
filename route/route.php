<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//首页路由
Route::get('/', 'index/default');
//新闻路由
Route::get('news', 'index/news/index');
//关于我们路由
Route::get('about', 'index/about/index');
//联系我们路由
Route::get('contact', 'index/contact/index');

//处理留言的路由，网址+控制器
Route::post('gbook/save', 'index/gbook/save');

//留言本首页路由
Route::get('gbook', 'index/gbook/index');



//后台管理
Route::group('admin', function () {
    //后台首页
	Route::get('/', 'admin/index/index');
	//后台登录,长地址在上面
	Route::group('login', function () {
		Route::get('/', 'admin/login/index');
		Route::post('/check', 'admin/login/check');
		Route::get('/logout', 'admin/login/logout');
	});
	
	Route::group('auser', function () {
		//管理员管理
		Route::get('/index', 'admin/auser/index');
		Route::get('/add', 'admin/auser/add');
		Route::post('/save', 'admin/auser/save');
		Route::get('/modify', 'admin/auser/modify');
		Route::get('/del', 'admin/auser/del');
	});
	Route::group('setting', function () {
		//管理员管理
		Route::get('/index', 'admin/setting/index');
		Route::post('/save', 'admin/setting/save');
	});

	Route::group('user', function () {
		//用户管理
		Route::get('/index', 'admin/user/index');
		Route::get('/add', 'admin/user/add');
		Route::post('/save', 'admin/user/save');
		Route::get('/modify', 'admin/user/modify');
		Route::get('/state', 'admin/user/state');
	});

	Route::group('content', function () {
		//内容管理
		Route::get('/index', 'admin/content/index');
		Route::get('/add', 'admin/content/add');
		Route::post('/save', 'admin/content/save');
		Route::post('/up', 'admin/content/up');
		Route::get('/modify', 'admin/content/modify');
		Route::get('/state', 'admin/content/state');
		Route::get('/del', 'admin/content/del');
	});

	Route::group('gbook', function () {
		//留言管理
		Route::get('/index', 'admin/gbook/index');
		Route::get('/del', 'admin/gbook/del');
	});
	
});
