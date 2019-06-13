<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('roles_model');
    }

    /*查询所有的角色*/
    public function index()
    {
        $data['roles'] = $this->roles_model->get_all_roles();

        if($this->input->get('id')){
            $data['info'] = $this->add();
            var_dump($data);
        }
         $this->load->view('Roles/index',$data);
    }

    /*角色添加*/
    public function add()
    {
        $gid = $this->input->get('gid');
        if(is_null($gid))
        {
            $gid = 0;
        }
        /*加载该角色的基本信息*/ 
        $data['role'] = $this->roles_model->show_info($gid);
        /*加载所有列表信息*/
        $menu_list = $this->roles_model->show_menus('mid');
        $menus = $this->gettreeitems($menu_list);
		$data['menuss'] = array();
		foreach ($menus as $value) {
			$value['children'] = isset($value['children'])?$this->formatMenus($value['children']):false;
			$data['menuss'][] = $value;
        }
        /*加载用户的权限*/
        $data['rights']  = json_decode($data['role']['rights']);
        $this->load->view('Roles/add',$data);
    }

    /*保存角色信息*/
    public function save_menus()
    {
        $data = $this->input->post();
        $result = $this->roles_model->save_menus($data);
        if($result > 0)
        {
            echo json_encode(array('code'=>'101','msg'=>'操作成功'));
        }else{
            echo json_encode(array('code'=>'102','msg'=>'操作失败'));
        }

    }

    /*删除角色*/
    public function del_menus()
    {
        $gid = $this->input->post('gid');
        $result = $this->roles_model->del_menus($gid);
        if($result == 1)
        {
            echo json_encode(array('code'=>'101','msg'=>'删除成功'));
        }else{
            echo json_encode(array('code'=>'102','msg'=>'删除失败'));
        }
    }

    private function gettreeitems($items){
		$tree = array();
		foreach ($items as $item) {
			if(isset($items[$item['pid']])){
				$items[$item['pid']]['children'][] = &$items[$item['mid']];
			}else{
				$tree[] = &$items[$item['mid']];
			}
		}
		return $tree;
	}

	private function formatMenus($items,&$res = array()){
		foreach($items as $item){
			if(!isset($item['children'])){
				$res[] = $item;
			}else{
				$tem = $item['children'];
				unset($item['children']);
				$res[] = $item;
				$this->formatMenus($tem,$res);
			}
		}
		return $res;
    }
    
     
    
}