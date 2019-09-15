<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->is_logged_in()) {
			redirect('Auth/login','refresh');
		}
	}

	public function is_logged_in() {
		if ($this->session->userdata['logged_in']) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function _render_page($data){
		$this->load->view('base/header', $data);
		$this->load->view('base/topnav',$data);
		$this->load->view('base/content', $data);
		$this->load->view('base/footer', $data);
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */