<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoCarrera;
	use model\CatalogoReticula;

	require_once realpath('../../vendor/autoload.php');

	class Carreras {
		static function consultar_carrera(){
			$consulta = CatalogoCarrera::select('id_cat_carrera','nombre_carrera','carrera','siglas','clave_reticula','estatus')->join('t_cat_reticula','t_cat_carrera.id_cat_carrera','t_cat_reticula.fk_cat_carrera')->get();
			if($consulta){
				echo json_encode($consulta);
			}else{
				echo json_encode(['id_cat_carrera'=>'','nombre_carrera'=>'','carrera'=>'','siglas'=>'','clave_reticula'=>'']);
			}

		}

		static function crear_carrera(){
			$insercion = new CatalogoCarrera();
			$reticula = new CatalogoReticula();
			$insercion->nombre_carrera = $_POST['nombre_carrera'];
			$insercion->carrera = $_POST['nombre_reducido'];
			$insercion->siglas = $_POST['siglas'];
			$insercion->clave_oficial = $_POST['clave_oficial'];
			$insercion->nivel_escolar = $_POST['nivel_escolar'];
			$insercion->carga_maxima = $_POST['carga_maxima'];
			$insercion->carga_minima = $_POST['carga_minima'];
			$insercion->fecha_inicio = $_POST['fecha_inicio'];
			$insercion->fecha_fin = $_POST['fecha_cierre'];
			$insercion->creditos_totales = $_POST['creditos'];
			if($insercion->save()){
				$reticula->clave_reticula = $_POST['reticula'];
				$reticula->fk_cat_carrera = $insercion->id_cat_carrera;
				if($reticula->save()){
					echo json_encode(['1','Se ha creado la carrera con exito!']);
				}else{
					echo json_encode(['0','No se ha creado la carrera!']);
				}
			}else{
				echo json_encode(['0','No se ha creado la carrera!']);
			}
		}

		static function actualizar_carrera(){
			if(Token::comprobar_token_frm("frm_actualizar_carrera",$_POST['tk_frm'])){
				CatalogoCarrera::where('id_cat_carrera',$_POST['id_carrera_actualizado'])->update(['nombre_carrera'=> $_POST['nombre_carrera_actualizado'],'carrera'=> $_POST['nombre_reducido_actualizado'],'siglas'=> $_POST['siglas_actualizado'],'clave_oficial'=> $_POST['clave_oficial_actualizado'],'nivel_escolar'=> $_POST['nivel_escolar_actualizado'],'carga_maxima'=> $_POST['carga_maxima_actualizado'],'carga_minima'=> $_POST['carga_minima_actualizado'],'fecha_inicio'=> $_POST['fecha_inicio_actualizado'],'fecha_fin'=> $_POST['fecha_cierre_actualizado'],'creditos_totales'=> $_POST['creditos_actualizado']]);
				CatalogoReticula::where('id_cat_reticula',$_POST['id_reticula_actualizado'])->update(['clave_reticula'=>$_POST['reticula_actualizado']]);
				echo json_encode(['1','Se han actualizado los datos de la carrera con exito!']);
			}else{
				echo json_encode(["0","Solicitud no valida"]);
			}
		}

		static function actualizar_estatus(){
			$update = CatalogoCarrera::where('id_cat_carrera',$_POST['id'])->update(['estatus' => $_POST['estatus']]);
			if($update){
				echo json_encode(['1','Carrera actualizada con exito!']);
			}else{
				echo json_encode(['0','Error al actualizar carrera!']);
			}
		}


		static function precargar_carrera(){
			$consulta = CatalogoCarrera::select('id_cat_carrera','nombre_carrera','carrera','siglas','clave_oficial','nivel_escolar','carga_maxima','carga_minima','fecha_inicio','fecha_fin','creditos_totales','clave_reticula','id_cat_reticula')->join('t_cat_reticula','t_cat_carrera.id_cat_carrera','t_cat_reticula.fk_cat_carrera')->where('id_cat_carrera',$_POST['id'])->first();
			echo json_encode($consulta);
		}
	}
	call_user_func('Carreras::'.$_POST['funcion']);
?>