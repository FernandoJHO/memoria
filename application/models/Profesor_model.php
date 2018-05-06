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

     function get_profesores(){

          $this->db->select('NOMBRE, APELLIDO, MAIL, COORDINADOR, PROFESOR_COORDINADOR');
          $this->db->from('profesor');

          $query = $this->db->get();

          return $query->result();

     }

     function get_password($mail){

          $this->db->where('MAIL',$mail);
          $this->db->select('PASSWORD');
          $query = $this->db->get('profesor');

          return $query->row();

     }

     function set_password($mail,$password){

          $data = array(
               'PASSWORD' => md5($password)
               );
          $this->db->where('MAIL', $mail);

          $this->db->update('profesor',$data);

          return ($this->db->affected_rows() > 0);  

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

     function new_profesor($nombres,$apellidos,$mail,$password,$coordinador,$prof_coordinador){

          $data = array(
               'NOMBRE' => $nombres,
               'APELLIDO' => $apellidos,
               'MAIL' => $mail,
               'PASSWORD' => md5($password),
               'COORDINADOR' => $coordinador,
               'PROFESOR_COORDINADOR' => $prof_coordinador
               );

          $this->db->insert('profesor',$data);

          return ($this->db->affected_rows() > 0);         

     }

     function set_seccion_profesor($mail,$id_seccion){

          $data = array(
               'MAIL_PROFESOR' => $mail,
               'ID_SECCION' => $id_seccion
               );

          $this->db->insert('profesor_seccion',$data);

          return ($this->db->affected_rows() > 0);    

     }

     function delete_profesor($mail){

          $this->db->where('MAIL', $mail);
          $this->db->delete('profesor');

          return ($this->db->affected_rows() > 0);

     }

}