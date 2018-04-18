<?php

class Archivo_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function new_file($ruta_archivo,$id_grupo,$id_entrega,$nombre){
     	$data = Array(
     		'RUTA' => $ruta_archivo,
               'NOMBRE' => $nombre,
               'ID_GRUPO' => $id_grupo,
     		'ID_ENTREGA' => $id_entrega
     		);

     	$this->db->insert('archivo',$data);
     }

     public function get_files($id_entrega,$id_grupo){
          $this->db->select('NOMBRE, RUTA');
          $this->db->from('archivo');
          $this->db->where('ID_GRUPO', $id_grupo);
          $this->db->where('ID_ENTREGA', $id_entrega);

          $query = $this->db->get();

          return $query->result();
     }

}