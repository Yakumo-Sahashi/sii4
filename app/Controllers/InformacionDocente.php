<?php
	use config\Token;
	use config\Sesion;
	use model\TablaGrupo;
    use model\TablaHorario;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');

	class InformacionDocente {
		static function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin, $aula, $id) {
            return $dia == $dia_tabla ? '<spam class="horario">'.$hora_inicio .'-'. $hora_fin .'<br><p class="aula">/'. $aula .'</p></spam>' : ''; 
        }

		static function consultar_horarios(){
            $semestre = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = TablaHorario::select('id_horario','dia','hora_inicio','hora_fin','nombre_grupo','aula','nombre_completo_materia','t_grupo.id_grupo','t_grupo.paralelo_de','t_grupo.capacidad','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','clave','creditos_totales')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_personal.fk_persona',Sesion::datos_sesion('fk_persona'))->where('t_grupo.fk_periodo',$semestre->id_periodo_escolar)->get();
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
                        $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                        $horario[$i]['nombre'] = $aux['nombre_completo_materia'];
						$horario[$i]['clave'] = $aux['clave'];
                        $horario[$i]['creditos_totales'] = $aux['creditos_totales'];
                        $i++;
                    }
                }else {
                    $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                    $horario[$i]['nombre'] = $aux['nombre_completo_materia'];
					$horario[$i]['clave'] = $aux['clave'];
                    $horario[$i]['creditos_totales'] = $aux['creditos_totales'];
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
	call_user_func('InformacionDocente::'.$_POST['funcion']);
?>