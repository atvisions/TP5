<?php
namespace app\common\model;
class Content extends Base {
	//把admin_id 转成用户名
	public function AdminUser(){
		return $this->beLongsTo('AdminUser');
	}
	public function user(){
		return $this->beLongsTo('User');
	}
	//删除方法
	public function remove($id){
        $item = $this->where('id',$id)->find();
        
        if(!$item){
            return exception('数据不存在',10003);
        };
        
        $item->delete();
    }
    //后台数据提交的方法
    public function storage($r)
	{
		//实例化验证器,数据格式验证
		$validate = new \app\common\validate\Content();
		$scene = $r['id'] ? 'modify' :  'add';
		if( !$validate->scene($scene)->check($r)){
			return exception($validate->getError(),10005); 
		}

		$c = $this;
		
		//如果是修改模式，就获取目标对象
		if( $r['id']){
			$c = $this->where('id',$r['id'])->find();
		}

		
		//过滤数据库字段没有的数据
		$result = $c->allowField(true)->save($r);
	}

}