<?php

class Login_alumno extends CI_Controller {

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
          $this->load->model('login_model');
     }

     public function index()
     {
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_alumno($username, $password);
                    if (sizeof($usr_result) > 0) //active user record is present
                    {
                         $nombres = explode(' ',$usr_result->NOMBRE);
                         $apellidos = explode(' ',$usr_result->APELLIDO);
                         //set the session variables
                         $sessiondata = array(
                                   //'username' => $username,
                              'nombre' => $nombres[0],
                              'apellido' => $apellidos[0],
                              'mail' => $usr_result->MAIL,
                              'loginuser' => TRUE,
                              'rol' => 'Alumno'
                              );
                         $this->session->set_userdata($sessiondata);
                         redirect("mainAlumno"); 

                    }
                    else
                    {
                         $this->session->set_flashdata('msg_alumno', '<div class="alert alert-danger text-center">Correo electrónico y/o contraseña inválidos.</div>');
                         redirect('login');
                    }
               }
               else
               {
                    redirect('login');
               }
          }
     }

}