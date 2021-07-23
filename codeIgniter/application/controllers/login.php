<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_id')) {
			return redirect('admin/dashboard');
		}
	}
	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin_login');
	}

	public function admin_login()
	{
		// echo "string";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run()) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('loginmodel');
			$user_id = $this->loginmodel->login_valid($username, $password);
			if($user_id){
				$this->session->set_userdata('user_id', $user_id);
				return redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('login_failed', 'Invalid Username/Password');
				return redirect('login');
			}

		}else{
			$this->load->view('admin_login');
		}

	}

	
}
