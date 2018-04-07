<?php

class codigofuente_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function new_file($nombre_archivo,$ruta_archivo,$id_grupo,$id_entrega){
     	$data = Array(
     		'NOMBRE_ARCHIVO' => $nombre_archivo,
     		'RUTA' => $ruta_archivo,
     		'ID_GRUPO' => $id_grupo,
     		'ID_ENTREGA' => $id_entrega
     		);

     	$this->db->insert('codigofuente',$data);
     }

}