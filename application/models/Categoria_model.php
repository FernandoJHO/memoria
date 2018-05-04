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

     public function new_categoria($nombre,$rubrica,$porcentaje){
          $data = array(
               'NOMBRE' => $nombre,
               'ID_RUBRICA' => $rubrica,
               'PORCENTAJE' => $porcentaje
               );

          $this->db->insert('categoria',$data);

          return ($this->db->affected_rows() > 0);
     }

     public function delete_categoria($id_categoria){
          $this->db->where('ID_CATEGORIA', $id_categoria);
          $this->db->delete('categoria');

          return ($this->db->affected_rows() > 0);
     }

     public function get_evaluacion_categoria($id_grupo,$id_categoria){
          $this->db->select('PUNTAJE, NOTA');
          $this->db->where('ID_CATEGORIA', $id_categoria);
          $this->db->where('ID_GRUPO', $id_grupo);

          $query = $this->db->get('evaluacion_categoria');

          return $query->row();
     }

     public function evaluar_categoria($id_categoria,$id_grupo,$puntaje,$nota){

          $this->db->where('ID_CATEGORIA',$id_categoria);
          $this->db->where('ID_GRUPO',$id_grupo);

          $query = $this->db->get('evaluacion_categoria'); 

          if(!empty($query->row())){
               $data = Array(
                    'PUNTAJE' => $puntaje,
                    'NOTA' => $nota
                    );
               $this->db->where('ID_CATEGORIA',$id_categoria);
               $this->db->where('ID_GRUPO',$id_grupo);

               $this->db->update('evaluacion_categoria',$data);

          }else{
               $data = Array(
                    'ID_CATEGORIA' => $id_categoria,
                    'ID_GRUPO' => $id_grupo,
                    'PUNTAJE' => $puntaje,
                    'NOTA' => $nota
                    );
               $this->db->insert('evaluacion_categoria',$data);
          }

     }

}