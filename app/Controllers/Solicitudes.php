<?php
	use config\Token;
	use config\Sesion;
	use model\TablaSolicitud;
	require_once realpath('../../vendor/autoload.php');

	class Solicitudes {
		static function mostrarDatos(){ //funcion para consultar y retornar las solicitudes de numeros de ctrl en la bd
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
	}
	call_user_func('Solicitudes::'.$_POST['funcion']);
?>