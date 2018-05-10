<?php

class RecuperarClave extends CI_Controller {


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
          $this->load->model('alumno_model');
     }

     public function index()
     {
          
          
     }

     public function verificacionAlumno(){

          $this->load->view('verificacion_recuperacion');

     }

     public function validar_datos_alumno(){

          $mail = $this->input->post('mail');
          $cuenta_github = $this->input->post('cuenta_github');
          $password_github = $this->input->post('password_github');

          $result_query = $this->alumno_model->get_github($mail);

          if(!empty($result_query)){
               $github_acc = $result_query->GITHUB_ACC;
               $github_pass = $result_query->GITHUB_PASS;

               if( (strtolower($cuenta_github)==strtolower($github_acc)) && ($password_github==$github_pass) ){

                    $data = array(
                         'mail' => $mail,
                         'verificado' => true
                    );

                    $this->session->set_userdata($data);

                    redirect('recuperarClave/cambiarClaveAlumno');

               }
               else{
                    //DATOS GITHUB INCORRECTOS
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center"> Las credenciales de Github son incorrectas </div>');

                    redirect('recuperarClave/verificacionAlumno');
               }
          }
          else{
               //MAIL NO EXISTE
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center"> El correo ingresado no existe </div>');

               redirect('recuperarClave/verificacionAlumno');
          }

     }

     public function cambiarClaveAlumno(){

          if($this->session->userdata('verificado')){

               $data = array(
                    'mail' => $this->session->userdata('mail')
               );

               $this->load->view('cambiar_clave',$data);

          }

     }

     public function cambiar_clave_alumno(){

          $nueva = $this->input->post('nueva');
          $nueva_verif = $this->input->post('nueva_verif');
          $mail = $this->input->post('mail');

          if($nueva==$nueva_verif){

               $this->alumno_model->set_password($mail,$nueva);

               $this->session->set_flashdata('msg_alumno', '<div class="alert alert-success text-center"> Contraseña modificada </div>');


               redirect(base_url());

          }
          else{
               //CONTRASEÑAS NO COINCIDEN
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center"> Las contraseñas ingresadas no coinciden </div>');

               redirect('recuperarClave/cambiarClaveAlumno');
          }

     }

}