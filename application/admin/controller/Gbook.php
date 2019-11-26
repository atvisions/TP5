<?php
namespace app\admin\controller;
/**
 * 
 */
use app\common\model\Gbook as G;
class Gbook extends Base
{

	//首页
    public function index()
    {    	

        $g = new G();
        $key = trim($this->request->get('key'));

        if($key){
            $g = $g->where('content','like',"%{$key}%");
        }

        $gData = $g->order('id','desc')->paginate(10);
        $data = [
            'gdata' => $gData,
            'typeName' => '列表',
            'key' => $key,
        ];
        return view(null,$data);
    }
   
    //删除
    public function del(){
        $id = $this->request->get('id');
        $g = new G();
            
        try{
            $g->remove($id); 
        }catch(\exception $e){
            return $this->error( $e->getMessage());
        }
        //跳转
        return $this->redirect('admin/gbook/index');
    }




}
