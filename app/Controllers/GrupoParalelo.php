<?php
	use config\Token;
	use config\Sesion;
	use model\TablaGrupo;
	use model\CatalogoMaterias;
	use model\TablaPeriodoEscolar;
	use model\TablaHorario;

	require_once realpath('../../vendor/autoload.php');

	class GrupoParalelo {
		static function consultar_grupo(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			echo '<option value="">Seleccionar grupo</option>';
			$consulta = TablaGrupo::select('id_grupo','nombre_grupo')->where('fk_cat_carrera',$_POST['carrera'])->where('fk_cat_materias',$_POST['materia'])->where('t_grupo.fk_periodo',$periodo->id_periodo_escolar)->get();
			foreach($consulta as $grupo){
				echo '<option value="'.$grupo['id_grupo'].'">'.$grupo['nombre_grupo'].'</option>';
			}
		}
		static function consultar_exclusivo_carrera(){
			$consulta = CatalogoMaterias::select('exclusivo_carrera')->where('id_cat_materias',$_POST['id_cat_materia'])->first();
			echo json_encode($consulta);
		}
		static function consulta_grupo_paralelo(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = TablaGrupo::select('t_grupo.id_grupo','t_grupo.nombre_grupo','t_grupo.semestre','t_cat_materias.nombre_completo_materia','t_cat_carrera.nombre_carrera','paralelo_de')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_carrera','t_grupo.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('t_grupo.fk_periodo',$periodo->id_periodo_escolar)->where('paralelo_de','not like','NP')->get();
			echo json_encode($consulta);
		}
		static function insertar_horario($id){
            $consulta = TablaHorario::select('dia','hora_inicio','hora_fin','fk_cat_aulas','fk_grupo','fk_periodo_escolar','fk_cat_materias')->where('fk_grupo',$_POST['grupo_origen'])->get();
			$insercion[] = array();
            $j = 0;
			foreach($consulta as $horario){                        
				$insercion[$j]['dia'] = $horario->dia;
				$insercion[$j]['hora_inicio'] = $horario->hora_inicio;
				$insercion[$j]['hora_fin'] = $horario->hora_fin;
				$insercion[$j]['fk_cat_aulas'] = $horario->fk_cat_aulas;
				$insercion[$j]['fk_grupo'] = $id;
				$insercion[$j]['fk_periodo_escolar'] = $horario->fk_periodo_escolar;
				$insercion[$j]['tipo_horario'] = '';
				$insercion[$j]['fk_cat_materias'] = $horario->fk_cat_materias;
				$j++;
			}      
			$insercion_horario = TablaHorario::insert($insercion);
			if($insercion_horario){
				return true;
			}else{
				return false;
			}
        }
		static function agregar_grupo_paralelo(){
			if(Token::comprobar_token_frm('frm_agregar_paralelo',$_POST['tk_frm'])){
				$consulta = TablaGrupo::select('t_grupo.capacidad','t_grupo.fk_periodo','t_grupo.nombre_grupo','t_cat_materias.clave_oficial','t_grupo.fk_personal','t_grupo.fk_cat_materias')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('id_grupo',$_POST['grupo_origen'])->first();
				
				$consulta2 = isset($_POST['carrera_paralelo']) ? CatalogoMaterias::select('id_cat_materias')->where('clave_oficial',$consulta->clave_oficial)->where('fk_cat_reticula',$_POST['carrera_paralelo'])->first() : '';

				$insercion = new TablaGrupo();
				$insercion->fk_cat_carrera = isset($_POST['carrera_paralelo']) ? $_POST['carrera_paralelo'] : $_POST['carrera_origen'];
				$insercion->fk_cat_materias = isset($_POST['carrera_paralelo']) ? $consulta2->id_cat_materias : $consulta->fk_cat_materias;
				$insercion->fk_periodo = $consulta->fk_periodo;
				$insercion->semestre = $_POST['semestre_paralelo'];
				$insercion->nombre_grupo = $_POST['nombre_grupo_paralelo'];
				$insercion->fk_personal = $consulta->fk_personal;
				$insercion->capacidad = $consulta->capacidad;
				$insercion->estatus_grupo = '1';
				$insercion->paralelo_de = $consulta->nombre_grupo.'/'.$consulta->clave_oficial;
				$insercion->save();
				if(self::insertar_horario($insercion->id_grupo)){
					echo json_encode(['1','Grupo paralelo creado con exito!']);
				}else{
					echo json_encode(['0','No se ha creado el grupo paralelo']);
				}
			}else{
				echo json_encode("Solicitud no validad");
			}
		}
		static function eliminar_grupo_paralelo(){
			$delete = TablaHorario::where('fk_grupo',$_POST['id'])->delete();
            if($delete){
                TablaGrupo::where('id_grupo',$_POST['id'])->delete();
                echo json_encode(["1","Se ha eliminado el horario de manera correcta!"]);
            }else {
                echo json_encode(["0","No se ha eliminado el horario!"]);
            }
		}
		static function obtener_materias_carrera(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
            echo '<option value="" selected>Seleccionar materia</option>';

			$consulta = TablaGrupo::select('t_cat_materias.id_cat_materias','t_cat_materias.nombre_completo_materia')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_grupo.fk_periodo',$periodo->id_periodo_escolar)->where('t_grupo.fk_cat_carrera', $_POST['filtro'])->get();

            foreach ($consulta as $materia) {
                echo '<option value="' . $materia['id_cat_materias'] . '">' . $materia['nombre_completo_materia'] . '</option>';
            }
		}
	}
	call_user_func('GrupoParalelo::'.$_POST['funcion']);
?>