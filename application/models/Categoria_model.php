<?php

class Categoria_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_categorias($id_rubrica){
          $this->db->select('*');
          $this->db->where('ID_RUBRICA',$id_rubrica);
          $query = $this->db->get('categoria');

          return $query->result();
     }

     public function new_categoria($nombre,$rubrica){
          $data = array(
               'NOMBRE' => $nombre,
               'ID_RUBRICA' => $rubrica
               );

          $this->db->insert('categoria',$data);

          return ($this->db->affected_rows() > 0);
     }

     public function delete_categoria($id_categoria){
          $this->db->where('ID_CATEGORIA', $id_categoria);
          $this->db->delete('categoria');

          return ($this->db->affected_rows() > 0);
     }

}