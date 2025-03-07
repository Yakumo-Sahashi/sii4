<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoNControl;
	use model\TablaAutorizacionesAcademicas;
	use model\TablaPeriodoEscolar;
	use model\TablaAlumno;
	use model\TablaAvisosReinscripcion;

	require_once realpath('../../vendor/autoload.php');

	class AutorizacionesAcademicas{
		static function consultar_alumno(){
			$consulta = TablaAlumno::select('nombre_persona','apellido_paterno','apellido_materno','fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->where('numero_control',$_POST['num_ctrl'])->first();
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0',"Informacion no encontrada, por favor verifica el numero control!"]);
			}
		}
		static function insertar_motivo(){
			date_default_timezone_set('America/Mexico_City');
			if(Token::comprobar_token_frm('frm_autorizaciones_academicas',$_POST['tk_frm'])){
				$insercion = new TablaAutorizacionesAcademicas();
				$insercion->fk_periodo_escolar = $_POST['fk_periodo'];
				$insercion->fk_numero_control = $_POST['fk_numero_control'];
				$insercion->fk_cat_tipo_autorizacion = $_POST['select_autorizacion'];
				$insercion->motivo_autorizacion = empty($_POST['motivo_autorizacion']) ? "S/M": $_POST['motivo_autorizacion'];
				$insercion->fk_usuario = Sesion::datos_sesion('id_usuario');
				$insercion->fecha_hora_autorizacion = date('y-m-d H:i:s');
				if($insercion->save()){
					echo json_encode(['1','Motivo agregado con exito!']);
				}else{
					echo json_encode(['0','Error al agregar el motivo!']);
				}
			}else{
                echo json_encode("Solicitud no valida");
            }
		}
		static function consultar_motivos(){
			$consulta = TablaAutorizacionesAcademicas::select('nombre_persona','apellido_paterno','apellido_materno','identificacion_corta','t_cat_tipo_autorizacion.descripcion','motivo_autorizacion')->join('t_alumno','t_autorizaciones_inscripcion.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_periodo_escolar','t_autorizaciones_inscripcion.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_cat_tipo_autorizacion','t_autorizaciones_inscripcion.fk_cat_tipo_autorizacion','t_cat_tipo_autorizacion.id_cat_tipo_autorizacion')->where('t_alumno.fk_numero_control',$_POST['id_numero_control'])->where('fk_periodo_escolar',$_POST['id_periodo'])->get();
			echo json_encode($consulta);
		}

		static function acutorizacion_inscripcion(){
			$consulta = CatalogoNControl::select('id_numero_control')->where('numero_control',$_POST['numero_control_inscripcion'])->first();
			$consulta2 = TablaAvisosReinscripcion::select('id_avisos_reinscripcion')->where('fk_numero_control',$consulta->id_numero_control)->count();
			if($consulta2 == 0){
				$insercion = new TablaAvisosReinscripcion();
				$insercion->fk_periodo_escolar = $_POST['seleccion_periodo_inscripcion'];
				$insercion->fk_numero_control = $consulta->id_numero_control;
				$insercion->fk_usuario = Sesion::datos_sesion('id_usuario');
				$insercion->recibo_pago = $_POST['recibo_pago_inscripcion'];
				$insercion->fecha_hora = date('y-m-d H:i:s');
				if($insercion->save()){
					echo json_encode(["1","Autorización de inscripción procesada con exito!"]);
				}else{
					echo json_encode(["0","Error al procesar autorización de inscripción!"]);
				}
			}else{
				echo json_encode(["1","El alumno ya fue aprobado para inscripción previamente!"]);
			}
		}

		static function consultar_reinscripcion_alumno(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = TablaAvisosReinscripcion::select('id_avisos_reinscripcion')->join('t_numero_control','t_avisos_reinscripcion.fk_numero_control','t_numero_control.id_numero_control')->where('t_numero_control.numero_control',$_POST['num_ctrl'])->where('t_avisos_reinscripcion.fk_periodo_escolar',$periodo->id_periodo_escolar)->first();
			echo json_encode($consulta);
		}
	}
	call_user_func('AutorizacionesAcademicas::'.$_POST['funcion']);
?>