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
	function get_puskesmas($id){
		$this->db->where('id', $id);
		return $this->db->get('tblpuskesmas');
	}

	function create_log($data){
		return $this->db->insert('syslog', $data);
	}

	function code($id){
		$this->db->where('idgroup', $id);
		return $this->db->get('syscode');
	}

	function region($parent,$level){
		$this->db->where('parent_id', $parent);
		$this->db->where('level', $level);
		return $this->db->get('sysregion');
	}

	function code_detail($group, $code){
		$this->db->where('idgroup', $group);
		$this->db->where('idcode', $code);
		return $this->db->get('syscode');
	}

	function add_code($data){
		return $this->db->insert('syscode', $data);
	}
	function edit_code($group,$idcode, $data){
		$this->db->where('idgroup', $group);
		$this->db->where('idcode', $idcode);
		return $this->db->update('syscode', $data);
	}
	function delete_code($group,$idcode){
		$this->db->where('idgroup', $group);
		$this->db->where('idcode', $idcode);
		return $this->db->delete('syscode');
	}

	

	

}

/* End of file M_Base.php */
/* Location: ./application/models/M_Base.php */