<?php
namespace app\admin\controller;

use app\common\model\AdminUser as AU;

class Auser extends Base{

	public function index(){

		$au = new AU();
		$auData = $au->order('id','asc')->select();
		$data = [
			'audata' => $auData,
			'typeName' => '',
		];
		return view(null,$data);
	}

	public function save(){
		$r = [
			'username' => $this->request->post('username'),
			'password' => $this->request->post('password'),
			'__token__' => $this->request->post('__token__'),
			'id' => $this->request->post('id'),
		];
		//插入数据
		$au = new AU();
		try{
			$au->storage($r);
		}catch(\exception $e){
			return $this->error( $e->getMessage());
		}
		
		//跳转
		return $this->redirect('admin/auser/index');
	}

	public function add(){
		$data = [
			'typeName' => '添加',
		];
		return view(null,$data);
	}

	public function modify(){
		$id = $this->request->get('id');
		$au = new AU();
		$item = $au->where('id',$id)->find();

		if(!$item){
			return $this->error('数据不存在');
		};


		$data = [
			'typeName' => '修改',
			'item' => $item,
		];
		return view('auser/add',$data);
	}

	public function del(){
		$id = $this->request->get('id');
		$au = new AU();
		$admin_id = \think\facade\Session::get('admin_id');

		if((int)$id === $admin_id){
			return $this->error('不能删除自己');
		}else{
			
			try{
			$au->remove($id);
			}catch(\exception $e){
				return $this->error( $e->getMessage());
			}
		}		
		
		//跳转
		return $this->redirect('admin/auser/index');
	}
}