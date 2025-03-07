<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	use model\TablaUsuario;
	require_once realpath('../../vendor/autoload.php');

	class ContraseñaAlumnos {
		static function consulta_alumno(){
			$consulta = TablaAlumno::select('nombre_persona','apellido_paterno','apellido_materno','numero_control','id_usuario')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('numero_control',$_POST['num_ctrl'])->first();
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0','Informacion no encontrada, verifique el numero de control']);
			}
		}
		static function actualizar_contraseña(){
			$contrasenia = password_hash($_POST['nueva_contrasenia'], PASSWORD_BCRYPT);
			if(Token::comprobar_token_frm('frm_actualiza_contraseña',$_POST['tk_frm'])){
				TablaUsuario::where('id_usuario',$_POST['id_usuario'])->update(['password'=> $contrasenia]);
				echo json_encode(['1','Contraseña actualizada con exito!']);
			}else{
				echo "Solicitud no valida";
			}
		}
	}
	call_user_func('ContraseñaAlumnos::'.$_POST['funcion']);
?>