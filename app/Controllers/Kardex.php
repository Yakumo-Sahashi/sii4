<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	use model\TablaHistoriaAlumno;

	require_once realpath('../../vendor/autoload.php');

	class Kardex {
		static function consultar_alumno(){
			$kard = array();
			$consulta = TablaAlumno::select('t_usuario.id_usuario','nombre_persona','apellido_paterno','apellido_materno','numero_control','semestre','nombre_carrera','clave_reticula','especialidad','t_numero_control.id_numero_control','t_persona.id_persona','t_alumno.periodos_revalidados')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_cat_reticula','t_alumno.fk_cat_reticula','t_cat_reticula.id_cat_reticula')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('t_numero_control.numero_control',$_POST['num_ctrl'])->first();
			$kardex = TablaHistoriaAlumno::select('clave_oficial','nombre_completo_materia','creditos_totales','calificacion','descripcion_corto','identificacion_corta')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_tipo_evaluacion','t_historia_alumno.fk_cat_tipo_evaluacion','t_cat_tipo_evaluacion.id_cat_tipo_evaluacion')->join('t_periodo_escolar','t_historia_alumno.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->where('t_historia_alumno.fk_numero_control',$consulta->id_numero_control)->orderBy('t_historia_alumno.fk_periodo_escolar','asc')->get();
			$cont = 0;
			foreach($kardex as $materia){
				if(!array_key_exists($materia['identificacion_corta'],$kard)){
					$kard[$materia['identificacion_corta']] = array();
					array_push($kard[$materia['identificacion_corta']],$kardex[$cont]);
				}else{
					array_push($kard[$materia['identificacion_corta']],$kardex[$cont]);
				}
				$cont++;
			}
			$consulta['kardex'] = $kard;
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0','Informacion de estudiante no encontrda, por favor verifique el numero de control!']);
			}
		}

		static function consultar_kardex(){
			$kard = array();
			$consulta = TablaAlumno::select('nombre_persona','apellido_paterno','apellido_materno','numero_control','semestre','nombre_carrera','clave_reticula','especialidad','t_numero_control.id_numero_control','t_persona.id_persona','t_usuario.id_usuario','periodos_revalidados')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_cat_reticula','t_alumno.fk_cat_reticula','t_cat_reticula.id_cat_reticula')->join('t_usuario','t_usuario.fk_persona','t_persona.id_persona')->where('t_alumno.id_alumno',$_POST['alumno'])->first();
			$kardex = TablaHistoriaAlumno::select('clave_oficial','nombre_completo_materia','creditos_totales','calificacion','descripcion_corto','identificacion_corta')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_tipo_evaluacion','t_historia_alumno.fk_cat_tipo_evaluacion','t_cat_tipo_evaluacion.id_cat_tipo_evaluacion')->join('t_periodo_escolar','t_historia_alumno.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->where('t_historia_alumno.fk_numero_control',$consulta->id_numero_control)->orderBy('t_historia_alumno.fk_periodo_escolar','asc')->get();
			$cont = 0;
			foreach($kardex as $materia){
				if(!array_key_exists($materia['identificacion_corta'],$kard)){
					$kard[$materia['identificacion_corta']] = array();
					array_push($kard[$materia['identificacion_corta']],$kardex[$cont]);
				}else{
					array_push($kard[$materia['identificacion_corta']],$kardex[$cont]);
				}
				$cont++;
			}
			$consulta['kardex'] = $kard;
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0','Informacion de estudiante no encontrda, por favor verifique el numero de control!']);
			}
		}
		
	}
	call_user_func('Kardex::'.$_POST['funcion']);
?>