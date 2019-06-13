<?php

/**
 * 管理员 MODEL
 */

class Roles_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*获取所有角色信息*/
    public function get_all_roles()
    {
      $query = $this->db->order_by("gid", "DESC")->get('groups');
      return $query->result_array();
    } 

    /*显示该角色所有信息*/
    public function show_info($id)
    {
       $query = $this->db->where('gid',$id)->get('groups');
    
       return $query->row_array();
    } 

    /*显示所有列表信息*/
    public function show_menus($index)
    {
      $query = $this->db->get('menus');
      $lists = $query->result_array();
      $results = array();
      foreach ($lists as $key => $value) {
        $results[$value[$index]] = $value;
      }
      return $results;
    } 

    /*保存角色信息*/
    public function save_menus($data)
    {
      $menus = $data['menu'];
      $menus && $data['rights'] = json_encode(array_keys($menus));
       unset($data['menu']);
      /*写入数据库*/
      if($data['gid'])
      {
        $query = $this->db->where('gid',$data['gid'])->update('groups',$data);
      }else{
        $query = $this->db->insert('groups',$data);
      }
      return $this->db->affected_rows();
    }
    
    /*删除角色信息*/
    public function del_menus($gid)
    {
      $this->db->where(['gid'=>$gid])->delete('groups');
      return $this->db->affected_rows();
    } 
}