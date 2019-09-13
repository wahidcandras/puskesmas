<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// create password
		// $pass = password_hash('password',PASSWORD_DEFAULT);
		// echo $pass;
		// exit;
		$this->load->view('base/auth');	
	}

	public function validate_user_credential($id, $pass) {
		$is_exist = $this->M_Base->get_user_pass($id);
		if ($is_exist) {
			if (password_verify($pass, $is_exist)) {
				return TRUE;
			}
		}
		return FALSE;
	}

	public function login(){
		$this->form_validation->set_rules('username','Username', 'required');
		$this->form_validation->set_rules('password','Password', 'required');
		if ($this->form_validation->run() === TRUE)
		{	

			if ($this->validate_user_credential($this->input->post('username'),$this->input->post('password'))) {
				$data['user'] =  $this->M_Base->get_user($this->input->post('username'))->row_array();
				$data['logged_in'] = true;

				$this->session->set_userdata( $data);

				//insert log
				$log = array(
					"user_id"	=> $this->input->post('username'),
					"action"	=> "Login",
					"description"	=> "Login Successful",
					"result"	=> true
				);
				$this->M_Base->create_log($log);
				
				echo  $this->session->userdata['user']['username'];

				//redirect('Home','refresh');

			}else{
				$log = array(
					"user_id"	=> $this->input->post('username'),
					"action"	=> "Login",
					"description"	=> "Login Invalid",
					"result"	=> false
				);
				$this->M_Base->create_log($log);

				$this->session->set_flashdata('message', 'Username / Password Salah');
				$this->load->view('base/auth');

			}
		}
		else
		{
			
			$this->session->set_flashdata('message',(validation_errors()) ? validation_errors() : $this->session->flashdata('message'));		
			$this->load->view('base/auth');
		}
	}

	public function logout() {
		// add log

		$log = array(
			"user_id"	=> $this->session->userdata['user']['username'],
			"action"	=> "Logout",
			"description"	=> "Logout",
			"result"	=> false
		);
		$this->M_Base->create_log($log);

		// $this->session->unset_userdata('clms_log', $session_data);
		$this->session->sess_destroy();
		redirect('Auth/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */