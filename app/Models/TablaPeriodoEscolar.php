<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaPeriodoEscolar extends Model{
		public $timestamps = false;
		protected $table = 't_periodo_escolar';
		protected $primaryKey = 'id_periodo_escolar';
	}
?>