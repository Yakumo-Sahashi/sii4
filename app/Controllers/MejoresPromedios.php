<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAcumuladoHistorico;
	require_once realpath('../../vendor/autoload.php');

	class MejoresPromedios {
		static function consultar_mejor_promedio_semestre(){
			$consulta = TablaAcumuladoHistorico::select('promedio_aritmetico','nombre_persona','apellido_paterno','apellido_materno','t_alumno.semestre','numero_control','carrera','t_alumno.periodos_revalidados')->join('t_alumno','t_acumulado_historico.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_acumulado_historico.fk_numero_control','t_numero_control.id_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('t_acumulado_historico.fk_periodo_escolar',$_POST['periodo'])->where('t_cat_carrera.id_cat_carrera',$_POST['carrera'])->orderBy('promedio_aritmetico','desc')->limit(10)->get();
			echo json_encode($consulta);
		}	
		
		static function consultar_mejor_promedio_gral(){
			$consulta = TablaAcumuladoHistorico::select('promedio_certificado','nombre_persona','apellido_paterno','apellido_materno','t_alumno.semestre','numero_control','carrera','t_alumno.periodos_revalidados')->join('t_alumno','t_acumulado_historico.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_acumulado_historico.fk_numero_control','t_numero_control.id_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('t_acumulado_historico.fk_periodo_escolar',$_POST['periodo'])->where('t_cat_carrera.id_cat_carrera',$_POST['carrera'])->orderBy('promedio_certificado','desc')->limit(10)->get();
			echo json_encode($consulta);
		}	
	}
	call_user_func('MejoresPromedios::'.$_POST['funcion']);
?>