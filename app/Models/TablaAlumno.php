<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaAlumno extends Model{
		public $timestamps = false;
		protected $table = 't_alumno';
		protected $primaryKey = 'id_alumno';
	}
?>