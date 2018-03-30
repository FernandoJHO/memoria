<?php


class main_alumno extends CI_Controller {


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

          $datos = Array(
               'nombre' => $this->session->userdata('nombre'),
               'apellido' =>$this->session->userdata('apellido'),
               'mail' => $this->session->userdata('mail'),
               'github_acc' => $this->session->userdata('github_acc'),
               'github_pass' => $this->session->userdata('github_pass'),
               'logeado' => $this->session->userdata('loginuser'),
               'rol' => $this->session->userdata('rol')
               );

		$this->load->view('main_alumno',$datos);
	}

}