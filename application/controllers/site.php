<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rules_model', 'rules');
	}

	public function index()
	{
		$data = array(
			'title' => "home", 
			'content' => "home", 
		);
		$this->load->view('template/loader', $data);
	}

}

/* End of file site.php */
/* Location: ./application/controllers/site.php */