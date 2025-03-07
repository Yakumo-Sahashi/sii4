<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaPrestamosMaestros extends Model{
		public $timestamps = false;
		protected $table = 't_prestamos_maestros';
		protected $primaryKey = 'id_prestamos_maestros';
	}
?>