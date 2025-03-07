<?php
	use config\Token;
	use config\Sesion;
	use model;
	require_once realpath('../../vendor/autoload.php');

	class FotografiaAlumno {
		static function cargar_foto(){
			$data = $_POST['img'];
			$img_arreglo = explode(";", $data);		
			$img_arreglo2 = explode(",", $img_arreglo[1]);		
			$dat =  base64_decode($img_arreglo2[1]);		
			$nombre_img = '../../public/img/ALUMNO/'. $_POST['alumno'] . '/'.'fotografia.webp';		
			if(file_put_contents($nombre_img, $dat)){
				echo json_encode(["1","La imagen se ha recortado y cargado de manera correcta en el servidor"]);
			}else {
				echo json_encode(["0","Se ha producido un error al procesar la imagen!"]);
			}
		}
	}
	call_user_func('FotografiaAlumno::cargar_foto');
?>