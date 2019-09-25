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

	public function bpjs_API($method){
		$username='sci';
		$password='Ungaran@1114';
		$kdAplikasi='095';
		// $ppk = $this->session->userdata['puskesmas']['ppk'];
		// $cons_id = $this->session->userdata['puskesmas']['cons_id'];
		// $secretKey = $this->session->userdata['puskesmas']['secret_key'];
		$ppk = '0172B008';
		$cons_id = '21089';
		$secretKey = '0vA949BF9A';

		date_default_timezone_set('UTC');
		$tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
		$signature        = hash_hmac('sha256', $cons_id."&".$tStamp, $secretKey, true);
		$encodedSignature = base64_encode($signature);
		$authorization    = base64_encode($username.':'.$password.':'.$kdAplikasi);


		$ch = curl_init();
		$headers = array(
			'x-cons-id: '.$cons_id .'',
			'x-timestamp: '.$tStamp.'' ,
			'x-signature: '.$encodedSignature.'',
			'x-Authorization: Basic '.$authorization.'',
			'Content-Type: Application/JSON'
		);

		$base_url = "https://dvlp.bpjs-kesehatan.go.id:9081/pcare-rest-v3.0/";
    	curl_setopt($ch, CURLOPT_URL, $base_url."".$method);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    	curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	
    	$content = curl_exec($ch);
    	$err = curl_error($ch);
 
    	print_r($err);

  		$data = json_decode($content,true);

    	curl_close($ch);  

    	return $data;



		/*echo "Cons ID : ".$cons_id.'<br/>';
		echo "Timestamp : ".$tStamp.'<br/>';
		echo "Signature : ".$encodedSignature.'<br/>';
		echo "Authorization : ".$authorization.'<br/>';*/
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */