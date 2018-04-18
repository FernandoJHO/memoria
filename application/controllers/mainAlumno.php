<?php


class MainAlumno extends CI_Controller {


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


          if($this->session->userdata('loginuser')&&($this->session->userdata('rol')=='Alumno')){
               $datos = Array(
                    'nombre' => $this->session->userdata('nombre'),
                    'apellido' =>$this->session->userdata('apellido'),
                    'mail' => $this->session->userdata('mail'),
                    'logeado' => $this->session->userdata('loginuser'),
                    'rol' => $this->session->userdata('rol')
                    );

     		$this->load->view('alumno/main_alumno',$datos);
          }
	}

}