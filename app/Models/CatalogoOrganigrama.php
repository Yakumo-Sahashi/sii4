<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoOrganigrama extends Model{
		public $timestamps = false;
		protected $table = 't_cat_organigrama';
		protected $primaryKey = 'id_cat_organigrama';
	}
?>