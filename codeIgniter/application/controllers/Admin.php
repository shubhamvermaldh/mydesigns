<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! $this->session->userdata('user_id')) {
			return redirect('login');
		}

		$this->load->model('adminmodel');
		$this->load->helper('form');
	}

	public function dashboard()
	{
		$this->load->library('pagination');

		$config = [
			'base_url' => base_url('admin/dashboard'),
			'per_page' => 5,
			'total_rows' => $this->adminmodel->num_rows(),
			'attributes' 		=> 	array('class' => 'page-link'),
			'full_tag_open'		=>	'<nav><ul class="pagination pagination-sm">',
			'full_tag_close'	=>	'</ul></nav>',
			'next_tag_open' 	=>	'<li class="page-item">',
			'next_tag_close'	=>	'</li>',
			'prev_tag_open' 	=>	'<li class="page-item">',
			'prev_tag_close'	=>	'</li>',
			'cur_tag_open'		=>	'<li class="page-item active"><a class="page-link">',
			'cur_tag_close'		=>	'</a></li>',
			'num_tag_open'		=>	'<li class="page-item">',
			'num_tag_close'		=>	'</li>',
			'prev_link'			=>	'Previous' ,
			'next_link'			=>	'Next' ,
		   	'display_pages' => TRUE,
		];

		$this->pagination->initialize($config);
		$posts = $this->adminmodel->postslist($config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/dashboard', ['posts'=>$posts]);

	}

	
	public function add_post()
	{
		$this->load->view('admin/add_post');
	}

	public function store_post()
	{
		$config = [
			'upload_path'	=>	'./uploads/',
			'allowed_types'	=>	'gif|jpg|png',
		];
        $this->load->library('upload', $config);
		$this->load->library('form_validation');
		if($this->form_validation->run('add_post_rules') && $this->upload->do_upload('post_image') ){

			$imagedata = $this->upload->data();
			$image_name =  $imagedata['raw_name'].$imagedata['file_ext'];
			$post = $this->input->post();
			unset($post['submit']);
			$post['post_image'] = $image_name;
			$user_id = $this->session->userdata('user_id');
			$post['user_id'] = $user_id;

			return $this->flashAndRedirect(
				$this->adminmodel->store_post($post),
				'Post Added Successful',
				'Post Not Added Try Again'
			);

		}else{
			$upload_error = $this->upload->display_errors();
			print_r($upload_error);
			$this->load->view('admin/add_post', compact('upload_error'));
		}
	}

	public function edit_post($post_id)
	{
		$current_user = $this->session->userdata('user_id');
		$post = $this->adminmodel->find_post($post_id);

		if ($current_user == $post->user_id) {
			$this->load->view('admin/edit_post', ['post'=>$post]);
		}else{
			$this->session->set_flashdata('feedback', 'You Not Edit This Post');
			$this->session->set_flashdata('feedback_class', 'alert-danger');
			return redirect('admin/dashboard');
		}
	}

	public function update_post($post_id)
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('add_post_rules')){
			$post = $this->input->post();
			unset($post['submit']);

			return $this->flashAndRedirect(
				$this->adminmodel->update_post($post_id, $post),
				'Post Update Successful',
				'Post Not Update Try Again'
			);
		}else{
			$this->session->set_flashdata('error', 'this is error');
			return redirect("admin/edit_post/{$post_id}");
		}
	}

	public function delete_post($post_id)
	{
		$current_user = $this->session->userdata('user_id');
		$status = $this->adminmodel->delete_post($post_id, $current_user);

		return $this->flashAndRedirect(
			$status,
			'Post Deleted Successful',
			'This Is Not Your Post'
		);
	}


	public function logout()
	{
		$this->session->unset_userdata('user_id');
		redirect ('login');
	}

	private function flashAndRedirect($succes, $succesMessage, $failureMessage)
	{
		if ($succes) {
			$this->session->set_flashdata('feedback', $succesMessage);
			$this->session->set_flashdata('feedback_class', 'alert-success');
		}else{
			$this->session->set_flashdata('feedback', $failureMessage);
			$this->session->set_flashdata('feedback_class', 'alert-danger');
		}
		return redirect('admin/dashboard');
	}
	
}
