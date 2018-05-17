<?php

class Grupo_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     function get_grupos($id_seccion,$año,$semestre){

          $this->db->where('ID_SECCION',$id_seccion);
          $this->db->where('ANNO',$año);
          $this->db->where('SEMESTRE',$semestre);
          $this->db->select('ID_GRUPO,NUMERO,NOMBRE,PROYECTO,SEMESTRE,ANNO,REPOSITORIO,REPO_OWNER');
          $query = $this->db->get('grupo');

          return $query->result();

     }

     function get_integrantes($id_grupo){
          $this->db->where('ID_GRUPO',$id_grupo);
          $this->db->select('MAIL_ALUMNO');
          $query = $this->db->get('alumno_grupo');

          return $query->result();
     }

     function get_repo_info($id_grupo){
          $this->db->where('ID_GRUPO',$id_grupo);
          $this->db->select('REPOSITORIO, REPO_OWNER');
          $query = $this->db->get('grupo');

          return $query->row();
     }

     function set_repo_info($id_grupo,$repo,$owner){
          $data = Array(
               'REPOSITORIO' => $repo,
               'REPO_OWNER' => $owner
               );

          $this->db->where('ID_GRUPO',$id_grupo);
          $this->db->update('grupo',$data);
     }

     function get_seccion($id_grupo){
          $this->db->where('ID_GRUPO',$id_grupo);
          $this->db->select('ID_SECCION');

          $query = $this->db->get('grupo');

          $id_seccion = $query->row()->ID_SECCION;

          $this->db->where('ID_SECCION',$id_seccion);
          $query2 = $this->db->get('seccion');

          return $query2->row();
     }

     public function delete_grupo($id_grupo){
          $this->db->where('ID_GRUPO', $id_grupo);
          $this->db->delete('grupo');

          return ($this->db->affected_rows() > 0);
     }

     public function new_grupo($numero_grupo,$id_seccion,$año,$semestre){
          $insert_id = 0;

          $data = Array(
               'NUMERO' => $numero_grupo,
               'ID_SECCION' => $id_seccion,
               'SEMESTRE' => $semestre,
               'ANNO' => $año
               );

          $this->db->insert('grupo',$data);
          $insert_id = $this->db->insert_id();

          return $insert_id;
     }

     public function add_integrante($id_grupo,$mail_alumno){
          $data = Array(
               'MAIL_ALUMNO' => $mail_alumno,
               'ID_GRUPO' => $id_grupo
               );   
          $this->db->insert('alumno_grupo',$data);

          return ($this->db->affected_rows() > 0);
     }

     /*public function get_idgrupo_by_number($numero_grupo,$id_seccion){
          $this->db->where('NUMERO',$numero_grupo);
          $this->db->where('ID_SECCION',$id_seccion);
          $this->db->select('ID_GRUPO');

          $query = $this->db->get('grupo');

          return $query->row();
     } */

     public function get_idgrupo_by_mail($mail_alumno){
          $this->db->where('MAIL_ALUMNO',$mail_alumno);
          $this->db->select('ID_GRUPO');

          $query = $this->db->get('alumno_grupo');

          return $query->row();
     }

     public function get_grupo_by_id($id_grupo){
          $this->db->where('ID_GRUPO',$id_grupo);
          $this->db->select('ID_GRUPO, NUMERO, NOMBRE, PROYECTO');

          $query = $this->db->get('grupo');

          return $query->row();
     }

     public function set_proyecto($id_grupo,$ruta_proyecto){
          $data = Array(
               'PROYECTO' => $ruta_proyecto
               ); 

          $this->db->where('ID_GRUPO',$id_grupo);      
          $this->db->update('grupo',$data);

          return ($this->db->affected_rows() > 0);
     }
}