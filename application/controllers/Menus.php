<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menus extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menus_model');
    }

    /*菜单首页 查询所有的信息*/
    public function index()
    {
        $data['pid'] = $this->uri->segment(4);
        if($data['pid'] == NULL){
            $data['pid'] = 0;
        }
        $data['menus'] = $this->menus_model->get_one_menus($data['pid']);
         $this->load->view('Menus/index',$data);
    }

    /*修改列表*/
    public function edit()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title','title','required');

        $data = $this->input->get();
        $query = $this->menus_model->edit_menus($data);
        if($query > 0 ){
            echo json_encode(array('code'=>101,'msg'=>'修改成功'));
        }else{
            echo json_encode(array('code'=>102,'msg'=>'修改失败'));
        }
    } 

    /*查询下级*/
    public function show_pid()
    {
      $data = $this->uri->segment(3, 0);
       var_dump($data);
       die;
       $data = $this->menus_model->show_pid($data);
       $this->load->view('Menus/index',$data);

    }
}