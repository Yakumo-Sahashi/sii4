<?php
	use config\Token;
	use config\Sesion;
	use model\TablaSolExamenEspecial;
	use model\TablaPeriodoEscolar;
	use model\TablaAlumno;
	require_once realpath('../../vendor/autoload.php');

	class Examenes {
		static function crear_examen(){
			if(Token::comprobar_token_frm("frm_examen_solicitud",$_POST['tk_frm'])){
				$insercion = new TablaSolExamenEspecial();
				$insercion->fk_numero_control = $_POST['id_num_control'];
				$insercion->autorizacion = $_POST['autorizacion'];
				$insercion->fk_periodo_escolar=$_POST['id_periodo_escolar'];
				$insercion->tipo_evaluacion=$_POST['global'];
				$insercion->fk_cat_materias=$_POST['materia'];
				if ($insercion->save()) {
					echo json_encode(['1','Se ha creado el examen correctamente']);					
				}else{
					echo json_encode(['0','No se ha creado el examen correctamente']);					
				}
			}else{
				echo json_encode(['2','Accion no valida!']);					
			}
		}
		static function obtener_periodos(){
			$consulta = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->orderBy('id_periodo_escolar','desc')->get();
			echo '<option value="" selected>Seleccione el periodo</option>';
            foreach ($consulta as $periodo){
                echo '<option value="' . $periodo['id_periodo_escolar'] .'">' . $periodo['identificacion_corta'] . '</option>';
            }
		}	

		static function consultar_alumno(){
			$consulta = TablaAlumno::select('t_usuario.id_usuario','t_alumno.fk_persona','nombre_persona','apellido_paterno','apellido_materno','numero_control','fk_numero_control','semestre','identificacion_corta','t_alumno.fk_cat_carrera','carrera','promedio_aritmetico_acumulado','especialidad','t_usuario.id_usuario','periodos_revalidados')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_periodo_escolar','t_alumno.fk_periodo_ingreso','t_periodo_escolar.id_periodo_escolar')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('t_numero_control.numero_control',$_POST['numero_de_control'])->first();
			if($consulta){
				echo json_encode(['1',$consulta]);
			}else{
				echo json_encode(['0',"Informacion no encontrada. Por favor verifica el numero control!"]);
			}
		}

		static function consultar_examenes(){
			$consulta = TablaSolExamenEspecial::select('id_solicitudes_ex_especiales','identificacion_corta','tipo_evaluacion','autorizacion','nombre_completo_materia')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_solicitudes_ex_especiales.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->where('t_numero_control.numero_control',$_POST['numero_de_control'])->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$_POST['periodo'])->get();
			if(count($consulta)>0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}

		static function consultar_examenes_periodo(){
			$consulta = TablaSolExamenEspecial::select('id_solicitudes_ex_especiales','t_solicitudes_ex_especiales.fk_cat_materias','nombre_completo_materia')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_solicitudes_ex_especiales.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$_POST['periodo'])->orderBy('t_solicitudes_ex_especiales.fk_cat_materias','asc')->get();
			if(count($consulta) > 0){
				$i = 0;
				foreach($consulta as $examen){
					if(!isset($examenes)){
						$examenes[$i]['id_solicitudes_ex_especiales'] = $examen['id_solicitudes_ex_especiales'];
						$examenes[$i]['fk_cat_materias'] = $examen['fk_cat_materias'];
						$examenes[$i]['nombre_completo_materia'] = $examen['nombre_completo_materia'];
						$examenes[$i]['inscritos'] = 1;
					}else{
						if($examen['fk_cat_materias'] == $examenes[$i]['fk_cat_materias']){
							$examenes[$i]['inscritos'] ++;								
						}else{
							$i++;
							$examenes[$i]['id_solicitudes_ex_especiales'] = $examen['id_solicitudes_ex_especiales'];
							$examenes[$i]['fk_cat_materias'] = $examen['fk_cat_materias'];
							$examenes[$i]['nombre_completo_materia'] = $examen['nombre_completo_materia'];
							$examenes[$i]['inscritos'] = 1;
						}
					}
				}
				if(isset($examenes)){
					echo json_encode($examenes);
				}else{
					echo json_encode([]);
				}
			}else{
				echo json_encode([]);
			}
		}

		static function consultar_examenes_cal(){
			$consulta = TablaSolExamenEspecial::select('id_solicitudes_ex_especiales','calificacion_especial','nombre_completo_materia','carrera','nombre_persona','apellido_paterno','apellido_materno','numero_control')->join('t_alumno','t_solicitudes_ex_especiales.fk_numero_control','t_alumno.fk_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->where('fk_cat_materias',$_POST['materia'])->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$_POST['periodo'])->get();
			if(count($consulta) > 0){
				$i = 0;
				foreach($consulta as $examen){
					$examenes[$i]['id_solicitudes_ex_especiales'] = $examen['id_solicitudes_ex_especiales'];
					$examenes[$i]['calificacion_especial'] = $examen['calificacion_especial'];
					$examenes[$i]['nombre_completo_materia'] = $examen['nombre_completo_materia'];
					$examenes[$i]['carrera'] = $examen['carrera'];
					$examenes[$i]['nombre'] = $examen['apellido_paterno'].' '.$examen['apellido_materno'].' '.$examen['nombre_persona'];
					$examenes[$i]['numero_control'] = $examen['numero_control'];
					$i++;
				}
				echo json_encode($examenes);
			}else{
				echo json_encode([]);
			}
		}


		static function eliminar_examen(){
			$consulta = TablaSolExamenEspecial::select('calificacion_especial')->where('id_solicitudes_ex_especiales',$_POST['id'])->first();
			if($consulta->calificacion_especial == '0'){
				TablaSolExamenEspecial::where('id_solicitudes_ex_especiales',$_POST['id'])->delete();
				echo json_encode(['1','Se ha eliminado el examen con exito!']);
			}else{
				echo json_encode(['2','No se puede eliminar el examen debido a que ya se ha asignado una calificacion!']);
			}
		}

		static function consultar_especiales_periodo(){
			$consulta = TablaSolExamenEspecial::select('t_numero_control.numero_control','t_cat_materias.nombre_completo_materia','calificacion_especial','tipo_evaluacion','autorizacion','fecha_especial','t_cat_materias.clave_oficial')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_solicitudes_ex_especiales.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$_POST['periodo'])->orderBy('t_solicitudes_ex_especiales.fk_cat_materias','asc')->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}

		static function consultar_examenes_alumno(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
			$consulta = TablaSolExamenEspecial::select('tipo_evaluacion','calificacion_especial','nombre_completo_materia','clave_oficial')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_solicitudes_ex_especiales.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_numero_control.id_numero_control','t_alumno.fk_numero_control')->where('t_alumno.fk_persona',Sesion::datos_sesion('fk_persona'))->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$periodo->id_periodo_escolar)->get();
			if(count($consulta)>0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}
	}
	call_user_func('Examenes::'.$_POST['funcion']);
?>