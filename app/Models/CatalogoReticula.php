<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoReticula extends Model{
		public $timestamps = false;
		protected $table = 't_cat_reticula';
		protected $primaryKey = 'id_cat_reticula';
	}
?>