<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaHorarioPeronal extends Model{
		public $timestamps = false;
		protected $table = 't_horario_personal';
		protected $primaryKey = 'id_horario_personal';
	}
?>