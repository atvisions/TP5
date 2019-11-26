<?php
//定义命名空间
namespace app\index\controller;
use app\common\model\Content as C;
//类名要大写，要和路径对应
class News extends Base
{
    public function index()
    {
    	$c = new C;
        $cData = $c->order('id','desc')->paginate(10);
        $data = [
            'cdata' => $cData,
            'typeName' => '列表',
        ];
        return view(null,$data);
    }

}
