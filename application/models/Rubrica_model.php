<?php

class Rubrica_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_rubricas(){
          $this->db->select('*');
          $query = $this->db->get('rubrica');

          return $query->result();
     }

     public function new_rubrica($nombre,$entrega){
          $data = array(
               'NOMBRE' => $nombre,
               'ID_ENTREGA' => $entrega
               );

          $this->db->insert('rubrica',$data);

          return ($this->db->affected_rows() > 0);
     }

     public function delete_rubrica($id_rubrica){

          $this->db->where('ID_RUBRICA', $id_rubrica);
          $this->db->delete('rubrica');

          return ($this->db->affected_rows() > 0);

     }

}