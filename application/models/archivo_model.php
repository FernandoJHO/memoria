<?php

class archivo_model extends CI_Model {

     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function new_file($ruta_archivo,$id_grupo,$id_entrega){
     	$data = Array(
     		'RUTA' => $ruta_archivo,
               'ID_GRUPO' => $id_grupo,
     		'ID_ENTREGA' => $id_entrega
     		);

     	$this->db->insert('archivo',$data);
     }

}