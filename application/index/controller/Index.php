<?php
//定义命名空间
namespace app\index\controller;

//类名要大写，要和路径对应
class Index extends Base
{
    // public function index( \think\request $request)
    // {
    //     //查找,查询模型要注意：不要使用（），要使用大写 。要带命名空间
    //     //$row = \app\index\model\Test::where('id','>','1')->select();
    //     //echo "<pre>";
    //     //var_dump($row);
    //     //插入 
    //     // $data = [
    //     //     ["testname" => "aaa","pwd"=>'123456'],
    //     //     ["testname" => "bbb","pwd"=>"123456"],
    //     // ];
    //     // $insert = DB::table("test")->insertALL($data);
    //     // 修改 
    //     // $data = ["testname" => "caicai","pwd"=>"abcdefg"];
    //     // $up = DB::table('test')->where('id','>','1')->update($data);
    //     // 删除  
    //     //$del = DB::table('test')->where('id','=','5')->delete();
    //     //
    //     //
    //     //
    //     //var_dump($request->get('aaa'));
    //     // ?aaa=xxxxx
    // }

    // public function hello($name)
    // {
    //     return 'hello,' . $name;
    // }

    public function default()
    {
        return view();
    }

}
