<?php
	use config\Token;
	use config\Sesion;
	use model\TablaGrupo;
	use model\TablaPeriodoEscolar;
	use model\TablaHorario;
	use model\TablaPersonal;
    use model\TablaPrestamosMaestros;

	require_once realpath('../../vendor/autoload.php');

	class AsignacionGrupo {
		static function obtener_periodo(){
            $consulta = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->where('estado', '1')->first();
            echo json_encode($consulta);
        }

		static function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin, $aula, $id) {
            return $dia == $dia_tabla ? '<spam class="horario">'.$hora_inicio .'-'. $hora_fin .'<br><p class="aula">/'. $aula .'</p></spam>' : ''; 
        }

		static function consultar_horarios(){
            $semestre = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = $_POST['semestre'] != '0' ? TablaHorario::select('id_horario','dia','hora_inicio','hora_fin','nombre_grupo','aula','nombre_completo_materia','t_grupo.id_grupo','t_grupo.paralelo_de','t_grupo.capacidad','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','t_grupo.alumnos_inscritos','t_grupo.fk_personal','t_persona.rfc')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_grupo.fk_cat_carrera',$_POST['carrera_reticula'])->where('t_grupo.semestre',$_POST['semestre'])->where('t_grupo.fk_periodo',$semestre->id_periodo_escolar)->where('t_cat_materias.fk_cat_organigrama',Sesion::datos_sesion('depto'))->get() : TablaHorario::select('id_horario','dia','hora_inicio','hora_fin','nombre_grupo','aula','nombre_completo_materia','t_grupo.id_grupo','t_grupo.paralelo_de','t_grupo.capacidad','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','t_grupo.alumnos_inscritos','t_grupo.fk_personal','t_persona.rfc')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_grupo.fk_cat_carrera',$_POST['carrera_reticula'])->where('t_grupo.fk_periodo',$semestre->id_periodo_escolar)->where('t_cat_materias.fk_cat_organigrama',Sesion::datos_sesion('depto'))->get();
            $i = 0;
            foreach ($consulta as $aux){
                if(isset($horario)){
                    if($horario[($i-1)]['nombre'] == $aux['nombre_completo_materia'] && $horario[($i-1)]['nombre_grupo'] == $aux['nombre_grupo']){
                        switch($aux['dia']){
                            case 'lunes': {
                                $horario[($i-1)]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'martes': {
                                $horario[($i-1)]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'miercoles': {
                                $horario[($i-1)]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'jueves': {
                                $horario[($i-1)]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'viernes': {
                                $horario[($i-1)]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'sabado': {
                                $horario[($i-1)]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                        }
                    }else {
                        $horario[$i]['id_horario'] = $aux['id_horario'];
                        $horario[$i]['id_grupo'] = $aux['id_grupo'];
						$horario[$i]['fk_personal'] = $aux['fk_personal'];
                        $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                        $horario[$i]['nombre'] = $aux['nombre_completo_materia'];
                        $horario[$i]['paralelo_de'] = $aux['paralelo_de'];
                        $horario[$i]['docente'] = $aux['apellido_paterno'] .' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
                        $horario[$i]['capacidad'] = $aux['capacidad'];
						$horario[$i]['alumnos_inscritos'] = $aux['alumnos_inscritos'];
						$horario[$i]['rfc'] = $aux['rfc'];
                        $i++;
                    }
                }else {
                    $horario[$i]['id_horario'] = $aux['id_horario'];
                    $horario[$i]['id_grupo'] = $aux['id_grupo'];
					$horario[$i]['fk_personal'] = $aux['fk_personal'];
                    $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                    $horario[$i]['nombre'] = $aux['nombre_completo_materia'];
                    $horario[$i]['paralelo_de'] = $aux['paralelo_de'];
                    $horario[$i]['docente'] = $aux['apellido_paterno'] .' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
                    $horario[$i]['capacidad'] = $aux['capacidad'];
					$horario[$i]['alumnos_inscritos'] = $aux['alumnos_inscritos'];
					$horario[$i]['rfc'] = $aux['rfc'];
                    $i++;
                }
            }
            if(isset($horario)){
                echo json_encode($horario);
            }else{
                echo json_encode([]);
            }        
        }

		static function consultar_docentes(){
            $periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado', '1')->first();
			echo '<option value="" selected>Seleccionar docente</option>';
            $consulta = TablaPersonal::select('id_personal','apellido_paterno','apellido_materno','nombre_persona','rfc')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_personal.fk_cat_organigrama',Sesion::datos_sesion('depto'))->get();
            $consulta2 = TablaPrestamosMaestros::select('t_prestamos_maestros.fk_personal','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','t_persona.rfc')->join('t_personal','t_prestamos_maestros.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->where('t_prestamos_maestros.fk_cat_organigrama',Sesion::datos_sesion('depto'))->get();
			
            foreach($consulta as $docente){
				echo '<option value="'.$docente->id_personal.'">'.$docente->apellido_paterno.' '.$docente->apellido_materno.' '.$docente->nombre_persona.' / <b class="text-small">'.$docente->rfc.'</b></option>';
			}
            foreach($consulta2 as $docente){
				echo '<option value="'.$docente->fk_personal.'">'.$docente->apellido_paterno.' '.$docente->apellido_materno.' '.$docente->nombre_persona.' / <b class="text-small">'.$docente->rfc.'</b></option>';
			}
        }

		static function precargar_materia(){
			$consulta = TablaGrupo::select('nombre_grupo','t_cat_materias.nombre_completo_materia')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('id_grupo',$_POST['id'])->first();
			echo json_encode($consulta);
		}

        static function consultar_dispobilidad_horario(){
            $periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado', '1')->first();
            $horarioPorAsignar = TablaHorario::select('t_horario.id_horario','dia','hora_inicio','hora_fin')->where('t_horario.fk_grupo',$_POST['id_grupo_add'])->where('t_horario.fk_periodo_escolar',$periodo->id_periodo_escolar)->get();
			$consulta = TablaHorario::select('t_horario.id_horario','dia','hora_inicio','hora_fin')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->where('t_grupo.fk_personal',$_POST['select_docente'])->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->get();
            if(count($consulta) > 0){
                $respuesta = 1;
                $hora_ini = 0;
                $hora_fn = 0;
                if (!isset($_POST['permitir_cruce'])) {
                    foreach($consulta as $horario){
                        $hora_ini = intval($horario['hora_inicio']);
                        $hora_fn =  intval($horario['hora_fin']);
                        foreach($horarioPorAsignar as $asignacion){
                            if($horario['id_horario'] != $asignacion['id_horario']){
                                if($horario['dia'] == $asignacion['dia']){
                                    if($hora_ini == intval($asignacion['hora_inicio'])){
                                        $respuesta ++;      
                                    }                    
                                    if(($hora_fn > intval($asignacion['hora_inicio'])) && ($hora_ini < intval($asignacion['hora_inicio']))){
                                        $respuesta ++;      
                                    }
                                    if(($hora_fn >= intval($asignacion['hora_fin'])) && (intval($asignacion['hora_fin']) > $hora_ini)){
                                        $respuesta ++;
                                    }
                                }
                            }
                        }
                    }
                } 
                return $_POST['select_docente'] == 0 ? 1 : $respuesta;
            }else{
                return 1;
            }
        }

        static function asignar_docente(){
            if(self::consultar_dispobilidad_horario() == 1){
                $update = TablaGrupo::where('id_grupo',$_POST['id_grupo_add'])->update(['fk_personal'=>$_POST['select_docente']]);
                if($update){
                    echo json_encode(['1',"Asiganción de docente a grupo completada con exito!"]);
                }else{
                    echo json_encode(['0',"No se asigano de docente al grupo!"]);
                }
            }else{
                echo json_encode(['0',"El docente ya tiene una materia asignada en los horarios seleccionados!"]);
            }
		}
		
	}
	call_user_func('AsignacionGrupo::'.$_POST['funcion']);
?>