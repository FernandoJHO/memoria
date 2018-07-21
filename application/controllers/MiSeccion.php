<?php

require "./application/third_party/saveFile.php";
require "./application/third_party/excelphp/Classes/PHPExcel/IOFactory.php";

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
          $this->load->model('alumno_model');
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
               else{
                    redirect('login');
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

     public function add_nomina(){

          $id_seccion = intval($this->input->post('id_seccion'));
          $archivo = 'userfile';

          $this->desinscribir_alumnos($id_seccion);

          $upload = new SaveFile();

          $upload_result = $upload->upload_nomina($id_seccion,$archivo);

          if( count($upload_result) ){

               $ruta_archivo = $upload_result['ruta'];
               $objPHPExcel = PHPExcel_IOFactory::load($ruta_archivo);

               $objPHPExcel->setActiveSheetIndex(0);

               $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

               for ($i = 9; $i <= $numRows; $i++){

                    $nombre_alumno = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                    $apellidos_alumno = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue().' '.$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                    $mail_alumno = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
                    $rut = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();

                    list($primero,$segundo,$tercero) = explode('.',$rut);

                    list($antesguion,$despuesguion) = explode('-',$tercero);

                    $password = $primero.$segundo.$antesguion.$despuesguion;


                    if( !$this->alumno_model->verifica_existe($mail_alumno) ){
                         if( !$this->alumno_model->new_alumno($nombre_alumno,$apellidos_alumno,$mail_alumno,$password,$id_seccion) ){
                              $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudieron crear uno o más alumnos</div>');
                              redirect('miSeccion');

                         }
                    }
                    else{
                         $this->alumno_model->set_password_seccion($mail_alumno,$password,$id_seccion);
                    }

               }

               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Alumnos inscritos correctamente</div>');

          }else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo procesar archivo</div>');
          }

          redirect('miSeccion');

     }

     public function desinscribir_alumnos($id_seccion){

          $this->alumno_model->set_seccion_null($id_seccion);

     }

}