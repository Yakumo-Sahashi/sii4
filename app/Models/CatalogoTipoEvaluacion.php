<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class CatalogoTipoEvaluacion extends Model{
		public $timestamps = false;
		protected $table = 't_cat_tipo_evaluacion';
		protected $primaryKey = 'id_cat_tipo_evaluacion';
	}
?>