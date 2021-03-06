<?php

require "./application/third_party/date.php";

class Archivos extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->library('zip');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('download');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('codigofuente_model');
          $this->load->model('archivo_model');
     }

     public function index()
     {

     }

     public function ver($id_entrega,$id_grupo,$n_entrega,$n_grupo){
          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){

               $codigosfuente = $this->get_codigos_fuente($id_entrega,$id_grupo);
               $archivos = $this->get_archivos($id_entrega,$id_grupo);
               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'codigosfuente' => $codigosfuente,
                    'archivos' => $archivos,
                    'numero_entrega' => $n_entrega,
                    'numero_grupo' => $n_grupo,
                    'id_entrega' => $id_entrega,
                    'id_grupo' => $id_grupo
                    );

               $this->load->view('profesor/ver_archivos',$datos);
          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){
                    $codigosfuente = $this->get_codigos_fuente($id_entrega,$id_grupo);
                    $archivos = $this->get_archivos($id_entrega,$id_grupo);

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Coordinador',
                         'codigosfuente' => $codigosfuente,
                         'archivos' => $archivos,
                         'numero_entrega' => $n_entrega,
                         'numero_grupo' => $n_grupo,
                         'id_entrega' => $id_entrega,
                         'id_grupo' => $id_grupo
                         );

                    $this->load->view('coordinador/ver_archivos_coordinador',$datos);

               }
               else{
                    if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){
                         $codigosfuente = $this->get_codigos_fuente($id_entrega,$id_grupo);
                         $archivos = $this->get_archivos($id_entrega,$id_grupo);

                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Profesor-Coordinador',
                              'codigosfuente' => $codigosfuente,
                              'archivos' => $archivos,
                              'numero_entrega' => $n_entrega,
                              'numero_grupo' => $n_grupo,
                              'id_entrega' => $id_entrega,
                              'id_grupo' => $id_grupo
                              );

                         $this->load->view('profesor_coordinador/ver_archivos_prof_coord',$datos);         
                    }
                    else{
                         redirect('login');
                    }
               }
          }
     }

     public function get_codigos_fuente($id_entrega,$id_grupo){
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

     public function get_archivos($id_entrega,$id_grupo){
          $archivos = array();
          $aux = array();

          $result_query = $this->archivo_model->get_files( intval($id_entrega),intval($id_grupo) );

          foreach($result_query as $archivo){
               $aux['nombre'] = $archivo->NOMBRE;
               $aux['ruta'] = $archivo->RUTA;

               array_push($archivos,$aux);
          }

          return $archivos;
     }

     public function download(){
          $ruta = $this->input->post('ruta');

          force_download($ruta, NULL);
     }

     public function download_all(){

          $n_entrega = $this->input->post('entrega');
          $n_grupo = $this->input->post('grupo');
          $identrega = intval($this->input->post('identrega'));
          $idgrupo = intval($this->input->post('idgrupo'));
          $codigosfuente = $this->get_codigos_fuente($identrega,$idgrupo);
          $archivos = $this->get_archivos($identrega,$idgrupo);


          if(count($codigosfuente)){
               foreach($codigosfuente as $codigo){

                    $this->zip->read_file($codigo['ruta']);

               }
          }

          if(count($archivos)){
               foreach($archivos as $archivo){
                    $this->zip->read_file($archivo['ruta']);
               }
          }

          if(count($codigosfuente) || count($archivos)){
               $this->zip->download('entrega'.$n_entrega.'_grupo'.$n_grupo.'.zip'); 
          }else{
               redirect('archivos/'.$identrega.'/'.$idgrupo.'/'.$n_entrega.'/'.$n_grupo);
          }

     }

}