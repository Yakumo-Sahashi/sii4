<?php
	use config\Token;
	use config\Sesion;
	use model\TablaSolicitud;
	use model\CatalogoNControl;
use model\TablaPeriodoEscolar;

	require_once realpath('../../vendor/autoload.php');

	class NumerosControlAcad {
		static function mostrarDatos(){
            $sesion = Sesion::datos_sesion('id_usuario');
            $consulta = TablaSolicitud::select('solicitud','descripcion_solicitud','estado_solicitud','fecha_realizo_solicitud','fecha_atencion_solicitud')->where('id_usuario_recibio_solicitud', $sesion)->get();
            foreach($consulta as $aux){
                $arreglo[] = $aux;
            }
            if(isset($arreglo)){
              echo json_encode($arreglo);
            }else{
              $arreglo['solicitud'] = '';
              $arreglo['descripcion_solicitud'] ='';
              $arreglo['estado_solicitud'] ='';
              $arreglo['fecha_realizo_solicitud'] ='';
              $arreglo['fecha_atencion_solicitud'] ='';
              echo json_encode($arreglo);
            }                
        }	
		static function consultar_solicitud(){ 
			$consulta = TablaSolicitud::select('solicitud','id_solicitud')->where('estado_solicitud', '0')->orderBy('t_solicitud.fecha_realizo_solicitud', 'desc')->first();
            echo json_encode($consulta);
		}
		static function consultar_numero_ctrl(){
			$consulta = CatalogoNControl::select('numero_control')->join('t_periodo_escolar','t_numero_control.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->where('estado','1')->orderBy('t_numero_control.id_numero_control', 'desc')->first();
            date_default_timezone_set('America/Mexico_City');
            $anio = date("y"); 
            if(empty($consulta)){
				$numCtrl = $anio."1190000";
                echo ''.$numCtrl;
            } else {
				$numCtrl = "".$consulta->numero_control;
                echo ''.$numCtrl;
            }
        }
		static function generar_num_ctrl(){
            if(Token::comprobar_token_frm("frm_aprobar_ctrl",$_POST['tk_frm'])){
                $solicitud = $_POST['num_matriculas'];
                $idSolicitud = $_POST['id_solicitud'];
                $periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
				$consulta = CatalogoNControl::select('numero_control')->orderBy('t_numero_control.id_numero_control','desc')->first();
                date_default_timezone_set('America/Mexico_City');
                $anio = date("y");
                //$periodo =  date("n") > 7 ? date("Y")."3" : date("Y")."1";
                $numCtrl = !empty($consulta) ? "".$consulta->numero_control : "";
                $insercion[] = array();
                if(empty($consulta)){                    
                    $numCtrl = $anio."1190001";
                    for($i = 0; $i < $solicitud; $i++){
						$insercion[$i]['numero_control'] = $numCtrl;
						$insercion[$i]['autorizar'] = 'autorizado';
						$insercion[$i]['estatus'] = 'disponible';
                        $insercion[$i]['fk_periodo_escolar']= $periodo->id_periodo_escolar;
                        $numCtrl++;
                    }
                }elseif(substr($numCtrl, 0, 2) != $anio){
                    $numCtrl = $anio."1190001";
                    for($i = 0; $i < $solicitud; $i++){
						$insercion[$i]['numero_control'] = $numCtrl;
						$insercion[$i]['autorizar'] = 'autorizado';
						$insercion[$i]['estatus'] = 'disponible';
                        $insercion[$i]['fk_periodo_escolar']= $periodo->id_periodo_escolar;
                        $numCtrl++;
                    }                    
                } else {
                    $numCtrl++;
                    for($i = 0; $i < $solicitud; $i++){
						$insercion[$i]['numero_control'] = $numCtrl;
						$insercion[$i]['autorizar'] = 'autorizado';
						$insercion[$i]['estatus'] = 'disponible';
                        $insercion[$i]['fk_periodo_escolar']= $periodo->id_periodo_escolar;
                        $numCtrl++;
                    }
                }
                $respuesta = !empty($solicitud) ? CatalogoNControl::insert($insercion) : 0;
                if($respuesta){
                    $sesion = Sesion::datos_sesion('id_usuario'); //aqui se obtienen los datos de la sesion y luego se usan para actualizar el estado de la sesion en la siguiente línea
                    $fecha = date('y-m-d H:i:s');
                    TablaSolicitud::where('id_solicitud',$idSolicitud)->update(['estado_solicitud'=>'1','id_usuario_recibio_solicitud'=> $sesion, 'fecha_atencion_solicitud' => $fecha]);
                    echo json_encode(["1","Se han generado los numeros de control"]);
                }else{
                    echo json_encode(["0","No se han generado los numeros de control"]);
                }
            } else {
                echo json_encode(["2","Solicitud no valida!"]);
            } 
		}
	}
	call_user_func('NumerosControlAcad::'.$_POST['funcion']);
?>