<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaAplicacionEvaluacion extends Model{
		public $timestamps = false;
		protected $table = 't_aplicacion_evaluacion';
		protected $primaryKey = 'id_aplicacion_evaluacion';
	}
?>