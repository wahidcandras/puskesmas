<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Base extends CI_Model {

	function get_user_pass($username) {
		$this->db->select('password');
		$this->db->where('username', $username);
		$query = $this->db->get('sysuser');

		if ($query->num_rows() == 1) {
			return $query->row()->password;
		}
		return FALSE;
	}
	
	function get_user($id){
		$this->db->where('username', $id);
		return $this->db->get('sysuser');
	}

	function create_log($data){
		return $this->db->insert('syslog', $data);
	}

}

/* End of file M_Base.php */
/* Location: ./application/models/M_Base.php */