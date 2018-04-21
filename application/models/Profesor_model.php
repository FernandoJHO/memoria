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

     function set_github($usr_git,$pwd_git,$mail){
          $data = Array(
               'GITHUB_ACC' => $usr_git,
               'GITHUB_PASS' => $pwd_git
               );

          $this->db->where('MAIL',$mail);
          $this->db->update('profesor',$data);
     }

     function get_github($mail){
          $this->db->where('MAIL',$mail);
          $this->db->select('GITHUB_ACC, GITHUB_PASS');
          $query = $this->db->get('profesor');

          return $query->row();
          //$query->result() para más de una fila de resultados

     }

}