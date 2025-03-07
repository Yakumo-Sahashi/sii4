<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	use model\TablaPeriodoEscolar;
	use model\TablaSeleccionMaterias;
	use model\TablaHistoriaAlumno;
	require_once realpath('../../vendor/autoload.php');

	class DatosAlumno {
		static function obtener_periodo(){
			$consulta = TablaPeriodoEscolar::select('identificacion_corta')->where('estado','1')->first();
			return $consulta->identificacion_corta;
		}

		static function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin, $aula) {
			return $dia == $dia_tabla ? $hora_inicio .'-'. $hora_fin .'/'. $aula : ''; 
		}
		
		static function obtener_horario($id_alumno){
			$periodo = TablaPeriodoEscolar::select('t_periodo_escolar.identificacion_corta','t_periodo_escolar.id_periodo_escolar')->where('estado','1')->first();
   			$consulta_horario = TablaSeleccionMaterias::select('dia','hora_inicio','hora_fin','nombre_grupo','t_cat_materias.clave_oficial','t_cat_materias.nombre_abreviado_materia','t_cat_materias.creditos_totales','aula','repeticion','apellido_paterno','apellido_materno','nombre_persona')->join('t_horario','t_seleccion_materias.fk_grupo','t_horario.fk_grupo')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_horario.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_seleccion_materias.fk_numero_control',$id_alumno)->where('t_seleccion_materias.fk_cat_periodo',$periodo->id_periodo_escolar)->get();

			$i = 0;
			$creditos = 0;
			foreach($consulta_horario as $aux){
				if(isset($horario)){
					if($horario[($i-1)]['nombre'] == $aux['nombre_abreviado_materia'] && $horario[($i-1)]['nombre_grupo'] == $aux['nombre_grupo']){
						switch($aux['dia']){
							case 'lunes': {
								$horario[($i-1)]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
								break;
							}
							case 'martes': {
								$horario[($i-1)]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
								break;
							}
							case 'miercoles': {
								$horario[($i-1)]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
								break;
							}
							case 'jueves': {
								$horario[($i-1)]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
								break;
							}
							case 'viernes': {
								$horario[($i-1)]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
								break;
							}
							case 'sabado': {
								$horario[($i-1)]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
								break;
							}
						}
					}else {
						$horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
						$horario[$i]['nombre'] = $aux['nombre_abreviado_materia'];
						$horario[$i]['creditos_totales'] = $aux['creditos_totales'];
						$horario[$i]['clave'] = $aux['clave_oficial'];
						$horario[$i]['rep'] = $aux['repeticion'];
						$horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
						$creditos += $aux['creditos_totales'];
						$i++;
					}
				}else {
					$horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
					$horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
					$horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
					$horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
					$horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
					$horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
					$horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
					$horario[$i]['nombre'] = $aux['nombre_abreviado_materia'];
					$horario[$i]['creditos_totales'] = $aux['creditos_totales'];
					$horario[$i]['clave'] = $aux['clave_oficial'];
					$horario[$i]['rep'] = $aux['repeticion'];
					$horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
					$creditos += $aux['creditos_totales'];
					$i++;
				}
			}
			return $horario ?? [];
		}
		
		static function consultar_alumno(){
			$consulta = TablaAlumno::select('t_alumno.fk_numero_control','t_usuario.id_usuario','nombre_persona','apellido_paterno','apellido_materno','numero_control','semestre','nombre_carrera','clave_reticula','especialidad','t_numero_control.id_numero_control','t_persona.id_persona','promedio_aritmetico_acumulado')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_cat_reticula','t_alumno.fk_cat_reticula','t_cat_reticula.id_cat_reticula')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('t_alumno.fk_persona',Sesion::datos_sesion('fk_persona'))->first();
			$consulta['periodo'] = self::obtener_periodo();
			$consulta['horario'] = self::obtener_horario($consulta->fk_numero_control);
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0','Informacion de estudiante no encontrda, por favor verifique el numero de control!']);
			}
		}

		static function consultar_datos_alumno(){
			$consulta = TablaAlumno::select('t_alumno.fk_numero_control','t_usuario.id_usuario','nombre_persona','apellido_paterno','apellido_materno','numero_control','semestre','nombre_carrera','clave_reticula','especialidad','t_numero_control.id_numero_control','t_persona.id_persona','promedio_aritmetico_acumulado','fk_periodo_ingreso')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_cat_reticula','t_alumno.fk_cat_reticula','t_cat_reticula.id_cat_reticula')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('t_alumno.fk_persona',Sesion::datos_sesion('fk_persona'))->first();
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0','Informacion de estudiante no encontrda, por favor verifique el numero de control!']);
			}
		}

		static function obtener_periodo_alumno(){
			echo '<option value="" selected>Seleccionar periodo</option>';
            $consulta = TablaPeriodoEscolar::select('identificacion_corta','id_periodo_escolar')->where('id_periodo_escolar','>=',$_POST['periodo_ingreso'])->orderBy('id_periodo_escolar','desc')->get();
			foreach($consulta as $periodo){
				echo '<option value="'.$periodo['id_periodo_escolar'].'">'.$periodo['identificacion_corta'].'</option>';
			}
        }
		
		static function obtener_boleta(){			
			$consulta = TablaHistoriaAlumno::select('t_historia_alumno.calificacion','t_cat_materias.nombre_completo_materia','clave_oficial','creditos_totales','t_cat_tipo_evaluacion.descripcion_corto')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_tipo_evaluacion','t_historia_alumno.fk_cat_tipo_evaluacion','t_cat_tipo_evaluacion.id_cat_tipo_evaluacion')->where('t_historia_alumno.fk_numero_control',$_POST['numero_control'])->where('t_historia_alumno.fk_periodo_escolar',$_POST['opcion_periodo_calificaciones'])->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}
	}
	call_user_func('DatosAlumno::'.$_POST['funcion']);
?>