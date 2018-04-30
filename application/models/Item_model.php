<?php

class Item_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_items_by_criterio($id_criterio){
          $this->db->select('*');
          $this->db->from('item');
          $this->db->where('ID_CRITERIO', $id_criterio);

          $query = $this->db->get();

          return $query->result();
     }

     public function new_item($id_criterio,$item){
          $data = array(
               'ITEM' => $item,
               'ID_CRITERIO' => $id_criterio
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

}