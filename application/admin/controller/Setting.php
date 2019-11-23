<?php
namespace app\admin\controller;

class Setting extends Base
{
    //构造函数
	function initialize(){
        //先执行父类的构造函数
		parent::initialize();
		$this->setting = new \app\common\model\Setting();

	}
    public function index()
    {   
    	$data = [
    		'setting' => $this->setting->select(),
    	];
        return view(null,$data);
    }

    public function save()
    {    
    	$r = [];
    	$r['formdata'] = $this->request->post('formdata');
    	$r['__token__'] = $this->request->post('__token__');
    	//实例化验证器,数据格式验证
		$validate = new \app\common\validate\Setting();
		if( !$validate->check($r)){
			return $this->error($validate->getError()); 
		}

		$list = [];
		$setting = new \app\common\model\Setting();

    	foreach ($this->setting->select() as $item) {
    		$list[] = [
    			'id' => $item->id,
    			'value' => $r['formdata'][$item->key],
    		];
    	}

    	$is = $this->setting->saveAll($list);
        \think\facade\Cache::rm('setting');
        return $this->success('修改成功','admin/setting/index');
    }
}
