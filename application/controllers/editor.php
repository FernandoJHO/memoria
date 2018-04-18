<?php

require "./application/utils/github.php";
require "./application/utils/jdoodle.php";

class Editor extends CI_Controller {


     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->database();
          $this->load->library('form_validation');
          $this->load->model('alumno_model');
          $this->load->model('grupo_model');
     }

	public function index(){

		$archivo = $this->input->post('filename');
		if($this->session->userdata('loginuser')&&($this->session->userdata('rol')=='Alumno')){
			$mail = $this->session->userdata('mail');
			$datos_github = $this->get_github_data($mail);
			$github = new Github($datos_github['github_acc'],$datos_github['github_pass']);

			//$commits_usuario = $this->get_user_commits($datos_github['owner_repo'],$datos_github['repositorio'],$github,$datos_github['github_acc']);
			//$this->alumno_model->set_commits($mail,$commits_usuario); 

			$file_content = $github->request('https://api.github.com/repos/'.$datos_github['owner_repo'].'/'.$datos_github['repositorio'].'/contents/'.$archivo);
			//$file_content = $github->request('https://api.github.com/repos/FernandoJHO/memoria_development/contents/archivo3.py');
			// $dumb = is_dir('./application/archivos_subidos');	
			// if(!$dumb){
			// 	$prueba = "no existe";
			// }
			// if($dumb){
			// 	$prueba = "existe";
			// }

			$data = Array(
				'contenido' => trim(base64_decode($file_content['content'])),
				'nombre' => $this->session->userdata('nombre'),
				'apellido' =>$this->session->userdata('apellido'),
				'mail' => $this->session->userdata('mail'),
				'logeado' => $this->session->userdata('loginuser'),
				'rol' => $this->session->userdata('rol'),
				'archivo' => $archivo
				);

			$this->load->view('alumno/editor',$data);
		}
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
		$file = $this->input->post('filename');

		$mail = $this->session->userdata('mail');
		$datos_github = $this->get_github_data($mail);
		$github = new Github($datos_github['github_acc'],$datos_github['github_pass']);

		$file_content = $github->request('https://api.github.com/repos/'.$datos_github['owner_repo'].'/'.$datos_github['repositorio'].'/contents/'.$file);
		//$file_content = $github->request('https://api.github.com/repos/FernandoJHO/memoria_development/contents/archivo3.py');
		$file_sha = $file_content['sha'];

		$update_parameters = Array(
			'message' => $msj,
			'content' => base64_encode($code),
			'sha' => $file_sha
			);
		$response = $github->request_put('https://api.github.com/repos/'.$datos_github['owner_repo'].'/'.$datos_github['repositorio'].'/contents/'.$file,$update_parameters);

		$commits_usuario = $this->get_user_commits($datos_github['owner_repo'],$datos_github['repositorio'],$github,$datos_github['github_acc']);

		sleep(25); //SE ESPERA PARA QUE SE LLENE NUEVAMENTE EL CACHE DEL REPOSITORIO DE GITHUB //EVALUAR OBTENER COMMITS ANTES DE REALIZAR PUSH 

		$commits_usuario = $this->get_user_commits($datos_github['owner_repo'],$datos_github['repositorio'],$github,$datos_github['github_acc']);
		$this->alumno_model->set_commits($mail,$commits_usuario); 

		//$response = $github->request_put('https://api.github.com/repos/FernandoJHO/memoria_development/contents/archivo3.py',$update_parameters);
		//redirect('prueba_controller');

		echo json_encode($response);

	}

	public function get_github_data($mail){
		$datos_user = $this->alumno_model->get_github($mail);
		$grupo_id = $this->alumno_model->get_grupo($mail);
		$repo_info = $this->grupo_model->get_repo_info($grupo_id->ID_GRUPO);

		$data = Array(
			'github_acc' => $datos_user->GITHUB_ACC,
			'github_pass' => $datos_user->GITHUB_PASS,
			'repositorio' => $repo_info->REPOSITORIO,
			'owner_repo' => $repo_info->REPO_OWNER
			); 

		return $data;
	}

	public function get_user_commits($owner_repo,$repo,$github_object,$user){
		$contributors = $github_object->request('https://api.github.com/repos/'.$owner_repo.'/'.$repo.'/stats/contributors');
		$check = 0;
		
		foreach($contributors as $contributor){
			if((strtolower($contributor['author']['login']))==(strtolower($user))){
				$commits = $contributor['total'];
				$check = 1;
				break;
			}
		}

		if($check==0){
			$commits = 0;
		}

		//$commits = count($contributors);

		return $commits;
	}
}