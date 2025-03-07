<?php
	use config\Token;
	use config\Sesion;
	use model\TablaGrupo;

	require_once realpath('../../vendor/autoload.php');

	class GrupoBase {
		static function filtrar_contenido(){
			if(isset($_POST['tipo_filtro']) == "carrera"){
				$consulta = TablaGrupo::select('clave_oficial','nombre_grupo','nombre_completo_materia','nombre_persona','apellido_paterno','apellido_materno','capacidad','estatus_grupo','alumnos_inscritos')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_personal','fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_periodo_escolar','t_grupo.fk_periodo','t_periodo_escolar.id_periodo_escolar')->where('fk_cat_carrera',$_POST['filtro_carrera'])->where('estado','1')->get();
			}else{
				$consulta = TablaGrupo::select('clave_oficial','nombre_grupo','nombre_completo_materia','nombre_persona','apellido_paterno','apellido_materno','capacidad','estatus_grupo','alumnos_inscritos')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_personal','fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_periodo_escolar','t_grupo.fk_periodo','t_periodo_escolar.id_periodo_escolar')->where('estado','1')->get();
			}
			echo json_encode($consulta);
		}
	}
	call_user_func('GrupoBase::'.$_POST['funcion']);
?>