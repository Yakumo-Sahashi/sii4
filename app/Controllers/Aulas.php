<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoAulas;
	require_once realpath('../../vendor/autoload.php');

	class Aulas {
		static function consultar_aulas(){
			$consulta = CatalogoAulas::select('id_cat_aulas', 'aula', 'capacidad', 'ubicacion', 'estatus_aula', 'observaciones')->get();
			echo json_encode($consulta);
		}

		static function agregar_aula(){
			$activo = isset($_POST['btn_inactivo']) ? "A" : "I";
			$observaciones = !($_POST['observaciones'] == false) ? $_POST['observaciones'] : "Sin observaciones";
			$insercion = new CatalogoAulas();
			$insercion->aula = $_POST['nombre_aula'];
			$insercion->capacidad = $_POST['capacidad'];
			$insercion->ubicacion = $_POST['ubicacion'];
			$insercion->estatus_aula = $activo;
			$insercion->observaciones = $observaciones;
            if($insercion->save()){
                echo json_encode(["1","Se ha agregado el aula!"]);         
            }else{
                echo json_encode(["0","error al agregar el aula!"]);
            }
        }		

		static function precargar_aula(){
			$consulta = CatalogoAulas::select('id_cat_aulas', 'aula', 'capacidad', 'ubicacion', 'estatus_aula', 'observaciones')->where('id_cat_aulas',$_POST['id_cat_aulas'])->first();
            echo json_encode($consulta); 
        }

		static function actualizar_aula(){
            $actualizar_activo = isset($_POST['actualizar_btn_inactivo']) ? "A" : "I";
            $actualizar_observaciones = !($_POST['actualizar_observaciones'] == false) ? $_POST['actualizar_observaciones'] : "Sin observaciones";
			CatalogoAulas::where('id_cat_aulas',$_POST['id_cat_aula'])->update(['aula' => $_POST['actualizar_nombre_aula'],'capacidad' => $_POST['actualizar_capacidad'],'ubicacion' => $_POST['actualizar_ubicacion'],'estatus_aula' => $actualizar_activo,'observaciones' => $actualizar_observaciones]);
            echo json_encode(["1","Se ha actualizado el aula!"]);            
        } 

		static function eliminar_aula(){
			$delete = CatalogoAulas::where('id_cat_aulas',$_POST['id_cat_aula'])->delete(); 
            if($delete){
                echo json_encode(["1","Se ha removido el aula con exito"]);
            }else {
                echo json_encode(["0","No se ha removido el aula con exito"]);
            } 
        }
	}
	call_user_func('Aulas::'.$_POST['funcion']);
?>