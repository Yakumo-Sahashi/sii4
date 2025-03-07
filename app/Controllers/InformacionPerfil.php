<?php
	use config\Token;
	use config\Sesion;
	use model;
	require_once realpath('../../vendor/autoload.php');

	class InformacionPerfil {
		static function actualizarNombre(){
			return "Hola";
		}
	}
	call_user_func('InformacionPerfil::'.$_POST['funcion']);
?>