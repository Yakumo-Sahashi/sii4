<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaHorario extends Model{
		public $timestamps = false;
		protected $table = 't_horario';
		protected $primaryKey = 'id_horario';
	}
?>