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

}