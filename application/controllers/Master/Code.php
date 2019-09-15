<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends MY_Controller {

	public function index()
	{
		$data['page'] = 'Master/code';
		$data['css'] = 'css-tables';
		$data['js'] = 'js-tables';
		$data['script'] = 'js-code';
		$data['code'] = $this->M_Base->code('100001')->result();
		$this->_render_page($data);
	}

	function getcode(){
		$group = $this->input->post('e');
		$result = $this->M_Base->code($group)->result_array();
		echo json_encode($result);
	}
	function getcode_detail(){
		$group = $this->input->post('idgroup');
		$code = $this->input->post('idcode');
		$result = $this->M_Base->code_detail($group,$code)->row();
		echo json_encode($result);
	}

	function add(){
		$this->form_validation->set_rules('idcode', 'Code', 'trim|required');
		if ($this->form_validation->run() === TRUE)
		{
			$additional_data = [
				'idgroup' => $this->input->post('idgroup'),
				'idcode' => $this->input->post('idcode'),
				'bpjs_code' => $this->input->post('bpjs_code'),
				'short_name' => $this->input->post('short_name'),
				'full_name' =>$this->input->post('full_name'),
				'remark' => $this->input->post('remark'),
				'use_yn' => '1'
			];

			if ($this->M_Base->add_code($additional_data)) {
				//insert log
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Add New Code",
					"description"	=> "Successfull add new code ".$this->input->post('idcode'),
					"result"	=> true
				);
				$this->M_Base->create_log($log);

				echo  json_encode(array(
					"status" => true,
					"message" => 'Kode Baru Berhasil Ditambahkan',
				));				
			}else{

				//insert log
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Add New Code",
					"description"	=> "Error add new code ".$this->input->post('idcode'),
					"result"	=> false
				);
				$this->M_Base->create_log($log);

				echo  json_encode(array(
					"status" => false,
					"message" => 'Terjadi Kesalahan Ketika Menyimpan Kode Baru',
				));				
			}
		}else{
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Add New Code",
					"description"	=> "Error Code Validation",
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
		$this->form_validation->set_rules('idcode', 'Code', 'trim|required');
		if ($this->form_validation->run() === TRUE)
		{
			$group = $this->input->post('idgroup');
			$idcode = $this->input->post('idcode');
			$additional_data = [
				'bpjs_code' => $this->input->post('bpjs_code'),
				'short_name' => $this->input->post('short_name'),
				'full_name' =>$this->input->post('full_name'),
				'remark' => $this->input->post('remark'),
				'use_yn' => '1'
			];

			if ($this->M_Base->edit_code($group,$idcode,$additional_data)) {
				//insert log
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Update Code",
					"description"	=> "Successfull Update code ".$this->input->post('idcode'),
					"result"	=> true
				);
				$this->M_Base->create_log($log);

				echo  json_encode(array(
					"status" => true,
					"message" => 'Kode Baru Berhasil Dipudate',
				));				
			}else{

				//insert log
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Update Code",
					"description"	=> "Error Update Code ".$this->input->post('idcode'),
					"result"	=> false
				);
				$this->M_Base->create_log($log);

				echo  json_encode(array(
					"status" => false,
					"message" => 'Terjadi Kesalahan Ketika Menyimpan Update Code',
				));				
			}
		}else{
				$log = array(
					"user_id"	=> $this->session->userdata['user']['id'],
					"action"	=> "Update Code",
					"description"	=> "Error Code Validation",
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
		$group = $this->input->post('idgroup');
		$code = $this->input->post('idcode');
		$result = $this->M_Base->delete_code($group,$code);
		if ($result) {
			$log = array(
				"user_id"	=> $this->session->userdata['user']['id'],
				"action"	=> "Delete Code",
				"description"	=> "Successfull Delete code ".$this->input->post('idcode'),
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
