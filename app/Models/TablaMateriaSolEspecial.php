<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaMateriaSolEspecial extends Model{
		public $timestamps = false;
		protected $table = 't_materia_solicitada_especial';
		protected $primaryKey = 'id_materia_solicitada_especial';
	}
?>