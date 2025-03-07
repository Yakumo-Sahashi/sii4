<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaControlCalificacionesParciales extends Model{
		public $timestamps = false;
		protected $table = 't_control_calificaciones_parciales';
		protected $primaryKey = 'id_control_calificaciones_parciales';
	}
?>