<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoRol extends Model{
		public $timestamps = false;
		protected $table = 't_cat_rol';
		protected $primaryKey = 'id_cat_rol';
	}
?>