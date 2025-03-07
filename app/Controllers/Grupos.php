<?php
	use config\Token;
	use config\Sesion;
	use model\TablaGrupo;
	use model\CatalogoMaterias;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');

	class Grupos {
		static function consultar_grupos(){
			$consulta = TablaGrupo::select()->get();
		}
		
		static function consultar_semestre(){
			$consulta = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->where('estado','1')->first();
            echo json_encode($consulta);
        }

		static function consultar_materia(){
			echo '<option value="">Seleccionar materia</option>';
			$consulta = CatalogoMaterias::select('id_cat_materias','nombre_completo_materia')->where('fk_cat_reticula',$_POST['carrera'])->orderBy('nombre_completo_materia','asc')->get();
            foreach ($consulta as $materia){
                echo '<option value="' . $materia['id_cat_materias'] .'">' . $materia['nombre_completo_materia'] . '</option>';
            }
        }

		static function obtener_datos_materia(){
			$consulta = CatalogoMaterias::select('clave_oficial','creditos_totales','exclusivo_carrera')->where('id_cat_materias',$_POST['materia'])->first();
            echo json_encode($consulta);
        }
		
	}
	call_user_func('Grupos::'.$_POST['funcion']);
?>