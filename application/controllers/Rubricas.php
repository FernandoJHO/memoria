<?php

require "./application/utils/sort.php";

class Rubricas extends CI_Controller {

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
          $this->load->model('rubrica_model');
          $this->load->model('entrega_model');
          $this->load->model('categoria_model');
          $this->load->model('criterio_model');
     }

     public function index()
     {
          
          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               $rubricas = $this->join_rubricas_entregas( $this->get_rubricas() );
               $entregas = $this->get_entregas();

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => 'Coordinador',
                    'rubricas' => $rubricas,
                    'entregas' => $entregas
                    );

               $this->load->view("coordinador/rubricas",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $rubricas = $this->join_rubricas_entregas( $this->get_rubricas() );
                    $entregas = $this->get_entregas();

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'rubricas' => $rubricas,
                         'entregas' => $entregas
                         );

                    $this->load->view("profesor_coordinador/rubricas",$datos);
               }
          }
          
     }

     public function get_rubricas(){

          $rubricas = array();
          $aux = array();

          $result_query = $this->rubrica_model->get_rubricas();

          foreach($result_query as $rubrica){
               $aux['id'] = $rubrica->ID_RUBRICA;
               $aux['nombre'] = $rubrica->NOMBRE;
               $aux['id_entrega'] = $rubrica->ID_ENTREGA;

               array_push($rubricas,$aux);
               $aux = array();
          }

          return $rubricas;

     }

     public function new_rubrica(){

          $nombre = $this->input->post('nombre_rubrica');
          $entrega = intval($this->input->post('id_entrega'));

          $result = $this->rubrica_model->new_rubrica($nombre,$entrega);

          if($result){
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Rúbrica creada</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo crear rúbrica</div>');
          }

          redirect('rubricas');

     }

     public function delete_rubrica($id_rubrica){

          $result = $this->rubrica_model->delete_rubrica(intval($id_rubrica));

          if($result){
               echo json_encode("Ok");
          }
          else{

          }

     }

     public function get_entregas(){

          $entregas = array();
          $aux = array();

          $result_query = $this->entrega_model->get_entregas();

          foreach($result_query as $entrega){
               $aux['id'] = $entrega->ID_ENTREGA;
               $aux['numero'] = $entrega->NUMERO;
               $aux['nombre'] = $entrega->DESCRIPCION;

               array_push($entregas,$aux);
               $aux = array();
          }

          $sort = new Sort();
          $entregas = $sort->subval_sort($entregas,'numero');

          return $entregas;

     }

     public function get_entrega($id_entrega){

          $entrega = array();

          $result_query = $this->entrega_model->get_entrega($id_entrega);

          if(!empty($result_query)){
               $entrega['id'] = $result_query->ID_ENTREGA;
               $entrega['numero'] = $result_query->NUMERO;
               $entrega['nombre'] = $result_query->DESCRIPCION;
          }

          return $entrega;

     }


     public function join_rubricas_entregas($rubricas){

          $rubricas_final = array();
          $aux = array();

          foreach($rubricas as $rubrica){

               $entrega = $this->get_entrega(intval($rubrica['id_entrega']));

               $aux['id'] = $rubrica['id'];
               $aux['nombre'] = $rubrica['nombre'];
               $aux['id_entrega'] = $entrega['id'];
               $aux['numero_entrega'] = $entrega['numero'];
               $aux['nombre_entrega'] = $entrega['nombre'];

               array_push($rubricas_final,$aux);
               $aux = array();

          }

          return $rubricas_final;

     }


     public function verCategorias($id_rubrica,$numero_entrega){


          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               $categorias = $this->get_categorias($id_rubrica);

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => 'Coordinador',
                    'categorias' => $categorias,
                    'id_rubrica' => $id_rubrica,
                    'numero_entrega' => $numero_entrega
                    );

               $this->load->view("coordinador/categorias",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $categorias = $this->get_categorias($id_rubrica);

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'categorias' => $categorias,
                         'id_rubrica' => $id_rubrica,
                         'numero_entrega' => $numero_entrega
                         );

                    $this->load->view("profesor_coordinador/categorias",$datos);
               }
          }

     }

     public function get_categorias($id_rubrica){

          $categorias = array();
          $aux = array();

          $result_query = $this->categoria_model->get_categorias($id_rubrica);

          foreach($result_query as $categoria){
               $aux['id'] = $categoria->ID_CATEGORIA;
               $aux['nombre'] = $categoria->NOMBRE;
               $aux['id_rubrica'] = $categoria->ID_RUBRICA;

               array_push($categorias,$aux);
               $aux = array();
          }

          return $categorias;

     }

     public function new_categoria(){

          $nombre = $this->input->post('nombre_categoria');
          $rubrica = intval($this->input->post('id_rubrica'));
          $numero_entrega = $this->input->post('numero_entrega');

          $result = $this->categoria_model->new_categoria($nombre,$rubrica);

          if($result){
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Categoría creada</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo crear categoría</div>');
          }

          redirect('rubricas/verCategorias/'.$rubrica.'/'.$numero_entrega);

     }

     public function delete_categoria($id_categoria){

          $result = $this->categoria_model->delete_categoria(intval($id_categoria));

          if($result){
               echo json_encode("Ok");
          }
          else{

          }

     }


     public function verCriterios($id_categoria,$numero_entrega,$nombre_categoria){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               $categoria = urldecode($nombre_categoria);

               $criterios = $this->get_criterios($id_categoria);

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => 'Coordinador',
                    'id_categoria' => $id_categoria,
                    'numero_entrega' => $numero_entrega,
                    'nombre_categoria' => $categoria,
                    'criterios' => $criterios
                    );

               $this->load->view("coordinador/criterios",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $categoria = urldecode($nombre_categoria);

                    $criterios = $this->get_criterios($id_categoria);

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'id_categoria' => $id_categoria,
                         'numero_entrega' => $numero_entrega,
                         'nombre_categoria' => $categoria,
                         'criterios' => $criterios
                         );

                    $this->load->view("profesor_coordinador/criterios",$datos);
               }
          }

     }

     public function get_criterios($id_categoria){

          $criterios = array();
          $aux = array();

          $result_query = $this->criterio_model->get_criterios($id_categoria);

          foreach($result_query as $criterio){
               $aux['id'] = $criterio->ID_CRITERIO;
               $aux['nombre'] = $criterio->NOMBRE;
               $aux['id_categoria'] = $criterio->ID_CATEGORIA;

               array_push($criterios,$aux);
               $aux = array();
          }

          return $criterios;

     }

     public function new_criterio(){

          $nombre = $this->input->post('nombre_criterio');
          $id_categoria = intval($this->input->post('id_categoria'));
          $numero_entrega = $this->input->post('numero_entrega');
          $nombre_categoria = $this->input->post('nombre_categoria');

          $result = $this->criterio_model->new_criterio($nombre,$id_categoria);

          if($result){
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Criterio creado</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo crear criterio</div>');
          }

          redirect('rubricas/verCriterios/'.$id_categoria.'/'.$numero_entrega.'/'.$nombre_categoria);

     }

     public function delete_criterio($id_criterio){

          $result = $this->criterio_model->delete_criterio(intval($id_criterio));

          if($result){
               echo json_encode("Ok");
          }
          else{

          }

     }

}