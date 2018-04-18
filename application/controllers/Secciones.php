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
          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador')){

               $secciones = $this->get_secciones();

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'secciones' => $secciones
                    );

               $this->load->view('secciones',$datos);

          }
          else{
               if( $this->session->userdata('coordinador') ){
                    $secciones = $this->get_secciones();

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => $this->session->userdata('rol').' (Coordinador)',
                         'secciones' => $secciones
                         );

                    $this->load->view('secciones_coordinador',$datos);

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

}