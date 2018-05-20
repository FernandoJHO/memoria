<?php

class Secciones extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('seccion_model');
     }

     public function index()
     {
          
          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               $secciones = $this->get_profesores_seccion($this->get_secciones());

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => 'Coordinador',
                    'secciones' => $secciones
                    );

               $this->load->view('coordinador/secciones_coordinador',$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $secciones = $this->get_profesores_seccion($this->get_secciones());

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'secciones' => $secciones
                         );

                    $this->load->view('profesor_coordinador/secciones_profesor_coordinador',$datos);  
               }
          }
          
     }

     public function get_secciones(){
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

     public function get_profesores_seccion($secciones){

          $secciones_final = array();
          $profesores = array();
          $aux = array();
          $aux2 = array();

          foreach($secciones as $seccion){
               $result_query = $this->seccion_model->get_profesores($seccion['id']);

               foreach($result_query as $profesor){
                    $nombre = $profesor->NOMBRE.' '.$profesor->APELLIDO;
                    $mail = $profesor->MAIL;
                    $aux2['nombre'] = $nombre;
                    $aux2['mail'] = $mail;

                    array_push($profesores, $aux2);
               }

               $aux['id'] = $seccion['id'];
               $aux['codigo'] = $seccion['codigo'];
               $aux['profesores'] = $profesores;

               array_push($secciones_final, $aux);

               $profesores = array();
          }

          return $secciones_final;

     }

     public function new_seccion(){

          $codigo = $this->input->post('codigo_seccion');

          if( $this->seccion_model->add_seccion($codigo) ){
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Seccion creada</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo crear seccion</div>');
          }

          redirect('secciones');

     }

     public function delete_seccion($id_seccion){

          if($this->seccion_model->delete_seccion(intval($id_seccion))){
               echo json_encode("Ok");
          }
          else{
               
          }

     }

}