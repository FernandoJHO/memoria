<?php

class Github {

	private $user;
	private $psw;

     public function __construct($user,$password)
     {
     	$this->user = $user;
     	$this->psw = $password;
     }

	public function request($url){
		$ch = curl_init();

		$access = $this->user.":".$this->psw;

	    curl_setopt($ch, CURLOPT_URL, $url);
	    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	    curl_setopt($ch, CURLOPT_USERAGENT, 'FernandoJHO');
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_USERPWD, $access);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    $output = curl_exec($ch);
	    curl_close($ch);
	    $result = json_decode(trim($output), true);
	    return $result;
	}

	public function request_put($url,$postdata){
		$ch = curl_init();

		$access = $this->user.":".$this->psw;

		$input_data = json_encode($postdata);

	    curl_setopt($ch, CURLOPT_URL, $url);
	    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	    curl_setopt($ch, CURLOPT_USERAGENT, 'FernandoJHO');
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_USERPWD, $access);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $input_data);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    $output = curl_exec($ch);
	    curl_close($ch);
	    $result = json_decode(trim($output), true);
	    return $result;
	}

}

?>