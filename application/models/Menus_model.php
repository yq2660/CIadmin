<?php

/**
 * 管理员 MODEL
 */

class Menus_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*获取所有一级菜单*/
    public function get_one_menus($data)
    {
        $this->db->where('pid',"$data");
        $query = $this->db->get('menus');
        return $query->result_array();
    } 

    /*修改*/
    public function edit_menus($data)
    {
       if(!empty($data['mid']))
       {
           if($data['title'] == '' && $data['controller'] == '' && $data['method'] == ''){
            $query = $this->db->where(['mid'=>$data['mid']])->delete('menus');
           }else{
            $query = $this->db->where(['mid'=>$data['mid']])->update('menus',$data);
           }
       }else{
           $query = $this->db->insert('menus',$data);
       }
       return $this->db->affected_rows();
    } 

    /*查询下级*/
    public function show_pid($data)
    {
        $query = $this->db->where(array('pid'=>$data['mid']))->get('menus');
        return $query->result_array();
    } 

    /*查询传过来的数组中所有的列表*/
    public function show_all($mid,$index)
    {
        //'mid in('.implode(',',$role['rights']).')
        $where = 'mid in('.implode(',',$mid).') and ishidden=0 and status=0';
        $query = $this->db->where($where)->order_by('mid','AESC')->get('menus');
        $lists = $query->result_array();

        $results = array();
        foreach ($lists as $key => $value) {
            $results[$value[$index]] = $value;
        }
        return $results;
    }
}