<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoNControl;
	use model\CatalogoOrganigrama;
	use model\TablaAdeudos;
	require_once realpath('../../vendor/autoload.php');

	class Adeudos {
		static function consultar_departamentos(){
			echo '<option value="" selected>Seleccionar</option>';
			$consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->where('estado(P_s)','1')->get();
			foreach ($consulta as $dep) {
				echo '<option value="' . $dep['id_cat_organigrama'] . '">' . $dep['descripcion'] . '</option>';
			}
		}

		static function consultar_adeudos(){
			$consulta = TablaAdeudos::select('id_adeudos','t_periodo_escolar.identificacion_corta','tipo','observaciones')->join('t_numero_control','t_adeudos.fk_numero_control','t_numero_control.id_numero_control')->join('t_periodo_escolar','t_adeudos.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->where('t_numero_control.numero_control',$_POST['num_ctrl'])->get();
			echo json_encode($consulta);
		}		

		static function agregar_adeudo(){
			$insercion = new TablaAdeudos();
			$consulta = CatalogoNControl::select('id_numero_control')->where('numero_control',$_POST['num_ctrl_registro'])->first();
			if($consulta){
				$insercion->fk_numero_control = $consulta->id_numero_control;
				$insercion->tipo = $_POST['tipo_adeudo'];
				$insercion->fk_periodo_escolar = $_POST['periodo_registro'];
				$insercion->observaciones = $_POST['observaciones'];
				$insercion->save();
				echo json_encode(['1','Se ha registrado el adeudo con exito!']);
			}else{
				echo json_encode(['0','Numero de control no valido!']);
			}
		}

		static function eliminar_adeudo(){
			TablaAdeudos::where('id_adeudos',$_POST['id'])->delete();
			echo json_encode(['1','Se ha eliminado el adeudo con exito!']);
		}
	}
	call_user_func('Adeudos::'.$_POST['funcion']);
?>