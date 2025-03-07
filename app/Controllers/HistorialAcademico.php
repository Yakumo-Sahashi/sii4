<?php
	use config\Token;
	use config\Sesion;
	// Sesion::datos_sesion('rol');
	use model\TablaAlumno;
	use model\TablaPersona;
	use model\TablaHistoriaAlumno;
	use model\TablaGrupo;
	use model\CatalogoNControl;
	use model\TablaPeriodoEscolar;
	use model\CatalogoMaterias;
	use model\CatalogoTipoEvaluacion;

	require_once realpath('../../vendor/autoload.php');

	class HistorialAcademico {
		static function obtener_alumno(){
			$consulta = TablaAlumno::select('t_usuario.id_usuario','t_alumno.fk_persona','nombre_persona','apellido_paterno','apellido_materno','numero_control','fk_numero_control','semestre','periodos_revalidados','identificacion_corta','t_alumno.fk_cat_carrera','carrera','promedio_aritmetico_acumulado','especialidad','t_usuario.id_usuario')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_periodo_escolar','t_alumno.fk_periodo_ingreso','t_periodo_escolar.id_periodo_escolar')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('t_numero_control.numero_control',$_POST['num_ctrl'])->first();
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0',"Informacion no encontrada. Por favor verifica el numero control!"]);
			}
		}
		static function consultar_tipo_evaluacion(){
			$consulta = CatalogoTipoEvaluacion::select('id_cat_tipo_evaluacion','descripcion_corto')->get();
			echo '<option value="" selected>Seleccionar</option>';
			foreach($consulta as $tipoEval){
				echo '<option value="'.$tipoEval['id_cat_tipo_evaluacion'].'">'.$tipoEval['descripcion_corto'].'</option>';
			}
		}
		static function consultar_materias(){
			$consulta = CatalogoMaterias::select('id_cat_materias','nombre_completo_materia')->where('fk_cat_reticula',$_POST['filtro'])->orderBy('nombre_completo_materia','asc')->get();
			echo '<option value="" selected>Seleccionar</option>';
			foreach($consulta as $materia){
				echo '<option value="'.$materia['id_cat_materias'].'">'.$materia['nombre_completo_materia'].'</option>';
			}
		}
		static function consultar_periodo(){
			$consulta = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->orderBy('id_periodo_escolar','desc')->get();
			echo '<option value="" selected>Seleccionar</option>';
			foreach($consulta as $periodo){
				echo '<option value="'.$periodo['id_periodo_escolar'].'">'.$periodo['identificacion_corta'].'</option>';
			}
		}
		static function consultar_fechas_periodo(){
			$consulta = TablaPeriodoEscolar::select('fecha_inicio','fecha_termino')->where('id_periodo_escolar',$_POST['id_periodo'])->first();
			echo json_encode($consulta);
		}
		static function agregar_materia(){
			if(Token::comprobar_token_frm('frm_agregar_materia',$_POST['tk_frm'])){
				$materia = new TablaHistoriaAlumno();
				$materia->fk_periodo_escolar = $_POST['agregar_periodo'];
				$materia->fk_numero_control = $_POST['fk_numero_control'];
				$materia->fk_cat_materias = $_POST['agregar_materia'];
				$materia->calificacion = $_POST['agregar_calificacion'] >= 70 ?  $_POST['agregar_calificacion'] : 'NA';
				$materia->fk_cat_tipo_evaluacion = $_POST['agregar_evaluacion'];
				$materia->fecha_calificacion = $_POST['agregar_fecha_calificacion'];
				$materia->estatus_materia = $_POST['agregar_calificacion'] < 70 ? "R" : "A";
				$materia->presento = 'SI';
				//$materia->usuario = Sesion::datos_sesion('rol');
				// $materia->fecha_actualizacion = date('y-m-d H:i:s');
				if($materia->save()){
					echo json_encode(['1','Materia agregada con exito!']);
				}else{
					echo json_encode(['0','Error al agregar la materia!']);
				}
			}else{
                echo "Solicitud no valida";
            }
		}
		static function consultar_historial(){
			$consulta = TablaHistoriaAlumno::select('id_historia_alumno','identificacion_corta','clave_oficial','nombre_completo_materia','calificacion','descripcion_corto')->join('t_periodo_escolar','t_historia_alumno.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_tipo_evaluacion','t_historia_alumno.fk_cat_tipo_evaluacion','t_cat_tipo_evaluacion.id_cat_tipo_evaluacion')->where('fk_numero_control',$_POST['id_numero_control'])->get();
			echo json_encode($consulta);
		}
		static function precargar_historial(){
			$consulta = TablaHistoriaAlumno::select('id_historia_alumno','nombre_completo_materia','calificacion','fk_cat_tipo_evaluacion')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->where('id_historia_alumno',$_POST['id'])->first();
			echo json_encode($consulta);
		}
		static function actualizar_historial(){
			date_default_timezone_set('America/Mexico_City');
			TablaHistoriaAlumno::where('id_historia_alumno',$_POST['id_materia_actualizado'])->update(['calificacion'=>$_POST['calificacion_actualizado'] >= 70 ? $_POST['calificacion_actualizado'] : 'NA','fk_cat_tipo_evaluacion'=>$_POST['evaluacion_actualizado'],'fecha_actualizacion'=>date('y-m-d H:i:s')]);
			echo json_encode(['1','Historial actualizado con exito!']);
		}
		static function eliminar_historial(){
			$eliminar = TablaHistoriaAlumno::where('id_historia_alumno',$_POST['id_historia_alumno'])->delete();
			if($eliminar){
				echo json_encode(['1','El historial se ha eliminado correctamente!']);
			}else{
				echo json_encode(['0','No se ha eliminado el historial!']);
			}
		}
	}
	call_user_func('HistorialAcademico::'.$_POST['funcion']);
?>