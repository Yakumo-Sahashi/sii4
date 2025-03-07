<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	use model\TablaPersona;
	use model\CatalogoReticula;
	require_once realpath('../../vendor/autoload.php');
	class AlumnosGenerales{
		static function consultar_alumno_general(){
			$consulta = TablaAlumno::select('id_alumno','fk_persona','numero_control', 'nombre_persona', 'apellido_paterno', 'apellido_materno', 'carrera','t_alumno.fk_numero_control','t_alumno.fk_cat_carrera','t_cat_carrera.nombre_carrera','t_cat_especialidad.especialidad')->join('t_persona','t_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->where('numero_control', $_POST['valor_busqueda'])->get();
			echo json_encode($consulta);
		}
		static function informacion_general(){
			$alumno = TablaAlumno::select('numero_control','nombre_carrera', 'semestre', 'clave_reticula','identificacion_corta','periodos_revalidados','escolaridad','t_cat_estatus.descripcion_estatus','t_cat_tipo_ingreso.tipo_ingreso','t_cat_especialidad.especialidad')->join('t_numero_control','t_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->join('t_cat_reticula', 't_alumno.fk_cat_reticula', 't_cat_reticula.id_cat_reticula')->join('t_periodo_escolar','t_alumno.fk_periodo_ingreso','t_periodo_escolar.id_periodo_escolar')->join('t_cat_escolaridad','t_alumno.fk_escolaridad','t_cat_escolaridad.id_cat_escolaridad')->join('t_cat_estatus','t_alumno.fk_cat_estatus','t_cat_estatus.id_cat_estatus')->join('t_cat_tipo_ingreso','t_alumno.fk_cat_tipo_ingreso','t_cat_tipo_ingreso.id_cat_tipo_ingreso')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->where('id_alumno', $_POST['alumno'])->first();
			$persona = TablaPersona::select('apellido_paterno','apellido_materno','nombre_persona','curp','telefono','correo','fecha_nacimiento','lugar_nacimiento','estado_civil','sexo','codigo_postal','entidad_federativa','alcaldia','colonia','calle','numero_interior','numero_exterior','t_usuario.id_usuario')->join('t_cat_estado_civil','t_persona.fk_cat_estado_civil','t_cat_estado_civil.id_cat_estado_civil')->join('t_cat_sexo','t_persona.fk_cat_sexo','t_cat_sexo.id_cat_sexo')->join('t_direccion','t_persona.fk_direccion','t_direccion.id_direccion')->join('t_usuario','t_usuario.fk_persona','t_persona.id_persona')->where('id_persona',$_POST['persona'])->first();
			echo json_encode([$persona,$alumno]);
		}
	}
	call_user_func('AlumnosGenerales::' . $_POST['funcion']);
?>