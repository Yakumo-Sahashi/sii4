<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoCarrera;
	use model\CatalogoNControl;
	use model\TablaAlumno;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');

	class AlumnosEgresados {
		static function obtener_periodo(){
			$consulta = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->orderBy('id_periodo_escolar','desc')->get();
			echo '<option value="" selected>Seleccionar periodo</option>';
			foreach($consulta as $periodo){
				echo '<option value="'.$periodo['id_periodo_escolar'].'">'.$periodo['identificacion_corta'].'</option>';
			}
		}
		static function obtener_carrera(){
			$consulta = CatalogoCarrera::select('id_cat_carrera','nombre_carrera')->where('estatus','1')->get();
			echo '<option value="0">Seleccionar carrera</option>';
			foreach($consulta as $carrera){
				echo '<option value="'.$carrera['id_cat_carrera'].'">'.$carrera['nombre_carrera'].'</option>';
			}
		}
		static function consultar_egresados(){
			if(isset($_POST['tipo_filtro']) == "carrera"){
				$consulta = TablaAlumno::select('numero_control','nombre_persona','apellido_paterno','apellido_materno','nombre_carrera','promedio_final_alcanzado')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('fk_cat_estatus','12') ->where('fk_periodo_egresado',$_POST['filtro_periodo'])->where('fk_cat_carrera',$_POST['filtro_carrera'])->get();
			}else {
				$consulta = TablaAlumno::select('numero_control','nombre_persona','apellido_paterno','apellido_materno','nombre_carrera','promedio_final_alcanzado')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('fk_cat_estatus','12')->where('fk_periodo_egresado',$_POST['filtro_periodo'])->get();
			}
			echo json_encode($consulta);
		}
		static function CB_consultar_egresados(){
			$consulta = TablaAlumno::select('numero_control','nombre_persona','apellido_paterno','apellido_materno','nombre_carrera','promedio_final_alcanzado','creditos_aprobados','creditos_cursados')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('fk_cat_estatus','12') ->where('fk_periodo_egresado',$_POST['filtro_periodo'])->where('fk_cat_carrera',$_POST['filtro_carrera'])->get();
			echo json_encode($consulta);
		}
		static function CB_consultar_egresados_tres(){
			$consulta = TablaAlumno::select('numero_control','nombre_persona','apellido_paterno','apellido_materno','curp','nombre_carrera','telefono','correo','promedio_final_alcanzado','creditos_aprobados','creditos_cursados','codigo_postal','entidad_federativa','alcaldia','colonia','calle','numero_interior','numero_exterior','t_periodo_escolar.fecha_inicio')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_direccion','t_persona.fk_direccion','t_direccion.id_direccion')->join('t_periodo_escolar','t_alumno.fk_periodo_egresado','t_periodo_escolar.id_periodo_escolar')->where('fk_cat_estatus','12')->where('fk_cat_carrera',$_POST['carrera_egreso_años_tres'])->get();
			echo json_encode($consulta);
		}
	}
	call_user_func('AlumnosEgresados::'.$_POST['funcion']);
?>