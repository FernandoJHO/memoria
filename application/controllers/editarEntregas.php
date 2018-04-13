<?php

class editarEntregas extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          $this->load->model('entrega_model');
     }

     public function index()
     {

          if($this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador')) {

              $entregas = $this->get_entregas();

              $datos = Array(
               'nombre' => $this->session->userdata('nombre'),
               'apellido' =>$this->session->userdata('apellido'),
               'mail' => $this->session->userdata('mail'),
               'rol' => $this->session->userdata('rol').' (Coordinador)',
               'entregas' => $entregas
               );

              $this->load->view('editar_entregas',$datos);
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

               $time = $horas.':'.$minutos;

               $data['id'] = $entrega->ID_ENTREGA;
               $data['numero'] = $entrega->NUMERO;
               $data['descripcion'] = $entrega->DESCRIPCION;
               $data['fecha'] = $fecha;
               $data['hora'] = $time;
               $data['porcentaje'] = $entrega->PORCENTAJE;
               $data['codigofuente'] = $entrega->CODIGO_FUENTE;

               array_push($entregas,$data);
          }

          return $entregas;
     }

     public function set_entrega(){

          $id = intval($this->input->post('id_entrega'));
          $numero = intval($this->input->post('numero_entrega'));
          $descripcion = $this->input->post('nombre_entrega');
          $fecha = $this->input->post('fecha_entrega');
          $hora = $this->input->post('hora_entrega');
          $codigofuente = intval($this->input->post('codigo_fuente'));

          $hora_format = $hora.':00';

          $fecha_limite = $fecha.' '.$hora_format;

          if( $this->entrega_model->set_entrega($id,$numero,$descripcion,$fecha_limite,$codigofuente) ){
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Entrega modificada</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo modificar entrega</div>');
          }

          redirect(editarEntregas);

     }

     public function new_entrega(){
          $descripcion = $this->input->post('nombre_entrega');
          $numero = intval($this->input->post('numero_entrega'));
          $fecha = $this->input->post('fecha_entrega');
          $hora = $this->input->post('hora_entrega');
          $codigofuente = intval($this->input->post('codigo_fuente'));

          $hora_format = $hora.':00';

          $fecha_limite = $fecha.' '.$hora_format;

          if( $this->entrega_model->new_entrega($numero,$descripcion,$fecha_limite,$codigofuente) ){
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Entrega creada</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo crear entrega</div>');
          }

          redirect(editarEntregas);
     }

}