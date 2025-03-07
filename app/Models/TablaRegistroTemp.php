<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaRegistroTemp extends Model{
		public $timestamps = false;
		protected $table = 't_registro_temp';
		protected $primaryKey = 'id_registro_temp';
	}
?>