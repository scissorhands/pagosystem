<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rules_model', 'rules');
		$this->load->model('users_model', 'users');
		$this->load->model('concepts_model', 'concepts');
		$this->load->model('payments_model', 'payments');
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
			$concept_id = $this->concepts->insert_new( $new_concept );
			$this->process_payments( $concept_id );
		}
	}

	private function process_payments( $concept_id )
	{
		$rule_specifications = $this->rules->get_specifications( $this->input->post('rule') );
		foreach ($rule_specifications as $rule) {
			if($rule->user_id == $this->input->post("user_id")){
				$bill=array(
					"user_id" => $this->input->post("user_id"),
					"concept_id" => $concept_id,
					"monto" => $this->input->post("total_amount")
				);
				$this->payments->insert_single( "cuentas_pagadas", $bill );
			} else {
				$arr = explode("/", $rule->percentage);
				$percentage = $arr[0]/$arr[1];
				$ammount = $this->input->post('total_amount')*$percentage;
				$por_pagar=array(
					"user_id" => $rule->user_id,
					"concept_id" => $concept_id,
					"proveedor_id" => $this->input->post("user_id"),
					"monto" => $ammount
				);
				$this->payments->insert_single( "cuentas_por_pagar", $por_pagar );

				$por_cobrar=array(
					"user_id" => $this->input->post("user_id"),
					"concept_id" => $concept_id,
					"acreedor_id" => $rule->user_id,
					"monto" => $ammount
				);
				$this->payments->insert_single( "cuentas_por_cobrar", $por_cobrar );
			}
		}
	}

}

/* End of file payments.php */
/* Location: ./application/controllers/payments.php */