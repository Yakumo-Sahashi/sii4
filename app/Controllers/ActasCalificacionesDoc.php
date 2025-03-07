<?php
	use config\Token;
	use config\Sesion;
	use model\TablaPersonal;
	use model\TablaGrupo;
	use model\TablaSolExamenEspecial;

	require_once realpath('../../vendor/autoload.php');

	class ActasCalificacionesDoc {
		static function consultar_docentes(){
			$consulta = TablaPersonal::select('id_personal','t_persona.apellido_paterno','t_persona.apellido_materno','t_persona.nombre_persona','t_persona.rfc')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('nombramiento','D')->get();
			echo '<option value="" selected>Seleccionar docente</option>';
            foreach($consulta as $docente){
                echo '<option value="'.$docente['id_personal'].'">'.$docente['apellido_paterno'].' '.$docente['apellido_materno'].' '.$docente['nombre_persona'].' / '.$docente['rfc'].'</option>';
            }
		}
		
		static function consultar_materias_normal(){
			$consulta = TablaGrupo::select('id_grupo','t_grupo.fk_cat_materias','nombre_grupo','nombre_completo_materia','clave_oficial','alumnos_inscritos')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_grupo.fk_periodo',$_POST['periodo_docente_normal'])->where('t_grupo.fk_personal',$_POST['docente_docente_normal'])->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}

		static function consultar_examenes_periodo(){
			$consulta = TablaSolExamenEspecial::select('id_solicitudes_ex_especiales','t_solicitudes_ex_especiales.fk_cat_materias','nombre_completo_materia','clave_oficial')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_solicitudes_ex_especiales.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$_POST['periodo_exam_docente'])->where('',$_POST['docente_exam_docente'])->orderBy('t_solicitudes_ex_especiales.fk_cat_materias','asc')->get();
			if(count($consulta) > 0){
				$i = 0;
				foreach($consulta as $examen){
					if(!isset($examenes)){
						$examenes[$i]['id_solicitudes_ex_especiales'] = $examen['id_solicitudes_ex_especiales'];
						$examenes[$i]['fk_cat_materias'] = $examen['fk_cat_materias'];
						$examenes[$i]['nombre_completo_materia'] = $examen['nombre_completo_materia'];
						$examenes[$i]['clave_oficial'] = $examen['clave_oficial'];
						$examenes[$i]['inscritos'] = 1;
					}else{
						if($examen['fk_cat_materias'] == $examenes[$i]['fk_cat_materias']){
							$examenes[$i]['inscritos'] ++;								
						}else{
							$i++;
							$examenes[$i]['id_solicitudes_ex_especiales'] = $examen['id_solicitudes_ex_especiales'];
							$examenes[$i]['fk_cat_materias'] = $examen['fk_cat_materias'];
							$examenes[$i]['nombre_completo_materia'] = $examen['nombre_completo_materia'];
							$examenes[$i]['clave_oficial'] = $examen['clave_oficial'];
							$examenes[$i]['inscritos'] = 1;
						}
					}
				}
				if(isset($examenes)){
					echo json_encode($examenes);
				}else{
					echo json_encode([]);
				}
			}else{
				echo json_encode([]);
			}
		}
	}
	call_user_func('ActasCalificacionesDoc::'.$_POST['funcion']);
?>