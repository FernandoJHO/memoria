<?php

require "./application/utils/github.php";
require "./application/utils/jdoodle.php";

class editor extends CI_Controller {


     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->library('form_validation');
     }

	public function index(){
		$github = new Github("FernandoJHO","pollo12");
		$file_content = $github->request('https://api.github.com/repos/FernandoJHO/memoria_development/contents/archivo3.py');	
		$data = Array(
			'contenido' => trim(base64_decode($file_content['content']))
			);

		$this->load->view('prueba',$data);
	}

	public function jdoodle(){

		$src = $this->input->post('src');
		$input = $this->input->post('inp');

		$jdoodle = new JDoodle($src,$input);
		$result = $jdoodle->run();

		echo json_encode($result);

	}

	public function commit(){

		$code = $this->input->post('code');
		$msj = $this->input->post('mensaje');

		$github = new Github("FernandoJHO","pollo12");

		$file_content = $github->request('https://api.github.com/repos/FernandoJHO/memoria_development/contents/archivo3.py');
		$file_sha = $file_content['sha'];

		$update_parameters = Array(
			'message' => $msj,
			'content' => base64_encode($code),
			'sha' => $file_sha
			);
		$response = $github->request_put('https://api.github.com/repos/FernandoJHO/memoria_development/contents/archivo3.py',$update_parameters);
		//redirect('prueba_controller');
		echo json_encode($response);

	}


}