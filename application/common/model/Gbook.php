<?php

namespace app\common\model;

class Gbook extends Base{
    public function remove($id){
        $item = $this->where('id',$id)->find();
        
        if(!$item){
            return exception('数据不存在',10006);
        };
        
        $item->delete();
    }

    //数据提交的方法
    public function storage($r)
	{
		
		//实例化验证器,数据格式验证
		$validate = new \app\common\validate\Gbook();
		if( !$validate->check($r)){
			return exception($validate->getError(),10004); 
		}
		$g = $this;
		// var_dump($g);
		// exit;
		//过滤数据库字段没有的数据
		$result = $g->allowField(true)->save($r);
	}

	
}