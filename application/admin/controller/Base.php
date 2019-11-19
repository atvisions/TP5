<?php
namespace app\admin\controller;
/*
*后台基础控制器
* 所有后台的控制器都应作为他的子类
*/
class Base extends \think\Controller
{
	function initialize(){
        
		//登录验证 
    	$admin_id = \think\facade\Session::get('admin_id');
    	if(!$admin_id){
    		return $this->error("需要登录后操作");
    	};

    	$user = new \app\common\model\AdminUser();
    	$user = $user->where('id',$admin_id)->find();
    	if(!$user){
    		return $this->error("需要登录后操作");
    	};
    	$this->assign('user',$user);
        //$webname = \app\facade\Setting::get('webname');
        $this->assign('webname',setting('webname'));
	}
	
	

}
