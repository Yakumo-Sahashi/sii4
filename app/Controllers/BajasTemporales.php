<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	require_once realpath('../../vendor/autoload.php');

	class BajasTemporales {
		static function consultar_alumnos(){
			if(Token::comprobar_token_frm('frm_estadisticas',$_POST['tk_frm'])){
				$consulta = TablaAlumno::select('id_alumno','numero_control', 'nombre_persona', 'apellido_paterno', 'apellido_materno', 'carrera', 'semestre','descripcion_estatus')->join('t_persona', 't_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control', 't_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->join('t_cat_estatus', 't_alumno.fk_cat_estatus', 't_cat_estatus.id_cat_estatus')->where('fk_cat_carrera',$_POST['carrera'])->whereBetween('fk_cat_estatus',[3, 5])->orWhere('fk_cat_estatus',14)->get();
				echo json_encode($consulta);
			}
		}
		
	}
	call_user_func('BajasTemporales::'.$_POST['funcion']);
?>