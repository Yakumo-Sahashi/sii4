<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaAdeudos extends Model{
		public $timestamps = false;
		protected $table = 't_adeudos';
		protected $primaryKey = 'id_adeudos';
	}
?>