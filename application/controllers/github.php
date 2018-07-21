<?php

require "./application/third_party/date.php";

class Github extends CI_Controller {


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


          if($this->session->userdata('loginuser')&&($this->session->userdata('rol')=='Alumno')){
               $mail = $this->session->userdata('mail');
               $data = $this->get_data($mail);
               if($data['grupo']){

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'github_acc' => $data['github_acc'],
                         'github_pass' => $data['github_pass'],
                         'repositorio' => $data['repositorio'],
                         'owner_repo' => $data['owner_repo'],
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'grupo' => $data['grupo']
                         );  

               }

               else{
                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'github_acc' => $data['github_acc'],
                         'github_pass' => $data['github_pass'],
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'grupo' => $data['grupo']
                         );   
               }

		   $this->load->view('alumno/github',$datos);
          }
          else{
               redirect('login');
          }
	}

     public function set_user_data(){
          $usuario = $this->input->post('usuario');
          $password = $this->input->post('password');
          $mail = $this->session->userdata('mail');

          if($this->alumno_model->set_github($usuario,$password,$mail)){

               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Credenciales Github actualizadas correctamente</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudieron actualizar credenciales Github</div>');    
          }
          
          redirect('github');
     }

     public function get_data($mail){
          $datos_user = $this->alumno_model->get_github($mail);
          $grupos_id = $this->alumno_model->get_grupo($mail);

          $date = new Date();
          $fecha = $date->get_fecha();
          $mes = $fecha['mon'];
          $anno_actual = $fecha['year'];

          if($mes<=7){
               $semestre_actual = 1;
          }else{
               $semestre_actual = 2;
          }

          if(!empty($grupos_id)){

               foreach($grupos_id as $result_grupo){
                    $grupoid = $result_grupo->ID_GRUPO;
                    $grupo = $this->grupo_model->get_grupo_by_id($grupoid);

                    if(($semestre_actual==$grupo->SEMESTRE) && ($anno_actual==$grupo->ANNO)){
                         $repo_info = $this->grupo_model->get_repo_info($grupoid);
                         $data = Array(
                              'github_acc' => $datos_user->GITHUB_ACC,
                              'github_pass' => $datos_user->GITHUB_PASS,
                              'repositorio' => $repo_info->REPOSITORIO,
                              'owner_repo' => $repo_info->REPO_OWNER,
                              'grupo' => 1
                              );

                         break;
                    }else {
                         $data = Array(
                              'github_acc' => $datos_user->GITHUB_ACC,
                              'github_pass' => $datos_user->GITHUB_PASS,
                              'grupo' => 0
                              );
                    }
               }

               // $repo_info = $this->grupo_model->get_repo_info($grupo_id->ID_GRUPO);
               // $data = Array(
               //      'github_acc' => $datos_user->GITHUB_ACC,
               //      'github_pass' => $datos_user->GITHUB_PASS,
               //      'repositorio' => $repo_info->REPOSITORIO,
               //      'owner_repo' => $repo_info->REPO_OWNER,
               //      'grupo' => 1
               //      );

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

     public function set_repo_data(){
          $repo_name = $this->input->post('repo_name');
          $repo_owner = $this->input->post('repo_owner');

          $mail = $this->session->userdata('mail');
          $grupo_id = $this->alumno_model->get_grupo($mail);

          if($this->grupo_model->set_repo_info($grupo_id->ID_GRUPO,$repo_name,$repo_owner)){

               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Información del repositorio actualizada correctamente</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo actualizar información del repositorio</div>'); 
          }

          redirect('github');
     }

}