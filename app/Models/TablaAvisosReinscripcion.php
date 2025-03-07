<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaAvisosReinscripcion extends Model{
		public $timestamps = false;
		protected $table = 't_avisos_reinscripcion';
		protected $primaryKey = 'id_avisos_reinscripcion';
	}
?>