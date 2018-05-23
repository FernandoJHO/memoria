<?php


class MainProfesor extends CI_Controller {


     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->helper('form');
          $this->load->library('form_validation');
     }

     public function index(){

          if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && !$this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador')){

               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'rol' => $this->session->userdata('rol')
                    );

               $this->load->view('profesor/main_profesor',$datos);
          }
          else{
               if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('coordinador') && !$this->session->userdata('profesor_coordinador') ){

                    $datos = Array(
                         'nombre' => $this->session->userdata('nombre'),
                         'apellido' =>$this->session->userdata('apellido'),
                         'mail' => $this->session->userdata('mail'),
                         'rol' => 'Coordinador'
                         );

                    $this->load->view('coordinador/main_coordinador',$datos); 
               }
               else{
                    if( $this->session->userdata('loginuser') && $this->session->userdata('rol')=='Profesor' && $this->session->userdata('profesor_coordinador') ){
                         $datos = Array(
                              'nombre' => $this->session->userdata('nombre'),
                              'apellido' =>$this->session->userdata('apellido'),
                              'mail' => $this->session->userdata('mail'),
                              'rol' => 'Profesor-Coordinador'
                              );   

                         $this->load->view('profesor_coordinador/main_profesor_coordinador',$datos);
                    }
                    else{
                         redirect('login');
                    }
               }
          }
     }

}