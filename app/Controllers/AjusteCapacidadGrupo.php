<?php
	use config\Token;
	use config\Sesion;
	use model\TablaHorario;
	require_once realpath('../../vendor/autoload.php');

	class AjusteCapacidadGrupo {
	}
	call_user_func('AjusteCapacidadGrupo::'.$_POST['funcion']);
?>