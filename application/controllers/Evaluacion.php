<?php


class Evaluacion extends CI_Controller {

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
          $this->load->model('grupo_model');
          $this->load->model('categoria_model');
          $this->load->model('item_model');
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

     public function rubricas($id_entrega,$n_entrega,$id_grupo,$n_grupo){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               $rubricas = $this->get_evaluacion_rubricas( $this->get_rubricas($id_entrega), $id_grupo ); 

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'rubricas' => $rubricas,
                    'numero_entrega' => $n_entrega,
                    'numero_grupo' => $n_grupo,
                    'id_grupo' => $id_grupo,
                    'id_entrega' => $id_entrega
                    );

               $this->load->view("profesor/rubricas_entrega",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $rubricas = $this->get_evaluacion_rubricas( $this->get_rubricas($id_entrega), $id_grupo ); 

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'rubricas' => $rubricas,
                         'numero_entrega' => $n_entrega,
                         'numero_grupo' => $n_grupo,
                         'id_grupo' => $id_grupo,
                         'id_entrega' => $id_entrega
                         );

                    $this->load->view("profesor_coordinador/rubricas_entrega",$datos);
               }
               else{
                    if($this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){
                         
                         $rubricas = $this->get_evaluacion_rubricas( $this->get_rubricas($id_entrega), $id_grupo ); 

                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Coordinador',
                              'rubricas' => $rubricas,
                              'numero_entrega' => $n_entrega,
                              'numero_grupo' => $n_grupo,
                              'id_grupo' => $id_grupo,
                              'id_entrega' => $id_entrega
                              );

                         $this->load->view("coordinador/rubricas_entrega",$datos);
                    }
               }
          }

     }

     public function get_rubricas($id_entrega){

          $rubricas = array();
          $aux = array();

          $result_query = $this->rubrica_model->get_rubricas_by_entrega(intval($id_entrega));

          foreach($result_query as $rubrica){
               $aux['id'] = $rubrica->ID_RUBRICA;
               $aux['nombre'] = $rubrica->NOMBRE;
               $aux['id_entrega'] = $rubrica->ID_ENTREGA;

               array_push($rubricas,$aux);
               $aux = array();

          }

          return $rubricas;

     }

     public function get_evaluacion_rubricas($rubricas,$id_grupo){

          $rubricas_final = array();
          $aux = array();

          foreach($rubricas as $rubrica){
               $result_query = $this->rubrica_model->get_evaluacion_rubricas( intval($rubrica['id']), intval($id_grupo) );

               $nota = 0;

               if(!empty($result_query)){
                    $nota = ($result_query->NOTA)/10;
               }

               $aux['id'] = $rubrica['id'];
               $aux['nombre'] = $rubrica['nombre'];
               $aux['id_entrega'] = $rubrica['id_entrega'];
               $aux['nota'] = $nota;

               array_push($rubricas_final, $aux);
               $aux = array();
          }

          return $rubricas_final;

     }


     public function categorias($id_rubrica,$n_entrega,$id_grupo,$n_grupo,$id_entrega){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               $categorias = $this->get_evaluacion_categorias( $this->get_categorias($id_rubrica), $id_grupo );

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'categorias' => $categorias,
                    'numero_entrega' => $n_entrega,
                    'numero_grupo' => $n_grupo,
                    'id_grupo' => $id_grupo,
                    'id_rubrica' => $id_rubrica,
                    'id_entrega' => $id_entrega
                    );

               $this->load->view("profesor/categorias_rubrica_entrega",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $categorias = $this->get_evaluacion_categorias( $this->get_categorias($id_rubrica), $id_grupo );

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'categorias' => $categorias,
                         'numero_entrega' => $n_entrega,
                         'numero_grupo' => $n_grupo,
                         'id_grupo' => $id_grupo,
                         'id_rubrica' => $id_rubrica,
                         'id_entrega' => $id_entrega
                         );

                    $this->load->view("profesor_coordinador/categorias_rubrica_entrega",$datos);
               }
               else{
                    if($this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){
                         $categorias = $this->get_evaluacion_categorias( $this->get_categorias($id_rubrica), $id_grupo );

                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Coordinador',
                              'categorias' => $categorias,
                              'numero_entrega' => $n_entrega,
                              'numero_grupo' => $n_grupo,
                              'id_grupo' => $id_grupo,
                              'id_rubrica' => $id_rubrica,
                              'id_entrega' => $id_entrega
                              );

                         $this->load->view("coordinador/categorias_rubrica_entrega",$datos);
                    }
               }
          } 

     }

     public function get_categorias($id_rubrica){

          $categorias = array();
          $aux = array();

          $result_query = $this->categoria_model->get_categorias(intval($id_rubrica));

          foreach($result_query as $categoria){
               $aux['id'] = $categoria->ID_CATEGORIA;
               $aux['nombre'] = $categoria->NOMBRE;
               $aux['porcentaje'] = $categoria->PORCENTAJE;
               $aux['id_rubrica'] = $categoria->ID_RUBRICA;

               array_push($categorias,$aux);
               $aux = array();
          }

          return $categorias;

     }

     public function get_evaluacion_categorias($categorias,$id_grupo){

          $categorias_final = array();
          $aux = array();

          foreach($categorias as $categoria){
               $result_query = $this->categoria_model->get_evaluacion_categoria(intval($id_grupo), intval($categoria['id']));
               $puntaje = 0;
               $nota = 0;

               if(!empty($result_query)){
                    $puntaje = $result_query->PUNTAJE;
                    $nota = ($result_query->NOTA)/10;
               }

               $aux['id'] = $categoria['id'];
               $aux['nombre'] = $categoria['nombre'];
               $aux['porcentaje'] = $categoria['porcentaje'];
               $aux['id_rubrica'] = $categoria['id_rubrica'];
               $aux['puntaje'] = $puntaje;
               $aux['nota'] = $nota;

               array_push($categorias_final,$aux);
               $aux = array();
               $puntaje = 0;
               $nota = 0;
          }

          return $categorias_final;

     }

     /*public function criterios($id_categoria,$n_categoria,$n_entrega,$id_grupo,$n_grupo,$id_rubrica){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               $criterios = $this->get_criterios($id_categoria);

               $categoria = str_replace('_', ' ', urldecode($n_categoria));

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'numero_entrega' => $n_entrega,
                    'numero_grupo' => $n_grupo,
                    'nombre_categoria' => $categoria,
                    'id_grupo' => $id_grupo,
                    'criterios' => $criterios,
                    'id_rubrica' => $id_rubrica
                    );

               $this->load->view("profesor/criterios_rubrica_entrega",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                    $criterios = $this->get_criterios($id_categoria);

                    $categoria = str_replace('_', ' ', urldecode($n_categoria));

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'numero_entrega' => $n_entrega,
                         'numero_grupo' => $n_grupo,
                         'nombre_categoria' => $categoria,
                         'id_grupo' => $id_grupo,
                         'criterios' => $criterios,
                         'id_rubrica' => $id_rubrica
                         );

                    $this->load->view("profesor_coordinador/criterios_rubrica_entrega",$datos);
               }
          } 

     }

     public function get_criterios($id_categoria){

          $criterios = array();
          $aux = array();

          $result_query = $this->criterio_model->get_criterios(intval($id_categoria));

          foreach($result_query as $criterio){
               $aux['id'] = $criterio->ID_CRITERIO;
               $aux['nombre'] = $criterio->NOMBRE;
               $aux['id_categoria'] = $criterio->ID_CATEGORIA;

               array_push($criterios, $aux);
               $aux = array();
          }

          return $criterios;

     } */

     /*public function items($id_criterio,$n_criterio,$n_categoria,$n_entrega,$id_grupo,$n_grupo,$id_rubrica){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               

               $categoria = str_replace('_', ' ', urldecode($n_categoria));
               $criterio = str_replace('_', ' ', urldecode($n_criterio));

               $items = $this->get_evaluacion_items( $this->get_items($id_criterio), $id_grupo );
                    
               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'numero_entrega' => $n_entrega,
                    'numero_grupo' => $n_grupo,
                    'nombre_categoria' => $categoria,
                    'id_grupo' => $id_grupo,
                    'nombre_criterio' => $criterio,
                    'items' => $items,
                    'id_criterio' => $id_criterio,
                    'id_rubrica' => $id_rubrica
                    );

               $this->load->view("profesor/items_rubrica_entrega",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                   $categoria = str_replace('_', ' ', urldecode($n_categoria));
                   $criterio = str_replace('_', ' ', urldecode($n_criterio));

                   $items = $this->get_evaluacion_items( $this->get_items($id_criterio), $id_grupo );

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'numero_entrega' => $n_entrega,
                         'numero_grupo' => $n_grupo,
                         'nombre_categoria' => $categoria,
                         'id_grupo' => $id_grupo,
                         'nombre_criterio' => $criterio,
                         'items' => $items,
                         'id_criterio' => $id_criterio,
                         'id_rubrica'
                         );

                    $this->load->view("profesor_coordinador/items_rubrica_entrega",$datos);
               }
          } 

     }

     public function get_items($id_criterio){

          $items = array();
          $aux = array();

          $result_query = $this->item_model->get_items_by_criterio(intval($id_criterio));

          foreach($result_query as $item){
               $aux['id'] = $item->ID_ITEM;
               $aux['item'] = $item->ITEM;
               $aux['id_criterio'] = $item->ID_CRITERIO;

               array_push($items, $aux);
               $aux = array();
          }

          return $items;

     }

     public function get_evaluacion_items($items,$id_grupo){

          $items_final = array();
          $aux = array();

          foreach($items as $item){
               $result_query = $this->item_model->get_evaluacion_item(intval($item['id']), intval($id_grupo));

               $valor_item = 0;

               if(!empty($result_query)){
                    $valor_item = $result_query->VALOR_ITEM;
               }

               $aux['id'] = $item['id'];
               $aux['item'] = $item['item'];
               $aux['id_criterio'] = $item['id_criterio'];
               $aux['valor_item'] = $valor_item;

               array_push($items_final, $aux);
               $aux = array();
          }

          return $items_final;

     }

     public function evaluar_item(){

          $counter = 0;

          foreach($this->input->post() as $key => $val){
               $counter++;
          }

          $counter = $counter - 6;

          $counter = $counter / 2;

          $id_criterio = intval( $this->input->post('id_criterio') );
          $nombre_criterio = $this->input->post('nombre_criterio');
          $numero_entrega = $this->input->post('numero_entrega');
          $nombre_categoria = $this->input->post('nombre_categoria');
          $id_grupo = intval($this->input->post('id_grupo'));
          $numero_grupo = $this->input->post('numero_grupo');
          $id_rubrica = intval($this->input->post('id_rubrica'));

          $items_eval = array();
          $aux = array();

          for($i = 1; $i<=$counter; $i++){
               $aux['id_item'] = intval($this->input->post('id_item_'.$i));
               $aux['valor'] = intval($this->input->post('valor_item_'.$i));

               array_push($items_eval, $aux);
               $aux = array();
          }

          foreach($items_eval as $item_eval){
               $this->item_model->evaluar_item($item_eval['id_item'],$id_grupo,$item_eval['valor']);
          }

          //AGREGAR LLAMADAS A FUNCIONES PARA EVALUAR CATEGORIAS Y RUBRICA

          redirect('evaluacion/items/'.$id_criterio.'/'.str_replace(' ', '_', $nombre_criterio).'/'.str_replace(' ', '_', $nombre_categoria).'/'.$numero_entrega.'/'.$id_grupo.'/'.$numero_grupo.'/'.$id_rubrica);

     } */

     public function items($id_categoria,$n_categoria,$n_entrega,$id_grupo,$n_grupo,$id_rubrica,$id_entrega){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

               

               $categoria = str_replace('_', ' ', urldecode($n_categoria));

               $items = $this->get_evaluacion_items( $this->get_items($id_categoria), $id_grupo );
                    
               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'numero_entrega' => $n_entrega,
                    'numero_grupo' => $n_grupo,
                    'nombre_categoria' => $categoria,
                    'id_grupo' => $id_grupo,
                    'items' => $items,
                    'id_categoria' => $id_categoria,
                    'id_rubrica' => $id_rubrica,
                    'id_entrega' => $id_entrega
                    );

               $this->load->view("profesor/items_rubrica_entrega",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){

                   $categoria = str_replace('_', ' ', urldecode($n_categoria));

                   $items = $this->get_evaluacion_items( $this->get_items($id_categoria), $id_grupo );

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador',
                         'numero_entrega' => $n_entrega,
                         'numero_grupo' => $n_grupo,
                         'nombre_categoria' => $categoria,
                         'id_grupo' => $id_grupo,
                         'items' => $items,
                         'id_categoria' => $id_categoria,
                         'id_rubrica' => $id_rubrica,
                         'id_entrega' => $id_entrega
                         );

                    $this->load->view("profesor_coordinador/items_rubrica_entrega",$datos);
               }

               else{
                    if($this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){
                        $categoria = str_replace('_', ' ', urldecode($n_categoria));

                        $items = $this->get_evaluacion_items( $this->get_items($id_categoria), $id_grupo );

                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Coordinador',
                              'numero_entrega' => $n_entrega,
                              'numero_grupo' => $n_grupo,
                              'nombre_categoria' => $categoria,
                              'id_grupo' => $id_grupo,
                              'items' => $items,
                              'id_categoria' => $id_categoria,
                              'id_rubrica' => $id_rubrica,
                              'id_entrega' => $id_entrega
                              );

                         $this->load->view("coordinador/items_rubrica_entrega",$datos);
                    }
               }
          } 

     }

     public function get_items($id_categoria){

          $items = array();
          $aux = array();

          $result_query = $this->item_model->get_items_by_categoria(intval($id_categoria));

          foreach($result_query as $item){
               $aux['id'] = $item->ID_ITEM;
               $aux['item'] = $item->ITEM;
               $aux['id_categoria'] = $item->ID_CATEGORIA;

               array_push($items, $aux);
               $aux = array();
          }

          return $items;

     }

     public function get_evaluacion_items($items,$id_grupo){

          $items_final = array();
          $aux = array();

          foreach($items as $item){
               $result_query = $this->item_model->get_evaluacion_item(intval($item['id']), intval($id_grupo));

               $valor_item = 0;

               if(!empty($result_query)){
                    $valor_item = $result_query->VALOR_ITEM;
               }

               $aux['id'] = $item['id'];
               $aux['item'] = $item['item'];
               $aux['id_categoria'] = $item['id_categoria'];
               $aux['valor_item'] = $valor_item;

               array_push($items_final, $aux);
               $aux = array();
          }

          return $items_final;

     }

     public function evaluar_item(){

          $counter = 0;

          foreach($this->input->post() as $key => $val){
               $counter++;
          }

          $counter = $counter - 7;

          $counter = $counter / 2;

          $id_categoria = intval( $this->input->post('id_categoria') );
          $numero_entrega = $this->input->post('numero_entrega');
          $nombre_categoria = $this->input->post('nombre_categoria');
          $id_grupo = intval($this->input->post('id_grupo'));
          $numero_grupo = $this->input->post('numero_grupo');
          $id_rubrica = intval($this->input->post('id_rubrica'));
          $id_entrega = intval($this->input->post('id_entrega'));

          $items_eval = array();
          $aux = array();

          for($i = 1; $i<=$counter; $i++){
               $aux['id_item'] = intval($this->input->post('id_item_'.$i));
               $aux['valor'] = intval($this->input->post('valor_item_'.$i));

               array_push($items_eval, $aux);
               $aux = array();
          }

          foreach($items_eval as $item_eval){
               $this->item_model->evaluar_item($item_eval['id_item'],$id_grupo,$item_eval['valor']);
          }

          //AGREGAR LLAMADAS A FUNCIONES PARA EVALUAR CATEGORIAS Y RUBRICA
          $categorias = $this->get_categorias($id_rubrica);
          $items = $this->get_items_evaluados_categorias($id_rubrica,$id_grupo);

          $this->evaluar_categorias($categorias,$items,$id_grupo);

          $categorias_evaluadas = $this->get_evaluacion_categorias($categorias,$id_grupo);

          $this->evaluar_rubrica($id_rubrica,$categorias_evaluadas,$id_grupo);

          redirect('evaluacion/items/'.$id_categoria.'/'.str_replace(' ', '_', $nombre_categoria).'/'.$numero_entrega.'/'.$id_grupo.'/'.$numero_grupo.'/'.$id_rubrica.'/'.$id_entrega);

     }


     public function get_items_evaluados_categorias($id_rubrica,$id_grupo){

          $categorias = $this->get_categorias(intval($id_rubrica));

          $items_final = array();

          foreach($categorias as $categoria){
               $items = $this->get_items(intval($categoria['id']));

               foreach($items as $item){
                    array_push($items_final, $item);
               }
          }

          $items_evaluados = $this->get_evaluacion_items($items_final,intval($id_grupo));

          return $items_evaluados;

     }

     public function evaluar_categorias($categorias,$items,$id_grupo){

          $contador_items = 0;
          $puntaje_categoria = 0;

          $items_categoria = array();
          $aux = array();

          foreach($categorias as $categoria){
               foreach($items as $item){
                    if($categoria['id'] == $item['id_categoria']){
                         $puntaje_categoria = $puntaje_categoria + $item['valor_item'];
                         $contador_items++;
                    }
               }

               $nota_categoria = $this->calcular_nota_categoria($puntaje_categoria,$contador_items);
               if($contador_items){
                    $this->categoria_model->evaluar_categoria($categoria['id'],$id_grupo,$puntaje_categoria,$nota_categoria);
               }
               $contador_items = 0;
               $puntaje_categoria = 0;
          }

     }

     public function calcular_nota_categoria($puntaje,$numero_items){

          $constante1 = 1.799999999999988;
          $constante2 = 1.2;

          $calificacion;

          if($numero_items==0){
               $calificacion = 0;
          }
          else{
               if( $puntaje < ($constante1*$numero_items) ){
                    $calificacion = round(3.0*(floatval($puntaje)/($constante1*floatval($numero_items))) + 1.0,1);
               }
               else{
                    $calificacion = round(3.0*((floatval($puntaje)-$constante1*floatval($numero_items))/($constante2*floatval($numero_items))) + 4.0,1);
               }
          }

          return $calificacion*10;

     }

     public function evaluar_rubrica($id_rubrica,$categorias_evaluadas,$id_grupo){

          if(count($categorias_evaluadas)){

               $nota_rubrica = $this->calcular_nota_rubrica($categorias_evaluadas);

               $this->rubrica_model->evaluar_rubrica( intval($id_rubrica), intval($id_grupo), $nota_rubrica );

          }

     }

     public function calcular_nota_rubrica($categorias){

          $nota_rubrica = 0;

          foreach($categorias as $categoria){
               $nota_rubrica = $nota_rubrica + $categoria['nota']*($categoria['porcentaje']/100);
          }

          $calificacion = round($nota_rubrica,1);

          return $calificacion*10;

     }

}