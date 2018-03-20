<?php

require "./application/utils/moss.php";

class mossindex extends CI_Controller {

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
		$this->load->view('mossindex');
	}

	public function ejecutar(){
		$userid = "812361564"; // Enter your MOSS userid
		$moss = new MOSS($userid);
		$moss->setLanguage('python');

		//$moss->addByWildcard('C:\xampp\htdocs\aplicacion\application\codigosfuente\Triangulo.py');
		//$moss->addByWildcard('C:\xampp\htdocs\aplicacion\application\codigosfuente\archivo2.py');
		//$moss->addByWildcard('C:\xampp\htdocs\aplicacion\application\codigosfuente\Triangulo.py');
		//$moss->addByWildcard('C:\xampp\htdocs\aplicacion\application\codigosfuente\Triangulo.py');
		$moss->addFile('./application/codigosfuente/Triangulo.py');
		$moss->addFile('./application/codigosfuente/Triangulo2.py');
		$moss->addFile('./application/codigosfuente/archivo2.py');
		$moss->addFile('./application/codigosfuente/Triangulo3.py');

		//$moss->addBaseFile('Example.java');
		$moss->setCommentString("Esta es una prueba");
		$resultado = $moss->send();
		$data = array(
			'resultado' => $resultado
			);
		$this->load->view('mossresult',$data);
	}

}