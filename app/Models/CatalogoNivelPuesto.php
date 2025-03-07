<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoNivelPuesto extends Model{
		public $timestamps = false;
		protected $table = 't_cat_nivel_puesto';
		protected $primaryKey = 'id_cat_nivel_puesto';
	}
?>