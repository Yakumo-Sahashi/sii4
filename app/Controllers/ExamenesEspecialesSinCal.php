<?php
	use config\Token;
	use config\Sesion;
	use model\TablaMateriaSolEspecial;
	use model\TablaPeriodoEscolar;
	use model\TablaSolExamenEspecial;
	require_once realpath('../../vendor/autoload.php');

	class ExamenesEspecialesSinCal {
		static function consultar_materia($id_materia,$periodo){
			$consulta = TablaMateriaSolEspecial::select('t_persona.apellido_paterno','t_persona.apellido_materno','t_persona.nombre_persona','t_persona.rfc')->join('t_personal','t_materia_solicitada_especial.fk_personal_presidente','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_materia_solicitada_especial.fk_cat_materias',$id_materia)->where('t_materia_solicitada_especial.fk_periodo_escolar',$periodo)->first();
			return empty($consulta) ? [] :$consulta;
		}

		static function consultar_examenes_sin_cal(){
			$i = 0;
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado', '1')->first();
			$consulta = TablaSolExamenEspecial::select('t_solicitudes_ex_especiales.fk_cat_materias','nombre_completo_materia','clave_oficial')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$periodo->id_periodo_escolar)->where('t_cat_materias.fk_cat_organigrama',Sesion::datos_sesion('depto'))->where('t_solicitudes_ex_especiales.calificacion_especial','0')->orderBy('t_solicitudes_ex_especiales.fk_cat_materias','desc')->get();
			
			foreach($consulta as $examen){
				if(!isset($materias)){
					$materias[$i]['materia'] = $examen['nombre_completo_materia'];
					$materias[$i]['clave_oficial'] = $examen['clave_oficial'];
					$materias[$i]['solicitud'] = self::consultar_materia($examen->fk_cat_materias,$periodo->id_periodo_escolar);
					$i++;
				}else{
					if($materias[($i-1)]['materia'] != $examen['nombre_completo_materia']){
						$materias[$i]['materia'] = $examen['nombre_completo_materia'];
						$materias[$i]['clave_oficial'] = $examen['clave_oficial'];
						$materias[$i]['solicitud'] = self::consultar_materia($examen->fk_cat_materias,$periodo->id_periodo_escolar);
						$i++;
					}
				}
			}

			if(count($consulta) > 0){
				echo json_encode($materias);
			}else{
				echo json_encode([]);
			}
		}	
	}
	call_user_func('ExamenesEspecialesSinCal::'.$_POST['funcion']);
?>