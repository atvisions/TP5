<?php

namespace app\index\controller;

//继承要注意首字母大写
class Test extends \think\Controller {
	public function index(){
	$data = [
		'name1' => '猜猜',
		'name2' => 'cc',
	];

		return view(null,$data);
	}
}