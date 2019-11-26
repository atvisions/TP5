<?php
namespace app\index\controller;
/*
*后台基础控制器
* 所有后台的控制器都应作为他的子类
*/
class Base extends \think\Controller
{
	function initialize(){
    //调用application\common 公共文件        
        $this->assign('webname',setting('webname'));
	}
}
