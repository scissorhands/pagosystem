<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model {

	public function insert_single( $table, $data )
	{
		$this->db->insert($table, $data);
	}

}

/* End of file payments_model.php */
/* Location: ./application/models/payments_model.php */