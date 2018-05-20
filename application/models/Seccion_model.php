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

     public function add_seccion($codigo){

          $data = array(
               'CODIGO' => $codigo
               );

          $this->db->insert('seccion',$data);

          return ($this->db->affected_rows() > 0);

     }

     public function delete_seccion($id_seccion){

          $this->db->where('ID_SECCION', $id_seccion);
          $this->db->delete('seccion');

          return ($this->db->affected_rows() > 0);
     }

     public function get_profesores($id_seccion){
          $this->db->select('profesor.NOMBRE, profesor.APELLIDO, profesor.MAIL');
          $this->db->from('profesor');
          $this->db->join('profesor_seccion', 'profesor_seccion.MAIL_PROFESOR = profesor.MAIL', 'inner');
          $this->db->where('profesor_seccion.ID_SECCION', $id_seccion);

          $query = $this->db->get();

          return $query->result();
     }


}