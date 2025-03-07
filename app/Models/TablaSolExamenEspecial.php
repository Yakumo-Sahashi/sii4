<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaSolExamenEspecial extends Model{
		public $timestamps = false;
		protected $table = 't_solicitudes_ex_especiales';
		protected $primaryKey = 'id_solicitudes_ex_especiales';
	}
?>