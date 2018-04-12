<?php

class entrega_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_entregas(){
     	$query = $this->db->get('entrega');

     	return $query->result();
     }

     public function check_entrega_codigo($id_grupo,$n_entrega){
     	$this->db->select('*');
     	$this->db->from('codigofuente');
     	$this->db->join('entrega', 'entrega.ID_ENTREGA = codigofuente.ID_ENTREGA', 'inner');
     	$this->db->where('codigofuente.ID_GRUPO', $id_grupo);
     	$this->db->where('entrega.NUMERO',$n_entrega);

     	$query = $this->db->get();

     	return $query->result();
     }

     public function check_entrega_archivo($id_grupo,$n_entrega){
          $this->db->select('*');
          $this->db->from('archivo');
          $this->db->join('entrega', 'entrega.ID_ENTREGA = archivo.ID_ENTREGA', 'inner');
          $this->db->where('archivo.ID_GRUPO', $id_grupo);
          $this->db->where('entrega.NUMERO',$n_entrega);

          $query = $this->db->get();

          return $query->result();
     }

}