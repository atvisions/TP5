<?php

namespace app\common;

class Setting{

	protected $data = false;

	public function get($key){
		//如果类属性是false，说明第一次调用get
		if($this->data === false){
			//从缓存中调用数据
			$list = \think\facade\Cache::get('setting');
			//没有缓存只能从数据库调用数据
			if($list === false){
				$setting = new \app\common\model\Setting();
				$list = [];
				//通过each方法，将数据集数据转换成二维数组，使用& 引用list，在function中会直接操作外部的list数据
				$setting->select()->each(function($item , $k)use(&$list){
					$list[$item->key] = $item;
				});
				//将数据写入缓存
				\think\facade\Cache::set('setting',$list);
			}
			//将数据赋值给类属性
			
			$this->data = $list;
		}

		return isset($this->data[$key]) ? $this->data[$key]->value : null;
	}
}