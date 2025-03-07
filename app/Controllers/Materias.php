<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoMaterias;
	use model\CatalogoTipoMateria;
	require_once realpath('../../vendor/autoload.php');

	class Materias {
		static function consultar_materias(){
			$consulta = !isset($_POST['buscar']) ? CatalogoMaterias::select('id_cat_materias','nombre_completo_materia','clave_oficial','creditos_teorica','creditos_practica','creditos_totales','estatus_materias_carrera')->where('fk_cat_reticula',$_POST['carrera'])->orderBy('nombre_completo_materia','asc')->get() : CatalogoMaterias::select('id_cat_materias','nombre_completo_materia','clave_oficial','creditos_teorica','creditos_practica','creditos_totales','estatus_materias_carrera')->where('fk_cat_reticula',$_POST['carrera'])->where('nombre_completo_materia','like','%'.$_POST['buscar'].'%')->orWhere('clave_oficial','like','%'.$_POST['buscar'].'%')->orderBy('nombre_completo_materia','asc')->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}

		static function precargar_materia(){
			$consulta = CatalogoMaterias::select('id_cat_materias','clave_oficial','clave','nombre_completo_materia','nombre_abreviado_materia','semestre','renglon','creditos_teorica','creditos_practica','creditos_totales','creditos_prerequisitos','orden_certificado','fk_cat_especialidad','estatus_materias_carrera','fk_cat_organigrama','fk_cat_tipo_materia','nivel_escolar','no_unidades')->where('id_cat_materias',$_POST['materia'])->first();
			echo json_encode($consulta);			
		}

		static function consultar_tipo_materia(){
			echo '<option value="">Seleccionar tipo</option>';
			$consulta = CatalogoTipoMateria::select('id_cat_tipo_materia','descripcion')->get();
			foreach($consulta as $tipo){
				echo '<option value="'.$tipo['id_cat_tipo_materia'].'">'.$tipo['descripcion'].'</option>';
			}
		}

		static function actualizar_materia(){
			if(Token::comprobar_token_frm("frm_act_materia",$_POST['tk_frm'])){
				CatalogoMaterias::where('id_cat_materias',$_POST['id_materia'])->update(['nombre_completo_materia' => $_POST['nombre_completo_act'],'fk_cat_organigrama' => $_POST['area_academica_act'],'clave_oficial' => $_POST['clave_oficial_act'],'clave' => $_POST['clave_act'],'fk_cat_especialidad' => $_POST['select_especialidad_act'],'orden_certificado' => $_POST['orden_certificado_act'],'estatus_materias_carrera' => $_POST['estatus_materia_act'],'creditos_teorica' => $_POST['horas_teoricas_act'],'creditos_practica' => $_POST['horas_practicas_act'],'creditos_totales' => $_POST['creditos_totales_act'],'creditos_prerequisitos' => $_POST['creditos_prerrequisito_act'],'nivel_escolar' => $_POST['nivel_escolar_act'],'fk_cat_tipo_materia' => $_POST['tipo_materia_act'],'nombre_abreviado_materia' => $_POST['nombre_abreviado_act'],'no_unidades'=>$_POST['select_unidades_act']]);
				echo json_encode(['1','Se actualizaron los datos de la materia con exito!']);
			}else{
				echo json_encode(['2','Accion no valida']);
			}
		}

		static function agregar_materia(){
			if(Token::comprobar_token_frm("frm_agregar_materia",$_POST['tk_frm'])){
				$insercion = new CatalogoMaterias();
				$insercion->nombre_completo_materia = $_POST['nombre_completo'];
				$insercion->fk_cat_organigrama = $_POST['area_academica'];
				$insercion->clave_oficial = $_POST['clave_oficial'];
				$insercion->clave = $_POST['clave'];
				$insercion->fk_cat_especialidad = $_POST['select_especialidad_agregar'];
				$insercion->orden_certificado = $_POST['orden_certificado'];
				$insercion->estatus_materias_carrera = $_POST['estatus_materia'];
				$insercion->creditos_teorica = $_POST['horas_teoricas'];
				$insercion->creditos_practica = $_POST['horas_practicas'];
				$insercion->creditos_totales = $_POST['creditos_totales'];
				$insercion->creditos_prerequisitos = $_POST['creditos_prerrequisito'];
				$insercion->nivel_escolar = $_POST['nivel_escolar'];
				$insercion->fk_cat_tipo_materia = $_POST['tipo_materia'];
				$insercion->nombre_abreviado_materia = $_POST['nombre_abreviado'];
				$insercion->fk_cat_reticula = $_POST['carrera'];
				$insercion->no_unidades = $_POST['select_unidades'];
				if($insercion->save()){
					echo json_encode(['1','Se ha creado una nueva materia con exito!']);
				}else{
					echo json_encode(['0','No se ha logrado crear la nueva materia!\nPor favor intente de nuevo.']);
				}
			}else{
				echo json_encode(['2','Accion no valida']);
			}
		}
	}
	call_user_func('Materias::'.$_POST['funcion']);
?>