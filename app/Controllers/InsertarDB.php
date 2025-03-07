<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoPreguntas;
	require_once realpath('../../vendor/autoload.php');

	class InsertarDB {
		static function insertar_preguntas(){
			$json_data = file_get_contents('./preguntas.json');
			$datos = json_decode($json_data,true);
			$insercion[] = array();
			$i=0;
			foreach($datos as $contenido){
				$insercion[$i]['tipo_encuesta'] = $contenido['encuesta'] == 'A' ? 1 : 2;
				$insercion[$i]['no_pregunta'] = $contenido['no_pregunta'];
				$insercion[$i]['pregunta'] = $contenido['pregunta'];
				$insercion[$i]['respuestas'] = $contenido['respuestas'];
				$insercion[$i]['valor_respuesta'] = $contenido['resp_val'];
				$i++;
			}
			$res = CatalogoPreguntas::insert($insercion);

			//echo $res;

		}
	}
	call_user_func('InsertarDB::insertar_preguntas');
?>