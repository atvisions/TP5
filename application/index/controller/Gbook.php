<?php
namespace app\index\controller;
use app\index\model\Gbook as G;
class Gbook extends Base
{
	public function index(){
		//实例化查询构造器
		$gbook = new \app\index\model\Gbook();
		//翻页函数paginate
		$rows = $gbook->order('id','desc')->paginate(5);
		//模板提交变量
		$this->assign('rows',$rows);
		return view();

	}
	
	public function save(){
		//获得表单的post值
		$username = $this->request->post('username');
		$content = $this->request->post('content');
		//将值保存到数组
		$data = [
			"username" => $username,
			"content" => $content, 
		];
		//实例化查询类
		$gbook = new G();
		//插入到数据库
		$gbook->save([
			'username' => $username,
			'content' => $content,	
			'istime' => time(),		

		]);

		//成功返回
		//return $this->success('操作成功！','index/gbook/index');
		return redirect('index/gbook/index');
	}



}