<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$data['page'] = 'home';
		$data['script'] = 'js-home';
		$this->_render_page($data);
		//$this->load->view('base/home');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */