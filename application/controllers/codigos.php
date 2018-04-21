<?php

require "./application/utils/github.php";

class Codigos extends CI_Controller {


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
          $this->load->model('profesor_model');
     }

     ////////////////////////////////////////////////////////               ALUMNO                //////////////////////////////////////////////////////////////

	public function index(){

          if($this->session->userdata('loginuser')&&($this->session->userdata('rol')=='Alumno')){

               $mail = $this->session->userdata('mail');
               $datos_git = $this->get_data($mail);

               if($datos_git['github_acc'] && $datos_git['github_pass']){

                    if($datos_git['grupo']){

                         /*$github = new Github($datos_git['github_acc'],$datos_git['github_pass']);
                         $repo_content = $github->request('https://api.github.com/repos/'.$datos_git['owner_repo'].'/'.$datos_git['repositorio'].'/contents');
                         $archivos = Array();
                         foreach ($repo_content as $resultado){
                               if(is_string($resultado)==FALSE){
                                    if($resultado['type']=='file'){
                                         array_push($archivos,$resultado['name']);
                                    }
                               }
                         } */

                         $archivos = $this->get_repo_files($datos_git['github_acc'],$datos_git['github_pass'],$datos_git['repositorio'],$datos_git['owner_repo']);
                    
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

     		$this->load->view('alumno/codigos',$datos);
          }
	}

     public function get_data($mail){
          $datos_user = $this->alumno_model->get_github($mail);
          $grupo_id = $this->alumno_model->get_grupo($mail);

          if(!empty($grupo_id)){
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

     public function new_file(){
          $file = $this->input->post('nombre_archivo').'.py';
          $mail = $this->session->userdata('mail');
          $datos_git = $this->get_data($mail);

          $github = new Github($datos_git['github_acc'],$datos_git['github_pass']);

          $message = "Create ".$file;

          $parameters = Array(
               'message' => $message,
               'content' => base64_encode("")
               );

          $create = $github->request_put('https://api.github.com/repos/'.$datos_git['owner_repo'].'/'.$datos_git['repositorio'].'/contents/'.$file,$parameters);

          redirect(codigos);
     }

     public function delete_file(){
          $file = $this->input->post('nombre_archivo');

          $mail = $this->session->userdata('mail');

          $datos_git = $this->get_data($mail);
          $github = new Github($datos_git['github_acc'],$datos_git['github_pass']);

          $file_content = $github->request('https://api.github.com/repos/'.$datos_git['owner_repo'].'/'.$datos_git['repositorio'].'/contents/'.$file);

          $file_sha = $file_content['sha'];
          $message = "Delete ".$file;

          $parameters = Array(
               'message' => $message,
               'sha' => $file_sha
               );

          $delete = $github->request_del('https://api.github.com/repos/'.$datos_git['owner_repo'].'/'.$datos_git['repositorio'].'/contents/'.$file,$parameters);

          //redirect(codigos);

          echo json_encode("Ok");
     }

     ////////////////////////////////////////////////////////               ALUMNO                //////////////////////////////////////////////////////////////


     public function get_repo_files($usuario,$password,$repositorio,$dueño_repo){

          $github = new Github($usuario,$password);

          $repo_content = $github->request('https://api.github.com/repos/'.$dueño_repo.'/'.$repositorio.'/contents');

          $archivos = array();

          foreach ($repo_content as $resultado){

               if(is_string($resultado)==FALSE){
                    if($resultado['type']=='file'){
                         array_push($archivos,$resultado['name']);
                    }
               }

          }

          return $archivos;

     }


     ////////////////////////////////////////////////////////               PROFESOR                //////////////////////////////////////////////////////////////


     public function ver($id_grupo,$n_grupo){

          $mail = $this->session->userdata('mail');

          $github_credentials = $this->get_github_data($mail);

          $repositorio = $this->get_repositorio_grupo( intval($id_grupo) );

          $repositorio_info;

          if( count($repositorio) ){
               $repositorio_info = 1;
          }
          else{
               $repositorio_info = 0;
          }

          if( $repositorio_info ){

               $archivos = $this->get_repo_files($github_credentials['usuario'],$github_credentials['contraseña'],$repositorio['repositorio'],$repositorio['dueño']);

          }
          else{
               $archivos = array();
          }

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'archivos' => $archivos,
                    'repo_info' => $repositorio_info,
                    'id_grupo' => $id_grupo,
                    'numero_grupo' => $n_grupo
                    );

               $this->load->view('profesor/codigos_grupo',$datos);
          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'archivos' => $archivos,
                         'repo_info' => $repositorio_info,
                         'id_grupo' => $id_grupo,
                         'numero_grupo' => $n_grupo
                         );  

                    $this->load->view('profesor_coordinador/codigos_grupo',$datos);         

               }
               else{
                    if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Coordinador',
                              'archivos' => $archivos,
                              'repo_info' => $repositorio_info,
                              'id_grupo' => $id_grupo,
                              'numero_grupo' => $n_grupo
                              );  

                         $this->load->view('coordinador/codigos_grupo',$datos);  


                    }
               }
          }

     }
     

     public function get_github_data($mail){

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

     ////////////////////////////////////////////////////////               PROFESOR                //////////////////////////////////////////////////////////////
}