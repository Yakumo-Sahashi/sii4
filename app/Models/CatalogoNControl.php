<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoNControl extends Model{
		public $timestamps = false;
		protected $table = 't_numero_control';
		protected $primaryKey = 'id_numero_control';
	}
?>