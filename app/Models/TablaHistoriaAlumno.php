<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaHistoriaAlumno extends Model{
		public $timestamps = false;
		protected $table = 't_historia_alumno';
		protected $primaryKey = 'id_historia_alumno';
	}
?>