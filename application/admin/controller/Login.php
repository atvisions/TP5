<?php
namespace app\admin\controller;
use think\Request;

//这里不能继承Base，因为登录页不需要验证session
class Login extends \think\Controller
{
	public function index()
	{
		
		return view();
	}
	public function check()
	{

		$r = [
			'username' => $this->request->post('username'),
			'password' => $this->request->post('password'),
			'__token__' => $this->request->post('__token__'),

		];

		//实例化验证器
		$validate = new \app\common\validate\AdminLogin();
		if( !$validate->check($r)){
			return $this->error($validate->getError());
		}
		//验证用户名是否存在
		$adminuser = new \app\common\model\AdminUser;
		$user = $adminuser->where('username',$r['username'])->find();

		if(!$user){
			return $this->error('用户名不存在');
		};
		if(password_verify ($r['password'],$user->password) !== true){
			return $this->error('密码错误');
		}
		//写入Session
		\think\facade\Session::set('admin_id',$user->id);

		$request = new Request();
		//保存登录信息
		$result = $user->save([
    		'loginip' => $request->ip(),
			'logintime' => date('Y-m-d H:i:s'),
    	]);
		

		return $this->redirect('/admin');

	}
	public function logout(){
		\think\facade\Session::delete('admin_id');
		return $this->redirect('/admin/login');
	}
}