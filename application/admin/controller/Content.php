<?php
namespace app\admin\controller;
/**
 * 
 */
use app\common\model\Content as C;
class Content extends Base
{
    public function initialize(){
        parent::initialize();
        //调用配置文件中的配置项
        $this->content_state = config('project.content_state');
        //将配置数据传给模板
        $this->assign('content_state',$this->content_state);

    }
	//首页
    public function index()
    {    	
        $key = trim($this->request->get('key'));
        //预加载数据表
        $c = C::with('adminUser,user');
        if($key){
            $c = $c->where('title','like',"%{$key}%");
        }

        $cData = $c->order('id','desc')->paginate(10);
        $data = [
            'cdata' => $cData,
            'typeName' => '列表',
            'key' => $key,
        ];
        return view(null,$data);
    }
    
    //添加
    public function add()
    {    	
        $data = [
            'typeName' => '添加',
        ];
        return view(null,$data);
    }
    
    //修改
    public function modify()
    {    	
        $id = $this->request->get('id');
        $c = new C();
        $item = $c->where('id',$id)->find();

        if(!$item){
            return $this->error('数据不存在');
        };


        $data = [
            'typeName' => '修改',
            'item' => $item,
        ];
        return view('content/add',$data);
    }
    //保存
    public function save()

    {     
        
        $file = request()->file();
      

        if(empty($file)){
            $id = $this->request->post('id');
            $c = new C();
            $item = $c->where('id',$id)->find();
            $liturl = $item['litimg'];
        }else{
            $file = request()->file('litimg');
            //上传设置
            $info = $file->validate(['size'=>1024*2048,'ext'=>'jpg,png,gif,jpeg'])->move('./uploads');            
            if($info){
                //图片路径
                $liturl = url("uploads/".$info->getSaveName());
                
            }else{
                echo $file->getError();
            }  
        };

        $r = [
            'id' => $this->request->post('id'),
            'content' => $this->request->post('content'),  
            'title' => $this->request->post('title'),
            'subtitle' => $this->request->post('subtitle'),
            'litimg' => $liturl,
            'content_state' => $this->request->post('content_state'),
            'admin_user_id' => $this->user->id,
            '__token__' => $this->request->post('__token__'),
        ];
        //插入数据
        $c = new C();
        try{
            $c->storage($r);
        }catch(\exception $e){
            return $this->error( $e->getMessage());
        }
        //跳转
        return $this->redirect('admin/content/index');
    }
    //删除
    public function del(){
        $id = $this->request->get('id');
        $c = new C();
            
        try{
            $c->remove($id); 
        }catch(\exception $e){
            return $this->error( $e->getMessage());
        }
        //跳转
        return $this->redirect('admin/content/index');
    }



    //状态
    public function state()
    {       
        $state = (int)$this->request->get('state');
        $id = (int)$this->request->get('id');
        if($id < 1){
            return $this->error('数据无效');
        }
        $new_content_state = $state == 1 ? 0:1;
        $item = C::where('id',$id)->find();
        if(!$item){
            return $this->error('数据无效');
        }
        $item->save([
            'content_state' => $new_content_state
        ]);
        return $this->success('操作成功');
    }
    //图片上传
    public function up(){
        //获得表单提交的内容
        $file = $this->request->file('upload_file');
        //上传设置
        $info = $file->validate(['size'=>1024*2048,'ext'=>'jpg,png,gif,jpeg'])->move('./uploads');
        $result = [];
        if($info){
            $result['success'] = true;
            $result['file_path'] = url("uploads/".$info->getSaveName());
        }else{
            $result['success'] = false;
            $result['msg'] = $file->getError();
        }

        return json($result);

    }

}
