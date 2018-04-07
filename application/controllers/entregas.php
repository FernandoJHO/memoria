<?php 
 
class entregas extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->database();
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->model('entrega_model');
          $this->load->model('alumno_model');
          $this->load->model('grupo_model');
     }

     public function index()
     {
          $entregas = $this->get_entregas();

          if($this->session->userdata('loginuser')&&($this->session->userdata('rol')=='Alumno')){
               $user_mail = $this->session->userdata('mail');
               $user_data = $this->get_user_data($user_mail);

               if($user_data['grupo']){

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'github_acc' => $user_data['github_acc'],
                         'github_pass' => $user_data['github_pass'],
                         'repositorio' => $user_data['repositorio'],
                         'owner_repo' => $user_data['owner_repo'],
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'grupo' => $user_data['grupo'],
                         'entregas' => $entregas
                         );
               }
               else{
                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'github_acc' => $user_data['github_acc'],
                         'github_pass' => $user_data['github_pass'],
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'grupo' => $user_data['grupo']
                         );
               }

               $this->load->view('entregas',$datos);

          }
     }

     public function get_entregas(){
          $result = $this->entrega_model->get_entregas();

          $data = Array();
          $entregas = Array();

          foreach($result as $entrega){
               list($fecha,$hora) = explode(' ',$entrega->FECHA_LIMITE);
               list($año,$mes,$dia) = explode('-',$fecha);
               list($horas,$minutos,$segundos) = explode(':',$hora);

               $date = Array(
                    'año' => $año,
                    'mes' => $mes,
                    'dia' => $dia
                    );

               $time = Array(
                    'horas' => $horas,
                    'minutos' => $minutos,
                    'segundos' => $segundos
                    );

               $data['id'] = $entrega->ID_ENTREGA;
               $data['numero'] = $entrega->NUMERO;
               $data['descripcion'] = $entrega->DESCRIPCION;
               $data['fecha'] = $date;
               $data['hora'] = $time;
               $data['porcentaje'] = $entrega->PORCENTAJE;

               array_push($entregas,$data);
          }

          return $entregas;
     }


     public function get_user_data($mail){
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