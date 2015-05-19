<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function get_all()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */