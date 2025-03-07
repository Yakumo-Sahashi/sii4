<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoOrganigrama;
	use model\TablaGrupo;
	use model\TablaSeleccionMaterias;
	use model\TablaHorario;
	require_once realpath('../../vendor/autoload.php');

	class ListaAsistencia {
		static function consulta_filtrada(){
			$consulta = TablaGrupo::select('id_grupo','rfc','nombre_persona','apellido_paterno','apellido_materno','nombre_completo_materia','clave','nombre_grupo','alumnos_inscritos','t_cat_organigrama.descripcion','identificacion_corta')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_organigrama','t_cat_materias.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->join('t_periodo_escolar','t_grupo.fk_periodo','t_periodo_escolar.id_periodo_escolar')->where('t_grupo.fk_periodo',$_POST['periodo'])->where('t_cat_materias.fk_cat_organigrama',$_POST['departamento'])->get();
			echo json_encode($consulta);
		}
		static function organigrama_materias(){
			echo '<option value="">Seleccionar area</option>';
			$consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->where('nivel','4')->where('tipo_area','D')->where('estado','1')->get();
			foreach($consulta as $departamento){
				echo '<option value="' . $departamento['id_cat_organigrama'] . '">' . $departamento['descripcion'] . '</option>';
			}
		}
		static function consultar_lista_asistencia(){
			$consulta_alumnos = TablaSeleccionMaterias::select('numero_control','nombre_persona','apellido_paterno','apellido_materno')->join('t_numero_control','t_seleccion_materias.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_seleccion_materias.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->where('t_seleccion_materias.fk_grupo',$_POST['id'])->get();
			$consulta_horario = TablaHorario::select('dia','hora_inicio','hora_fin','aula')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->where('t_horario.fk_grupo',$_POST['id'])->get();
			echo json_encode([$consulta_alumnos,$consulta_horario]);
		}
	}
	call_user_func('listaAsistencia::'.$_POST['funcion']);
?>