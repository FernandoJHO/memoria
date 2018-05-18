<?php

class Entrega_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function get_entregas(){
     	$query = $this->db->get('entrega');

     	return $query->result();
     }

     public function get_entregas_codigo(){
          $this->db->where('CODIGO_FUENTE', 1);
          $query = $this->db->get('entrega');

          return $query->result();

     }

     public function get_entrega($id){
          $this->db->select('*');
          $this->db->from('entrega');
          $this->db->where('ID_ENTREGA', $id);

          $query = $this->db->get();

          return $query->row();   
     }

     public function ver_entregas_codigo_realizadas($id_grupo){
          $this->db->select('entrega.ID_ENTREGA, entrega.NUMERO, entrega.DESCRIPCION, entrega.CODIGO_FUENTE');
          $this->db->from('entrega');
          $this->db->join('codigofuente', 'codigofuente.ID_ENTREGA = entrega.ID_ENTREGA', 'inner');
          //$this->db->join('archivo', 'archivo.ID_ENTREGA = entrega.ID_ENTREGA', 'inner');
          $this->db->where('codigofuente.ID_GRUPO', $id_grupo);
          //$this->db->where('archivo.ID_GRUPO', $id_grupo);

          $query = $this->db->get();

          return $query->result();
     }

     public function ver_entregas_archivo_realizadas($id_grupo){
          $this->db->select('entrega.ID_ENTREGA, entrega.NUMERO, entrega.DESCRIPCION, entrega.CODIGO_FUENTE');
          $this->db->from('entrega');
          $this->db->join('archivo', 'archivo.ID_ENTREGA = entrega.ID_ENTREGA', 'inner');
          $this->db->where('archivo.ID_GRUPO', $id_grupo);

          $query = $this->db->get();

          return $query->result();
     }

     public function new_entrega($nro,$descripcion,$fecha_limite,$codigo_fuente){

          $data = Array(
               'NUMERO' => $nro,
               'DESCRIPCION' => $descripcion,
               'FECHA_LIMITE' => $fecha_limite,
               'CODIGO_FUENTE' => $codigo_fuente
               );

          $this->db->insert('entrega',$data);

          return ($this->db->affected_rows() > 0);

     }

     public function set_entrega($id,$nro,$descripcion,$fecha_limite,$codigo_fuente){

          $data = Array(
               'NUMERO' => $nro,
               'DESCRIPCION' => $descripcion,
               'FECHA_LIMITE' => $fecha_limite,
               'CODIGO_FUENTE' => $codigo_fuente
               );

          $this->db->where('ID_ENTREGA',$id);
          $this->db->update('entrega',$data);

          return ($this->db->affected_rows() > 0);

     }

     public function delete_entrega($id){
          $this->db->where('ID_ENTREGA', $id);
          $this->db->delete('entrega');

          return ($this->db->affected_rows() > 0);
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

     public function set_entrega_commits($mail_alumno,$id_entrega,$commits,$id_grupo){
          $data = Array(
               'MAIL_ALUMNO' => $mail_alumno,
               'ID_ENTREGA' => $id_entrega,
               'COMMITS' => $commits,
               'ID_GRUPO' => $id_grupo
               );

          $this->db->insert('entrega_commits',$data);

          return ($this->db->affected_rows() > 0);
     }

     public function get_entrega_commits($mail_alumno,$id_grupo){
          $this->db->select('ID_ENTREGA, COMMITS');
          $this->db->from('entrega_commits');
          $this->db->where('MAIL_ALUMNO', $mail_alumno);
          $this->db->where('ID_GRUPO', $id_grupo);

          $query = $this->db->get();

          return $query->result();
     }

}