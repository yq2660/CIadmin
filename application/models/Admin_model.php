<?php

/**
 * 管理员 MODEL
 */

class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*通过用户名获取用户信息*/
    public function get_by_username($username)
    {
        $this->db->where('username',$username);
        $query = $this->db->get('admin');
        if($query->num_rows() == 1){
            return $query->result_array();
        }
    } 

    /*验证密码*/
    public function check_login($username, $password)
    {

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        return $query->num_rows();
    }
}