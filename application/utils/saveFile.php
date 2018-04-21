<?php

class SaveFile {


	public function __construct()
	{
	}

	public function upload_source_code($archivos,$año,$semestre,$grupo,$n_entrega,$seccion,$id_entrega,$id_grupo){

		if(is_dir('./uploads/entregas/'.$año)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/');
		}

		if(is_dir('./uploads/entregas/'.$año.'/'.$semestre)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/'.$semestre.'/');
		}

		if(is_dir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/');
		}

		if(is_dir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/');
		}

		if(is_dir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega.'/');
		}

		$dir = './uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega.'/';

		$result = array();
		$aux = array();

		foreach($archivos as $archivo){
			list($nombre,$extension) = explode('.',$archivo['nombre']);
			$nombre_archivo = $nombre.'_grupo'.$grupo.'_seccion'.$seccion.'.'.$extension;
			$ruta = $dir.$nombre_archivo;
			$contenido = $archivo['contenido'];

			if(file_put_contents($ruta,$contenido)){
				$aux['nombre_archivo'] = $archivo['nombre'];
				$aux['ruta'] = $ruta;
				$aux['id_grupo'] = $id_grupo;
				$aux['id_entrega'] = $id_entrega;
				array_push($result,$aux);
			}
		}

		return $result;

	}

	public function upload_file($año,$semestre,$grupo,$n_entrega,$seccion,$id_entrega,$id_grupo,$archivo){

		if(is_dir('./uploads/entregas/'.$año)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/');
		}

		if(is_dir('./uploads/entregas/'.$año.'/'.$semestre)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/'.$semestre.'/');
		}

		if(is_dir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/');
		}

		if(is_dir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/');
		}

		if(is_dir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega)==FALSE){
			mkdir('./uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega.'/');
		}

		$dir = './uploads/entregas/'.$año.'/'.$semestre.'/seccion_'.$seccion.'/grupo_'.$grupo.'/entrega_'.$n_entrega.'/';

		$result = array();

		$config['upload_path']          = $dir;
		$config['allowed_types']        = 'gif|jpg|png|pdf|jpeg|mp4|3gp|flv';

		$CI =& get_instance();

		$CI->load->library('upload', $config);

		if ($CI->upload->do_upload($archivo)){
			$upload_data = $CI->upload->data();
			$nombre_archivo = $upload_data['file_name'];
			$ruta = $dir.$nombre_archivo;

			$result['nombre_archivo'] = $nombre_archivo;
			$result['ruta'] = $ruta;
			$result['id_grupo'] = $id_grupo;
			$result['id_entrega'] = $id_entrega;

		}

		return $result;

	}

	public function upload_proyecto($id_grupo,$archivo){

          if(is_dir('./uploads/proyectos/'.$id_grupo)==FALSE){
               mkdir('./uploads/proyectos/'.$id_grupo.'/');
          }

          $dir = './uploads/proyectos/'.$id_grupo.'/';

          $result = array();

          $config['upload_path']          = $dir;
          $config['allowed_types']        = 'pdf';

          $CI =& get_instance();

          $CI->load->library('upload', $config);

          if ($CI->upload->do_upload($archivo)){
          	$upload_data = $CI->upload->data();
          	$nombre_archivo = $upload_data['file_name'];
          	$ruta = $dir.$nombre_archivo;

          	$result['nombre_archivo'] = $nombre_archivo;
          	$result['ruta'] = $ruta;
          	$result['id_grupo'] = $id_grupo;
          }

          return $result;

	}

}

?>