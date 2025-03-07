<?php
	use config\Token;
	use config\Sesion;
use Illuminate\Support\Arr;
use model\TablaHorario;
	use model\CatalogoAulas;
	use model\CatalogoMaterias;
	use model\TablaGrupo;
    use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');

	class Horarios {
        static function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin, $aula, $id) {
            return $dia == $dia_tabla ? $hora_inicio .'-'. $hora_fin .'-'. $aula .'-'.$id : ' - - - '; 
        }
        
		static function obtener_disponibilidad(){
            $hora_inicio = $_POST['hora_inicio'];
            $hora_fin = $_POST['hora_fin'];
			$consulta = TablaHorario::select('dia','fk_cat_aulas','hora_inicio','hora_fin')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->where('dia',$_POST['dia'])->where('fk_cat_aulas',$_POST['aula'])->where('fk_periodo_escolar',$_POST['periodo'])->get();
            if(count($consulta) > 0){
                $respuesta = 1;
                $hora_ini = 0;
                $hora_fn = 0;
                foreach($consulta as $horario){
                    $hora_ini = intval($horario['hora_inicio']);
                    if($hora_ini == intval($hora_inicio)){
                        $respuesta ++;      
                    }                    
                    $hora_fn =  intval($horario['hora_fin']);
                    if(($hora_fn > intval($hora_inicio)) && ($hora_ini < intval($hora_inicio))){
                        $respuesta ++;      
                    }
                    if(($hora_fn >= intval($hora_fin)) && (intval($hora_fin) > $hora_ini)){
                        $respuesta ++;
                    }
                }
                echo json_encode($respuesta);
            }else{
                echo json_encode("1");
            }
        }
        
        static function consultar_aula(){
			$consulta = CatalogoAulas:: select('id_cat_aulas','aula')->where('estatus_aula','A')->get();
            echo '<option value="">Aula</option>';
            foreach ($consulta as $materia){
                echo '<option value="' . $materia['id_cat_aulas'] .'">' . $materia['aula'] . '</option>';
            }
        }

		static function actualizar_exclusividad($estado, $razon_cambio){			
            if($razon_cambio == "Sin cambio"){
				//CatalogoMaterias::where('id_cat_materias',$_POST['materia'])->update('exclusivo_carrera', $estado);
            }else{
				CatalogoMaterias::where('id_cat_materias',$_POST['materia'])->update(['exclusivo_carrera'=>$estado,'razon_cambio_exclusivo'=> $razon_cambio]);
            }
        }

		static function insercion_grupo(){
			$insercion = new TablaGrupo();
			$insercion->fk_cat_carrera = $_POST['carrera'];
			$insercion->fk_cat_materias = $_POST['materia'];
			$insercion->fk_periodo = $_POST['periodo_id'];
			$insercion->semestre = $_POST['semestre'];
			$insercion->nombre_grupo = $_POST['nombre_grupo'];
			$insercion->capacidad = $_POST['capacidad'];
			$insercion->estatus_grupo = '1';
			$insercion->save();
            return $insercion->id_grupo;
        }

		static function insercion_horario(){
            $dias_semana = array('','lunes','martes','miercoles','jueves','viernes','sabado');
            if(Token::comprobar_token_frm("frm_horario_grupo",$_POST['tk_frm'])){
                if(isset($_POST['exclusivo'])){
                    self::actualizar_exclusividad(1, $_POST['razon_cambio_exclusividad']);                    
                }else{
                    self::actualizar_exclusividad(0, $_POST['razon_cambio_exclusividad']);
                }
                $grupo = self::insercion_grupo();
				$insercion[] = array();
                $j = 0;
                for($i = 1; $i < 7; $i++){ 
                    if($_POST['hora_inicio' . $i] != "" && $_POST['hora_fin' . $i] != ""){
                        $hora_clase = $_POST['hora_inicio' . $i] < 10 ? '0'. $_POST['hora_inicio' . $i] . ':00' : '' . $_POST['hora_inicio' . $i] . ':00';                        
						$insercion[$j]['dia'] = $dias_semana[$i];
						$insercion[$j]['hora_inicio'] = $hora_clase;
						$insercion[$j]['hora_fin'] = $_POST['hora_fin' . $i];
						$insercion[$j]['fk_cat_aulas'] = $_POST['aula' . $i];
						$insercion[$j]['fk_grupo'] = $grupo;
						$insercion[$j]['fk_periodo_escolar'] = $_POST['periodo_id'];
						$insercion[$j]['tipo_horario'] = '';
						$insercion[$j]['fk_cat_materias'] = $_POST['materia'];
						$j++;
                    }
                }      
				$insercion_horario = TablaHorario::insert($insercion);
				if($insercion_horario){
					echo json_encode(['1',"Se ha creado el nuevo horario y grupo con exito!"]);
				}else{
					echo json_encode(['0',"Se ha producido un error al crear el nuevo horario!"]);
				}
            }else{
                echo json_encode(["2","Solicitud no valida!"]);
            }
        }

        static function precargar_horario(){
            $consulta = TablaHorario::select('id_horario','dia','hora_inicio','hora_fin','nombre_grupo','aula','nombre_completo_materia','creditos_totales','t_grupo.id_grupo','t_grupo.capacidad','exclusivo_carrera','t_grupo.fk_cat_materias')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->where('fk_grupo',$_POST['id'])->get();
            $i = 0;
            foreach ($consulta as $aux){
                if(isset($horario)){
                    if($horario[($i-1)]['nombre_completo_materia'] == $aux['nombre_completo_materia'] && $horario[($i-1)]['nombre_grupo'] == $aux['nombre_grupo']){
                        switch($aux['dia']){
                            case 'lunes': {
                                $horario[($i-1)]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'martes': {
                                $horario[($i-1)]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'miercoles': {
                                $horario[($i-1)]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'jueves': {
                                $horario[($i-1)]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'viernes': {
                                $horario[($i-1)]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                            case 'sabado': {
                                $horario[($i-1)]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                                break;
                            }
                        }
                    }else {
                        $horario[$i]['id_horario'] = $aux['id_horario'];
                        $horario[$i]['id_grupo'] = $aux['id_grupo'];
                        $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                        $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                        $horario[$i]['nombre_completo_materia'] = $aux['nombre_completo_materia'];
                        $horario[$i]['capacidad'] = $aux['capacidad'];
                        $horario[$i]['creditos_totales'] = $aux['creditos_totales'];
                        $horario[$i]['exclusivo_carrera'] = $aux['exclusivo_carrera'];
                        $horario[$i]['fk_cat_materias'] = $aux['fk_cat_materias'];
                        $i++;
                    }
                }else {
                    $horario[$i]['id_horario'] = $aux['id_horario'];
                    $horario[$i]['id_grupo'] = $aux['id_grupo'];
                    $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
                    $horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
                    $horario[$i]['nombre_completo_materia'] = $aux['nombre_completo_materia'];
                    $horario[$i]['capacidad'] = $aux['capacidad'];
                    $horario[$i]['creditos_totales'] = $aux['creditos_totales'];
                    $horario[$i]['exclusivo_carrera'] = $aux['exclusivo_carrera'];
                    $horario[$i]['fk_cat_materias'] = $aux['fk_cat_materias'];
                    $i++;
                }
            }
            echo json_encode($horario);
        }

        static function obtener_disponibilidad_act(){
            $periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
            $hora_inicio = $_POST['hora_inicio'];
            $hora_fin = $_POST['hora_fin'];
			$consulta = TablaHorario::select('id_horario','dia','fk_cat_aulas','hora_inicio','hora_fin')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->where('dia',$_POST['dia'])->where('fk_cat_aulas',$_POST['aula'])->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->get();
            if(count($consulta) > 0){
                $respuesta = 1;
                $hora_ini = 0;
                $hora_fn = 0;
                foreach($consulta as $horario){
                    if(!in_array(strval($horario['id_horario']), json_decode($_POST['actual_id']))){
                        $hora_ini = intval($horario['hora_inicio']);
                        if($hora_ini == intval($hora_inicio)){
                            $respuesta ++;      
                        }                    
                        $hora_fn =  intval($horario['hora_fin']);
                        if(($hora_fn > intval($hora_inicio)) && ($hora_ini < intval($hora_inicio))){
                            $respuesta ++;      
                        }
                        if(($hora_fn >= intval($hora_fin)) && (intval($hora_fin) > $hora_ini)){
                            $respuesta ++;
                        }
                    }
                }
                echo json_encode($respuesta);
            }else{
                echo json_encode("1");
            }
        }

        static function actualizar_grupo(){
			TablaGrupo::where('id_grupo',$_POST['id_actualizar_grupo'])->update(['nombre_grupo' => $_POST['grupo_actualizar'],'capacidad' => $_POST['capacidad_actualizar']]);
        }

        static function actualizar_horario(){
            $dias_semana = array('','lunes','martes','miercoles','jueves','viernes','sabado');
            if(Token::comprobar_token_frm("frm_act_horario",$_POST['tk_frm'])){
                $periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
                /* if(isset($_POST['exclusivo'])){
                    self::actualizar_exclusividad(1, $_POST['razon_cambio_exclusividad']);                    
                }else{
                    self::actualizar_exclusividad(0, $_POST['razon_cambio_exclusividad']);
                } */
                self::actualizar_grupo();
				$insercion[] = array();
                $j = 0;
                for($i = 1; $i < 7; $i++){ 
                    if($_POST['hora_inicio' . $i] != "" && $_POST['hora_fin' . $i] != ""){
                        $hora_clase = $_POST['hora_inicio' . $i] < 10 ? '0'. $_POST['hora_inicio' . $i] . ':00' : '' . $_POST['hora_inicio' . $i] . ':00';                        
						$insercion[$j]['dia'] = $dias_semana[$i];
						$insercion[$j]['hora_inicio'] = $hora_clase;
						$insercion[$j]['hora_fin'] = $_POST['hora_fin' . $i];
						$insercion[$j]['fk_cat_aulas'] = $_POST['aula' . $i];
						$insercion[$j]['fk_grupo'] = $_POST['id_actualizar_grupo'];
						$insercion[$j]['fk_periodo_escolar'] = $periodo->id_periodo_escolar;
						$insercion[$j]['tipo_horario'] = '';
						$insercion[$j]['fk_cat_materias'] = $_POST['id_materia_actualizar'];
						$j++;
                    }
                }      
				$insercion_horario = TablaHorario::insert($insercion);
				if($insercion_horario){
                    $id = json_decode($_POST['actual_id']);
                    $ids[] = array();
                    for($i = 0; $i < count($id); $i++){
                        if($id[$i] != ''){
                            $ids[$i]['id_horario'] = $id[$i];
                        }
                    }
                    $consulta = TablaHorario::destroy($ids);
                    if($consulta){
                        echo json_encode(['1',"Se ha actualizado el horario y grupo con exito!"]);
                    }else{
                        echo json_encode(['0',"Se ha producido un error al actualizar el horario!"]);    
                    }
				}else{
					echo json_encode(['0',"Se ha producido un error al actualizar el horario!"]);
				}
            }else{
                echo json_encode(["2","Solicitud no valida!"]);
            }
        }
	}
	call_user_func('Horarios::'.$_POST['funcion']);
?>