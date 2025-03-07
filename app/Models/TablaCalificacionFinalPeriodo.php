<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaCalificacionFinalPeriodo extends Model{
		public $timestamps = false;
		protected $table = 't_calificacion_final_periodo';
		protected $primaryKey = 'id_calificacion_final_periodo';
	}
?>