<?php
	use config\Token;
	use config\Sesion;
	use model\TablaPeriodoEscolar;
	use model\TablaHistoriaAlumno;
	use model\TablaAcumuladoHistorico;
	use model\TablaAlumno;
	use model\TablaCalificacionFinalPeriodo;
	use model\TablaControlCalificacionesParciales;
	use model\TablaSeleccionMaterias;
	use model\TablaSolExamenEspecial;

	require_once realpath('../../vendor/autoload.php');

	class CierreSemestre {
		static function obtener_periodo_actual(){
			$consulta = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->where('estado',1)->first();
			echo json_encode($consulta);
		}

		static function update_seleccion_materias(){
			date_default_timezone_set('America/Mexico_City');
			$consulta = TablaSeleccionMaterias::select('t_seleccion_materias.fk_cat_periodo','t_seleccion_materias.fk_numero_control','t_grupo.fk_cat_materias','t_seleccion_materias.calificacion','t_seleccion_materias.fk_tipo_evaluacion','t_seleccion_materias.fecha_hora_modificacion','t_seleccion_materias.presento')->join('t_grupo','t_seleccion_materias.fk_grupo','t_grupo.id_grupo')->where('t_seleccion_materias.fk_cat_periodo',$_POST['id_periodo'])->get();
			$insercion[] = array();
			$i = 0;
			foreach($consulta as $calficaciones){
				$insercion[$i]['fk_periodo_escolar'] = $calficaciones['fk_cat_periodo'];
				$insercion[$i]['fk_numero_control'] = $calficaciones['fk_numero_control'];
				$insercion[$i]['fk_cat_materias'] = $calficaciones['fk_cat_materias'];
				$insercion[$i]['calificacion'] = $calficaciones['calificacion'];
				$insercion[$i]['fk_cat_tipo_evaluacion'] = $calficaciones['fk_tipo_evaluacion'];
				$insercion[$i]['fecha_calificacion'] = $calficaciones['fecha_hora_modificacion'];
				$insercion[$i]['presento'] = $calficaciones['presento'];
				$insercion[$i]['fecha_actualizacion'] =  date('y-m-d');
				$i++;
			}
			if(TablaHistoriaAlumno::insert($insercion)){
				echo json_encode(['1','Se ha actualizado el kardex con exito!']);
			}else{
				echo json_encode(['0','No se ha actualizado el kardex!']);
			}

		}

		static function update_examenes_especiales_autodidactas(){
			date_default_timezone_set('America/Mexico_City');
			$consulta = TablaSolExamenEspecial::select('fk_periodo_escolar','fk_numero_control','fk_cat_materias','tipo_evaluacion','calificacion_especial')->where('fk_periodo_escolar',$_POST['id_periodo'])->get();
			$insercion[] = array();
			$i = 0;
			foreach($consulta as $calficaciones){
				$insercion[$i]['fk_periodo_escolar'] = $calficaciones['fk_periodo_escolar'];
				$insercion[$i]['fk_numero_control'] = $calficaciones['fk_numero_control'];
				$insercion[$i]['fk_cat_materias'] = $calficaciones['fk_cat_materias'];
				$insercion[$i]['calificacion'] = $calficaciones['calificacion_especial'];
				$insercion[$i]['fk_cat_tipo_evaluacion'] = $calficaciones['tipo_evaluacion'];
				$insercion[$i]['fecha_calificacion'] = date('y-m-d');
				$insercion[$i]['presento'] = '1';
				$insercion[$i]['fecha_actualizacion'] =  date('y-m-d');
				$i++;
			}
			if(TablaHistoriaAlumno::insert($insercion)){
				echo json_encode(['1','Se ha actualizado el kardex con exito!']);
			}else{
				echo json_encode(['0','No se ha actualizado el kardex!']);
			}

		}

		static function actualizar_calificaciones_alumno(){
			$consulta = TablaAcumuladoHistorico::select('t_acumulado_historico.fk_numero_control','t_acumulado_historico.creditos_cursados','t_acumulado_historico.creditos_aprobados','t_acumulado_historico.promedio_ponderado','t_acumulado_historico.promedio_aritmetico','t_acumulado_historico.materias_cursadas','t_acumulado_historico.materias_reprobadas')->join('t_alumno','t_acumulado_historico.fk_numero_control','t_alumno.fk_numero_control')->where('t_alumno.fk_cat_estatus','1')->orderBy('t_acumulado_historico.fk_numero_control','asc')->get();

			$promedio_aritmetico_acumulado = 0;
			$promedio_final_alcanzado = 0;
			$creditos_aprobados = 0;
			$creditos_cursados = 0;
			$contador = 0;
			$materias_total = 0;
			$materias_reprobadas = 0;
			$temp = "";

			foreach($consulta as $alumno){
				if($temp != ""){
					if($alumno['fk_numero_control'] == $temp){
						$promedio_aritmetico_acumulado += $alumno['promedio_aritmetico'];
						$promedio_final_alcanzado += $alumno['promedio_ponderado'];
						$creditos_aprobados += $alumno['creditos_aprobados'];
						$creditos_cursados += $alumno['creditos_cursados'];
						$materias_total += $alumno['materias_cursadas'];
						$materias_reprobadas += $alumno['materias_reprobadas'];
					}else{
						TablaAlumno::where('fk_numero_control',$temp)->update(['promedio_aritmetico_acumulado'=>round(($promedio_aritmetico_acumulado*100)/($materias_total*100),2),'promedio_final_alcanzado'=>round($promedio_final_alcanzado/$contador,2),'creditos_aprobados'=>$creditos_aprobados,'creditos_cursados'=>$creditos_cursados]);

						$promedio_aritmetico_acumulado = $alumno['promedio_aritmetico'];
						$promedio_final_alcanzado = $alumno['promedio_ponderado'];
						$creditos_aprobados = $alumno['creditos_aprobados'];
						$creditos_cursados = $alumno['creditos_cursados'];
						$materias_total = $alumno['materias_cursadas'];
						$materias_reprobadas = $alumno['materias_reprobadas'];
						$contador = 0;
					}
				}else{
					$promedio_aritmetico_acumulado = $alumno['promedio_aritmetico'];
					$promedio_final_alcanzado = $alumno['promedio_ponderado'];
					$creditos_aprobados = $alumno['creditos_aprobados'];
					$creditos_cursados = $alumno['creditos_cursados'];
					$materias_total = $alumno['materias_cursadas'];
					$materias_reprobadas = $alumno['materias_reprobadas'];
				}
				$temp = $alumno['fk_numero_control'];
				$contador++;
				
			}
			
		}
		
		static function calcular_promedios(){
			/* $consulta = TablaHistoriaAlumno::select('t_historia_alumno.fk_periodo_escolar','t_historia_alumno.fk_numero_control','t_cat_materias.creditos_totales','t_historia_alumno.calificacion','t_historia_alumno.fk_cat_tipo_evaluacion')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_historia_alumno.fk_periodo_escolar',$_POST['id_periodo'])->orderBy('t_historia_alumno.fk_numero_control','asc')->get();
			$alumnos[] = array();
			$i = 0;
			$temp = 0;
			foreach($consulta as $calficaciones){
				if(isset($alumnos[$i]['fk_periodo_escolar'])){
					if($temp == $calficaciones['fk_numero_control']){
						$alumnos[$i]['creditos_cursados'] += $calficaciones['creditos_totales'];
						$alumnos[$i]['creditos_aprobados'] += $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales'];
						$alumnos[$i]['materias_cursadas'] += 1;
						$alumnos[$i]['materias_reprobadas'] += $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 1 : 0;
						$alumnos[$i]['materia_examen_especial'] += $calficaciones['fk_cat_tipo_evaluacion'] == 1 ? 1:0;
						$alumnos[$i]['materia_especial_reprobada'] += $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
						$alumnos[$i]['indice_reprobacion_semestre'] += $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
						$alumnos[$i]['creditos_autorizados'] += $calficaciones['creditos_totales'];
						$alumnos[$i]['indice_reprobacion_acumulado'] += $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
					}else{
						$i++;
						$alumnos[$i]['fk_periodo_escolar'] = $calficaciones['fk_periodo_escolar'];
						$alumnos[$i]['fk_numero_control'] = $calficaciones['fk_numero_control'];
						$alumnos[$i]['estatus_periodo_alumno'] = '1';
						$alumnos[$i]['creditos_cursados'] = $calficaciones['creditos_totales'];
						$alumnos[$i]['creditos_aprobados'] = $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales'];

						$alumnos[$i]['promedio_ponderado'] = $calficaciones['calificacion'];
						$alumnos[$i]['promedio_ponderado_acumulado'] = $calficaciones['calificacion'];
						$alumnos[$i]['promedio_aritmetico'] = $calficaciones['calificacion'];
						$alumnos[$i]['promedio_aritmetico_acumulado'] = $calficaciones['calificacion'];
						$alumnos[$i]['promedio_certificado'] = $calficaciones['calificacion'];
						$alumnos[$i]['materias_cursadas'] = 1;
						$alumnos[$i]['materias_reprobadas'] = $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 1 : 0;
						$alumnos[$i]['materia_examen_especial'] = $calficaciones['fk_cat_tipo_evaluacion'] == 1 ? 1:0;
						$alumnos[$i]['materia_especial_reprobada'] = $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
						$alumnos[$i]['indice_reprobacion_semestre'] = $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
						$alumnos[$i]['creditos_autorizados'] = $calficaciones['creditos_totales'];
						$alumnos[$i]['indice_reprobacion_acumulado'] = $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
						$alumnos[$i]['fecha_actualizacion'] =  date('y-m-d h:i:s');
						$temp = $calficaciones['fk_numero_control'];
					}

				}else{
					$alumnos[$i]['fk_periodo_escolar'] = $calficaciones['fk_periodo_escolar'];
					$alumnos[$i]['fk_numero_control'] = $calficaciones['fk_numero_control'];
					$alumnos[$i]['estatus_periodo_alumno'] = '1';
					$alumnos[$i]['creditos_cursados'] = $calficaciones['creditos_totales'];
					$alumnos[$i]['creditos_aprobados'] = $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales'];

					$alumnos[$i]['promedio_ponderado'] = $calficaciones['calificacion'];
					$alumnos[$i]['promedio_ponderado_acumulado'] = $calficaciones['calificacion'];
					$alumnos[$i]['promedio_aritmetico'] = $calficaciones['calificacion'];
					$alumnos[$i]['promedio_aritmetico_acumulado'] = $calficaciones['calificacion'];
					$alumnos[$i]['promedio_certificado'] = $calficaciones['calificacion'];
					$alumnos[$i]['materias_cursadas'] = 1;
					$alumnos[$i]['materias_reprobadas'] = $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 1 : 0;
					$alumnos[$i]['materia_examen_especial'] = $calficaciones['fk_cat_tipo_evaluacion'] == 1 ? 1:0;
					$alumnos[$i]['materia_especial_reprobada'] = $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
					$alumnos[$i]['indice_reprobacion_semestre'] = $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
					$alumnos[$i]['creditos_autorizados'] = $calficaciones['creditos_totales'];
					$alumnos[$i]['indice_reprobacion_acumulado'] = $calficaciones['fk_cat_tipo_evaluacion'] == 1 ?( $calficaciones['calificacion'] == 0 || $calficaciones['calificacion'] == 'NA' ? 0 : $calficaciones['creditos_totales']) :0;
					$alumnos[$i]['fecha_actualizacion'] =  date('y-m-d h:i:s');
					$temp = $calficaciones['fk_numero_control'];
				}
			}
			if(TablaAcumuladoHistorico::insert($alumnos)){ */
				self::actualizar_calificaciones_alumno();
				echo json_encode(['1','Se ha actualizado el kardex con exito!']);
			/* }else{
				echo json_encode(['0','No se ha actualizado el kardex!']);
			} */
		}

		static function update_estatus_alumnos(){
			echo json_encode(['1','Se han actualizado los estatus con exito!']);			
		}

		static function update_semestre_alumnos(){
			$consulta = TablaAlumno::select('id_alumno','semestre')->where('fk_cat_estatus','1')->get();
			foreach($consulta as $alumno){				
				TablaAlumno::where('id_alumno',$alumno['id_alumno'])->update(['semestre'=>($alumno['semestre'] += 1)]);
			}
			echo json_encode(['1','Se han actualizado los semestres con exito!']);
		}

	}
	call_user_func('CierreSemestre::'.$_POST['funcion']);
?>