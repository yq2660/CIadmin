<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_model');
	}

	/*登录页面*/
	public function index()
	{
		$this->load->view('login/index');
	}

	/*验证登录*/
	public function doLogin()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Passwrod', 'required');

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login/index');
		} else {
			$query = $this->admin_model->get_by_username($data['username']);
			if (!$query) {
				echo  json_encode(array('code' => '102', 'msg' => '用户不存在'));
			}
			if (md5($data['password']) == $query[0]['password']) {
				$this->session->set_userdata('userinfo', $query[0]);
				echo  json_encode(array('code' => '101', 'msg' => '用户登陆成功'));
			} else {
				echo  json_encode(array('code' => '102', 'msg' => '密码错误'));
			}
		}
	}
}