<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoDirectorio extends Model{
		public $timestamps = false;
		protected $table = 't_cat_data_dir';
		protected $primaryKey = 'id_cat_data_dir';
	}
?>