<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Master/M_obat');
	}

	public function index()
	{
		$data['page'] = 'Master/obat';
		$data['css'] = 'css-tables';
		$data['js'] = 'js-tables';
		$data['script'] = 'js-obat';
		$this->_render_page($data);
	}

	function binding(){
		$result = $this->M_obat->bind()->result_array();
		echo json_encode($result);
	}
	function get_by_id(){
		$id = $this->input->post('id');
		$result = $this->M_obat->get_by_id($id)->row();
		echo json_encode($result);
	}

	function add(){
		$this->form_validation->set_rules('id', 'Kode Obat', 'trim|required');
		if ($this->form_validation->run() === TRUE)
		{
			$additional_data = [
				'id' => $this->input->post('id'),
				'bpjs_code' => $this->input->post('bpjs_code'),
				'nama' => $this->input->post('nama'),
				'unit_cd' => $this->input->post('unit_cd')
			];

			if ($this->M_obat->add($additional_data)) {
				//insert log
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Add New Obat",
					"description"	=> "Successfull add new obat ".$this->input->post('id'),
					"result"	=> true
				);
				$this->M_Base->create_log($log);

				echo  json_encode(array(
					"status" => true,
					"message" => 'Obat Baru Berhasil Ditambahkan',
				));				
			}else{

				//insert log
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Add New Obat",
					"description"	=> "Error add new obat ".$this->input->post('id'),
					"result"	=> false
				);
				$this->M_Base->create_log($log);

				echo  json_encode(array(
					"status" => false,
					"message" => 'Terjadi Kesalahan Ketika Menyimpan Obat Baru',
				));				
			}
		}else{
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Add New Obat",
					"description"	=> "Error Obat Validation",
					"result"	=> false
				);
				$this->M_Base->create_log($log);

			echo  json_encode(array(
				"status" => false,
				"data" => $data, 
			));
		}

	}

	function edit(){
		$this->form_validation->set_rules('id', 'Kode Obat', 'trim|required');
		if ($this->form_validation->run() === TRUE)
		{
			$id = $this->input->post('id');
			$additional_data = [
				'bpjs_code' => $this->input->post('bpjs_code'),
				'nama' => $this->input->post('nama'),
				'unit_cd' =>$this->input->post('unit_cd')
			];

			if ($this->M_obat->edit($id,$additional_data)) {
				//insert log
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Update Obat",
					"description"	=> "Successfull Update Obat ".$this->input->post('id'),
					"result"	=> true
				);
				$this->M_Base->create_log($log);

				echo  json_encode(array(
					"status" => true,
					"message" => 'Kode Obat Berhasil Dipudate',
				));				
			}else{

				//insert log
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Update Obat",
					"description"	=> "Error Update Obat ".$this->input->post('id'),
					"result"	=> false
				);
				$this->M_Base->create_log($log);

				echo  json_encode(array(
					"status" => false,
					"message" => 'Terjadi Kesalahan Ketika Update Obat',
				));				
			}
		}else{
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Update Obat",
					"description"	=> "Error Obat Validation",
					"result"	=> false
				);
				$this->M_Base->create_log($log);

			echo  json_encode(array(
				"status" => false,
				"data" => $data, 
			));
		}

	}

	function delete(){
		$id = $this->input->post('id');
		$result = $this->M_obat->delete($id);
		if ($result) {
			$log = array(
				"user_id"	=> $this->session->userdata['user']['id'],
				"action"	=> "Delete Obat",
				"description"	=> "Successfull Delete Obat ".$this->input->post('id'),
				"result"	=> false
			);
			$this->M_Base->create_log($log);

			echo  json_encode(array(
				"status" => true,
				"message" => "Berhasil Di Hapus", 
			));
			# code...
		}else{
			echo  json_encode(array(
				"status" => false,
				"data" => "Terjadi Kesalahan", 
			));
		}
	}

}
