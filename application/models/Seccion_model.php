<?php

class Seccion_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_secciones(){
          $this->db->select('ID_SECCION, CODIGO');
          $this->db->from('seccion');

          $query = $this->db->get();

          return $query->result();
     }

}