<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoEscuelaProcedencia extends Model{
		public $timestamps = false;
		protected $table = 't_cat_escuela_procedencia';
		protected $primaryKey = 'id_cat_escuela_procedencia';
	}
?>