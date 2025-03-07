<?php
	use config\Token;
	use config\Sesion;
	use model\TablaGrupo;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');

	class DocumentosDocente {
		static function consulta_materias(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado', '1')->first();
			$consulta = TablaGrupo::select('id_grupo','rfc','nombre_persona','apellido_paterno','apellido_materno','nombre_completo_materia','clave','nombre_grupo','alumnos_inscritos','t_cat_organigrama.descripcion','identificacion_corta','t_grupo.fk_cat_carrera','t_grupo.fk_cat_materias')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_organigrama','t_cat_materias.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->join('t_periodo_escolar','t_grupo.fk_periodo','t_periodo_escolar.id_periodo_escolar')->where('t_grupo.fk_periodo',$periodo->id_periodo_escolar)->where('t_persona.id_persona',Sesion::datos_sesion('fk_persona'))->get();
			echo json_encode($consulta);
		}		
	}
	call_user_func('DocumentosDocente::'.$_POST['funcion']);
?>