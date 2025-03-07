<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	use model\CatalogoMaterias;
	use model\TablaGrupo;
	use model\TablaHistoriaAlumno;
	use model\TablaHorario;
	use model\TablaPeriodoEscolar;
	use model\TablaPersonal;
	use model\TablaSeleccionMaterias;
	use model\TablaControlCalificacionesParciales;

	require_once realpath('../../vendor/autoload.php');

	class InscripcionPeriodo {
		static function obtener_alumno(){
			$consulta = TablaAlumno::select('t_usuario.id_usuario','id_alumno','t_alumno.fk_persona','nombre_persona','apellido_paterno','apellido_materno','numero_control','fk_numero_control','semestre','identificacion_corta','t_alumno.fk_cat_carrera','carrera','promedio_aritmetico_acumulado','especialidad','t_usuario.id_usuario')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_periodo_escolar','t_alumno.fk_periodo_ingreso','t_periodo_escolar.id_periodo_escolar')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('t_numero_control.numero_control',$_POST['num_ctrl'])->first();
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0',"Informacion no encontrada. Por favor verifica el numero control!"]);
			}
		}

		static function obtener_movimientos(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();

			$consulta = CatalogoMaterias::select('id_cat_materias','clave','nombre_abreviado_materia','semestre','renglon')->where('t_cat_materias.fk_cat_reticula',$_POST['id_carrera'])->where('t_cat_materias.estatus_materias_carrera','A')->whereBetween('semestre',[1, 9])->orderBy('semestre','asc')->get();
			
			$consultaHistoria = TablaHistoriaAlumno::select('calificacion','siglas','fk_cat_materias')->join('t_cat_tipo_evaluacion','t_historia_alumno.fk_cat_tipo_evaluacion','t_cat_tipo_evaluacion.id_cat_tipo_evaluacion')->where('fk_numero_control',$_POST['id_num_control'])->get();
			
			$consultaSelec = TablaSeleccionMaterias::select('t_seleccion_materias.fk_grupo','calificacion','t_grupo.fk_cat_materias','id_seleccion_materias','t_seleccion_materias.fk_numero_control','t_seleccion_materias.fk_grupo')->join('t_grupo','t_seleccion_materias.fk_grupo','t_grupo.id_grupo','t_seleccion_materias.fk_numero_control')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_seleccion_materias.fk_cat_periodo','t_periodo_escolar.id_periodo_escolar')->where('t_seleccion_materias.fk_numero_control',$_POST['id_num_control'])->where('t_periodo_escolar.estado','1')->orderBy('t_seleccion_materias.fk_numero_control','asc')->get();

			$horario = TablaGrupo::select('fk_cat_materias')->where('fk_periodo',$periodo->id_periodo_escolar)->where('fk_cat_carrera',$_POST['id_carrera'])->get();

			$examen[] = array();
			$cont = 0;
			if(count($consultaHistoria) > 0){
				foreach($consultaHistoria as $key){
					if(isset($examen[$cont]['fk_cat_materias'])){
						if($examen[$cont]['fk_cat_materias'] == $key['fk_cat_materias']){
							$examen[$cont]['cursado'] += 1;
							$examen[$cont]['calificacion'] = ($key['calificacion'] == 'NA' ? ($examen[$cont]['cursado'] > 2 ? 'er' : 'e') : $key['calificacion']);
							$examen[$cont]['color'] = $examen[$cont]['calificacion'] == 'er' ? 'bg-cuadricula-rojo' : ($examen[$cont]['calificacion'] == 'e' ? 'bg-warning' : ($examen[$cont]['calificacion'] == 'NA' ? 'bg-cuadricula-amarillo' : 'bg-cuadricula-verde'));
						}else{
							$cont ++;
							$examen[$cont]['fk_cat_materias'] = $key['fk_cat_materias'];
							$examen[$cont]['siglas'] = $key['siglas'];
							$examen[$cont]['calificacion'] = $key['calificacion'];
							$examen[$cont]['cursado'] = 1;
							$examen[$cont]['color'] = $examen[$cont]['calificacion'] == 'er' ? 'bg-cuadricula-rojo' : ($examen[$cont]['calificacion'] == 'e' ? 'bg-warning' : ($examen[$cont]['calificacion'] == 'NA' ? 'bg-cuadricula-amarillo' : 'bg-cuadricula-verde'));
						}
					}else{
						$examen[$cont]['fk_cat_materias'] = $key['fk_cat_materias'];
						$examen[$cont]['siglas'] = $key['siglas'];
						$examen[$cont]['calificacion'] = $key['calificacion'];
						$examen[$cont]['cursado'] = 1;
						$examen[$cont]['color'] = $examen[$cont]['calificacion'] == 'er' ? 'bg-cuadricula-rojo' : ($examen[$cont]['calificacion'] == 'e' ? 'bg-warning' : ($examen[$cont]['calificacion'] == 'NA' ? 'bg-cuadricula-amarillo' : 'bg-cuadricula-verde'));
					}
				}
			}
			if(count($consultaSelec) > 0){
			 	foreach($consultaSelec as $key){
			 		$cont ++;
			 		$examen[$cont]['fk_cat_materias'] = $key['fk_cat_materias'];
			 		$examen[$cont]['siglas'] = '';
					$examen[$cont]['id_seleccion_materias'] = $key['id_seleccion_materias'];
			 		$examen[$cont]['calificacion'] = $key['calificacion'];
					$examen[$cont]['color'] = 'bg-cuadricula-morado';
					$examen[$cont]['fk_numero_control'] = $key['fk_numero_control'];
					$examen[$cont]['fk_grupo'] = $key['fk_grupo'];
			 	}
			}
			echo json_encode([$consulta,$examen,$horario]);
		}

		static function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin, $aula) {
            return $dia == $dia_tabla ? '<p class="horario">'.$hora_inicio .'-'. $hora_fin .'<b class="aula">/'. $aula .'</b></p>' : ''; 
        }

		static function precargar_materia(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = TablaHorario::select('dia','hora_inicio','hora_fin','t_grupo.estatus_grupo','t_grupo.nombre_grupo','t_cat_materias.nombre_completo_materia','t_cat_aulas.aula','t_grupo.fk_personal','t_grupo.id_grupo','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_horario.fk_periodo_escolar',$periodo->id_periodo_escolar)->get();

			if(count($consulta) > 0){
				$i = 0;
				foreach ($consulta as $aux){
					if(isset($horario)){
						if($horario[($i-1)]['nombre'] == $aux['nombre_completo_materia'] && $horario[($i-1)]['nombre_grupo'] == $aux['nombre_grupo']){
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
							$horario[$i]['id_grupo'] = $aux['id_grupo'];
							$horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
							$horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
							$horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
							$horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
							$horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
							$horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
							$horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
							$horario[$i]['nombre'] = $aux['nombre_completo_materia'];
							$horario[$i]['estatus_grupo'] = $aux['estatus_grupo'];
							$horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
							$i++;
						}
					}else {					
						$horario[$i]['id_grupo'] = $aux['id_grupo'];
						$horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						$horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
						$horario[$i]['nombre'] = $aux['nombre_completo_materia'];
						$horario[$i]['estatus_grupo'] = $aux['estatus_grupo'];
						$horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
						$i++;
					}
				}
			}else{
				$horario = [];
			}
			echo json_encode($horario);
		}
		static function crear_cal_unidad($grupo){
			$consulta = TablaGrupo::select('t_grupo.fk_periodo','t_grupo.fk_cat_materias','t_cat_materias.no_unidades','t_grupo.fk_personal')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('id_grupo',$grupo)->first();
			$unidades[] = array();
			$unidad = 1;
			for($i = 0; $i < intval($consulta->no_unidades); $i++){
				$unidades[$i]['no_unidad'] = $unidad;
				$unidades[$i]['fk_cat_materias'] = $consulta->fk_cat_materias;
				$unidades[$i]['fk_periodo_escolar'] = $consulta->fk_periodo;
				$unidades[$i]['fk_grupo'] = $grupo;
				$unidades[$i]['fk_personal'] = $consulta->fk_personal;
				$unidades[$i]['fk_numero_control'] = $_POST['id_hr_alumno'];
				$unidades[$i]['calificacion_unidad'] = 0;
				$unidad++;
			}
			TablaControlCalificacionesParciales::insert($unidades);
		}
		static function asignar_materia(){
			if(Token::comprobar_token_frm("frm_asignar_materia",$_POST['tk_frm'])){
				$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
				$insercion = new TablaSeleccionMaterias();
				$insercion->fk_cat_periodo = $periodo->id_periodo_escolar;
				$insercion->fk_numero_control = $_POST['id_hr_alumno'];
				$insercion->fk_grupo = $_POST['id_grupo'];
				if($insercion->save()){
					self::crear_cal_unidad($_POST['id_grupo']);
					$consulta = TablaGrupo::select('alumnos_inscritos')->where('id_grupo',$_POST['id_grupo'])->first();
					TablaGrupo::where('id_grupo',$_POST['id_grupo'])->update(['alumnos_inscritos'=> intval($consulta->alumnos_inscritos)+1]);
					echo json_encode(["1","Asignacion correcta!"]);
				}else{
					echo json_encode(["0","No se logro la asignacion!"]);
				}
			}else{
				echo json_encode("Solicitud no valida");
			}
		}

		static function retirar_materia(){
			$delete = TablaSeleccionMaterias::where('id_seleccion_materias',$_POST['materia'])->delete();
			$consulta = TablaGrupo::select('alumnos_inscritos')->where('id_grupo',$_POST['id_grupo'])->first();
			TablaGrupo::where('id_grupo',$_POST['id_grupo'])->update(['alumnos_inscritos'=> intval($consulta->alumnos_inscritos)-1]);
			TablaControlCalificacionesParciales::where('t_control_calificaciones_parciales.fk_grupo',$_POST['id_grupo'])->where('fk_numero_control',$_POST['control'])->delete();
			if($delete){
				echo json_encode(["1","Se retiro la materia con exito!"]);
			}else{
				echo json_encode(["0","No se logro retirar la materia!"]);
			}
		}

		static function precargar_horario(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
    		$consulta_horario = TablaSeleccionMaterias::select('dia','hora_inicio','hora_fin','nombre_grupo','t_cat_materias.clave','t_cat_materias.nombre_abreviado_materia','t_cat_materias.creditos_totales','aula','apellido_paterno','apellido_materno','nombre_persona')->join('t_horario','t_seleccion_materias.fk_grupo','t_horario.fk_grupo')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_horario.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_seleccion_materias.fk_numero_control',$_POST['alumno'])->where('t_seleccion_materias.fk_cat_periodo',$periodo->id_periodo_escolar)->get();
			if(count($consulta_horario) > 0){
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
							$horario[$i]['clave'] = $aux['clave'];
							$horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];	
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
						$horario[$i]['clave'] = $aux['clave'];
						$horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
						$i++;
					}
				}
			}else{
				$horario = [];
			}
			echo json_encode($horario);
		}

		static function validacion_alumno(){
			
		}
	}
	call_user_func('InscripcionPeriodo::'.$_POST['funcion']);
?>