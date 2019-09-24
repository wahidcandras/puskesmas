<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelayanan/M_Registrasi');
	}

	public function index()
	{
		$data['page'] = 'Pelayanan/Registrasi';
		$data['css'] = 'css-forms';
		$data['js'] = 'js-forms';
		$data['script'] = 'js-registrasi';
		$data['pendidikan'] = $this->M_Base->code('100003')->result();
		$data['pasien_type'] = $this->M_Base->code('100005')->result();
		$data['kecamatan'] = $this->M_Base->region('3322',3)->result();

		$this->_render_page($data);
		
	}

	function GetRegion(){
		$id = $this->input->post('id');
		$level = $this->input->post('level');
		$data['region'] = $this->M_Base->region($id,$level)->result_array();
		echo json_encode($data['region']);
	}

	function getByRM(){
		$id = $this->input->post('id');
		$data = $this->M_Registrasi->getByRM($id)->row();
		echo json_encode($data);
	}

	function add(){
		$pasien_type = $this->input->post('pasien');
		$id = $this->input->post('norm');

		if ($pasien_type == 1) {
			$id = $this->M_Registrasi->generate();
			$pasien = array (
				"id" => $id,
				"nik" => $this->input->post('noktp'),
				"bpjs_no" => $this->input->post('nobpjs'),
				"nama" => $this->input->post('nama'),
				"pasien_type" => $this->input->post('pasien_type'),
				"blood_type" => $this->input->post('blood_type'),
				"alamat" => $this->input->post('alamat'),
				"orchard_id" => '',
				"village" => $this->input->post('kelurahan'),
				"district" => $this->input->post('kecamatan'),
				"city" => '3322',
				"birth_dt" => $this->input->post('birth_dt'),
				"sex" => $this->input->post('jk'),
				"work" => $this->input->post('pekerjaan'),
				"education" => $this->input->post('pendidikan'),
				"phone" => $this->input->post('nohp'),
			);

			$this->M_Registrasi->insertPasien($pasien);
		}

		$visit = array(
			"pasien_id" => $id,
			"visit_dt" => date('Y-m-d'),
			"visit_type" => $this->input->post('pasien'),
			"inap_yn" => $this->input->post('jkunjungan'),
			"worker_id" => $this->input->post(''),
			"kunj_sakit" => 1,
			"puskesmas_id" => $this->session->userdata['puskesmas']['id'],
			"poli_cd" => $this->input->post('unit'),
			"bpjs_kunj" => 1,
			"bpjs_no" => $this->input->post('nobpjs'),
		);

		$this->M_Registrasi->insertVisit($visit);
		

	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Pelayanan/Registrasi.php */

