<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoMaterias extends Model{
		public $timestamps = false;
		protected $table = 't_cat_materias';
		protected $primaryKey = 'id_cat_materias';
	}
?>