<?php

class Alumno_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     function get_alumno($usr, $pwd)
     {
          $sql = "select * from alumno where MAIL = '" . $usr . "' and PASSWORD = '" . md5($pwd) . "'";
          $query = $this->db->query($sql);
          //return $query->num_rows();
          return $query->row();
     }

     function get_alumnos_seccion_singrupo($id_seccion){


          $this->db->select('*');
          $this->db->from('alumno');
          $this->db->join('alumno_grupo','alumno.MAIL = alumno_grupo.MAIL_ALUMNO', 'left');
          $this->db->where('alumno_grupo.MAIL_ALUMNO',NULL);
          $this->db->where('alumno.ID_SECCION',$id_seccion);


          $query = $this->db->get();

          return $query->result();

     }

     function get_nombre($mail){
          $this->db->where('MAIL',$mail);
          $this->db->select('NOMBRE, APELLIDO');
          $query = $this->db->get('alumno');

          return $query->row();
     }

     function set_github($usr_git,$pwd_git,$mail){
          $data = Array(
               'GITHUB_ACC' => $usr_git,
               'GITHUB_PASS' => $pwd_git
               );

          $this->db->where('MAIL',$mail);
          $this->db->update('alumno',$data);
     }

     function get_github($mail){
          $this->db->where('MAIL',$mail);
          $this->db->select('GITHUB_ACC, GITHUB_PASS');
          $query = $this->db->get('alumno');

          return $query->row();
          //$query->result() para más de una fila de resultados

     }

     function get_grupo($mail){
          $this->db->where('MAIL_ALUMNO',$mail);
          $this->db->select('ID_GRUPO');
          $query = $this->db->get('alumno_grupo');

          if(! is_null($query->row())){

               $id_grupo = $query->row()->ID_GRUPO;

               $this->db->where('ID_GRUPO',$id_grupo);
               $query2 = $this->db->get('grupo');

               return $query2->row();

          }
          else{
               $array = array();
               return $array;
          }
     }

     function set_commits($mail,$commits){
          $data = Array(
               'COMMITS' => $commits
               );
          $this->db->where('MAIL',$mail);
          $this->db->update('alumno',$data);
     }

     function get_commits($mail){
          $this->db->where('MAIL',$mail);
          $this->db->select('COMMITS');

          $query = $this->db->get('alumno');

          return $query->row();
     }

     function verifica_existe($mail){
          $this->db->where("MAIL",$mail);

          $query = $this->db->count_all_results('alumno');

          return $query;
     }

}