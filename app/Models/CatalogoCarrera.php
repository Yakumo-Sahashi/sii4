<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoCarrera extends Model{
		public $timestamps = false;
		protected $table = 't_cat_carrera';
		protected $primaryKey = 'id_cat_carrera';
	}
?>