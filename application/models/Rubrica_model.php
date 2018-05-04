<?php

class Rubrica_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_rubricas(){
          $this->db->select('*');
          $query = $this->db->get('rubrica');

          return $query->result();
     }

     public function new_rubrica($nombre,$entrega){
          $data = array(
               'NOMBRE' => $nombre,
               'ID_ENTREGA' => $entrega
               );

          $this->db->insert('rubrica',$data);

          return ($this->db->affected_rows() > 0);
     }

     public function delete_rubrica($id_rubrica){

          $this->db->where('ID_RUBRICA', $id_rubrica);
          $this->db->delete('rubrica');

          return ($this->db->affected_rows() > 0);

     }

     public function get_rubricas_by_entrega($id_entrega){

          $this->db->select('*');
          $this->db->where('ID_ENTREGA', $id_entrega);
          $query = $this->db->get('rubrica');

          return $query->result();

     }

     public function get_evaluacion_rubricas($id_rubrica,$id_grupo){

          $this->db->select('NOTA');
          $this->db->where('ID_RUBRICA', $id_rubrica);
          $this->db->where('ID_GRUPO', $id_grupo);

          $query = $this->db->get('evaluacion_rubrica');

          return $query->row();

     }

     public function evaluar_rubrica($id_rubrica,$id_grupo,$nota){

          $this->db->where('ID_RUBRICA',$id_rubrica);
          $this->db->where('ID_GRUPO',$id_grupo);

          $query = $this->db->get('evaluacion_rubrica'); 

          if(!empty($query->row())){
               $data = Array(
                    'NOTA' => $nota
                    );
               $this->db->where('ID_RUBRICA',$id_rubrica);
               $this->db->where('ID_GRUPO',$id_grupo);

               $this->db->update('evaluacion_rubrica',$data);

          }else{
               $data = Array(
                    'ID_RUBRICA' => $id_rubrica,
                    'ID_GRUPO' => $id_grupo,
                    'NOTA' => $nota
                    );
               $this->db->insert('evaluacion_rubrica',$data);
          }

     }

}