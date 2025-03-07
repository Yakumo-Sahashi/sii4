<?php
	use config\Token;
	use config\Sesion;
use Illuminate\Support\Arr;
use model\TablaHorarioPeronal;
	use model\TablaPeriodoEscolar;
use model\TablaRegistroTemp;

	require_once realpath('../../vendor/autoload.php');

	class RhHorarios {
		static $dias = ['Monday' => 'lunes','Tuesday' => 'martes','Wednesday' => 'miercoles','Thursday' => 'jueves','Friday' => 'viernes','Saturday' => 'sabado','Sunday' => 'domingo'];
		static function reordenar_fecha($fecha){
			$fecha = explode("-",$fecha);
			$formato = $fecha[2]."-".$fecha[1]."-".$fecha[0];
			/* return self::$dias[date('l',$formato)]; */
			return $formato;
		}
		static function detec_dia($fecha){
			$fecha = explode("-",$fecha);
			$formato = $fecha[2]."-".$fecha[1]."-".$fecha[0];
			return self::$dias[date('l',strtotime($formato))];
		}
		static function calcular_retardo($hr_checador){
			$tiempo1 = new DateTime("07:00");
			$tiempo2 = new DateTime($hr_checador);
			if($tiempo1->diff($tiempo2)->h < 1){
				if($tiempo1->diff($tiempo2)->i >= 31){
					return "falta";
				}else if($tiempo1->diff($tiempo2)->i > 20 && $tiempo1->diff($tiempo2)->i < 31){
					return "retardo mayor";
				}else if($tiempo1->diff($tiempo2)->i > 10 && $tiempo1->diff($tiempo2)->i < 21){
					return "retardo";
				}else{
					return "OK";
				}
			}else{
				return "falta";
			}
		}

		static function obtener_horario_actual(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = TablaHorarioPeronal::select('checador_id','dia','hora_inicio','hora_fin')->where('fk_personal',$_POST['seleccion_personal'])->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->get();
			$horario = array();
			foreach($consulta as $valor){
				array_push($horario,["id" => $valor['checador_id'], "dia" => $valor['dia'], "hora_entrada" => $valor['hora_inicio'], "hora_salida" => $valor['hora_fin']]);				
			}
			return $horario;
		}

		static function calcular_incidencias(){
			if(Token::comprobar_token_frm("frm_incidencias",$_POST['tk_frm'])){
				$registros = array();
				if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
					$rutaTemporal = $_FILES['archivo']['tmp_name'];
					$tipoArchivo = $_FILES['archivo']['type'];
					if ($tipoArchivo === 'text/plain') {
						$contenido = fopen($rutaTemporal, "r");
						if($contenido){
							while (($linea = fgets($contenido)) !== false) {
								$datos = preg_replace("/[a-zA-Z]+/","",htmlspecialchars($linea));
								$datos = preg_split("/[\s]+/",htmlspecialchars($datos));
								if(count($datos) > 2){
									$dia = self::reordenar_fecha($datos[1]);
									array_push($registros,["id"=>($datos[0]),"dia"=>$dia,"fecha"=>($datos[1]),"hora"=>($datos[2]),"estado"=>$datos[2]]);
								}
							}
							fclose($contenido);
							$horario = self::obtener_horario_actual();
							function calcularMinutosDiferencia($hora1, $hora2) {
								$t1 = strtotime($hora1);
								$t2 = strtotime($hora2);
								return round(($t2 - $t1) / 60);
							}							
							// Agrupar registros por fecha
							$agrupadosPorFecha = [];
							foreach ($registros as $registro) {
								$fecha = $registro['fecha'];
								if (!isset($agrupadosPorFecha[$fecha])) {
									$agrupadosPorFecha[$fecha] = [];
								}
								$agrupadosPorFecha[$fecha][] = $registro;
							}							
							// Verificar retardos y salidas
							foreach ($agrupadosPorFecha as $fecha => $registrosDelDia) {
								foreach ($registrosDelDia as $registro) {
									$id = $registro['id'];
									$dia = $registro['dia'];
									$horaRegistro = $registro['hora'];							
									// Encontrar el horario correspondiente al día y al id
									$horarioDia = array_filter($horario, function ($h) use ($dia, $id) {
										return $h['dia'] === $dia && $h['id'] == $id;
									});							
									if (!empty($horarioDia)) {
										$horarioDia = array_values($horarioDia)[0];
										$horaEntradaEsperada = $horarioDia['hora_entrada'];
										$horaSalidaEsperada = $horarioDia['hora_salida'];							
										// Calcular diferencia para la entrada
										$diferenciaMinutosEntrada = calcularMinutosDiferencia($horaEntradaEsperada, $horaRegistro);							
										if ($diferenciaMinutosEntrada <= 0) {
											$estadoEntrada = "ok";
										} elseif ($diferenciaMinutosEntrada <= 10) {
											$estadoEntrada = "ok";
										} elseif ($diferenciaMinutosEntrada <= 20) {
											$estadoEntrada = "retardo";
										} elseif ($diferenciaMinutosEntrada <= 30) {
											$estadoEntrada = "retardo mayor";
										} else {
											$estadoEntrada = "falta";
										}							
										// Validar salidas
										$registrosDeSalida = array_filter($registrosDelDia, function ($r) use ($horaSalidaEsperada) {
											return calcularMinutosDiferencia($r['hora'], $horaSalidaEsperada) >= 0;
										});							
										if (empty($registrosDeSalida)) {
											$estadoSalida = "falta no se registró salida";
										} else {
											$registroDeSalida = end($registrosDeSalida);
											$horaSalida = $registroDeSalida['hora'];
											$diferenciaMinutosSalida = calcularMinutosDiferencia($horaSalidaEsperada, $horaSalida);
							
											if ($diferenciaMinutosSalida >= -10) {
												$estadoSalida = "ok";
											} elseif ($diferenciaMinutosSalida >= 0) {
												$estadoSalida = "ok";
											} else {
												$estadoSalida = "falta no se registró salida";
											}
										}							
										echo "ID: {$id}, Dia: {$dia},Fecha: {$fecha}, Entrada: {$horaRegistro}, Estado Entrada: {$estadoEntrada}, Estado Salida: {$estadoSalida}\n";
									} else {
										echo "ID: {$id}, Fecha: {$fecha} - No se encontró horario definido\n";
									}
								}
							}
							//echo json_encode($registros);				
						}
					} else {
						echo json_encode([0,"Formato de archivo no valido!!"]);
					}
				} else {
					return json_encode([0,"No se ha subido ningún archivo o ha ocurrido un error!"]);
				}
			}else{
                echo json_encode(["2","Solicitud no valida!"]);
            }
		}

		static function insercion_horario(){
			if(Token::comprobar_token_frm("frm_registro_horario",$_POST['tk_frm'])){
				$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
				$insercion = array();
				$consulta = TablaHorarioPeronal::where('fk_periodo_escolar',$periodo->id_periodo_escolar)->where('checador_id',$_POST['id_checador'])->orWhere('fk_personal',$_POST['seleccion_personal'])->get();
				if(count($consulta) > 0){
					echo json_encode(['0',"El empleado ya tiene un horario registrado!"]);
				}else{
					foreach($_POST as $key => $dt){
						if(preg_match('/^hora_inicio_[a-z]+[0-9]/', $key)){
							if($dt != ""){
								$campo = preg_replace('/^hora_inicio_/', '', $key);
								$campo = preg_replace('/[0-9]+/', '', $campo);
								if(preg_match('/^[0-9]+:[0-9]+/',$dt)){
									$hora_inicio = $dt;
								}else{
									$hora_inicio = $dt < 10 ? '0'. $dt . ':00' : '' . $dt . ':00';
								}
								array_push($insercion,["fk_periodo_escolar"=>$periodo->id_periodo_escolar,"dia"=> $campo,"hora_inicio"=>$hora_inicio,"hora_fin"=>$_POST[preg_replace('/inicio/', 'fin', $key)],"checador_id"=>$_POST['id_checador'],"fk_personal"=>$_POST['seleccion_personal']]);
							}
						}
					}  
					$insercion_horario = TablaHorarioPeronal::insert($insercion);
					if($insercion_horario){
						echo json_encode(['1',"Se ha creado el nuevo horario con exito!"]);
					}else{
						echo json_encode(['0',"Se ha producido un error al crear el nuevo horario!"]);
					}
				}
				
			}else{
                echo json_encode(["2","Solicitud no valida!"]);
            }
		}

		static function calcular_incidencias2(){
			if(Token::comprobar_token_frm("frm_incidencias",$_POST['tk_frm'])){
				if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
					$archivoTmp = $_FILES['archivo']['tmp_name'];
					$registros = array();
					if ($archivoTmp) {
						$lineas = file($archivoTmp, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
						foreach ($lineas as $linea) {
							$temp = preg_replace("/[a-zA-Z]+/","",htmlspecialchars($linea));
							$temp = preg_split("/\s/",htmlspecialchars($temp));
							if(count($temp) > 2){
								echo json_encode($temp);
								/* $temp[2] = self::reordenar_fecha($temp[2]);
								array_push($registros,[$temp]); */
							}
						}
						echo json_encode($registros);
					} else {
						echo json_encode(["0","Error al cargar el archivo."]);
					}
				} else {
					echo json_encode(["0","No se subió ningún archivo o hubo un error!"]);
				}
			}else{
                echo json_encode(["2","Solicitud no valida!"]);
            }
		}

		static function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin) {
            return $dia == $dia_tabla ? $hora_inicio .'-'. $hora_fin : ' - - - '; 
        }

		static function mostar_horarios(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = TablaHorarioPeronal::select('checador_id','dia','hora_inicio','hora_fin','nombre_persona','apellido_paterno','apellido_materno')->join('t_personal','t_horario_personal.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->get();
			$i = 0;
			foreach ($consulta as $aux){
                if(isset($horario)){
                    if($horario[($i-1)]['checador_id'] == $aux['checador_id']){
                        switch($aux['dia']){
                            case 'lunes': {
                                $horario[($i-1)]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin']);
                                break;
                            }
                            case 'martes': {
                                $horario[($i-1)]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin']);
                                break;
                            }
                            case 'miercoles': {
                                $horario[($i-1)]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin']);
                                break;
                            }
                            case 'jueves': {
                                $horario[($i-1)]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin']);
                                break;
                            }
                            case 'viernes': {
                                $horario[($i-1)]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin']);
                                break;
                            }
                            case 'sabado': {
                                $horario[($i-1)]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin']);
                                break;
                            }
                        }
                    }else {
                        $horario[$i]['checador_id'] = $aux['checador_id'];
                        $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin']);
                        $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin']);
                        $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin']);
                        $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin']);
                        $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin']);
                        $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin']);
                        $horario[$i]['nombre'] =$aux['nombre_persona']." ".$aux['apellido_paterno']." ".$aux['apellido_materno'];
                        $i++;
                    }
                }else {
					$horario[$i]['checador_id'] = $aux['checador_id'];
                    $horario[$i]['lunes'] = self::determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin']);
                    $horario[$i]['martes'] = self::determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin']);
                    $horario[$i]['miercoles'] = self::determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin']);
                    $horario[$i]['jueves'] = self::determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin']);
                    $horario[$i]['viernes'] = self::determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin']);
                    $horario[$i]['sabado'] = self::determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin']);
					$horario[$i]['nombre'] =$aux['nombre_persona']." ".$aux['apellido_paterno']." ".$aux['apellido_materno'];
                    $i++;
                }
            }
            echo json_encode($horario);
		}

		static function revisar_incidencias(){
			$consulta = TablaRegistroTemp::select('t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','t_registro_temp.fecha','t_registro_temp.entrada','t_registro_temp.salida','t_registro_temp.checador_id','t_registro_temp.dia','t_horario_personal.hora_inicio','t_horario_personal.hora_fin')->join('t_horario_personal','t_registro_temp.checador_id','t_horario_personal.checador_id')->join('t_personal','t_horario_personal.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->whereBetween('t_registro_temp.fecha',[$_POST['fecha_inicio'],$_POST['fecha_fin']])->whereBetween('t_registro_temp.dia',[TablaRegistroTemp::raw('t_horario_personal.dia')])->orderBy('t_registro_temp.fecha','desc')->orderBy('t_registro_temp.entrada','asc')->get();

			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}

		static function insercion_registro(){
			if(Token::comprobar_token_frm("frm_incidencias",$_POST['tk_frm'])){
				TablaRegistroTemp::truncate();
				$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
				$insercion = array();
				if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
					$rutaTemporal = $_FILES['archivo']['tmp_name'];
					$tipoArchivo = $_FILES['archivo']['type'];
					if ($tipoArchivo === 'text/plain') {
						$contenido = fopen($rutaTemporal, "r");
						if($contenido){
							$cont = 0;
							while (($linea = fgets($contenido)) !== false) {
								$datos = preg_replace("/[a-zA-Z]+/","",htmlspecialchars($linea));
								$datos = preg_split("/[\s]+/",htmlspecialchars($datos));
								if(count($datos) > 2){
									if($cont == 0){
										$insercion[$cont]=["checador_id"=>($datos[0]),"dia"=>self::detec_dia($datos[1]),"fecha"=>self::reordenar_fecha($datos[1]),"entrada"=>($datos[2]),"salida"=>"00:00:00","fk_periodo_escolar"=>$periodo->id_periodo_escolar];
									}else{
										$date1 = strtotime($insercion[$cont-1]['fecha']);
										$date2 = strtotime(self::reordenar_fecha($datos[1]));
										if($date1 == $date2){
											if($insercion[$cont-1]["salida"] == "00:00:00"){
												$insercion[$cont-1]["salida"]=$datos[2];
												continue;
											}else{
												$insercion[$cont]=["checador_id"=>($datos[0]),"dia"=>self::detec_dia($datos[1]),"fecha"=>self::reordenar_fecha($datos[1]),"entrada"=>($datos[2]),"salida"=>"00:00:00","fk_periodo_escolar"=>$periodo->id_periodo_escolar];
											}
										}else{
											$insercion[$cont]=["checador_id"=>($datos[0]),"dia"=>self::detec_dia($datos[1]),"fecha"=>self::reordenar_fecha($datos[1]),"entrada"=>($datos[2]),"salida"=>"00:00:00","fk_periodo_escolar"=>$periodo->id_periodo_escolar];
										}
									}
									$cont++;
								}
							}
							fclose($contenido);
							$insercion_horario = TablaRegistroTemp::insert($insercion);
							if($insercion_horario){
								echo json_encode(['1',"Se ha creado el nuevo horario con exito!"]);
							}else{
								echo json_encode(['0',"Se ha producido un error al crear el nuevo horario!"]);
							}							
						}
					} else {
						echo json_encode([0,"Formato de archivo no valido!!"]);
					}
				} else {
					return json_encode([0,"No se ha subido ningún archivo o ha ocurrido un error!"]);
				}			
			}else{
				echo json_encode(["2","Solicitud no valida!"]);
			}
		}

		static function eliminar_horario(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$delete = TablaHorarioPeronal::where('checador_id',$_POST['id'])->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->delete();
            if($delete){
                echo json_encode(["1","Se ha eliminado el horario de manera correcta!"]);
            }else {
                echo json_encode(["0","No se ha eliminado el horario!"]);
            }
		}
	}
	call_user_func('RhHorarios::'.$_POST['funcion']);
?>