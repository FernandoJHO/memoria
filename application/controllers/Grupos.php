<?php

require "./application/utils/date.php";

class Grupos extends CI_Controller {

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
          $this->load->model('grupo_model');
          $this->load->model('alumno_model');
     }

     public function index()
     {
          $datos = Array(
               'nombre' => $this->session->userdata('nombre'),
               'apellido' =>$this->session->userdata('apellido'),
               'mail' => $this->session->userdata('mail'),
               'rol' => $this->session->userdata('rol')
               );
     }

     public function all($id_seccion){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor'){

               $grupos = $this->get_integrantes( $this->get_grupos(intval($id_seccion)) );


               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'grupos' => $grupos
                    );
               $this->load->view('grupos_all',$datos);
          }

     }

     public function get_grupos($id_seccion){
          $grupos = array();
          $aux = array();

          $date = new Date();
          $fecha = $date->get_fecha();

          $año = strval($fecha['year']);
          if( $fecha['mon']<=7 ){
               $semestre = '1';
          }
          else{
               $semestre = '2';
          }

          $result_query = $this->grupo_model->get_grupos($id_seccion,$año,$semestre);

          foreach($result_query as $grupo){
               $aux['id'] = $grupo->ID_GRUPO;
               $aux['numero'] = $grupo->NUMERO;
               $aux['nombre'] = $grupo->NOMBRE;
               $aux['proyecto'] = $grupo->PROYECTO;
               $aux['semestre'] = $grupo->SEMESTRE;
               $aux['año'] = $grupo->ANNO;

               array_push($grupos,$aux);
          }

          return $grupos;
     }

     public function get_integrantes($grupos){

          $integrantes = array();
          $aux = array();
          $grupos_final = array();

          foreach($grupos as $grupo){
               $result_query = $this->grupo_model->get_integrantes(intval($grupo['id']));

               foreach($result_query as $integrante){
                    $mail_alumno = $integrante->MAIL_ALUMNO;
                    $alumno = $this->alumno_model->get_nombre($mail_alumno);
                    $nombre_alumno = $alumno->NOMBRE.' '.$alumno->APELLIDO;
                    array_push($integrantes,$nombre_alumno.' ('.$mail_alumno.')');
               }

               
               $aux['id'] = $grupo['id'];
               $aux['numero'] = $grupo['numero'];
               $aux['nombre'] = $grupo['nombre'];
               $aux['proyecto'] = $grupo['proyecto'];
               $aux['semestre'] = $grupo['semestre'];
               $aux['año'] = $grupo['año'];
               $aux['integrantes'] = $integrantes;

               array_push($grupos_final,$aux);

          }

          return $grupos_final;

     }

}