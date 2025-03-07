<?php
	use config\Token;
	use config\Sesion;
	use model\TablaHorario;
	require_once realpath('../../vendor/autoload.php');

	class CBGruposCarrera {
		static function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin, $aula, $id) {
            return $dia == $dia_tabla ? '<b>'.$hora_inicio .'<br>'. $hora_fin .'</b><br>'. $aula : ''; 
        }

		static function consultar_general(){
			$consulta = $_POST['seleccion_semestre_carrera'] == 0 ? TablaHorario::select('dia','hora_inicio','hora_fin','nombre_grupo','aula','t_grupo.capacidad','nombre_completo_materia','clave_oficial','nombre_persona','apellido_paterno','apellido_materno','rfc','t_grupo.paralelo_de')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_grupo.fk_periodo',$_POST['seleccion_periodo_carrera'])->where('t_grupo.fk_cat_carrera',$_POST['seleccion_carrera'])->get() : TablaHorario::select('dia','hora_inicio','hora_fin','nombre_grupo','aula','t_grupo.capacidad','nombre_completo_materia','clave_oficial','nombre_persona','apellido_paterno','apellido_materno','rfc','t_grupo.paralelo_de')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_grupo.fk_periodo',$_POST['seleccion_periodo_carrera'])->where('t_grupo.fk_cat_carrera',$_POST['seleccion_carrera'])->where('t_grupo.semestre',$_POST['seleccion_semestre_carrera'])->get();
            $i = 0;
            foreach ($consulta as $aux){
                if(isset($horario)){
                    if($horario[($i-1)]['nombre'] == $aux['nombre_completo_materia'] && $horario[($i-1)]['nombre_grupo'] == $aux['nombre_grupo']){
                        switch($aux['dia']){
                            case 'lunes': {
                                $horario[($i-1)]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'martes': {
                                $horario[($i-1)]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'miercoles': {
                                $horario[($i-1)]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'jueves': {
                                $horario[($i-1)]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'viernes': {
                                $horario[($i-1)]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'sabado': {
                                $horario[($i-1)]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                        }
                    }else {
                        $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                        $horario[$i]['nombre'] = $aux['nombre_completo_materia'];
                        $horario[$i]['creditos_totales'] = $aux['creditos_totales'];
						$horario[$i]['nombre_docente'] = $aux['apellido_paterno'].' '. $aux['apellido_materno'].' '. $aux['nombre_persona'];
						$horario[$i]['rfc'] = $aux['rfc'];
						$horario[$i]['capacidad'] = $aux['capacidad'];
						$horario[$i]['clave_oficial'] = $aux['clave_oficial'];
                        $horario[$i]['paralelo_de'] = $aux['paralelo_de'];
                        $i++;
                    }
                }else {
                    $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                    $horario[$i]['nombre'] = $aux['nombre_completo_materia'];
                    $horario[$i]['creditos_totales'] = $aux['creditos_totales'];
					$horario[$i]['nombre_docente'] = $aux['apellido_paterno'].' '. $aux['apellido_materno'].' '. $aux['nombre_persona'];
					$horario[$i]['rfc'] = $aux['rfc'];
					$horario[$i]['capacidad'] = $aux['capacidad'];
					$horario[$i]['clave_oficial'] = $aux['clave_oficial'];
                    $horario[$i]['paralelo_de'] = $aux['paralelo_de'];
                    $i++;
                }
            }
            if(isset($horario)){
                echo json_encode($horario);
            }else{
                echo json_encode([]);
            }
		}

        static function consultar_depto(){
			$consulta = $_POST['seleccion_semestre_dep'] == 0 ? TablaHorario::select('dia','hora_inicio','hora_fin','nombre_grupo','aula','t_grupo.capacidad','nombre_completo_materia','clave_oficial','nombre_persona','apellido_paterno','apellido_materno','rfc','t_grupo.paralelo_de','t_grupo.alumnos_inscritos')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_grupo.fk_periodo',$_POST['seleccion_periodo_dep'])->where('t_grupo.fk_cat_carrera',$_POST['seleccion_carrera_dep'])->where('t_cat_materias.fk_cat_organigrama',$_POST['seleccion_departamento'])->get() : TablaHorario::select('dia','hora_inicio','hora_fin','nombre_grupo','aula','t_grupo.capacidad','nombre_completo_materia','clave_oficial','nombre_persona','apellido_paterno','apellido_materno','rfc','t_grupo.paralelo_de','t_grupo.alumnos_inscritos')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_grupo.fk_periodo',$_POST['seleccion_periodo_dep'])->where('t_grupo.fk_cat_carrera',$_POST['seleccion_carrera_dep'])->where('t_grupo.semestre',$_POST['seleccion_semestre_dep'])->where('t_cat_materias.fk_cat_organigrama',$_POST['seleccion_departamento'])->get();
            $i = 0;
            foreach ($consulta as $aux){
                if(isset($horario)){
                    if($horario[($i-1)]['nombre'] == $aux['nombre_completo_materia'] && $horario[($i-1)]['nombre_grupo'] == $aux['nombre_grupo']){
                        switch($aux['dia']){
                            case 'lunes': {
                                $horario[($i-1)]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'martes': {
                                $horario[($i-1)]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'miercoles': {
                                $horario[($i-1)]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'jueves': {
                                $horario[($i-1)]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'viernes': {
                                $horario[($i-1)]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                            case 'sabado': {
                                $horario[($i-1)]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                                break;
                            }
                        }
                    }else {
                        $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                        $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                        $horario[$i]['nombre'] = $aux['nombre_completo_materia'];
                        $horario[$i]['creditos_totales'] = $aux['creditos_totales'];
						$horario[$i]['nombre_docente'] = $aux['apellido_paterno'].' '. $aux['apellido_materno'].' '. $aux['nombre_persona'];
						$horario[$i]['rfc'] = $aux['rfc'];
						$horario[$i]['capacidad'] = $aux['capacidad'];
						$horario[$i]['clave_oficial'] = $aux['clave_oficial'];
                        $horario[$i]['paralelo_de'] = $aux['paralelo_de'];
                        $horario[$i]['alumnos_inscritos'] = $aux['alumnos_inscritos'];
                        $i++;
                    }
                }else {
                    $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'],'');
                    $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                    $horario[$i]['nombre'] = $aux['nombre_completo_materia'];
                    $horario[$i]['creditos_totales'] = $aux['creditos_totales'];
					$horario[$i]['nombre_docente'] = $aux['apellido_paterno'].' '. $aux['apellido_materno'].' '. $aux['nombre_persona'];
					$horario[$i]['rfc'] = $aux['rfc'];
					$horario[$i]['capacidad'] = $aux['capacidad'];
					$horario[$i]['clave_oficial'] = $aux['clave_oficial'];
                    $horario[$i]['paralelo_de'] = $aux['paralelo_de'];
                    $horario[$i]['alumnos_inscritos'] = $aux['alumnos_inscritos'];
                    $i++;
                }
            }
            if(isset($horario)){
                echo json_encode($horario);
            }else{
                echo json_encode([]);
            }
		}
	}
	call_user_func('CBGruposCarrera::'.$_POST['funcion']);
?>