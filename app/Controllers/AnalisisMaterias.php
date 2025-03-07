<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoMaterias;
	require_once realpath('../../vendor/autoload.php');

	class AnalisisMaterias {
		static function obtener_materias(){
			$consulta = CatalogoMaterias::select('id_cat_materias','clave','nombre_abreviado_materia','semestre','renglon','creditos_teorica','creditos_practica','creditos_totales')->where('fk_cat_reticula',$_POST['carrera_consulta'])->where('fk_cat_especialidad','0')->whereBetween('semestre',[1, 9])->where('estatus_materias_carrera','A')->orWhere('fk_cat_especialidad',$_POST['especialidad_consulta'])->where('estatus_materias_carrera','A')->orderBy('semestre','asc')->get();
			echo json_encode($consulta);
		}		
	}
	call_user_func('AnalisisMaterias::'.$_POST['funcion']);
?>