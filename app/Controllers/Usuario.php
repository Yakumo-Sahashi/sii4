<?php
	use config\Token;
	use config\Sesion;
	use model\TablaUsuario;

	require_once realpath('../../vendor/autoload.php');

	class Usuario {
		static function remplazar_foto(){
			$data = $_POST['img'];
			$img_arreglo = explode(";", $data);
			$img_arreglo2 = explode(",", $img_arreglo[1]);
			$dat =  base64_decode($img_arreglo2[1]);
			$nombre_img = '../../public/img/'. $_POST['usuario'] . '/'.'fotografia.webp';
			if(file_put_contents($nombre_img, $dat)){
				echo json_encode(["1","La imagen se ha recortado y cargado de manera correcta en el servidor"]);
			}else {
				echo json_encode(["0","Se ha producido un error al procesar la imagen!"]);
			}
		}

		static function actualizar_pass(){
			if(Token::comprobar_token_frm('frm_cambio_pass',$_POST['tk_frm'])){
				$consulta = TablaUsuario::select('password')->where('id_usuario',$_POST['id_usuario'])->first();
				if(password_verify($_POST['password_actual'], $consulta->password)){
					$pass = password_hash($_POST['nueva_password'], PASSWORD_BCRYPT);            
					TablaUsuario::where('id_usuario',$_POST['id_usuario'])->update(['password'=>$pass]);
					echo json_encode(['1','Contraseña actualizada con exito!']);
				}else{
					echo json_encode(['0','Contraseña actual incorrecta!']);
				}
			}else{
				echo json_encode(['0','Accion no valida!']);
			}
        }
	}
	call_user_func('Usuario::'.$_POST['funcion']);
?>