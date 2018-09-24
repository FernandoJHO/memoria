<?php

require "./application/third_party/date.php";
require "./application/third_party/sort.php";
require "./application/third_party/saveFile.php";

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

     ///////////////////////////////////////////////////            PROFESOR               /////////////////////////////////////////////////////////////////////

     public function all($id_seccion,$codigo_seccion){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){

               $grupos = $this->get_integrantes( $this->get_grupos(intval($id_seccion)) );

               $alumnos = $this->get_alumnos_seccion( intval($id_seccion) );

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'grupos' => $grupos,
                    'seccion' => $id_seccion,
                    'codigo_seccion' => urldecode($codigo_seccion),
                    'alumnos' => $alumnos
                    );
               $this->load->view('profesor/grupos_all',$datos);
          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){
                    $grupos = $this->get_integrantes( $this->get_grupos(intval($id_seccion)) );

                    $alumnos = $this->get_alumnos_seccion( intval($id_seccion) );

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Coordinador',
                         'grupos' => $grupos,
                         'seccion' => $id_seccion,
                         'codigo_seccion' => urldecode($codigo_seccion),
                         'alumnos' => $alumnos
                         );

                    $this->load->view('coordinador/grupos_all_coordinador',$datos);

               }
               else{
                    if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('profesor_coordinador') ){
                         $grupos = $this->get_integrantes( $this->get_grupos(intval($id_seccion)) );

                         $alumnos = $this->get_alumnos_seccion( intval($id_seccion) );

                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Profesor-Coordinador',
                              'grupos' => $grupos,
                              'seccion' => $id_seccion,
                              'codigo_seccion' => urldecode($codigo_seccion),
                              'alumnos' => $alumnos
                              );

                         $this->load->view('profesor_coordinador/grupos_all_prof_coord',$datos);
                    }
                    else{
                         redirect('login');
                    }
               }
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
          $aux2 = array();

          foreach($grupos as $grupo){
               $result_query = $this->grupo_model->get_integrantes(intval($grupo['id']));

               if(!empty($result_query)){
                    foreach($result_query as $integrante){
                         $mail_alumno = $integrante->MAIL_ALUMNO;
                         $alumno = $this->alumno_model->get_nombre($mail_alumno);
                         $nombre_alumno = $alumno->NOMBRE.' '.$alumno->APELLIDO;
                         $aux2['nombre'] = $nombre_alumno;
                         $aux2['mail'] = $mail_alumno;
                         array_push($integrantes, $aux2);
                    }
               }
               else{
                    $integrantes = array();
               }

               
               $aux['id'] = $grupo['id'];
               $aux['numero'] = $grupo['numero'];
               $aux['nombre'] = $grupo['nombre'];
               $aux['proyecto'] = $grupo['proyecto'];
               $aux['semestre'] = $grupo['semestre'];
               $aux['año'] = $grupo['año'];
               $aux['integrantes'] = $integrantes;

               array_push($grupos_final,$aux);
               $integrantes = array();

          }

          $sort = new Sort();
          if(count($grupos_final)){
               $grupos_final_sort = $sort->subval_sort($grupos_final,'numero');
          }
          else{
               $grupos_final_sort = array();
          }

          return $grupos_final_sort;

     }

     public function get_alumnos_seccion($id_seccion){

          $alumnos = array();
          $aux = array();

          //$result_query = $this->alumno_model->get_alumnos_seccion_singrupo($id_seccion);
          $result_query = $this->alumno_model->get_alumnos_seccion($id_seccion);

          foreach($result_query as $alumno){
               $aux['nombre'] = $alumno->NOMBRE.' '.$alumno->APELLIDO;
               $aux['mail'] = $alumno->MAIL;

               array_push($alumnos,$aux);

               $aux = array();
          }

          return $alumnos;

     }


     public function delete_grupo(){
          $id_grupo = intval( $this->input->post('id_grupo') );

          if( $this->grupo_model->delete_grupo($id_grupo) ){
               echo json_encode("Ok");
          }
          else{

          }
     }

     public function delete_integrante(){

          $mail_integrante = $this->input->post('mail');
          $id_grupo = intval( $this->input->post('id_grupo') );

          if( $this->grupo_model->delete_integrante($mail_integrante, $id_grupo) ){
               echo json_encode("Ok");
          }
          else{

          }

     }

     public function edit_grupo(){

          $counter = 0;

          foreach($this->input->post() as $key => $val){
               $counter++;
          }

          $counter = $counter - 4;

          $id_seccion = intval($this->input->post('id_seccion'));
          $codigo_seccion = $this->input->post('codigo_seccion');
          $id_grupo = intval($this->input->post('id_grupo'));
          $numero_grupo = $this->input->post('numero_grupo');

          $nuevos_integrantes = array();

          for($i = 1; $i<=$counter; $i++){
               $mail_integrante = $this->input->post('integrante_'.$i);
               if($mail_integrante!=NULL || $mail_integrante!=""){
                    array_push($nuevos_integrantes,$mail_integrante);
               }
          }

          $check = 1;
          foreach($nuevos_integrantes as $integrante){
             
               if(!$this->grupo_model->add_integrante($id_grupo,$integrante)){
                    $check = 0;
               }
              
          }   

          if(count($nuevos_integrantes)){
               if(!$check){
                    $this->session->set_flashdata('msg_grupo_edit_integrante', '<div class="alert alert-danger text-center">No se pudo agregar uno o más integrantes al grupo</div>');
               }
               else{
                    $this->session->set_flashdata('msg_grupo_edit_integrante', '<div class="alert alert-success text-center">Integrante(s) añadido(s) correctamente</div>');
               }
          }
          
          if(!$this->grupo_model->set_numero_grupo($id_grupo,$numero_grupo)){
          }
          else{
               $this->session->set_flashdata('msg_grupo_edit_nro', '<div class="alert alert-success text-center">Número del grupo modificado correctamente</div>');
          }
          

   

          redirect('grupos/'.strval($id_seccion).'/'.$codigo_seccion);

     }

     public function new_grupo(){

          $counter = 0;

          foreach($this->input->post() as $key => $val){
               $counter++;
          }

          $counter = $counter - 3;

          $numero_grupo = $this->input->post('numero_grupo');
          $id_seccion = intval($this->input->post('id_seccion'));
          $codigo_seccion = $this->input->post('codigo_seccion');

          $integrantes = array();

          for($i = 1; $i<=$counter; $i++){
               $mail_integrante = $this->input->post('integrante_'.$i);
               if($mail_integrante!=NULL || $mail_integrante!=""){
                    array_push($integrantes,$mail_integrante);
               }
          }

          $mails_incorrectos = array();
          $mails_incorrectos_string;

          foreach($integrantes as $integrante){
               if( !$this->alumno_model->verifica_existe($integrante) ){
                    array_push($mails_incorrectos,$integrante);
               }
          }

          $date = new Date();
          $fecha = $date->get_fecha();
          $año = strval($fecha['year']);
          if( $fecha['mon']<=7 ){
               $semestre = '1';
          }
          else{
               $semestre = '2';
          }

          if( !count($mails_incorrectos) ){
               $add_grupo = $this->grupo_model->new_grupo($numero_grupo,$id_seccion,$año,$semestre);
          }
          else{
               foreach($mails_incorrectos as $mail){
                    $mails_incorrectos_string = $mails_incorrectos_string.$mail.' ';
                    $this->session->set_flashdata('msg_mails', '<div class="alert alert-info text-center">Los siguientes alumnos no existen en la base de datos: '.$mails_incorrectos_string.'</div>');
               }
               $add_grupo = 0;
          }

          if( $add_grupo ){

               $id_grupo = $add_grupo;
               
               foreach($integrantes as $integrante){
                  
                    $this->grupo_model->add_integrante($id_grupo,$integrante);
                   
               }

               $this->session->set_flashdata('msg_grupo', '<div class="alert alert-success text-center">Grupo creado satisfactoriamente</div>');
          }
          else{
               $this->session->set_flashdata('msg_grupo', '<div class="alert alert-danger text-center">No se pudo crear grupo</div>');
          }


          redirect('grupos/'.strval($id_seccion).'/'.$codigo_seccion);
     }

     /* public function get_alumnos_json($id_seccion){

          $alumnos = $this->get_alumnos_seccion( intval($id_seccion) );

          $alumnos_array = array();
          $aux = array();

          foreach($alumnos as $alumno){

               $aux['nombre'] = $alumno['nombre'];
               $aux['mail'] = $alumno['mail'];

               array_push($alumnos_array, $aux);

          }

          echo json_encode($alumnos_array);

     } */


     /*public function dropdown_html_builder($contador,$id_seccion){

          $html = '<div class="form-group"> <label >Integrante</label> <select class="form-control" name="integrante_'.$contador.'"> <option disabled selected>Selecciona un integrante...</option> ';

          $alumnos = $this->get_alumnos_seccion( intval($id_seccion) );

          foreach($alumnos as $alumno){
               $html = $html.'<option value="'.$alumno['mail'].'">'.$alumno['nombre'].' ('.$alumno['mail'].')</option>';
          }

          $html = $html.'</select> </div>';

          $response = array(
               'html' => $html
               );

          echo json_encode($response);

     }*/


     ///////////////////////////////////////////////////            PROFESOR               /////////////////////////////////////////////////////////////////////


     ///////////////////////////////////////////////////            ALUMNO               /////////////////////////////////////////////////////////////////////


     public function miGrupo(){
          $mail = $this->session->userdata('mail');
 
          $grupo = $this->get_grupo($mail);

          $datos = Array(
               'nombre' => $this->session->userdata('nombre'),
               'apellido' =>$this->session->userdata('apellido'),
               'mail' => $this->session->userdata('mail'),
               'logeado' => $this->session->userdata('loginuser'),
               'rol' => $this->session->userdata('rol'),
               'grupo' => $grupo
               );

          $this->load->view('alumno/mi_grupo',$datos);
     }

     public function get_grupo($mail){
          $id_grupo;
          $grupo = array();
          $integrantes = array();

          $date = new Date();
          $fecha = $date->get_fecha();
          $mes = $fecha['mon'];
          $anno_actual = $fecha['year'];

          if($mes<=7){
               $semestre_actual = 1;
          }else{
               $semestre_actual = 2;
          }

          $result_query = $this->grupo_model->get_idgrupo_by_mail($mail);

          if(!empty($result_query)){

               foreach($result_query as $result_grupo){
                    $idgrupo = $result_grupo->ID_GRUPO;
                    $grupo_ = $this->grupo_model->get_grupo_by_id($idgrupo);

                    if(($semestre_actual==$grupo_->SEMESTRE) && ($anno_actual==$grupo_->ANNO)){
                         $grupo['id_grupo'] = $grupo_->ID_GRUPO;
                         $grupo['numero'] = $grupo_->NUMERO;
                         $grupo['nombre'] = $grupo_->NOMBRE;
                         $grupo['ruta_proyecto'] = $grupo_->PROYECTO;

                         $result_query_integrantes = $this->grupo_model->get_integrantes($idgrupo);

                         foreach($result_query_integrantes as $integrante){

                              $mail_alumno = $integrante->MAIL_ALUMNO;
                              $alumno = $this->alumno_model->get_nombre($mail_alumno);
                              $nombre_alumno = $alumno->NOMBRE.' '.$alumno->APELLIDO;
                              array_push($integrantes,$nombre_alumno.' ('.$mail_alumno.')');

                         }

                         $grupo['integrantes'] = $integrantes;

                         break;
                    } else{

                    }
               }

               // $id_grupo = intval($result_query->ID_GRUPO);

               // $result_query_grupo = $this->grupo_model->get_grupo_by_id($id_grupo);
               // $grupo['id_grupo'] = $result_query_grupo->ID_GRUPO;
               // $grupo['numero'] = $result_query_grupo->NUMERO;
               // $grupo['nombre'] = $result_query_grupo->NOMBRE;
               // $grupo['ruta_proyecto'] = $result_query_grupo->PROYECTO;

               // $result_query_integrantes = $this->grupo_model->get_integrantes($id_grupo);

               // foreach($result_query_integrantes as $integrante){

               //      $mail_alumno = $integrante->MAIL_ALUMNO;
               //      $alumno = $this->alumno_model->get_nombre($mail_alumno);
               //      $nombre_alumno = $alumno->NOMBRE.' '.$alumno->APELLIDO;
               //      array_push($integrantes,$nombre_alumno.' ('.$mail_alumno.')');

               // }

               //$grupo['integrantes'] = $integrantes;
          }
          else{
               //ESTUDIANTE NO TIENE GRUPO
          }

          return $grupo;
     }

     public function upload_proyecto(){

          $id_grupo = $this->input->post('id_grupo');
          $archivo = 'userfile';

          $upload = new SaveFile();

          $upload_result = $upload->upload_proyecto($id_grupo,$archivo);

          if( count($upload_result) ){
               $this->grupo_model->set_proyecto($upload_result['id_grupo'],$upload_result['ruta']);
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Archivo del proyecto subido con éxito</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo subir archivo del proyecto</div>');
          }

          redirect('miGrupo');

     }

     ///////////////////////////////////////////////////            ALUMNO               /////////////////////////////////////////////////////////////////////

}