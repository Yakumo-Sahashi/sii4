<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoCarrera;
	require_once realpath('../../vendor/autoload.php');

	class CrearCarrera {
		static function crearCarrera(){
			if (Token::comprobar_token_frm('frm_agregar_carrera',$_POST['tk_frm'])) {
				$carrera = new CatalogoCarrera();
				$carrera->carrera = $_POST['siglas'];
				$carrera->nombre_carrera = $_POST['nombre_carrera'];
				$carrera->nivel_escolar = $_POST['nivel_escolar'];
				$carrera->carga_maxima = $_POST['carga_maxima'];
				$carrera->carga_minima = $_POST['carga_minima'];
				$carrera->fecha_inicio = $_POST['fecha_inicio'];
				$carrera->fecha_fin = $_POST['fecha_cierre'];
				$carrera->creditos_totales = $_POST['creditos'];
				$carrera->save();
				echo json_encode(["1", "La creacion de la nueva carrera ha sido correcta!"]);	
			}else{
				echo "Solicitud no valida";
			}
		}
	}
	call_user_func('CrearCarrera::'.$_POST['funcion']);
?>