<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('adminmodel');
	}
	public function index()
	{
		$posts = $this->adminmodel->all_posts();
		$latest_post = $this->adminmodel->all_posts();
		// print_r($posts);
		$this->load->view('home', ['posts' => $posts, 'latest' => $latest_post ]);
	}

	public function search()
	{
		$this->form_validation->set_rules('query', 'Query', 'required');
		if (! $this->form_validation->run()) 
			return $this->index();

		$query =  $this->input->post('query');
		$posts = $this->adminmodel->search($query);
		$this->load->view('search_results', ['posts' => $posts]);
	}

	public function post($id)
	{	
		$latest_post = $this->adminmodel->all_posts();

		$post = $this->adminmodel->single_post($id);
		$this->load->view('single_post' , ['post' => $post, 'latest' => $latest_post ]);
	}
}
