<?php

class Criterio_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_criterios($id_categoria){
          $this->db->select('*');
          $this->db->where('ID_CATEGORIA',$id_categoria);
          $query = $this->db->get('criterio');

          return $query->result();
     }

     public function new_criterio($nombre,$categoria){
          $data = array(
               'NOMBRE' => $nombre,
               'ID_CATEGORIA' => $categoria
               );

          $this->db->insert('criterio',$data);

          return ($this->db->affected_rows() > 0);
     }

     public function delete_criterio($id_criterio){
          $this->db->where('ID_CRITERIO', $id_criterio);
          $this->db->delete('criterio');

          return ($this->db->affected_rows() > 0);
     }

}