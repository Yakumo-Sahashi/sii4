<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaPersona extends Model{
		public $timestamps = false;
		protected $table = 't_persona';
		protected $primaryKey = 'id_persona';
	}
?>