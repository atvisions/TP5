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


//处理留言的路由，网址+控制器
Route::post('gbook/save', 'index/gbook/save');
//删除留言
Route::get('gbook/delete/:id', 'index/gbook/delete');
//留言本首页路由
Route::get('gbook', 'index/gbook/index');

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

	
});




//空首页路由
Route::get('/', 'index/default');

return [];