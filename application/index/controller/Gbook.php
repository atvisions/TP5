<?php
namespace app\index\controller;
use app\common\model\Gbook as G;
class Gbook extends Base
{
	public function index(){
		//实例化查询构造器
		$g = new G();
		//翻页函数paginate
		$rows = $g->order('id','desc')->paginate(5);
		//模板提交变量
		$this->assign('rows',$rows);
		return view();

	}
	
	public function save(){
		//获得表单的post值
		$username = $this->request->post('username');
		$content = $this->request->post('content');
		$checkbox = $this->request->post('checkbox');
		$phone = $this->request->post('phone');


		//保存数据到数组
		$r = [
			'username' => $username,
			'content' => $content,	
			"checkbox" => $checkbox, 
			"phone" => $phone, 
			'istime' => time(),		

		];

		//实例化
		$g = new G();
		try{
			$g->storage($r);
		}catch(\exception $e){
			return $this->error( $e->getMessage());
		}

		//成功返回
		//return $this->success('操作成功！','index/gbook/index');
		return redirect('index/gbook/index');
	}



}