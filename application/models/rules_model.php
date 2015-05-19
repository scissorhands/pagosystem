<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules_model extends CI_Model {

	public function get_all()
	{
		$query = $this->db->get('rules');
		return $query->result();
	}

	public function get_specifications( $rule_id )
	{
		$query = $this->db->where('rule_id', $rule_id)->get('rule_specifications');
		return $query->result();
	}

}

/* End of file rules_model.php */
/* Location: ./application/models/rules_model.php */