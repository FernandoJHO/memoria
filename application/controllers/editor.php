<?php

require "./application/third_party/github.php";
require "./application/third_party/jdoodle.php";

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
          $this->load->model('profesor_model');
     }

    ///////////////////////////////////////////////////////////             ALUMNO                 ////////////////////////////////////////////////////////////// 

	public function index(){

		$archivo = $this->input->post('filename');
		if($this->session->userdata('loginuser')&&($this->session->userdata('rol')=='Alumno')){
			$mail = $this->session->userdata('mail');
			$datos_github = $this->get_github_data($mail);

			$contenido = $this->get_file_content($datos_github['github_acc'],$datos_github['github_pass'],$datos_github['repositorio'],$datos_github['owner_repo'],$archivo);


			$data = Array(
				'contenido' => $contenido,
				'nombre' => $this->session->userdata('nombre'),
				'apellido' =>$this->session->userdata('apellido'),
				'mail' => $this->session->userdata('mail'),
				'logeado' => $this->session->userdata('loginuser'),
				'rol' => $this->session->userdata('rol'),
				'archivo' => $archivo
				);

			$this->load->view('alumno/editor',$data);
		}
		else{
			redirect('login');
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

	///////////////////////////////////////////////////////////             ALUMNO                 //////////////////////////////////////////////////////////////


	public function get_file_content($usuario,$password,$repositorio,$dueño,$nombre_archivo){

		$github = new Github($usuario,$password);

		$file_content = $github->request('https://api.github.com/repos/'.$dueño.'/'.$repositorio.'/contents/'.$nombre_archivo);

		$contenido_archivo = trim(base64_decode($file_content['content']));

		return $contenido_archivo;

	}


	///////////////////////////////////////////////////////////             PROFESOR                 //////////////////////////////////////////////////////////////

     

	public function ver(){

		$id_grupo = intval($this->input->post('id_grupo'));

		$nombre_archivo = $this->input->post('nombre_archivo');

		$mail = $this->session->userdata('mail');


		$repositorio = $this->get_repositorio_grupo($id_grupo);

		$contenido_archivo = $this->get_file_content(NULL,NULL,$repositorio['repositorio'],$repositorio['dueño'],$nombre_archivo);

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'archivo' => $nombre_archivo,
                    'contenido' => $contenido_archivo
                    );

               $this->load->view('profesor/contenido_codigo',$datos);
          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
	                     'archivo' => $nombre_archivo,
	                     'contenido' => $contenido_archivo
                         );  

                    $this->load->view('profesor_coordinador/contenido_codigo',$datos);         

               }
               else{
                    if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Coordinador',
                    		  'archivo' => $nombre_archivo,
                    		  'contenido' => $contenido_archivo
                              );  

                         $this->load->view('coordinador/contenido_codigo',$datos);  


                    }
               }
          }

	}


	public function get_github_credentials($mail){

		$github = $this->profesor_model->get_github($mail);

		$credenciales = array();

		if(!empty($github)){

			$credenciales['usuario'] = $github->GITHUB_ACC;
			$credenciales['contraseña'] = $github->GITHUB_PASS;

		}

		return $credenciales;

	}


	public function get_repositorio_grupo($id_grupo){

		$repositorio = $this->grupo_model->get_repo_info($id_grupo);

		$datos_repo = array();

		if(!empty($repositorio)){

			if(($repositorio->REPOSITORIO != NULL || $repositorio->REPOSITORIO != "") && ($repositorio->REPO_OWNER != NULL || $repositorio->REPO_OWNER != "")){
				$datos_repo['repositorio'] = $repositorio->REPOSITORIO;
				$datos_repo['dueño'] = $repositorio->REPO_OWNER;
			}

		}

		return $datos_repo;

	}


	///////////////////////////////////////////////////////////             PROFESOR                 //////////////////////////////////////////////////////////////
}