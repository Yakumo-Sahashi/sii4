<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoPreguntas;
	use model\TablaPeriodoEscolar;
	use model\TablaSeleccionMaterias;
	use model\TablaAlumno;
	use model\TablaEvaluacionAlumnos;
	use model\TablaAplicacionEvaluacion;

	require_once realpath('../../vendor/autoload.php');

	class EvaluacionDocente {
		static function obtener_doncentes($id_alumno){
			$periodo = TablaPeriodoEscolar::select('t_periodo_escolar.identificacion_corta','t_periodo_escolar.id_periodo_escolar')->where('estado','1')->first();
   			$consulta_horario = TablaSeleccionMaterias::select('t_cat_materias.nombre_abreviado_materia','apellido_paterno','apellido_materno','nombre_persona','t_personal.id_personal','id_cat_materias')->join('t_horario','t_seleccion_materias.fk_grupo','t_horario.fk_grupo')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_horario.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_seleccion_materias.fk_numero_control',$id_alumno)->where('t_seleccion_materias.fk_cat_periodo',$periodo->id_periodo_escolar)->get();

			$i = 0;
			foreach($consulta_horario as $aux){
				if(isset($horario)){
					if($horario[($i-1)]['nombre'] != $aux['nombre_abreviado_materia']){
						$horario[$i]['id_personal'] = $aux['id_personal'];
						$horario[$i]['id_cat_materias'] = $aux['id_cat_materias'];
						$horario[$i]['nombre'] = $aux['nombre_abreviado_materia'];
						$horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
						$i++;
					}
				}else {
					$horario[$i]['id_personal'] = $aux['id_personal'];
					$horario[$i]['id_cat_materias'] = $aux['id_cat_materias'];
					$horario[$i]['nombre'] = $aux['nombre_abreviado_materia'];
					$horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
					$i++;
				}
			}
			return $horario ?? [];
		}
		static function obtener_preguntas(){
			$consulta = CatalogoPreguntas::select('id_cat_preguntas','no_pregunta','pregunta')->where('tipo_encuesta','1')->orderBy('no_pregunta','asc')->get();
			$alumno = TablaAlumno::select('fk_numero_control')->where('fk_persona',Sesion::datos_sesion('fk_persona'))->first();
			echo json_encode([$consulta,self::obtener_doncentes($alumno->fk_numero_control)]);
		}	
		
		static function registrar_evaluacion(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$alumno = TablaAlumno::select('fk_numero_control')->where('fk_persona',Sesion::datos_sesion('fk_persona'))->first();
			date_default_timezone_set('America/Mexico_City');
			$data = json_decode($_POST['encuesta'],true);
			$insertar[] = array();
			$i = 0;
			foreach($data as $contenido){				 	 	 	 	 	 	 	
				$insertar[$i]['fk_periodo_escolar'] = $periodo->id_periodo_escolar;
				$insertar[$i]['fk_numero_control'] = $alumno->fk_numero_control;
				$insertar[$i]['fk_cat_materias'] = $contenido['materia'];
				$insertar[$i]['fk_personal'] = $contenido['docente'];
				$insertar[$i]['tipo_encuesta'] = 1;
				$insertar[$i]['respuestas'] = $contenido['respuestas'];
				$insertar[$i]['fecha_evaluacion'] = date("Y-m-d H:i:s");
				$i++;
			}
			$respuesta = TablaEvaluacionAlumnos::insert($insertar);
			if($respuesta){
				echo json_encode(['1',"Evaluacion docente completada!"]);			
			}else{
				echo json_encode(['0',"Error al registrar respuestas!"]);	
			}
		}

		static function obtener_fecha(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = TablaAplicacionEvaluacion::select('tipo_encuesta','fecha_inicio','fecha_fin')->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->first();

			if(isset($consulta)){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0',"No se ha programado una evaluacion docente para este semestre!"]);
			}
		}

		static function consultar_evaluacion(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$alumno = TablaAlumno::select('fk_numero_control')->where('fk_persona',Sesion::datos_sesion('fk_persona'))->first();
			$consulta = TablaEvaluacionAlumnos::select('fk_numero_control')->where('fk_numero_control',$alumno->fk_numero_control)->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->get();
			if(count($consulta) > 0){
				echo json_encode(['1','Ya realizaste tu evaluacion docente!']);
			}else{
				echo json_encode(['0',"Sin realizar evaluacion!"]);
			}
		}
	}
	call_user_func('EvaluacionDocente::'.$_POST['funcion']);
?>