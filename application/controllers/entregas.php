<?php 

require "./application/utils/date.php";
require "./application/utils/github.php";
 
class entregas extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->database();
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->model('entrega_model');
          $this->load->model('alumno_model');
          $this->load->model('grupo_model');
          $this->load->model('codigofuente_model');
          $this->load->model('archivo_model');
     }

     public function index()
     {

          if($this->session->userdata('loginuser')&&($this->session->userdata('rol')=='Alumno')){
               $user_mail = $this->session->userdata('mail');
               $user_data = $this->get_user_data($user_mail);

               if($user_data['grupo']){
                    $entregas = $this->get_entregas();

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'github_acc' => $user_data['github_acc'],
                         'github_pass' => $user_data['github_pass'],
                         'repositorio' => $user_data['repositorio'],
                         'owner_repo' => $user_data['owner_repo'],
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'grupo' => $user_data['grupo'],
                         'entregas' => $entregas,
                         'id_grupo' => $user_data['id_grupo']
                         );
               }
               else{
                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'github_acc' => $user_data['github_acc'],
                         'github_pass' => $user_data['github_pass'],
                         'logeado' => $this->session->userdata('loginuser'),
                         'rol' => $this->session->userdata('rol'),
                         'grupo' => $user_data['grupo']
                         );
               }

               $this->load->view('entregas',$datos);

          }
     }

     public function check_entrega_codigo($n_entrega){
          $user_mail = $this->session->userdata('mail');
          $user_data = $this->get_user_data($user_mail); 

          $id_grupo = $user_data['id_grupo'];

          $entregas = $this->entrega_model->check_entrega_codigo(intval($id_grupo),intval($n_entrega));

          if(count($entregas)){
               return true;
          }
          else{
               return false;
          }        
     }

     public function check_entrega_archivo($n_entrega){
          $user_mail = $this->session->userdata('mail');
          $user_data = $this->get_user_data($user_mail); 

          $id_grupo = $user_data['id_grupo'];

          $entrega_archivo = $this->entrega_model->check_entrega_archivo(intval($id_grupo),intval($n_entrega));

          if(count($entrega_archivo)){
               return true;
          }
          else {
               return false;
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

               $date = Array(
                    'año' => $año,
                    'mes' => $mes,
                    'dia' => $dia
                    );

               $time = Array(
                    'horas' => $horas,
                    'minutos' => $minutos,
                    'segundos' => $segundos
                    );

               $fecha_entrega = intval($año.$mes.$dia);
               $hora_entrega = intval($horas.$minutos);

               $activa = $this->verifica_activa($fecha_entrega,$hora_entrega);
               $restante = $this->tiempo_restante_entrega($fecha,$hora);
               $codigo_entregado = $this->check_entrega_codigo($entrega->NUMERO);
               $archivo_entregado = $this->check_entrega_archivo($entrega->NUMERO);

               $data['id'] = $entrega->ID_ENTREGA;
               $data['numero'] = $entrega->NUMERO;
               $data['descripcion'] = $entrega->DESCRIPCION;
               $data['fecha'] = $date;
               $data['hora'] = $time;
               $data['porcentaje'] = $entrega->PORCENTAJE;
               $data['codigofuente'] = $entrega->CODIGO_FUENTE;
               $data['codigo_entregado'] = $codigo_entregado;
               $data['archivo_entregado'] = $archivo_entregado;
               $data['activa'] = $activa;
               $data['restante'] = $restante;

               array_push($entregas,$data);
          }

          return $entregas;
     }

     public function tiempo_restante_entrega($fecha_entrega,$hora_entrega){

          $fecha = new Date();
          $hoy = $fecha->get_fecha();
          $dia = $hoy['mday'];
          $mes = $hoy['mon'];
          $año = $hoy['year'];
          $horas = $hoy['hours'];
          $minutos = $hoy['minutes'];
          $segundos = $hoy['seconds'];

          if($mes<=9){
               $mes = "0".strval($mes);
          }
          if($dia<=9){
               $dia = "0".strval($dia);
          }
          $año = strval($año);

          if($minutos<=9){
               $minutos = "0".strval($minutos);
          }

          if($horas<=9){
               $horas = "0".strval($horas);
          }

          if($segundos<=9){
               $segundos = "0".strval($segundos);
          }

          $fecha_hoy = $año.'-'.$mes.'-'.$dia;
          $hora_hoy = $horas.':'.$minutos.':'.$segundos;

          $date_hoy = date_create($fecha_hoy.' '.$hora_hoy);
          $date_entrega = date_create($fecha_entrega.' '.$hora_entrega);

          $diferencia = date_diff($date_entrega,$date_hoy);

          return $diferencia->format("%a día(s), %h hora(s), %i minuto(s) y %s segundo(s).");

     }

     public function verifica_activa($fecha_entrega,$hora_entrega){

          $fecha = new Date();
          $hoy = $fecha->get_fecha();
          $dia = $hoy['mday'];
          $mes = $hoy['mon'];
          $año = $hoy['year'];
          $horas = $hoy['hours'];
          $minutos = $hoy['minutes'];

          if($mes<=9){
               $mes = "0".strval($mes);
          }
          if($dia<=9){
               $dia = "0".strval($dia);
          }
          $año = strval($año);

          if($minutos<=9){
               $minutos = "0".strval($minutos);
          }
          $horas = strval($horas);

          $fecha_hoy = intval($año.$mes.$dia);
          $hora_hoy = intval($horas.$minutos);

          if($fecha_hoy>$fecha_entrega || ($fecha_entrega==$fecha_hoy && $hora_hoy>$hora_entrega)){
               return false;
          }
          else{
               return true;
          } 

     }

     public function entregar_codigo(){

          $n_entrega = $this->input->post('numero_entrega');
          $id_entrega = intval($this->input->post('id_entrega'));

          $mail = $this->session->userdata('mail');
          $user_data = $this->get_user_data($mail);

          $archivos = $this->get_repo_files($user_data);

          $archivo_contenido = $this->get_file_content($archivos,$user_data);

          $seccion_grupo = $this->get_seccion_grupo($user_data['id_grupo']);

          if($this->save_file($archivo_contenido,$user_data['año'],$user_data['semestre'],$user_data['numero_grupo'],$n_entrega,$seccion_grupo,$id_entrega,$user_data['id_grupo'])){
               //$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Entrega realizada.</div>');
               echo json_encode("Ok");
          }
          else{
               //$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo realizar entrega.</div>');
          }

          //redirect(entregas);

     }

     public function save_file($archivos,$año,$semestre,$grupo,$n_entrega,$seccion,$id_entrega,$id_grupo){


          if(is_dir('./application/uploads/entregas/'.$año)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/');
          }

          if(is_dir('./application/uploads/entregas/'.$año.'/'.$semestre)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/'.$semestre.'/');
          }

          if(is_dir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/');
          }

          if(is_dir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/');
          }

          if(is_dir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega.'/');
          }

          $dir = './application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega.'/';

          foreach($archivos as $archivo){
               list($nombre,$extension) = explode('.',$archivo['nombre']);
               $nombre_archivo = $nombre.'_grupo'.$grupo.'_seccion'.$seccion.'.'.$extension;
               $ruta = $dir.$nombre_archivo;
               $contenido = $archivo['contenido'];

               if(file_put_contents($ruta,$contenido)){
                    $this->codigofuente_model->new_file($archivo['nombre'],$ruta,$id_grupo,$id_entrega);
               }
               else{
                    return false;
               }
          }

          return true;

     }

     public function upload_other_file(){
          $n_entrega = $this->input->post('numero_entrega');
          $id_entrega = intval($this->input->post('id_entrega'));

          $mail = $this->session->userdata('mail');
          $user_data = $this->get_user_data($mail);

          $archivo = 'userfile'.$n_entrega;

          $seccion_grupo = $this->get_seccion_grupo($user_data['id_grupo']);

          if ( ! $this->do_upload($user_data['año'],$user_data['semestre'],$user_data['numero_grupo'],$n_entrega,$seccion_grupo,$id_entrega,$user_data['id_grupo'],$archivo)){
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo subir archivo</div>');
          }
          else{
               $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Archivo subido con éxito</div>');
          }

          redirect(entregas);
     }

     public function do_upload($año,$semestre,$grupo,$n_entrega,$seccion,$id_entrega,$id_grupo,$archivo){

          if(is_dir('./application/uploads/entregas/'.$año)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/');
          }

          if(is_dir('./application/uploads/entregas/'.$año.'/'.$semestre)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/'.$semestre.'/');
          }

          if(is_dir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/');
          }

          if(is_dir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/');
          }

          if(is_dir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega)==FALSE){
               mkdir('./application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega.'/');
          }

          $dir = './application/uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega.'/';

          $config['upload_path']          = $dir;
          $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg|mp4|3gp|flv';

          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload($archivo)){
               return false;
          }

          $upload_data = $this->upload->data();

          $nombre_archivo = $upload_data['file_name'];

          $ruta_bd = $dir.$nombre_archivo;

          $this->archivo_model->new_file($ruta_bd,$id_grupo,$id_entrega);

          return true;

     }

     public function get_seccion_grupo($id_grupo){
          $resultado = $this->grupo_model->get_seccion($id_grupo);

          $seccion = $resultado->CODIGO;

          return $seccion;
     }

     public function get_file_content($archivos,$user_data){

          $archivo_contenido = Array();
          $aux = Array();

          $github = new Github($user_data['github_acc'],$user_data['github_pass']);

          foreach($archivos as $archivo){

               $file_content = $github->request('https://api.github.com/repos/'.$user_data['owner_repo'].'/'.$user_data['repositorio'].'/contents/'.$archivo);
               $aux['nombre'] = $archivo;
               $aux['contenido'] = trim(base64_decode($file_content['content']));
               array_push($archivo_contenido,$aux);

          }

          return $archivo_contenido;

     }

     public function get_repo_files($user_data){

          $github = new Github($user_data['github_acc'],$user_data['github_pass']);

          $repo_content = $github->request('https://api.github.com/repos/'.$user_data['owner_repo'].'/'.$user_data['repositorio'].'/contents');

          $archivos = Array();

          foreach ($repo_content as $resultado){
               if(is_string($resultado)==FALSE){
                    if($resultado['type']=='file'){
                         array_push($archivos,$resultado['name']);
                    }
               }
          }

          return $archivos;

     }

     public function get_user_data($mail){
          $datos_user = $this->alumno_model->get_github($mail);
          $grupo = $this->alumno_model->get_grupo($mail);

          if(sizeof($grupo)>0){
               $repo_info = $this->grupo_model->get_repo_info($grupo->ID_GRUPO);
               $data = Array(
                    'github_acc' => $datos_user->GITHUB_ACC,
                    'github_pass' => $datos_user->GITHUB_PASS,
                    'repositorio' => $repo_info->REPOSITORIO,
                    'owner_repo' => $repo_info->REPO_OWNER,
                    'grupo' => 1,
                    'id_grupo' => $grupo->ID_GRUPO,
                    'semestre' => $grupo->SEMESTRE,
                    'año' => $grupo->ANNO,
                    'numero_grupo' => $grupo->NUMERO
                    );

          }
          else{
               $data = Array(
                    'github_acc' => $datos_user->GITHUB_ACC,
                    'github_pass' => $datos_user->GITHUB_PASS,
                    'grupo' => 0
                    );
          }


          return $data;
     }

}