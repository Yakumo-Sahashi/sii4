<?php
	use config\Token;
	use config\Sesion;
	use model\TablaGrupo;
	use model\TablaSeleccionMaterias;
	use model\TablaControlCalificacionesParciales;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');

	class CapturaCalificacionDocente {
		static function consultar_calificacion_parcial($control,$grupo){
			$consulta = TablaControlCalificacionesParciales::select('calificacion_unidad','no_unidad','fk_numero_control')->where('fk_numero_control',$control)->where('fk_grupo',$grupo)->get();
			return $consulta;
		}
		static function consultar_alumnos_materia(){
			$listado[] = array();
			$i = 0;
			$materia = TablaGrupo::select('id_grupo','t_periodo_escolar.identificacion_corta','nombre_completo_materia','t_cat_materias.no_unidades','t_grupo.nombre_grupo')->join('t_periodo_escolar','t_grupo.fk_periodo','t_periodo_escolar.id_periodo_escolar')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('id_grupo',$_POST['grupo'])->first();
			$consulta = TablaSeleccionMaterias::select('id_seleccion_materias','numero_control','nombre_persona','apellido_paterno','apellido_materno','t_seleccion_materias.fk_numero_control')->join('t_numero_control','t_seleccion_materias.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_seleccion_materias.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->where('t_seleccion_materias.fk_grupo',$_POST['grupo'])->orderBy('t_persona.apellido_paterno','asc')->get();

			foreach($consulta as $alumno){
				$listado[$i]['nombre_alumno'] = $alumno['apellido_paterno'] .' '.$alumno['apellido_materno'] .' '.$alumno['nombre_persona'];
				$listado[$i]['control'] = $alumno['numero_control'];
				$listado[$i]['fk_control'] = $alumno['fk_numero_control']; 
				$listado[$i]['calificaciones'] = self::consultar_calificacion_parcial($alumno['fk_numero_control'],$_POST['grupo']);
				$i++;
			}
			echo json_encode([$materia,$listado]);

		}
		static function registrar_calificaciones(){
			$cantidad_alumnos = TablaGrupo::select('t_grupo.alumnos_inscritos')->where('id_grupo',$_POST['grupo_id'])->first();
			for($i = 1; $i <= intval($cantidad_alumnos->alumnos_inscritos); $i++){
				for($j = 1; $j <= intval($_POST['n_unidades']); $j++){
					$id = $_POST['control_'.$i];
					TablaControlCalificacionesParciales::where('fk_numero_control',$id)->where('fk_grupo',$_POST['grupo_id'])->where('no_unidad',$j)->update(['fecha_captura'=> date('y-m-d'),'calificacion_unidad'=>$_POST['u'.$j.'_'.$id] < 70 ? 'NA' : ($_POST['u'.$j.'_'.$id] == "" ? 0 : $_POST['u'.$j.'_'.$id])]);
				}
			}
			echo json_encode(['1','Actualizacion de calificaciones correcta!']);
		}

		static function precargar_alumnos(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->where('estado','1')->first();
			$materia = TablaGrupo::select('nombre_grupo','nombre_persona','apellido_paterno','apellido_materno','nombre_completo_materia')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_grupo.fk_periodo',$periodo->id_periodo_escolar)->first();
			$materia['periodo'] = $periodo->identificacion_corta;

			$permitir = TablaControlCalificacionesParciales::select('calificacion_unidad')->where('fk_cat_materias',$_POST['materia'])->where('t_control_calificaciones_parciales.fk_periodo_escolar',$periodo->id_periodo_escolar)->where('calificacion_unidad','0')->count();

			$consulta = TablaSeleccionMaterias::select('id_seleccion_materias','numero_control','nombre_persona','apellido_paterno','apellido_materno','calificacion','fk_tipo_evaluacion','presento','repeticion')->join('t_numero_control','t_seleccion_materias.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_numero_control.id_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_grupo','t_seleccion_materias.fk_grupo','t_grupo.id_grupo')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_seleccion_materias.fk_cat_periodo',$periodo->id_periodo_escolar)->get();
			if(count($consulta) > 0){
				echo json_encode([$consulta,$materia,$permitir]);
			}else{
				echo json_encode([[],$materia]);
			}
		}
	}
	call_user_func('CapturaCalificacionDocente::'.$_POST['funcion']);
?>