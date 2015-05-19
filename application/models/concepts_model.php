<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Concepts_model extends CI_Model {

	public function insert_new( $concept )
	{
		$this->db->insert('conceptos_de_pago', $concept);
	}

}

/* End of file concepts_model.php */
/* Location: ./application/models/concepts_model.php */