<?php
	use config\Token;
	use config\Sesion;
	use model\TablaMateriaSolEspecial;
	use model\TablaPeriodoEscolar;
	use model\TablaSolExamenEspecial;

	require_once realpath('../../vendor/autoload.php');

	class HorariosExamenes {
		static function consultar_materia($id_materia,$periodo){
			$consulta = TablaMateriaSolEspecial::select('id_materia_solicitada_especial','t_cat_aulas.aula','t_persona.apellido_paterno','t_persona.apellido_materno','t_persona.nombre_persona','t_persona.rfc','t_materia_solicitada_especial.hora_inicio','t_materia_solicitada_especial.hora_fin','t_materia_solicitada_especial.fecha_examen')->join('t_cat_aulas','t_materia_solicitada_especial.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_materia_solicitada_especial.fk_personal_presidente','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_materia_solicitada_especial.fk_cat_materias',$id_materia)->where('t_materia_solicitada_especial.fk_periodo_escolar',$periodo)->first();
			return empty($consulta) ? [] :$consulta;
		}

		static function contar_alumnos($materia,$periodo){
			$consulta = TablaSolExamenEspecial::select('id_solicitudes_ex_especiales')->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$periodo)->where('t_solicitudes_ex_especiales.fk_cat_materias',$materia)->get();
			return $consulta->count();
		}
		static function consultar_examenes(){
			$materias[] = array();
			$i = 0;
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado', '1')->first();
			$consulta = TablaSolExamenEspecial::select('t_solicitudes_ex_especiales.fk_cat_materias','nombre_completo_materia')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$periodo->id_periodo_escolar)->where('t_cat_materias.fk_cat_organigrama',Sesion::datos_sesion('depto'))->distinct()->get(['t_solicitudes_ex_especiales.fk_cat_materias']);
			
			foreach($consulta as $examen){
				$materias[$i]['materia'] = $examen['nombre_completo_materia'];
				$materias[$i]['id_materia'] = $examen['fk_cat_materias'];
				$materias[$i]['alumnos'] = self::contar_alumnos($examen->fk_cat_materias,$periodo->id_periodo_escolar);
				$materias[$i]['solicitud'] = self::consultar_materia($examen->fk_cat_materias,$periodo->id_periodo_escolar);
				$i++;
			}

			if(count($consulta) > 0){
				echo json_encode($materias);
			}else{
				echo json_encode([]);
			}
		}	

		static function consultar_solicitud(){
			$consulta = TablaMateriaSolEspecial::select('id_materia_solicitada_especial','fk_cat_aulas','fk_personal_presidente','fk_personal_secretaria','fk_personal_vocal','hora_inicio','hora_fin','fecha_examen')->where('id_materia_solicitada_especial',$_POST['id_solicitud'])->first();
			echo json_encode($consulta);
		}	

		static function asignar_horario(){
			if(empty($_POST['id_sol_examen'])){
				$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado', '1')->first();
				$insercion = new TablaMateriaSolEspecial();
				$insercion->fk_periodo_escolar = $periodo->id_periodo_escolar;
				$insercion->fk_cat_materias = $_POST['id_materia'];
				$insercion->fk_cat_aulas = $_POST['aula'];
				$insercion->fk_personal_presidente = $_POST['select_presidente'];
				$insercion->fk_personal_secretaria = $_POST['select_secretario'];
				$insercion->fk_personal_vocal = $_POST['select_vocal'];
				$insercion->hora_inicio = $_POST['hora_inicio'] < 10 ? '0'. $_POST['hora_inicio'] . ':00' : '' . $_POST['hora_inicio'] . ':00';
				$insercion->hora_fin = $_POST['hora_fin'];
				$insercion->fecha_examen = $_POST['fecha_examen'];
				if($insercion->save()){
					echo json_encode(['1',"Asigancion de horario completada con exito!"]);
				}else{
					echo json_encode(['0',"No se ha logrado la asigancion de horario!"]);
				}
			}else{
				TablaMateriaSolEspecial::where('id_materia_solicitada_especial',$_POST['id_sol_examen'])->update(['fk_cat_aulas' => $_POST['aula'],'fk_personal_presidente' => $_POST['select_presidente'],'fk_personal_secretaria' => $_POST['select_secretario'],'fk_personal_vocal' => $_POST['select_vocal'],'hora_inicio' => $_POST['hora_inicio'] < 10 ? '0'. $_POST['hora_inicio'] . ':00' : '' . $_POST['hora_inicio'] . ':00','hora_fin' => $_POST['hora_fin'],'fecha_examen' => $_POST['fecha_examen']]);
				echo json_encode(['1',"Acutalizacion de asigancion de horario completada con exito!"]);
			}
		}			
	}
	call_user_func('HorariosExamenes::'.$_POST['funcion']);
?>