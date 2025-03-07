<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoRol;
	use model\TablaAlumno;
	use model\TablaPersonal;
	use model\TablaUsuario;
	require_once realpath('../../vendor/autoload.php');

	class UsuariosAdmin {
		static function consultar_usuarios(){
			if( $_POST['filtro'] != '1'){
				$consulta = $_POST['filtro'] == '0' ? TablaUsuario::select('usuario','id_usuario','correo_usuario','nombre_persona','apellido_paterno','apellido_materno','telefono','estado','rol','t_persona.rfc')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->get() : TablaUsuario::select('usuario','id_usuario','correo_usuario','nombre_persona','apellido_paterno','apellido_materno','telefono','estado','rol','fk_cat_rol','t_persona.rfc')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->where('t_usuario.fk_cat_rol',$_POST['filtro'])->get();
			}else{
				$consulta = TablaUsuario::select('usuario','id_usuario','correo_usuario','nombre_persona','apellido_paterno','apellido_materno','telefono','estado','rol','t_persona.rfc')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->whereBetween('t_usuario.fk_cat_rol',[1, 18])->orWhere('t_usuario.fk_cat_rol','22')->get();
			}
			echo json_encode($consulta);
		}		

		static function inhabilitar_cuenta(){
			TablaUsuario::where('id_usuario',$_POST['id'])->update(['estado'=>'2']);
			echo json_encode(['1',"La cuenta ha sido inhabilitada!"]);
		}

		static function habilitar_cuenta(){
			TablaUsuario::where('id_usuario',$_POST['id'])->update(['estado'=>'0']);
			echo json_encode(['1',"La cuenta ha sido habilitada!"]);
		}

		static function consultar_roles(){
			echo '<option value="">Seleccionar rol</option>';
			$consulta = CatalogoRol::select('descripcion_rol','id_cat_rol')->get();
			foreach($consulta as $rol){
				if(Sesion::datos_sesion('rol') != 'DIR'){
					if($rol->id_cat_rol != '1'){
						echo '<option value="'.$rol['id_cat_rol'].'">'.$rol['descripcion_rol'].'</option>';
					}
				}else{
					echo '<option value="'.$rol['id_cat_rol'].'">'.$rol['descripcion_rol'].'</option>';
				}
			}
		}

		static function consultar_datos_usuario(){
			$consulta = TablaUsuario::select('estado','correo_usuario','usuario','fk_cat_rol','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('t_usuario.id_usuario',$_POST['usuario'])->first();
			echo json_encode($consulta);
		}

		static function actualizar_usuario(){
			$error_user = 0;
			$error_email = 0;
			$usuario = TablaUsuario::select('id_usuario','usuario')->where('usuario',$_POST['usuario'])->first();
			$email = TablaUsuario::select('id_usuario','correo_usuario')->where('correo_usuario',$_POST['correo_inst'])->first();
			if($usuario){
				if($usuario->id_usuario != $_POST['id_usuario_upt']){
					$error_user++;
				}
			}
			if($email){
				if($email->id_usuario != $_POST['id_usuario_upt']){
					$error_email++;
				}
			}
			
			if($error_user == 0 && $error_email == 0){
				$update = TablaUsuario::where('id_usuario',$_POST['id_usuario_upt'])->update(['estado'=>$_POST['estado_cuenta'],'correo_usuario'=>$_POST['correo_inst'],'usuario'=>$_POST['usuario'],'fk_cat_rol'=>$_POST['rol_usuario']]);

				if(!empty($_POST['password_usuario'])){
					$newPass = password_hash($_POST['password_usuario'], PASSWORD_BCRYPT);;
					$pass = TablaUsuario::where('id_usuario',$_POST['id_usuario_upt'])->update(['password'=>$newPass]);
				}
	
				if($update || isset($pass)){
					echo json_encode(['1',"Actualizacion de datos completada con exito!"]);
				}else{
					echo json_encode(['0',"No se han efectuado cambios en el usuario!"]);
				}
			}else{
				echo json_encode(['0', $error_user > 0 ? "Nombre de usuario ya registrado!" :"Correo electronico ya registrado!"]);
			}
		}

		static function obtener_personas(){
			echo '<option value="" Selected>Seleccionar persona</option>';
			$consulta = $_POST['tipo'] == 1 ? TablaPersonal::select('id_personal','id_persona','nombre_persona','apellido_paterno','apellido_materno','rfc')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->get() : TablaAlumno::select('id_persona','nombre_persona','apellido_paterno','apellido_materno','t_numero_control.numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->where('t_alumno.fk_cat_estatus','1')->get();
			foreach($consulta as $persona){
				echo  $_POST['tipo'] == 1 ? ($persona['id_personal'] == 0 ? '' :'<option value="'.$persona['id_persona'].'">'.$persona['apellido_paterno'].' '.$persona['apellido_materno'].' '.$persona['nombre_persona'].' / '.$persona['rfc'].'</option>') : '<option value="'.$persona['id_persona'].'">'.$persona['apellido_paterno'].' '.$persona['apellido_materno'].' '.$persona['nombre_persona'].' / '.$persona['numero_control'].'</option>';
			}
		}

		static function crear_usuario_nuevo(){
			$insercion = new TablaUsuario();
			$usuario = TablaUsuario::select('usuario')->where('usuario',$_POST['usuario'])->count();
			$email = TablaUsuario::select('correo_usuario')->where('correo_usuario',$_POST['correo_inst'])->count();
			if($usuario == 0 && $email == 0){
				$pass = password_hash($_POST['password_usuario'], PASSWORD_BCRYPT);
				$insercion->estado = 0;
				$insercion->correo_usuario = $_POST['correo_inst'];
				$insercion->usuario = $_POST['usuario'];
				$insercion->fk_cat_rol = $_POST['rol_usuario'];
				$insercion->fk_persona = $_POST['persona'];
				$insercion->password = $pass;
				if($insercion->save()){
					echo json_encode(['1',"Creacion de usuario completada con exito!"]);
				}else{
					echo json_encode(['0',"No se ha creado el nuevo usuario!"]);
				}			
			}else{
				echo json_encode(['0', $usuario > 0 ? "Nombre de usuario ya registrado!" :"Correo electronico ya registrado!"]);
			}
		}
	}
	call_user_func('UsuariosAdmin::'.$_POST['funcion']);
?>