<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model {

	private $table = 'tblobat';
	private $key = 'id';


	function bind(){
		return $this->db->get($this->table);
	}
	
	function get_by_id($id){
		$this->db->where($this->key, $id);
		return $this->db->get($this->table);
	}

	function add($data){
		return $this->db->insert($this->table, $data);
	}
	function edit($id, $data){
		$this->db->where($this->key, $id);
		return $this->db->update($this->table, $data);
	}
	function delete_code($id){
		$this->db->where($this->key, $id);
		return $this->db->delete($this->table);
	}


}

/* End of file M_obat.php */
/* Location: ./application/models/Master/M_obat.php */