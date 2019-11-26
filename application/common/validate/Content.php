<?php

namespace app\common\validate;

class Content extends \think\Validate{
	protected $rule = [
		//'username' => 'require',  这里注释掉是因为用户在编辑的时候不允许修改用户名，验证的时候会报NULL。
		'title' => 'require|min:1',
		'subtitle' => 'require',
		'litimg' => 'require',
		'content' => 'require',
		'content_state' => 'require|integer',
	];

	protected $message = [
		'title.require' => '标题不能为空',
		'subtitle.require' => '副标题不能为空',
		'litimg.require' => '请上传缩略图',
		'content.require' => '内容不能为空',
		'content_state.require' => '状态不能为空',
		'content_state.integer' => '输入的格式不正确',
	];

	protected $scene = [
	     'add'  =>  ['username','password'],
	];
	//添加模式下才验证username
	public function sceneAdd(){
	}

	public function sceneModify(){
		return $this->remove('litimg','require');
	}


}
