<?php
	use config\Token;
	use config\Sesion;
	use model;
	require_once realpath('../../vendor/autoload.php');

	// duda, crear tabla de problemas inscripcion, y hacer a nuestro modo este apartado
	// por lo qu eno existe tabla, creo que no se usa
	class problemasInscripcion {
		
	}
	call_user_func('problemasInscripcion::'.$_POST['funcion']);
?>