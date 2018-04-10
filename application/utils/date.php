<?php

class Date {

	private $diferencia;

	public function __construct()
	{
	}

	public function get_fecha(){
		date_default_timezone_set('America/Santiago');
		$fecha = getdate();

		return $fecha;
	}

}

?>