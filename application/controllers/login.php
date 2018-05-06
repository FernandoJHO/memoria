<?php

class Login extends CI_Controller {

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
     }

     public function index()
     {
          
          $session_set_value = $this->session->all_userdata();

          if ($this->session->userdata('remember_me')) {
               
               if($this->session->userdata('rol')=='Alumno'){
                    redirect('mainAlumno');
               }
               else{
                    if($this->session->userdata('rol')=='Profesor'){
                         redirect('mainProfesor');
                    }
               }

          } 
          else{
               $this->load->view('login');
          }
     }

}