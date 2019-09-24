<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registrasi extends CI_Model {

	private $table = 'tblpasien';
	private $key = 'id';


	function generate(){
		$sql ="SELECT CONCAT('P',RIGHT(CONCAT('0000000',COALESCE(MAX(id),0)+1),7)) as id FROM `tblpasien`";
		return $this->db->query($sql)->row()->id;
	}
	function getByRM($id){
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}

	function insertPasien($data){
		return $this->db->insert($this->table, $data);
	}
	function insertVisit($data){
		return $this->db->insert('tblvisits', $data);
	}
}

/* End of file M_Registrasi.php */
/* Location: ./application/models/Pelayanan/M_Registrasi.php */