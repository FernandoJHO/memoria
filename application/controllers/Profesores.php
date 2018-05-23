<?php


class Profesores extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          $this->load->model('profesor_model');
          $this->load->model('seccion_model');
     }

     public function index()
     {

          if($this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')) {

               $secciones_all = $this->get_all_secciones();

               $profesores = $this->get_profesores_con_seccion( $this->get_profesores() );

              $datos = Array(
               'nombre' => $this->session->userdata('nombre'),
               'apellido' =>$this->session->userdata('apellido'),
               'mail' => $this->session->userdata('mail'),
               'rol' => 'Coordinador',
               'secciones_all' => $secciones_all,
               'profesores' => $profesores
               );

              $this->load->view('coordinador/gestion_profesores',$datos);
         }
         else{
               if($this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('profesor_coordinador') && !$this->session->userdata('coordinador')){

                    $secciones_all = $this->get_all_secciones();

                    $profesores = $this->get_profesores_con_seccion( $this->get_profesores() );

                   $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => 'Profesor-Coordinador',
                    'secciones_all' => $secciones_all,
                    'profesores' => $profesores
                    );

                   $this->load->view('profesor_coordinador/gestion_profesores',$datos);
               }
               else{
                    redirect('login');
               }
         }

     }

     public function new_profesor(){

          $counter = 0;

          foreach($this->input->post() as $key => $val){
               $counter++;
          }

          $counter = $counter - 5;

          $secciones = array();

          for($i = 1; $i<=$counter; $i++){
               $id_seccion = $this->input->post('seccion_'.$i);
               if($id_seccion!=NULL || $id_seccion!=""){
                    array_push($secciones,intval($id_seccion));
               }
          }

          $nombres = $this->input->post('nombres');
          $apellidos = $this->input->post('apellidos');
          $mail = $this->input->post('mail');
          $password = $this->input->post('password');
          $rol = $this->input->post('rol');

          $coordinador = 0;
          $profesor_coordinador = 0;

          switch ($rol) {
               case 2:
                    $coordinador = 1;
                    break;
               case 3:
                    $profesor_coordinador = 1;
                    break;
          }

          if( $this->profesor_model->new_profesor($nombres,$apellidos,$mail,$password,$coordinador,$profesor_coordinador) ){

               foreach($secciones as $seccion){
                    $this->profesor_model->set_seccion_profesor($mail,$seccion);
               }

               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Profesor creado</div>');
          }    
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo crear profesor</div>');
          }

          redirect('profesores');

     }

     public function get_all_secciones(){

          $secciones = array();
          $aux = array();

          $result_query = $this->seccion_model->get_secciones();

          foreach($result_query as $seccion){
               $aux['id'] = $seccion->ID_SECCION;
               $aux['codigo'] = $seccion->CODIGO;

               array_push($secciones,$aux);
          }

          return $secciones;

     }

     public function dropdown_html_builder($contador){

          $html = '<div class="form-group"> <label >Seccion</label> <select class="form-control" name="seccion_'.$contador.'"> <option disabled selected>Selecciona una sección...</option> ';

          $secciones_all = $this->get_all_secciones();

          foreach($secciones_all as $seccion){
               $html = $html.'<option value="'.$seccion['id'].'">'.$seccion['codigo'].'</option>';
          }

          $html = $html.'</select> </div>';

          $response = array(
               'html' => $html
               );

          echo json_encode($response);

     }

     public function delete_profesor(){

          $mail = $this->input->post('mail');

          if($this->profesor_model->delete_profesor($mail)){
               echo json_encode("Ok");
          }
          else{
               
          }

     }

     public function get_profesores(){

          $profesores = array();
          $aux = array();

          $result_query = $this->profesor_model->get_profesores();

          foreach($result_query as $profesor){
               $aux['nombres'] = $profesor->NOMBRE;
               $aux['apellidos'] = $profesor->APELLIDO;
               $aux['mail'] = $profesor->MAIL;
               $aux['coordinador'] = $profesor->COORDINADOR;
               $aux['profesor_coordinador'] = $profesor->PROFESOR_COORDINADOR;

               array_push($profesores,$aux);
          }

          return $profesores;

     }

     public function get_profesores_con_seccion($profesores){

          $profesores_final = array();
          $secciones = array();
          $aux = array();
          $aux2 = array();

          foreach($profesores as $profesor){

               $result_secciones = $this->profesor_model->get_seccion($profesor['mail']);

               foreach($result_secciones as $result_seccion){
                    $aux2['id'] = $result_seccion->ID_SECCION;
                    $aux2['codigo'] = $result_seccion->CODIGO;

                    array_push($secciones,$aux2);
               }

               $aux['nombres'] = $profesor['nombres'];
               $aux['apellidos'] = $profesor['apellidos'];
               $aux['mail'] = $profesor['mail'];
               $aux['coordinador'] = $profesor['coordinador'];
               $aux['profesor_coordinador'] = $profesor['profesor_coordinador'];
               $aux['secciones'] = $secciones;

               array_push($profesores_final, $aux);

               $secciones = array();

          }

          return $profesores_final;

     }

}