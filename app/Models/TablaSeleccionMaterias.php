<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaSeleccionMaterias extends Model{
		public $timestamps = false;
		protected $table = 't_seleccion_materias';
		protected $primaryKey = 'id_seleccion_materias';
	}
?>