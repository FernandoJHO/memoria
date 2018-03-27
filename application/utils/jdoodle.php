<?php

class JDoodle {

	private $input_data;
	private $client_id = '95c3bcc22916713b4d3951b9be974069';
	private $client_secret = '4849e05351a38d0828bdf3b55ec897b65b105f6289706bb3611d8226b407b02a';
	private $language = 'python2';
	private $version = '0';
	private $run_url = "https://api.jdoodle.com/v1/execute";

	public function __construct($code,$input)
	{
		$this->input_data = Array(
				'clientId' => $this->client_id,
				'clientSecret' => $this->client_secret, 
				'script' => $code,
				'stdin' => $input, 
				'language' => $this->language,
				'versionIndex' => $this->version
			);
	}

	public function run()
	{
		$parameters = json_encode($this->input_data);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $parameters);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curl, CURLOPT_URL, $this->run_url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json')                                                                       
		);

		$result = curl_exec($curl);

		curl_close($curl);

		return json_decode($result);
	}

}

?>