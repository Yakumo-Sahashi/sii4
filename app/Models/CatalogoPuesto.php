<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoPuesto extends Model{
		public $timestamps = false;
		protected $table = 't_cat_puestos';
		protected $primaryKey = 'id_cat_puestos';
	}
?>