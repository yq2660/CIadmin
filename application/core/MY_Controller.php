<?php

class MY_Controller extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
    }
}


class Base extends MY_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if (empty($this->session->userdata('userinfo'))) {
           //var_dump(111);
           redirect('http://houtai.215.com/login/index');
        } else {
            //$this->load->view('Home/index');
        }
    }
}