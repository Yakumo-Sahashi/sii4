<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoEspecialidad extends Model{
		public $timestamps = false;
		protected $table = 't_cat_especialidad';
		protected $primaryKey = 'id_cat_especialidad';
	}
?>