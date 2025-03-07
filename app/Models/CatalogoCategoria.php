<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoCategoria extends Model{
		public $timestamps = false;
		protected $table = 't_cat_categorias';
		protected $primaryKey = 'id_categorias';
	}
?>