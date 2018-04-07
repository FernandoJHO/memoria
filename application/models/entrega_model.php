<?php

class entrega_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_entregas(){
     	$query = $this->db->get('entrega');

     	return $query->result();
     }

}