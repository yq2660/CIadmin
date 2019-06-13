<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('roles_model');
        $this->load->model('menus_model');
    }

    /*后台主页*/
    public function index()
    {
         /*从session里面获取角色id*/
        $seesion = $this->session->userdata('userinfo');
        $datass = $this->roles_model->show_info($seesion['gid']);
        $data['rights'] = json_decode($datass['rights']);
        /*查询所有具有权限的列表*/
        $data['menus'] = $this->menus_model->show_all($data['rights'],'mid');
        /**排序 */
        $data['menus'] = $this->gettreeitems($data['menus']);
        $this->load->view('home/index',$data);
    }

    /*后台首页*/
    public function welcome()
    {
        $this->load->view('home/welcome');
    } 

    /**退出登录*/
    public function logout()
    {
     $res =  $this->session->unset_userdata('userinfo');
     //var_dump($this->session->unset_userdata('userinfo'));
     if(!$res){
         echo json_encode(array('code'=>'101','msg'=>'退出成功'));
     }else{
        echo json_encode(array('code'=>'102','msg'=>'退出失败')); 
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


}