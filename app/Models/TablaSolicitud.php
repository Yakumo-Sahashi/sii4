<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaSolicitud extends Model{
		public $timestamps = false;
		protected $table = 't_solicitud';
		protected $primaryKey = 'id_solicitud';
	}
?>