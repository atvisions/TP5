<?php
/**
 * 命名空间
 */
namespace app\admin\controller;
/**
 * 引入
 */
use app\common\model\User as U;
class User extends Base
{
	public function initialize(){
		parent::initialize();
		$this->user_state = config('project.user_state');
		$this->assign('user_state',$this->user_state);

	}
	//列表
    public function index()
    {    
    	$key = trim($this->request->get('key'));
    	$u = new U();
    	if($key){
    		$u = $u->where('username','like',"%{$key}%");
    		$u = $u->whereOr('nickname','like',"%{$key}%");
    		$u = $u->whereOr('phone',$key);
    		$u = $u->whereOr('email',$key);
    	}

		$uData = $u->order('id','desc')->paginate(10);
		$data = [
			'udata' => $uData,
			'typeName' => '列表',
			'key' => $key,
		];
		return view(null,$data);
    }
    //保存
    public function save()
    {    
    	$r = [
    		'id' => $this->request->post('id'),
    		// 'username' => $this->request->post('username'),    避免添加用户的时候报null错误。
    		'password' => $this->request->post('password'),
    		'nickname' => $this->request->post('nickname'),
    		'phone' => $this->request->post('phone'),
    		'email' => $this->request->post('email'),
    		'user_state' => $this->request->post('user_state'),
    		'__token__' => $this->request->post('__token__'),
    	];
    	//如果处于添加模式下追加username
    	if($r['id'] < 1){
    		$r['username'] = $this->request->post('username');

    	}
    	//插入数据
		$u = new U();
		try{
			$u->storage($r);
		}catch(\exception $e){
			return $this->error( $e->getMessage());
		}
		
		//跳转
		return $this->redirect('admin/user/index');
        //return view();
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
		$u = new U();
		$item = $u->where('id',$id)->find();

		if(!$item){
			return $this->error('数据不存在');
		};


		$data = [
			'typeName' => '修改',
			'disabled' => 'disabled',
			'item' => $item,
		];
		return view('user/add',$data);
    }
    //状态
    public function state()
    {    	
    	$state = (int)$this->request->get('state');
    	$id = (int)$this->request->get('id');
    	if($id < 1){
    		return $this->error('数据无效');
    	}
    	$new_user_state = $state == 1 ? 0:1;
    	$item = U::where('id',$id)->find();
    	if(!$item){
    		return $this->error('数据无效');
    	}
    	$item->save([
    		'user_state' => $new_user_state
    	]);
        return $this->success('操作成功');
    }

}
