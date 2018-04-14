<?php

class UploadFiles extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                $this->load->helper(array('form', 'url'));
                $this->load->database();
                $this->load->helper('html');
                $this->load->model('alumno_model');
                $this->load->model('grupo_model');
                $this->load->model('archivo_model');
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function upload_file(){
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

        public function get_user_data($mail){
              $datos_user = $this->alumno_model->get_github($mail);
              $grupo = $this->alumno_model->get_grupo($mail);

              if(!empty($grupo)){
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

        public function get_seccion_grupo($id_grupo){
              $resultado = $this->grupo_model->get_seccion($id_grupo);

              $seccion = $resultado->CODIGO;

              return $seccion;
        }

        /*public function do_upload()
        {
                $config['upload_path']          = './application/archivos_subidos/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg|mp4|3gp|flv';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        redirect('upload');
                }
        } */

        /*public function do_upload_2()
        {
                $config['upload_path']          = './application/archivos_subidos/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg|mp4|3gp|flv';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile2'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        redirect('upload');
                }
        } */
}
?>