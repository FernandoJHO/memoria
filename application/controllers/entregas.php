<?php 

require "./application/third_party/date.php";
require "./application/third_party/github.php";
require "./application/third_party/sort.php";
require "./application/third_party/saveFile.php";
 
class Entregas extends CI_Controller
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

         /* if($this->session->userdata('loginuser')&&($this->session->userdata('rol')=='Alumno')){
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

               $this->load->view('alumno/entregas',$datos);

          } */
     }

     //////////////////////////////////////////////               ALUMNO                 //////////////////////////////////////////////////////////

     public function all(){
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

               $this->load->view('alumno/entregas',$datos);

          }
          else{
               redirect('login');
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

     public function get_entrega($id_entrega){
          $result = $this->entrega_model->get_entrega($id_entrega);
          $entrega = array();

          list($fecha,$hora) = explode(' ',$result->FECHA_LIMITE);
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

          $entrega['id'] = $result->ID_ENTREGA;
          $entrega['numero'] = $result->NUMERO;
          $entrega['descripcion'] = $result->DESCRIPCION;
          $entrega['fecha'] = $date;
          $entrega['hora'] = $time;
          $entrega['codigofuente'] = $result->CODIGO_FUENTE;
          $entrega['fecha_int'] = $fecha_entrega;
          $entrega['hora_int'] = $hora_entrega;

          return $entrega;
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

          $sort = new Sort();
          $entregas = $sort->subval_sort($entregas,'numero');

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

          $entrega = $this->get_entrega($id_entrega);

          if( $this->verifica_activa($entrega['fecha_int'],$entrega['hora_int']) ){

               $mail = $this->session->userdata('mail');
               $user_data = $this->get_user_data($mail);

               $archivos = $this->get_repo_files($user_data);

               if( count($archivos) ) {

                    $archivo_contenido = $this->get_file_content($archivos,$user_data);

                    $seccion_grupo = $this->get_seccion_grupo($user_data['id_grupo']);

                    $upload = new SaveFile();
                    $upload_result = $upload->upload_source_code($archivo_contenido,$user_data['año'],$user_data['semestre'],$user_data['numero_grupo'],$n_entrega,$seccion_grupo,$id_entrega,$user_data['id_grupo']);

                    $integrantes = $this->grupo_model->get_integrantes($user_data['id_grupo']);


                    if( count($upload_result) == count($archivo_contenido) ){
                         foreach($upload_result as $upload){
                              $this->codigofuente_model->new_file($upload['nombre_archivo'],$upload['ruta'],$upload['id_grupo'],$upload['id_entrega']);
                         }

                         foreach($integrantes as $integrante){
                              $mail_alumno = $integrante->MAIL_ALUMNO;
                              $commits_ = $this->alumno_model->get_commits($mail_alumno);
                              $commits = $commits_->COMMITS;

                              $this->entrega_model->set_entrega_commits($mail_alumno,$id_entrega,$commits,$user_data['id_grupo']);
                         }
                         echo json_encode("Ok");
                    }    
                    else{

                    }
               }
               else {
                    
               }
          }
          else{

          }


     }

        public function upload_file(){
              $n_entrega = $this->input->post('numero_entrega');
              $id_entrega = intval($this->input->post('id_entrega'));

              $entrega = $this->get_entrega($id_entrega);

              if( $this->verifica_activa($entrega['fecha_int'],$entrega['hora_int']) ){

                   $mail = $this->session->userdata('mail');
                   $user_data = $this->get_user_data($mail);

                   $archivo = 'userfile'.$n_entrega;

                   $seccion_grupo = $this->get_seccion_grupo($user_data['id_grupo']);

                   $upload = new SaveFile();

                   $upload_result = $upload->upload_file($user_data['año'],$user_data['semestre'],$user_data['numero_grupo'],$n_entrega,$seccion_grupo,$id_entrega,$user_data['id_grupo'],$archivo);

                   if( count($upload_result) ){
                      $this->archivo_model->new_file($upload_result['ruta'],$upload_result['id_grupo'],$upload_result['id_entrega'],$upload_result['nombre_archivo']);
                      $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Archivo subido con éxito</div>');
                   }
                   else{
                      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo subir archivo</div>');
                   }

                }
                else{
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No se pudo subir archivo: La entrega ya caducó</div>');
                }

                redirect('entregas/all');
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
          $grupos_id = $this->alumno_model->get_grupo($mail);

          $date = new Date();
          $fecha = $date->get_fecha();
          $mes = $fecha['mon'];
          $anno_actual = $fecha['year'];

          if($mes<=7){
               $semestre_actual = 1;
          }else{
               $semestre_actual = 2;
          }

          if(!empty($grupos_id)){

               foreach($grupos_id as $result_grupo){
                    $grupoid = $result_grupo->ID_GRUPO;
                    $grupo = $this->grupo_model->get_grupo_by_id($grupoid);

                    if(($semestre_actual==$grupo->SEMESTRE) && ($anno_actual==$grupo->ANNO)){
                         $repo_info = $this->grupo_model->get_repo_info($grupoid);
                         $data = Array(
                              'github_acc' => $datos_user->GITHUB_ACC,
                              'github_pass' => $datos_user->GITHUB_PASS,
                              'repositorio' => $repo_info->REPOSITORIO,
                              'owner_repo' => $repo_info->REPO_OWNER,
                              'grupo' => 1,
                              'id_grupo' => $grupoid,
                              'semestre' => $grupo->SEMESTRE,
                              'año' => $grupo->ANNO,
                              'numero_grupo' => $grupo->NUMERO
                              );

                         break;
                    }else {
                         $data = Array(
                              'github_acc' => $datos_user->GITHUB_ACC,
                              'github_pass' => $datos_user->GITHUB_PASS,
                              'grupo' => 0
                              );
                    }
               }

               // $repo_info = $this->grupo_model->get_repo_info($grupo->ID_GRUPO);
               // $data = Array(
               //      'github_acc' => $datos_user->GITHUB_ACC,
               //      'github_pass' => $datos_user->GITHUB_PASS,
               //      'repositorio' => $repo_info->REPOSITORIO,
               //      'owner_repo' => $repo_info->REPO_OWNER,
               //      'grupo' => 1,
               //      'id_grupo' => $grupo->ID_GRUPO,
               //      'semestre' => $grupo->SEMESTRE,
               //      'año' => $grupo->ANNO,
               //      'numero_grupo' => $grupo->NUMERO
               //      );

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

     //////////////////////////////////////////////               ALUMNO                 //////////////////////////////////////////////////////////

     //------------------------------------------------------------------------------------------------------------------------------------------//

     //////////////////////////////////////////////               PROFESOR                 //////////////////////////////////////////////////////////

     public function verEntregas($id_grupo,$n_grupo,$id_seccion,$codigo_seccion){
          
          $entregas = $this->entregas_realizadas(intval($id_grupo));
          $integrantes_entregas_commits = $this->get_entrega_integrante_commits(intval($id_grupo));

          $entregas_final = $this->join_entregas_integrantes_commits($entregas,$integrantes_entregas_commits);

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){

               //$entregas = $this->entregas_realizadas(intval($id_grupo));

               //$integrantes_commits = $this->get_integrantes_commits(intval($id_grupo));

               //$integrantes_entregas_commits = $this->get_entrega_integrante_commits(intval($id_grupo));

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol'),
                    'entregas' => $entregas_final,
                    //'integrantes_commits' => $integrantes_commits
                    //'integrantes_entregas_commits' => $integrantes_entregas_commits,
                    'id_grupo' => $id_grupo,
                    'numero_grupo' => $n_grupo,
                    'codigo_seccion' => urldecode($codigo_seccion),
                    'id_seccion' => $id_seccion
                    );

               $this->load->view('profesor/entregas_realizadas',$datos);

          }

          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){
                    //$entregas = $this->entregas_realizadas(intval($id_grupo));
                    //$integrantes_entregas_commits = $this->get_entrega_integrante_commits(intval($id_grupo));

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Coordinador',
                         'entregas' => $entregas_final,
                         //'integrantes_entregas_commits' => $integrantes_entregas_commits,
                         'id_grupo' => $id_grupo,
                         'numero_grupo' => $n_grupo,
                         'codigo_seccion' => urldecode($codigo_seccion),
                         'id_seccion' => $id_seccion
                         );

                    $this->load->view('coordinador/entregas_realizadas_coordinador',$datos);

               }
               else{
                    if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador')){
                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Profesor-Coordinador',
                              'entregas' => $entregas_final,
                              //'integrantes_entregas_commits' => $integrantes_entregas_commits,
                              'id_grupo' => $id_grupo,
                              'numero_grupo' => $n_grupo,
                              'codigo_seccion' => urldecode($codigo_seccion),
                              'id_seccion' => $id_seccion
                              );

                         $this->load->view('profesor_coordinador/entregas_realizadas_prof_coord',$datos);                 
                    }
                    else{
                         redirect('login');
                    }
               }
          }


     }

     public function join_entregas_integrantes_commits($entregas,$integrantes_entregas_commits){

          $entregas_final = array();
          $aux = array();
          $aux2 = array();
          $aux3 = array();

          foreach($entregas as $entrega){
               $aux['id'] = $entrega['id'];
               $aux['numero'] = $entrega['numero'];
               $aux['descripcion'] = $entrega['descripcion'];
               $aux['codigofuente'] = $entrega['codigofuente'];
               if($entrega['codigofuente']){
                    foreach($integrantes_entregas_commits as $integrante_entregas_commits){
                         foreach($integrante_entregas_commits['entrega_commits'] as $entrega_commits){
                              if($entrega_commits['id_entrega']==$entrega['id']){
                                   $aux2['nombre'] = $integrante_entregas_commits['nombre'];
                                   $aux2['commits'] = $entrega_commits['commits'];
                                   array_push($aux3,$aux2);
                                   $aux2 = array();
                              }
                         }
                    }
                    $aux['alumno_commits'] = $aux3;
                    $aux3 = array();
               }
               array_push($entregas_final,$aux);
               $aux = array();

          }

          return $entregas_final;
     }

     public function entregas_realizadas($id_grupo){

          $entregas = array();
          $aux = array();

          $result_query_codigos = $this->entrega_model->ver_entregas_codigo_realizadas($id_grupo);
          $result_query_archivos = $this->entrega_model->ver_entregas_archivo_realizadas($id_grupo);

          foreach($result_query_codigos as $entrega_codigo){
               $aux['id'] = $entrega_codigo->ID_ENTREGA;
               $aux['numero'] = $entrega_codigo->NUMERO;
               $aux['descripcion'] = $entrega_codigo->DESCRIPCION;
               $aux['codigofuente'] = $entrega_codigo->CODIGO_FUENTE;

               array_push($entregas,$aux);
          }

          foreach($result_query_archivos as $entrega_archivo){
               $aux['id'] = $entrega_archivo->ID_ENTREGA;
               $aux['numero'] = $entrega_archivo->NUMERO;
               $aux['descripcion'] = $entrega_archivo->DESCRIPCION;
               $aux['codigofuente'] = $entrega_archivo->CODIGO_FUENTE;

               array_push($entregas,$aux);
          }

          return array_unique($entregas, SORT_REGULAR);

     }

     public function get_entrega_integrante_commits($id_grupo){
          $integrantes = $this->grupo_model->get_integrantes($id_grupo);
          $integrante_commits = array();
          $aux = array();

          foreach($integrantes as $integrante){
               $mail_alumno = $integrante->MAIL_ALUMNO;
               $alumno = $this->alumno_model->get_nombre($mail_alumno);
               $nombre_alumno = $alumno->NOMBRE.' '.$alumno->APELLIDO;
               $entrega_commits = $this->get_entregas_commits($mail_alumno,$id_grupo);

               $aux['nombre'] = $nombre_alumno;
               $aux['mail'] = $mail_alumno;
               $aux['entrega_commits'] = $entrega_commits;

               array_push($integrante_commits,$aux);
          }

          return $integrante_commits;
     }

     public function get_entregas_commits($mail_alumno,$id_grupo){
          $entregas_commits = array();
          $aux = array();

          $result_query = $this->entrega_model->get_entrega_commits($mail_alumno,$id_grupo);

          foreach($result_query as $entrega_commits){
               $aux['id_entrega'] = $entrega_commits->ID_ENTREGA;
               $aux['commits'] = $entrega_commits->COMMITS;

               array_push($entregas_commits,$aux);
          }

          return $entregas_commits;
     }

     /*public function get_integrantes_commits($id_grupo){
          $integrantes = $this->grupo_model->get_integrantes($id_grupo);
          $integrante_commits = array();
          $aux = array();

          foreach($integrantes as $integrante){
               $mail_alumno = $integrante->MAIL_ALUMNO;
               $alumno = $this->alumno_model->get_nombre($mail_alumno);
               $nombre_alumno = $alumno->NOMBRE.' '.$alumno->APELLIDO;
               $commits = ($this->alumno_model->get_commits($mail_alumno))->COMMITS;

               $aux['nombre'] = $nombre_alumno;
               $aux['mail'] = $mail_alumno;
               if( $commits==NULL ){
                    $aux['commits'] = "0";
               }
               else{
                    $aux['commits'] = $commits;
               }

               array_push($integrante_commits,$aux);
          }

          return $integrante_commits;
     } */

     //////////////////////////////////////////////               PROFESOR                 //////////////////////////////////////////////////////////

}