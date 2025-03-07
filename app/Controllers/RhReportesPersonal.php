<?php
	use config\Token;
	use config\Sesion;
	use model\TablaPersonal;
	use model\CatalogoOrganigrama;
	use model\CatalogoCategoria;
	require_once realpath('../../vendor/autoload.php');

	class RhReportesPersonal {
		static function mostrarInfo(){
			$consulta=TablaPersonal::select('id_personal','rfc','nombre_persona','apellido_paterno','apellido_materno','curp','inicio_sep')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('estatus_eliminado','0')->get();
			echo json_encode($consulta);
		}
		static function mostrarInfoSituacion(){
			$consulta = TablaPersonal::select('id_personal','rfc','nombre_persona','apellido_paterno','apellido_materno','rfc','t_cat_organigrama.descripcion','descripcion_puesto','grado_maximo_estudio')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_puestos','t_personal.fk_cat_puestos','t_cat_puestos.id_cat_puestos')->join('t_cat_organigrama','t_personal.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('estatus_eliminado','0')->get();
			echo json_encode($consulta);
		}
		static function mostrarInfoFichas(){
			$consulta = TablaPersonal::select('id_personal','numero_tarjeta','nombre_persona','apellido_paterno','rfc','apellido_materno','descripcion_estatus')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_estatus','t_personal.fk_cat_estatus','t_cat_estatus.id_cat_estatus')->where('estatus_eliminado','0')->get();
			echo json_encode($consulta);
		}
		static function mostrarPlantilla(){
			$consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->get();
			echo json_encode($consulta);
		}
		static function personalEstructura(){
			$consulta = TablaPersonal::select('id_personal','nombre_persona','apellido_paterno','apellido_materno','t_cat_organigrama.descripcion')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_organigrama','t_personal.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('estatus_eliminado','0')->get();
			echo json_encode($consulta);
		}
		static function obtenerCategoria(){
			$consulta = CatalogoCategoria::select('id_cat_categorias','descripcion','categoria')->get();
			echo '<option value="" selected>Seleccionar la categoria</option>';
			foreach($consulta as $categoria){
				echo '<option value="'.$categoria['categoria'].'">'.$categoria['descripcion'].'</option>';
			}
		}
		static function consultarPersonalPuesto(){
			$consulta = TablaPersonal::select('id_personal','nombre_persona','apellido_paterno','apellido_materno','t_cat_organigrama.descripcion','descripcion_puesto','estudios')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_organigrama','t_personal.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->join('t_cat_puestos','t_personal.fk_cat_puestos','t_cat_puestos.id_cat_puestos')->where('fk_cat_puestos',$_POST['filtro'])->get();
			echo json_encode($consulta);
		}
	}
	call_user_func('RhReportesPersonal::'.$_POST['funcion']);
