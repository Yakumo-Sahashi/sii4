<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoMaterias;
	use model\CatalogoReticula;
	use model\CatalogoEspecialidad;
	use model\CatalogoOrganigrama;

	require_once realpath('../../vendor/autoload.php');

	class PlanCurricular {
		static function obtener_movimientos(){
			$consulta = CatalogoMaterias::select('id_cat_materias','clave','nombre_abreviado_materia','semestre','renglon','creditos_teorica','creditos_practica','creditos_totales')->where('fk_cat_reticula',$_POST['select_carrera'])->where('fk_cat_especialidad','0')->whereBetween('semestre',[1, 9])->where('estatus_materias_carrera','A')->orWhere('fk_cat_especialidad',$_POST['select_especialidad'])->where('estatus_materias_carrera','A')->orderBy('semestre','asc')->get();
			echo json_encode($consulta);
		}	
		
		static function consultar_carrera(){
			echo '<option value="">Seleccionar carrera</option>';
			$consulta = CatalogoReticula::select('id_cat_reticula', 'nombre_carrera','clave_reticula')->join('t_cat_carrera','t_cat_reticula.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('estatus','1')->get();
			foreach ($consulta as $carrera) {
				echo '<option value="' . $carrera['id_cat_reticula'] . '">' . $carrera['nombre_carrera'].'/<span>'. $carrera['clave_reticula'] . '</span></option>';
			}
   		}

		static function consultar_especialidad(){
            echo '<option value="">Seleccionar especialidad</option>';
            $consulta = CatalogoEspecialidad::orderBy('id_cat_especialidad', 'asc')->where('fk_cat_carrera', $_POST['carrera_reticula'])->where('estatus', '1')->get();
            foreach ($consulta as $especialidad) {
				if($especialidad['especialidad'] != 'Sin especialidad'){
                	echo '<option value="' . $especialidad['id_cat_especialidad'] . '">' . $especialidad['especialidad'] . '</option>';
				}
            }
        }

		static function consultar_especialidad_materia(){
            echo '<option value="">Seleccionar especialidad</option>';
			echo '<option value="0">NO ES DE ESPECIALIDAD</option>';
            $consulta = CatalogoEspecialidad::orderBy('id_cat_especialidad', 'asc')->where('fk_cat_carrera', $_POST['carrera_reticula'])->where('estatus', '1')->get();
            foreach ($consulta as $especialidad) {
				if($especialidad['especialidad'] != 'Sin especialidad'){
                	echo '<option value="' . $especialidad['id_cat_especialidad'] . '">' . $especialidad['especialidad'] . '</option>';
				}
            }
        }

		static function precargar_materia(){
			$consulta = CatalogoMaterias::select('id_cat_materias','clave_oficial','nombre_completo_materia','t_cat_organigrama.descripcion','semestre','renglon','creditos_teorica','creditos_practica','creditos_totales','creditos_prerequisitos','orden_certificado','fk_cat_especialidad','estatus_materias_carrera')->join('t_cat_organigrama','t_cat_materias.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('id_cat_materias',$_POST['materia'])->first();
			echo json_encode($consulta);		
		}

		static function actualizar_materia(){
			if(Token::comprobar_token_frm("frm_actualizar_materia",$_POST['tk_frm'])){
				CatalogoMaterias::where('id_cat_materias',$_POST['id_materia'])->update(['clave_oficial'=>$_POST['clave_oficial_actualizar'],'fk_cat_especialidad'=>$_POST['select_especialidad_actualizar'],'orden_certificado'=>$_POST['orden_certificado_actualizar'],'estatus_materias_carrera'=>$_POST['estatus_materia_actualizar'],'creditos_teorica'=>$_POST['horas_teoricas_actualizar'],'creditos_practica'=>$_POST['horas_practicas_actualizar'],'creditos_totales'=>$_POST['creditos_totales_actualizar'],'creditos_prerequisitos'=>$_POST['creditos_prerrequisito_actualizar']]);
				echo json_encode(['1','Se actualizaron los datos de la materia con exito!']);
			}else{
				echo json_encode(['2','Accion no valida']);
			}
		}

		static function consultar_area_academica(){
			echo '<option value="" Selected>Seleccionar area</option>';
			$consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->where('nivel','4')->where('tipo_area','D')->where('estado','1')->get();
			foreach($consulta as $departamento){
				echo '<option value="' . $departamento['id_cat_organigrama'] . '">' . $departamento['descripcion'] . '</option>';
			}
		}

		static function actualizar_plan(){
			$orden = 1;
			$materias = explode(',', $_POST['materias_id']);
			for($i = 0; $i < count($materias); $i++){
				if(preg_match("/[0-9]/",$materias[$i])){
					CatalogoMaterias::where('id_cat_materias',$materias[$i])->update(['semestre'=> $_POST['semestre'],'renglon'=>$orden]);
				}
				$orden++;
			}
			echo json_encode(['1','Se actualizaron los datos del plan de estudios!']);
		}
		
		static function consultar_materias_area(){
			echo '<option value="">Seleccionar materia</option>';
			$consulta = CatalogoMaterias::select('id_cat_materias','nombre_completo_materia')->where('fk_cat_reticula',$_POST['carrera'])->where('semestre','0')->where('renglon','0')->orderBy('nombre_completo_materia','asc')->get();
			foreach($consulta as $departamento){
				echo '<option value="' . $departamento['id_cat_materias'] . '">' . $departamento['nombre_completo_materia'] . '</option>';
			}
		}

		static function precargar_materia_add(){
			$consulta = CatalogoMaterias::select('id_cat_materias','clave_oficial','clave','nombre_completo_materia','nombre_abreviado_materia','semestre','renglon','creditos_teorica','creditos_practica','creditos_totales','creditos_prerequisitos','orden_certificado','fk_cat_especialidad','estatus_materias_carrera','fk_cat_organigrama','fk_cat_tipo_materia','nivel_escolar')->where('id_cat_materias',$_POST['materia'])->first();
			echo json_encode($consulta);
		}

		static function actualizar_plan_materia(){
			$materia = explode('-', $_POST['ubicar']);
			CatalogoMaterias::where('id_cat_materias',$_POST['materia'])->update(['semestre'=> $materia[1],'semestre_reticula'=> $materia[1],'renglon'=> $materia[2]]);
			echo json_encode(['1','Se agrega la materia al plan de estudios!']);
		}

		static function retirar_materia(){
			CatalogoMaterias::where('id_cat_materias',$_POST['materia'])->update(['semestre'=> '0','renglon'=> '0']);
			echo json_encode(['1','Se retiro la materia al plan de estudios!']);
		}
	}
	call_user_func('PlanCurricular::'.$_POST['funcion']);
?>