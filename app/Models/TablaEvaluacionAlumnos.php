<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaEvaluacionAlumnos extends Model{
		public $timestamps = false;
		protected $table = 't_evaluacion_alumnos';
		protected $primaryKey = 'id_evaluacion_alumnos';
	}
?>