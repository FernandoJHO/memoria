<?php

require "./application/third_party/moss.php";
require "./application/third_party/date.php";

class GestionCopia extends CI_Controller {

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
          $this->load->model('seccion_model');
          $this->load->model('profesor_model');
          $this->load->model('entrega_model');
          $this->load->model('codigofuente_model');
     }

     public function index()
     {
          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){
 
               $secciones_profesor = $this->get_secciones($this->session->userdata('mail'));

               $secciones_all = $this->get_all_secciones();

               $entregas = $this->get_entregas_codigo();

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'secciones_profesor' => $secciones_profesor,
                    'secciones_all' => $secciones_all,
                    'entregas' => $entregas
                    );

               $this->load->view('profesor/comparacion_codigos',$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador')){

                    $secciones_profesor = $this->get_secciones($this->session->userdata('mail'));

                    $secciones_all = $this->get_all_secciones();
                    
                    $entregas = $this->get_entregas_codigo();

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'secciones_profesor' => $secciones_profesor,
                         'secciones_all' => $secciones_all,
                         'entregas' => $entregas
                         );

                    $this->load->view('profesor_coordinador/comparacion_codigos',$datos); 
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

     public function get_entregas_codigo(){

          $entregas = array();
          $aux = array();

          $result_query = $this->entrega_model->get_entregas_codigo();

          foreach($result_query as $entrega){
               $aux['id'] = $entrega->ID_ENTREGA;
               $aux['numero'] = $entrega->NUMERO;
               $aux['nombre'] = $entrega->DESCRIPCION;

               array_push($entregas,$aux);
          }

          return $entregas;

     }

     public function get_grupos($id_seccion){

          $grupos = array();
          $aux = array();

          $fecha = new Date();
          $fecha_hoy = $fecha->get_fecha();

          $año = strval($fecha_hoy['year']);
          if( $fecha_hoy['mon']<=7 ){
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

     public function get_codigosfuente($id_entrega,$id_grupo){

          $codigos_fuente = array();
          $aux = array();

          $result_query = $this->codigofuente_model->get_files( intval($id_entrega),intval($id_grupo) );

          foreach($result_query as $codigofuente){
               $aux['nombre'] = $codigofuente->NOMBRE_ARCHIVO;
               $aux['ruta'] = $codigofuente->RUTA;

               array_push($codigos_fuente,$aux);
          }

          return $codigos_fuente;

     }

     public function comparar_codigos_seccion($id_seccion,$id_entrega){

          $grupos = $this->get_grupos( intval($id_seccion) );

          $codigos_fuente = array();
          $aux = array();

          foreach($grupos as $grupo){

               $codigos_grupo = $this->get_codigosfuente( intval($id_entrega),intval($grupo['id']) );

               foreach($codigos_grupo as $codigo_grupo){
                    $aux['ruta'] = $codigo_grupo['ruta'];

                    array_push($codigos_fuente,$aux);
               }

               $aux = array();

          }

          $userid = "812361564"; // Enter your MOSS userid
          $moss = new MOSS($userid);
          $moss->setLanguage('python');

          foreach($codigos_fuente as $codigofuente){
               $moss->addFile($codigofuente['ruta']);
          }

          $resultado = $moss->send();

          $response = array(
               'link_resultado' => $resultado
               );

          echo json_encode($response);

     }

     public function comparar_codigos_secciones($id_seccion1,$id_seccion2,$id_entrega){

          $grupos_seccion1 = $this->get_grupos( intval($id_seccion1) );
          $grupos_seccion2 = $this->get_grupos( intval($id_seccion2) );

          $codigos_fuente = array();
          $aux = array();

          foreach($grupos_seccion1 as $grupo_seccion1){
               $codigos_grupo_seccion1 = $this->get_codigosfuente( intval($id_entrega),intval($grupo_seccion1['id']) );

               foreach($codigos_grupo_seccion1 as $codigo_grupo_seccion1){
                    $aux['ruta'] = $codigo_grupo_seccion1['ruta'];

                    array_push($codigos_fuente,$aux);
               }

               $aux = array();
          }

          foreach($grupos_seccion2 as $grupo_seccion2){
               $codigos_grupo_seccion2 = $this->get_codigosfuente( intval($id_entrega),intval($grupo_seccion2['id']) );

               foreach($codigos_grupo_seccion2 as $codigo_grupo_seccion2){
                    $aux['ruta'] = $codigo_grupo_seccion2['ruta'];

                    array_push($codigos_fuente,$aux);
               }

               $aux = array();
          }

          $userid = "812361564"; // Enter your MOSS userid
          $moss = new MOSS($userid);
          $moss->setLanguage('python');

          foreach($codigos_fuente as $codigofuente){
               $moss->addFile($codigofuente['ruta']);
          }

          $resultado = $moss->send();

          $response = array(
               'link_resultado' => $resultado
               );

          echo json_encode($response);

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

}