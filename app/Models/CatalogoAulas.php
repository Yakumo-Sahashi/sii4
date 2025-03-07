<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoAulas extends Model{
		public $timestamps = false;
		protected $table = 't_cat_aulas';
		protected $primaryKey = 'id_cat_aulas';
	}
?>