<?php
	use config\Token;
	use config\Sesion;
	use model\TablaGrupo;
	use model\TablaHistoriaAlumno;
	use model\TablaSeleccionMaterias;
	use model\TablaSolExamenEspecial;
	require_once realpath('../../vendor/autoload.php');

	class CalificacionesActas {
		static function actualizar_calificacion_esp(){
			date_default_timezone_set('America/Mexico_City');
			for($i = 1; $i < $_POST['cantidad']; $i++){
				TablaSolExamenEspecial::where('id_solicitudes_ex_especiales',$_POST['id_'.$i])->update(['fecha_especial'=> date('y-m-d'),'calificacion_especial'=>$_POST['ex_esp_calificacion'.$i] < 70 ? 'NA' : $_POST['ex_esp_calificacion'.$i]]);
			}
			echo json_encode(['1','Actualizacion de datos correcta!']);
		}

		static function consultar_materias_normal(){
			$consulta = TablaGrupo::select('id_grupo','t_grupo.fk_cat_materias','nombre_grupo','nombre_persona','apellido_paterno','apellido_materno','nombre_completo_materia','clave_oficial','alumnos_inscritos')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_grupo.fk_periodo',$_POST['periodo'])->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}		

		static function precargar_alumnos(){
			$materia = TablaGrupo::select('nombre_grupo','nombre_persona','apellido_paterno','apellido_materno','nombre_completo_materia')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_grupo.fk_periodo',$_POST['periodo'])->first();

			$consulta = TablaSeleccionMaterias::select('id_seleccion_materias','numero_control','nombre_persona','apellido_paterno','apellido_materno','calificacion','fk_tipo_evaluacion','presento','repeticion')->join('t_numero_control','t_seleccion_materias.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_numero_control.id_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_grupo','t_seleccion_materias.fk_grupo','t_grupo.id_grupo')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_seleccion_materias.fk_cat_periodo',$_POST['periodo'])->get();
			if(count($consulta) > 0){
				//$consulta['materia'] = $materia;
				echo json_encode([$consulta,$materia]);
			}else{
				echo json_encode([[],$materia]);
			}
		}

		static function actualizar_calificacion_normal(){
			for($i = 1; $i < $_POST['cantidad_normal']; $i++){
				TablaSeleccionMaterias::where('id_seleccion_materias',$_POST['id_'.$i])->update(['calificacion'=>isset($_POST['no_presento'.$i]) ? 'NA' :($_POST['calificacion'.$i] < 70 ? 'NA' : $_POST['calificacion'.$i]),'presento'=>isset($_POST['no_presento'.$i]) ? '0' : '1','fk_tipo_evaluacion'=>$_POST['tipo_evaluacion'.$i]]);
			}
			echo json_encode(['1','Actualizacion de datos correcta!']);
		}

		static function consultar_materias_sin_cal(){
			$consulta = TablaGrupo::select('nombre_grupo','nombre_persona','apellido_paterno','apellido_materno','rfc','nombre_completo_materia','clave_oficial','t_cat_organigrama.descripcion')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_seleccion_materias','t_grupo.id_grupo','t_seleccion_materias.fk_grupo')->join('t_cat_organigrama','t_cat_materias.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('t_grupo.fk_periodo',$_POST['periodo'])->where('t_seleccion_materias.calificacion','0')->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}

		static function consultar_examenes_periodo(){
			$consulta = TablaSolExamenEspecial::select('nombre_completo_materia','clave_oficial','t_cat_organigrama.descripcion')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_solicitudes_ex_especiales.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_cat_organigrama','t_cat_materias.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('fk_periodo_escolar',$_POST['periodo'])->where('calificacion_especial','0')->orderBy('t_solicitudes_ex_especiales.fk_cat_materias','asc')->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}

		static function consultar_calificaciones_alumno(){
			$consulta = TablaHistoriaAlumno::select('nombre_completo_materia','creditos_totales','calificacion','t_cat_tipo_evaluacion.descripcion_corto','t_cat_materias.clave_oficial')->join('t_numero_control','t_historia_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_tipo_evaluacion','t_historia_alumno.fk_cat_tipo_evaluacion','t_cat_tipo_evaluacion.id_cat_tipo_evaluacion')->where('t_historia_alumno.fk_periodo_escolar',$_POST['periodo'])->where('t_numero_control.numero_control',$_POST['num_ctrl'])->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}
	}
	call_user_func('CalificacionesActas::'.$_POST['funcion']);
?>