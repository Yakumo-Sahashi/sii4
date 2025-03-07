<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	require_once realpath('../../vendor/autoload.php');

	class InscripcionVerano {
		static function obtener_alumno(){
			$consulta = TablaAlumno::select('t_alumno.fk_persona','nombre_persona','apellido_paterno','apellido_materno','numero_control','fk_numero_control','semestre','identificacion_corta','t_alumno.fk_cat_carrera','carrera','promedio_aritmetico_acumulado','especialidad','t_usuario.id_usuario')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_periodo_escolar','t_alumno.fk_periodo_ingreso','t_periodo_escolar.id_periodo_escolar')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('t_numero_control.numero_control',$_POST['num_ctrl'])->first();
			// if(Token::comprobar_token_frm("frm_inscripcion_verano",$_POST['tk_frm'])){
				if($consulta){
					echo json_encode(['1',$consulta]);
				}else{
					echo json_encode(['0',"Informacion no encontrada. Por favor verifica el numero control!"]);
				}
			// }else{
			// 	echo "Solicitud no valida";
			// }
		}
	}
	call_user_func('InscripcionVerano::'.$_POST['funcion']);
?>