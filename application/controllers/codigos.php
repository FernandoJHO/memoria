<?php

require "./application/utils/github.php";

class codigos extends CI_Controller {


     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->load->database();
          $this->load->model('alumno_model');
          $this->load->model('grupo_model');
     }

	public function index(){

          $mail = $this->session->userdata('mail');
          $datos_git = $this->get_data($mail);

          if($datos_git['github_acc'] && $datos_git['github_pass']){

               if($datos_git['grupo']){
                    $github = new Github($datos_git['github_acc'],$datos_git['github_pass']);
                    $repo_content = $github->request('https://api.github.com/repos/'.$datos_git['owner_repo'].'/'.$datos_git['repositorio'].'/contents');
                    $archivos = Array();
                    foreach ($repo_content as $resultado){
                         if($resultado['type']=='file'){
                              array_push($archivos,$resultado['name']);
                         }
                    }
                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'grupo' => 1,
                         'archivos' => $archivos,
                         'credenciales' => 1
                         );   
               } 
               else{
                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'grupo' => 0,
                         'credenciales' => 1
                         );   
               }
          }
          else{
                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'credenciales' => 0
                         );  
          }

          /*$datos = Array(
               'nombre' => $this->session->userdata('nombre'),
               'apellido' =>$this->session->userdata('apellido'),
               'mail' => $this->session->userdata('mail'),
               'logeado' => $this->session->userdata('loginuser'),
               'rol' => $this->session->userdata('rol')
               ); */

		$this->load->view('codigos',$datos);
	}

     public function get_data($mail){
          $datos_user = $this->alumno_model->get_github($mail);
          $grupo_id = $this->alumno_model->get_grupo($mail);

          if(sizeof($grupo_id)>0){
               $repo_info = $this->grupo_model->get_repo_info($grupo_id->ID_GRUPO);
               $data = Array(
                    'github_acc' => $datos_user->GITHUB_ACC,
                    'github_pass' => $datos_user->GITHUB_PASS,
                    'repositorio' => $repo_info->REPOSITORIO,
                    'owner_repo' => $repo_info->REPO_OWNER,
                    'grupo' => 1
                    );

          }
          else{
               $data = Array(
                    'github_acc' => $datos_user->GITHUB_ACC,
                    'github_pass' => $datos_user->GITHUB_PASS,
                    'grupo' => 0
                    );
          }


          return $data;
     }

}