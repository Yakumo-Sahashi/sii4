<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoNControl;
	use model\TablaSolicitud;
	require_once realpath('../../vendor/autoload.php');

	class CreacionNumerosControl {
		static function mostrar_num_control(){     
            if(empty($_POST['filtro'])){   
			    $consulta = CatalogoNControl::select('numero_control', 'estatus','autorizar','fecha_autorizacion')->join('t_periodo_escolar','t_numero_control.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->where('estado','1')->get();
            }else{
                $filtro = $_POST['filtro'];
                $consulta = CatalogoNControl::select('numero_control', 'estatus','autorizar','fecha_autorizacion')->join('t_periodo_escolar','t_numero_control.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->where('estatus', $filtro)->where('estado','1')->get();
            }
            foreach($consulta as $control){
                $arreglo [] = $control;
            }
            if(isset($arreglo)){
                echo json_encode($arreglo);
            }else{
                $arreglo [] = array();
                echo json_encode($arreglo);
            }    
        } 		

		static function consultar_estado_solicitud(){
		    $consulta = TablaSolicitud::select('id_solicitud', 'estado_solicitud')->orderBy('t_solicitud.fecha_realizo_solicitud', 'desc')->first(1);
            echo json_encode($consulta);
        }

		static function enviar_solicitud(){ //funcion para enviar la solicitud a la bd
            if(Token::comprobar_token_frm("frm_num_ctrl",$_POST['tk_frm'])){
                $sesion = Sesion::datos_sesion('id_usuario');
                $solicitud = $_POST['num_matriculas'];
                $descripcion = "Generación de números de control";
				$solicitud_insert = new TablaSolicitud();
				$solicitud_insert->solicitud = $solicitud;
				$solicitud_insert->descripcion_solicitud= $descripcion;
				$solicitud_insert->id_usuario_envio_solicitud= $sesion;
				$solicitud_insert->id_usuario_recibio_solicitud= 3;
				$solicitud_insert->save();
				echo json_encode(["1","La solicitud se ha enviado, por favor espera que sea aceptada"]);
                //echo json_encode(["0","No se pudo procesar la solicitud, por favor contacta al administrador"]);
            }else{
                echo json_encode(["0","Solicitud no valida"]);
            }
        }

        static function cancelar_solicitud(){ //funcion para cancelar la solicitud y eliminarla de la bd
            if(Token::comprobar_token_frm("frm_num_ctrl",$_POST['tk_frm'])){
				//TablaSolicitud::delete('t_solicitud')->orderBy('t_solicitud.id_solicitud','desc')->limit('1');
                echo json_encode(["1","La solicitud ha sido cancelada!"]);
            }else{
                echo json_encode(["0","Solicitud no valida"]);
            }
        }

        static function mostrarDatos(){ //funcion para consultar y retornar las solicitudes de numeros de ctrl en la bd
            $sesion = Sesion::datos_sesion('id_usuario');
            $consulta = TablaSolicitud::select('solicitud','descripcion_solicitud','estado_solicitud','fecha_realizo_solicitud','fecha_atencion_solicitud')->where('id_usuario_envio_solicitud', $sesion)->get();
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
	}
	call_user_func('CreacionNumerosControl::'.$_POST['funcion']);
?>