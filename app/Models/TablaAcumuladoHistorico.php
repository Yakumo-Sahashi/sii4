<?php
	namespace model;
	use Illuminate\Database\Eloquent\Model;
	require_once '../Config/BaseDatos.php';

	class TablaAcumuladoHistorico extends Model{
		public $timestamps = false;
		protected $table = 't_acumulado_historico';
		protected $primaryKey = 'id_acumulado_historico';
	}
?>