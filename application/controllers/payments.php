<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rules_model', 'rules');
		$this->load->model('users_model', 'users');
		$this->load->model('concepts_model', 'concepts');
	}

	public function index()
	{
		$data = array(
			'title' => "Payments", 
			'content' => "payments/list", 
		);
		$this->concept_validation();

		$users = $this->users->get_all();
		$data['users_drop'] = array();
		foreach ($users as $user) {
			$data['users_drop'][$user->id] = $user->name;
		}

		$rules = $this->rules->get_all();
		$data['rules_drop'] = array();
		foreach ($rules as $rule) {
			$data['rules_drop'][$rule->id] = $rule->name;
		}

		$this->load->view('template/loader', $data);
	}

	private function concept_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('description', 'Descripcion', 'required|min_length[5]');
		$this->form_validation->set_rules('total_amount', 'Monto Total', 'required');
		if ($this->form_validation->run()) {
			$new_concept = array(
				"description" => $this->input->post('description'),
				"rule_id" => $this->input->post('rule'),
				"monto_total" => $this->input->post('total_amount')
			);
			// $this->concepts->insert_new( $new_concept );
			$this->process_payments();
		}
	}

	private function process_payments()
	{
		$rule_specifications = $this->rules->get_specifications( $this->input->post('rule') );
		exit( json_encode( $rule_specifications ) );
	}

}

/* End of file payments.php */
/* Location: ./application/controllers/payments.php */