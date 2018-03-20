<?php

require "./application/utils/github.php";

class prueba_github extends CI_Controller{

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
		// $github = new Github("FernandoJHO","pollo12");

		// $file_content = $github->request('https://api.github.com/repos/FernandoJHO/prueba_memoria/contents/application/codigosfuente/archivo2.py');
		// $file_sha = $file_content['sha'];

		// $update_parameters = Array(
		// 	'message' => 'commit de prueba',
		// 	'content' => base64_encode('contenido del archivo modificado nuevamente'),
		// 	'sha' => $file_sha
		// 	);
		// $response = $github->request_put('https://api.github.com/repos/FernandoJHO/prueba_memoria/contents/application/codigosfuente/archivo2.py',$update_parameters);
		$this->load->view('prueba_github');

	}

	public function commit(){

		$code = $this->input->post('code');

		$github = new Github("FernandoJHO","pollo12");
		//$repos = $github->request('https://api.github.com/user/repos');
		//$data = Array(
		//	'repositorios' => $repos
		//	);
		/*$latest_commit = $github->request('https://api.github.com/repos/FernandoJHO/prueba_memoria/git/refs/heads/master');
		$sha = $latest_commit['object']['sha'];*/
		//$data = Array(
		//	'sha' => $latest_commit['object']['sha']
		//	);
		/*$commit_info = $github->request('https://api.github.com/repos/FernandoJHO/prueba_memoria/git/commits/'.$sha);
		$tree_sha = $commit_info['tree']['sha'];
		$data = Array(
			'tree_sha' => $tree_sha
			);
		$this->load->view('prueba_github',$data);*/

		$file_content = $github->request('https://api.github.com/repos/FernandoJHO/prueba_memoria/contents/application/codigosfuente/archivo2.py');
		$file_sha = $file_content['sha'];
		/*$data = Array(
			'file_sha' => $file_sha,
			'content' => trim(base64_decode($file_content['content']))
			);
		$this->load->view('prueba_github',$data);*/

		$update_parameters = Array(
			'message' => 'commit de prueba',
			'content' => base64_encode($code),
			'sha' => $file_sha
			);
		$response = $github->request_put('https://api.github.com/repos/FernandoJHO/prueba_memoria/contents/application/codigosfuente/archivo2.py',$update_parameters);
		redirect('prueba_github');

	}

}

?>