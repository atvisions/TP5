<?php

namespace app\common\validate;

class Gbook extends \think\Validate{
	protected $rule = [
		//'username' => 'require',  这里注释掉是因为用户在编辑的时候不允许修改用户名，验证的时候会报NULL。
		'username' => 'require|min:2',
		'phone' => 'require|mobile',
		'content' => 'require',
	];

	protected $message = [
		'username.require' => '用户名不能为空',
		'phone.require' => '电话不能为空',
		'phone.mobile' => '请输入正确的手机号码',
		'content.require' => '请输入内容',
	];

	protected $scene = [
	];
	//添加模式下才验证username
	public function sceneAdd(){
	}

	public function sceneModify(){
	}


}
