<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaAutorizacionesAcademicas extends Model{
		public $timestamps = false;
		protected $table = 't_autorizaciones_inscripcion';
		protected $primaryKey = 'id_autorizaciones_inscripcion';
	}
?>