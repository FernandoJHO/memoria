<?php

class Item_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_items_by_categoria($id_categoria){
          $this->db->select('*');
          $this->db->from('item');
          $this->db->where('ID_CATEGORIA', $id_categoria);

          $query = $this->db->get();

          return $query->result();
     }

     public function new_item($id_categoria,$item){
          $data = array(
               'ITEM' => $item,
               'ID_CATEGORIA' => $id_categoria
               );
          $this->db->insert('item',$data);

          return ($this->db->affected_rows() > 0);
     }

     public function delete_item($id_item){
          $this->db->where('ID_ITEM', $id_item);
          $this->db->delete('item');

          return ($this->db->affected_rows() > 0);
     }

     public function update_item($id_item,$item){
          $data = Array(
               'ITEM' => $item
               );

          $this->db->where('ID_ITEM',$id_item);
          $this->db->update('item',$data);

     }

     public function get_evaluacion_item($id_item,$id_grupo){
          $this->db->select('VALOR_ITEM');
          $this->db->where('ID_ITEM', $id_item);
          $this->db->where('ID_GRUPO', $id_grupo);

          $query = $this->db->get('evaluacion_item');

          return $query->row();
     }

     public function evaluar_item($id_item,$id_grupo,$valor_item){

          $this->db->where('ID_ITEM',$id_item);
          $this->db->where('ID_GRUPO',$id_grupo);

          $query = $this->db->get('evaluacion_item'); 

          if(!empty($query->row())){
               $data = Array(
                    'VALOR_ITEM' => $valor_item
                    );
               $this->db->where('ID_ITEM',$id_item);
               $this->db->where('ID_GRUPO',$id_grupo);

               $this->db->update('evaluacion_item',$data);

          }else{
               $data = Array(
                    'ID_ITEM' => $id_item,
                    'ID_GRUPO' => $id_grupo,
                    'VALOR_ITEM' => $valor_item
                    );
               $this->db->insert('evaluacion_item',$data);
          }

     }

}