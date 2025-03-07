<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaGrupo extends Model{
		public $timestamps = false;
		protected $table = 't_grupo';
		protected $primaryKey = 'id_grupo';
	}
?>