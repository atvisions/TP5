<?php

namespace app\common\validate;

class User extends \think\Validate{
	protected $rule = [
		//'username' => 'require',  这里注释掉是因为用户在编辑的时候不允许修改用户名，验证的时候会报NULL。
		'password' => 'require|min:1',
		'nickname' => 'require',
		'phone' => 'require|mobile',
		'email' => 'require|email',
		'user_state' => 'require|integer',
	];

	protected $message = [
		'username.require' => '用户名不能为空',
		'username.checkUser' => '用户名不能重复',
		'password.require' => '密码不能为空',
		'nickname.require' => '昵称不能为空',
		'phone.require' => '电话不能为空',
		'phone.mobile' => '请输入正确的手机号码',
		'email.require' => '邮箱不能为空',
		'email.email' => '请输入正确的邮件格式',
		'user_state.require' => '状态不能为空',
		'user_state.integer' => '输入的格式不正确',
	];

	protected $scene = [
	     'add'  =>  ['username','password'],
	];
	//添加模式下才验证username
	public function sceneAdd(){
		return $this->append('username','require | checkUser');
	}

	public function sceneModify(){
		return $this
		->remove('password','require')
		->append('username','checkUser');
	}
	protected function checkUser($str,$rule,$r){
		$user = new \app\common\model\User();
		$row = $user
		->where('username',$str)
		->where('id','<>',$r['id'])
		->find();

		if($row){
			return false;
		}
		return true;
	}

}
