<?php

class Login_profesor extends CI_Controller {

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
                    $usr_result = $this->login_model->get_profesor($username, $password);
                    if (sizeof($usr_result) > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                                   //'username' => $username,
                              'nombre' => $usr_result->NOMBRE,
                              'apellido' => $usr_result->APELLIDO,
                              'mail' => $usr_result->MAIL,
                              'loginuser' => TRUE,
                              'coordinador' => $usr_result->COORDINADOR,
                              'rol' => 'Profesor'
                              );
                         $this->session->set_userdata($sessiondata);
                         redirect('mainProfesor'); 

                    }
                    else
                    {
                         $this->session->set_flashdata('msg_profesor', '<div class="alert alert-danger text-center">Correo electrónico y/o contraseña inválidos.</div>');
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