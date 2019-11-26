<?php

namespace app\common\model;

class User extends Base{
	public function storage($r)
	{
		//实例化验证器,数据格式验证
		$validate = new \app\common\validate\User();
		$scene = $r['id'] ? 'modify' :  'add';
		if( !$validate->scene($scene)->check($r)){
			return exception($validate->getError(),10004); 
		}

		$u = $this;
		
		//如果是修改模式，就获取目标对象
		if( $r['id']){
			$u = $this->where('id',$r['id'])->find();
		}
		//如果没有填写密码就删除密码字段数据
		if($r['password']){
			//密码加密
			$r['password'] = password_hash($r['password'],PASSWORD_DEFAULT);
		}else{
			unset($r['password']);
		}
		
		//过滤数据库字段没有的数据
		$result = $u->allowField(true)->save($r);
	}
}