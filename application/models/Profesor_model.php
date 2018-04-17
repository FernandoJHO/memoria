<?php

class Profesor_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     function get_profesor($usr, $pwd)
     {
          $sql = "select * from profesor where MAIL = '" . $usr . "' and PASSWORD = '" . md5($pwd) . "'";
          $query = $this->db->query($sql);
          //return $query->num_rows();
          return $query->row();
     }

     public function get_seccion($mail) {
          $this->db->select('seccion.ID_SECCION, seccion.CODIGO');
          $this->db->from('seccion');
          $this->db->join('profesor_seccion', 'profesor_seccion.ID_SECCION = seccion.ID_SECCION', 'inner');
          $this->db->where('profesor_seccion.MAIL_PROFESOR', $mail);

          $query = $this->db->get();

          return $query->result();
     }

}