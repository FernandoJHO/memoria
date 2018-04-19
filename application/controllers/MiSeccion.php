<?php

class MiSeccion extends CI_Controller {

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
          $this->load->model('profesor_model');
     }

     public function index()
     {
          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){
 
               $secciones = $this->get_secciones($this->session->userdata('mail'));

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'secciones' => $secciones
                    );

               $this->load->view('profesor/mi_seccion',$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador')){
                    $secciones = $this->get_secciones($this->session->userdata('mail'));

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'secciones' => $secciones
                         );

                    $this->load->view('profesor_coordinador/mi_seccion',$datos); 
               }
          }
     }

     public function get_secciones($mail){
          $secciones = array();
          $aux = array();

          $result_query = $this->profesor_model->get_seccion($mail);

          foreach($result_query as $seccion){
               $aux['id'] = $seccion->ID_SECCION;
               $aux['codigo'] = $seccion->CODIGO;

               array_push($secciones,$aux);
          }

          return $secciones;
     }

}