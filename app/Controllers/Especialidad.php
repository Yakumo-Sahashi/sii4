<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoEspecialidad;
	require_once realpath('../../vendor/autoload.php');

	class Especialidad {
		static function crear_especialidad(){
			$especialidad = new CatalogoEspecialidad();
			$especialidad->fk_cat_carrera = $_POST['carrera_reticula'];
			$especialidad->especialidad = $_POST['nombre_especialidad'];
			$especialidad->fk_reticula = $_POST['carrera_reticula'];
			$especialidad->periodo_inicio = $_POST['periodo_inicio'];
			$especialidad->periodo_fin = $_POST['periodo_liquidacion'];
			$especialidad->creditos_especialidad = $_POST['creditos_especialidad'];
			$especialidad->creditos_optativos = $_POST['creditos_optativos'];
			if($especialidad->save()){
				echo json_encode(['1','Especialidad creada con exito!']);
			}else{
				echo json_encode(['0','Error al crear nueva especialidad!']);
			}
		}
		
		static function actualizar_especialidad(){
			CatalogoEspecialidad::where('id_cat_especialidad',$_POST['id_especialidad_actualizado'])->update(['fk_cat_carrera'=> $_POST['carrera_reticula_actualizado'], 'especialidad'=> $_POST['nombre_especialidad_actualizado'], 'fk_reticula'=> $_POST['carrera_reticula_actualizado'], 'periodo_inicio'=> $_POST['periodo_inicio_actualizado'], 'periodo_fin'=> $_POST['periodo_liquidacion_actualizado'], 'creditos_especialidad'=> $_POST['creditos_especialidad_actualizado'], 'creditos_optativos'=> $_POST['creditos_optativos_actualizado']]);
			echo json_encode(['1','Especialidad actualizada con exito!']);
		}

		static function actualizar_estatus(){
			$update = CatalogoEspecialidad::where('id_cat_especialidad',$_POST['id'])->update(['estatus' => $_POST['estatus']]);
			if($update){
				echo json_encode(['1','Especialidad actualizada con exito!']);
			}else{
				echo json_encode(['0','Error al actualizar especialidad!']);
			}
		}

		static function consultar_especialidad(){
			$consulta = CatalogoEspecialidad::select('id_cat_especialidad','especialidad','carrera','periodo_inicio','periodo_fin','creditos_especialidad','creditos_optativos','t_cat_especialidad.estatus')->join('t_cat_carrera','t_cat_especialidad.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->get();
			if($consulta){
				echo json_encode($consulta);
			}else{
				echo json_encode('');
			}
		}

		static function precargar_especialidad(){
			$consulta = CatalogoEspecialidad::select('id_cat_especialidad','especialidad','fk_cat_carrera','periodo_inicio','periodo_fin','creditos_especialidad','creditos_optativos')->where('id_cat_especialidad',$_POST['id'])->first();
			echo json_encode($consulta);
		}
	}
	call_user_func('Especialidad::'.$_POST['funcion']);
?>