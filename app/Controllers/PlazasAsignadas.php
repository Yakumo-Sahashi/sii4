<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoOrganigrama;
	use model\TablaPersonal;

	require_once realpath('../../vendor/autoload.php');

	class PlazasAsignadas {
		static function organigrama_materias(){
			$consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->where('id_cat_organigrama',Sesion::datos_sesion('depto'))->first();
			echo json_encode($consulta);
		}	
		
		static function plazas_basicas(){
			$consulta = TablaPersonal::select('t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','nombramiento','estudios','t_cat_escolaridad.escolaridad','clave_centro_seit')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_escolaridad','t_personal.fk_cat_escolaridad','t_cat_escolaridad.id_cat_escolaridad')->where('t_personal.fk_cat_organigrama',$_POST['id_area'])->get();
			echo json_encode($consulta);
		}
	}
	call_user_func('PlazasAsignadas::'.$_POST['funcion']);
?>