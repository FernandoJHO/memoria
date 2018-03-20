<?php

require "./application/utils/sdk.php";
require "./application/utils/hackapi.php";

class prueba_controller extends CI_Controller {


	public $payload;

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
		$this->load->view('prueba');
	}

	public function ejecutar(){

		$codigo = $this->input->post('code');

		$hackerearth = Array(
				'client_secret' => '1e139afeadb7eb338ea1d79f9c592406aa0d71f5', //(REQUIRED) Obtain this by registering your app at http://www.hackerearth.com/api/register/
		        'time_limit' => '5',   //(OPTIONAL) Time Limit (MAX = 5 seconds )
		        'memory_limit' => '262144'  //(OPTIONAL) Memory Limit (MAX = 262144 [256 MB])
			);
		//Feeding Data Into Hackerearth API
		$config = Array();
		$config['time']='5';	 	//(OPTIONAL) Your time limit in integer and in unit seconds
		$config['memory']='262144'; //(OPTIONAL) Your memory limit in integer and in unit kb
		$config['source']=$codigo;    	//(REQUIRED) Your formatted source code for which you want to use hackerEarth api, leave this empty if you are using file
		$config['input']='';     	//(OPTIONAL) formatted input against which you have to test your source code
		$config['language']='PYTHON';  //(REQUIRED) Choose any one of the below
								 	// C, CPP, CPP11, CLOJURE, CSHARP, JAVA, JAVASCRIPT, HASKELL, PERL, PHP, PYTHON, RUBY
		//Sending request to the API to compile and run and record JSON responses
		$response = run($hackerearth,$config);     // Use this $response the way you want , it consists data in PHP Array

		$this->session->set_flashdata('msg', $response['compile_status']);
		redirect('prueba_controller');
	}

	public function ejecutar2(){	

		$src = $this->input->post('src');
		$input = $this->input->post('inp');

		$hackerearth = Array(
				'client_secret' => '1e139afeadb7eb338ea1d79f9c592406aa0d71f5', //(REQUIRED) Obtain this by registering your app at http://www.hackerearth.com/api/register/
		        'time_limit' => '5',   //(OPTIONAL) Time Limit (MAX = 5 seconds )
		        'memory_limit' => '262144'  //(OPTIONAL) Memory Limit (MAX = 262144 [256 MB])
			);
		//Feeding Data Into Hackerearth API
		$config = Array();
		$config['time']='';	 	//(OPTIONAL) Your time limit in integer and in unit seconds
		$config['memory']=''; //(OPTIONAL) Your memory limit in integer and in unit kb
		$config['source']=$src;    	//(REQUIRED) Your formatted source code for which you want to use hackerEarth api, leave this empty if you are using file
		$config['input']=$input;     	//(OPTIONAL) formatted input against which you have to test your source code
		$config['language']='PYTHON';  //(REQUIRED) Choose any one of the below
								 	// C, CPP, CPP11, CLOJURE, CSHARP, JAVA, JAVASCRIPT, HASKELL, PERL, PHP, PYTHON, RUBY
		//Sending request to the API to compile and run and record JSON responses

		$response = run($hackerearth,$config);     // Use this $response the way you want , it consists data in PHP Array

		$data = array(
			'compile_status' => $response['compile_status'],
			'status' => $response['run_status']['status'],
			'output' => $response['run_status']['output'],
			'web' => $response['web_link'],
			'fuente' => $src
			); 

		/*$client='1e139afeadb7eb338ea1d79f9c592406aa0d71f5'; // Your client secret code.
		$code=$src; //the source code.
		$lang='Python'; // the language of the source code. eg C++ C++11 C C# Python
		$input=''; // the input values to run this code on. (Optional)

		$hack = new HackApi;
		$hack->set_client_secret($client); //set your client secret id everytime a new object is created.
		$hack->init($lang,$code,$input); // initialise your code
		$hack->run(); // compile it. to run : $hack->run();

		$data = array(
			'compile_status' => $hack->compile_status,
			'fuente' => $src
			); */

		echo json_encode($data);
	}

	public function jdoodle(){

		$src = $this->input->post('src');
		$input = $this->input->post('inp');

		$data_input = array(
				'clientId' => '95c3bcc22916713b4d3951b9be974069',
				'clientSecret' => '4849e05351a38d0828bdf3b55ec897b65b105f6289706bb3611d8226b407b02a', 
				'script' => $src,
				'stdin' => $input, 
				'language' => 'python2',
				'versionIndex' => '0'
			);
		$url = "https://api.jdoodle.com/v1/execute";
		$input_data = json_encode($data_input);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $input_data);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json')                                                                       
		);

		$result = curl_exec($curl);

		curl_close($curl);

		echo $result;

	}


}