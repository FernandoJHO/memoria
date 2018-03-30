<?php

class grupo_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
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

}