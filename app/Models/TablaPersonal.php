<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaPersonal extends Model{
		public $timestamps = false;
		protected $table = 't_personal';
		protected $primaryKey = 'id_personal';
	}
?>