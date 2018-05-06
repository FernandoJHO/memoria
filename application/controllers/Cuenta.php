<?php


class Cuenta extends CI_Controller {


     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->database();
          $this->load->library('form_validation');
          $this->load->model('alumno_model');
          $this->load->model('profesor_model');
     }

	public function index(){

	}

     public function profesor(){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){


               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol')
                    );

               $this->load->view("profesor/mi_cuenta",$datos);

          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && $this->session->userdata('profesor_coordinador') ){


                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Profesor-Coordinador'
                         );

                    $this->load->view("profesor_coordinador/mi_cuenta",$datos);
               }
               else{
                    if($this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){
                         


                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Coordinador'
                              );

                         $this->load->view("coordinador/mi_cuenta",$datos);
                    }
               }
          }

     }

     public function cambiar_password_profesor(){

          $mail = $this->session->userdata('mail');
          $actual_input = md5($this->input->post('actual'));
          $nueva = $this->input->post('nueva');
          $nueva_verif = $this->input->post('nueva_verif');

          $actual = ($this->profesor_model->get_password($mail))->PASSWORD;

          if( $nueva == $nueva_verif ){

               if( $actual_input == $actual ){

                    $this->profesor_model->set_password($mail,$nueva);

                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Contraseña modificada</div>');

               }
               else{
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">La contraseña que ingresaste no corresponde a la actual</div>');
               }

          }
          else{
               
               $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Las nuevas contraseñas no coinciden</div>');
          
          }

          redirect('cuenta/profesor');

     }

}