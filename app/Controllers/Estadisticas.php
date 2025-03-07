<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoCarrera;
	use model\TablaAcumuladoHistorico;
	use model\TablaAlumno;
	use model\TablaAvisosReinscripcion;
	use model\TablaHistoriaAlumno;
	use model\TablaPeriodoEscolar;
	use model\TablaPersonal;

	require_once realpath('../../vendor/autoload.php');

	class Estadisticas {
		static function calcular_edad($fecha_nacimiento){
			$fecha_nacimiento = new DateTime($fecha_nacimiento);
			$fecha_actual = new DateTime();
			$diferencia = $fecha_actual->diff($fecha_nacimiento);
			if($diferencia->y <= 18){
				return 0;
			}

			if($diferencia->y == 19){
				return 1;
			}

			if($diferencia->y == 20){
				return 2;
			}
			
			if($diferencia->y >= 21 && $diferencia->y < 24){
				return 3;
			}

			if($diferencia->y >= 24 && $diferencia->y < 28){
				return 4;
			}

			if($diferencia->y >= 28 && $diferencia->y < 31){
				return 5;
			}

			if($diferencia->y >= 31 && $diferencia->y < 34){
				return 6;
			}

			if($diferencia->y >= 34 && $diferencia->y < 37){
				return 7;
			}

			if($diferencia->y >= 37 && $diferencia->y < 40){
				return 8;
			}

			if($diferencia->y >= 40 && $diferencia->y < 43){
				return 9;
			}

			if($diferencia->y >= 43 && $diferencia->y < 46){
				return 10;
			}

			if($diferencia->y > 45){
				return 11;
			}
		}

		static function calcular_edad_empleado($fecha_nacimiento){
			$fecha_nacimiento = new DateTime($fecha_nacimiento);
			$fecha_actual = new DateTime();
			$diferencia = $fecha_actual->diff($fecha_nacimiento);
			if($diferencia->y <= 18){
				return 0;
			}

			if($diferencia->y == 19){
				return 1;
			}

			if($diferencia->y == 20){
				return 2;
			}
			
			if($diferencia->y >= 21 && $diferencia->y < 24){
				return 3;
			}

			if($diferencia->y >= 24 && $diferencia->y < 28){
				return 4;
			}

			if($diferencia->y >= 28 && $diferencia->y < 31){
				return 5;
			}

			if($diferencia->y >= 31 && $diferencia->y < 34){
				return 6;
			}

			if($diferencia->y >= 34 && $diferencia->y < 37){
				return 7;
			}

			if($diferencia->y >= 37 && $diferencia->y < 40){
				return 8;
			}

			if($diferencia->y >= 40 && $diferencia->y < 43){
				return 9;
			}

			if($diferencia->y >= 43 && $diferencia->y < 46){
				return 10;
			}

			if($diferencia->y >= 46 && $diferencia->y < 49){
				return 11;
			}

			if($diferencia->y >= 49 && $diferencia->y < 52){
				return 12;
			}
			
			if($diferencia->y >= 52 && $diferencia->y < 55){
				return 13;
			}

			if($diferencia->y >= 55 && $diferencia->y < 58){
				return 14;
			}

			if($diferencia->y >= 58 && $diferencia->y < 61){
				return 15;
			}

			if($diferencia->y > 60){
				return 16;
			}
		}

		static function edad_alumno(){
			$resultado = array();
			$edad = [0,0,0,0,0,0,0,0,0,0,0,0];
			$consulta1 = CatalogoCarrera::select('carrera')->where('estatus','1')->get();
			foreach($consulta1 as $carrera){
				$resultado[$carrera->carrera] = ['M' => $edad, 'F' => $edad];
			}
			$consulta = TablaAvisosReinscripcion::select('t_cat_carrera.carrera','sexo','t_persona.fecha_nacimiento')->join('t_alumno','t_avisos_reinscripcion.fk_numero_control','t_alumno.fk_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_sexo','t_persona.fk_cat_sexo','id_cat_sexo')->where('t_avisos_reinscripcion.fk_periodo_escolar',$_POST['periodo_consulta'])->get();
			foreach($consulta as $inscrito){
				$resultado[$inscrito->carrera][$inscrito->sexo == 'Hombre' ? 'M' : 'F'][self::calcular_edad($inscrito->fecha_nacimiento)]++;
			}
			echo json_encode($resultado);
		}

		static function edad_docente(){
			$resultado = array();
			$edad = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
			$consulta1 = TablaPersonal::select('nombramiento')->distinct()->get(['nombramiento']);
			foreach($consulta1 as $empleado){
				$resultado[$empleado->nombramiento] = ['M' => $edad, 'F' => $edad];
			}
			$consulta = TablaPersonal::select('t_persona.fecha_nacimiento','nombramiento','sexo')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_sexo','t_persona.fk_cat_sexo','id_cat_sexo')->where('fk_cat_estatus','1')->get();
			foreach($consulta as $empleado){
				$resultado[$empleado->nombramiento][$empleado->sexo == 'Hombre' ? 'M' : 'F'][self::calcular_edad_empleado($empleado->fecha_nacimiento)]++;
			}
			echo json_encode($resultado);
		}

		static function inscripcion(){
			$resultado = array();
			$semestre = [0,0,0,0,0,0,0,0,0,0,0,0,0];
			$consulta1 = CatalogoCarrera::select('carrera')->where('estatus','1')->get();
			foreach($consulta1 as $carrera){
				$resultado[$carrera->carrera] = ['M' => $semestre, 'F' => $semestre];
			}
			$consulta = TablaAvisosReinscripcion::select('t_alumno.semestre','t_cat_carrera.carrera','sexo')->join('t_alumno','t_avisos_reinscripcion.fk_numero_control','t_alumno.fk_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_sexo','t_persona.fk_cat_sexo','id_cat_sexo')->where('t_avisos_reinscripcion.fk_periodo_escolar',$_POST['periodo_consulta'])->get();
			foreach($consulta as $inscrito){
				$resultado[$inscrito->carrera][$inscrito->sexo == 'Hombre' ? 'M' : 'F'][$inscrito->semestre <= 12 ? $inscrito->semestre-1 : 12]++;
			}
			echo json_encode($resultado);
		}

		static function reprobacion_carrera(){
			$resultado = array();
			$reprobacion = [0,0,0,0,0,0,0];
			$consulta1 = CatalogoCarrera::select('carrera')->where('estatus','1')->get();
			foreach($consulta1 as $carrera){
				$resultado[$carrera->carrera] = $reprobacion;
			}
			$consulta = TablaAcumuladoHistorico::select('t_cat_carrera.carrera','materias_reprobadas')->join('t_alumno','t_acumulado_historico.fk_numero_control','t_alumno.fk_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('t_acumulado_historico.fk_periodo_escolar',$_POST['periodo_consulta'])->get();
			foreach($consulta as $reprobado){
				$resultado[$reprobado->carrera][$reprobado->materias_reprobadas <= 5 ? $reprobado->materias_reprobadas : 6]++;
			}
			echo json_encode($resultado);
		}

		static function calcular_semestre($periodo_ingreso){
			$consulta = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado',1)->first();
			return $consulta->id_periodo_escolar - $periodo_ingreso;						
		}

		static function promedio_cal(){
			$resultado = array();
			$semestre = [0,0,0,0,0,0,0,0,0,0,0,0,0];
			$consulta1 = CatalogoCarrera::select('carrera')->where('estatus','1')->get();
			foreach($consulta1 as $carrera){
				$resultado[$carrera->carrera] = [$semestre,$semestre];
			}
			$consulta = TablaAcumuladoHistorico::select('t_cat_carrera.carrera','promedio_aritmetico','t_alumno.fk_periodo_ingreso')->join('t_alumno','t_acumulado_historico.fk_numero_control','t_alumno.fk_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('t_acumulado_historico.fk_periodo_escolar',$_POST['periodo_consulta'])->get();
			foreach($consulta as $promedio){
				$semestre = self::calcular_semestre($promedio->fk_periodo_ingreso);
				$resultado[$promedio->carrera][0][$semestre <= 12 ? $semestre-1 : 12] += $promedio->promedio_aritmetico;
				$resultado[$promedio->carrera][1][$semestre <= 12 ? $semestre-1 : 12]++;
			}
			echo json_encode($resultado);			
		}

		static function reprobacion_materia(){
			$resultado = array();
			$opciones = [0,0,0];
			$consulta1 = TablaHistoriaAlumno::select('nombre_abreviado_materia','clave_oficial')->join('t_alumno','t_historia_alumno.fk_numero_control','t_alumno.fk_numero_control')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_historia_alumno.fk_periodo_escolar',$_POST['periodo_consulta'])->where('t_alumno.fk_cat_carrera', $_POST['carrera_rep_carrera'])->distinct()->get(['clave_oficial']);
			foreach($consulta1 as $materia){
				$resultado[$materia->clave_oficial] = [$materia->nombre_abreviado_materia,$opciones];
			}
			$consulta = TablaHistoriaAlumno::select('calificacion','clave_oficial','presento')->join('t_alumno','t_historia_alumno.fk_numero_control','t_alumno.fk_numero_control')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_historia_alumno.fk_periodo_escolar',$_POST['periodo_consulta'])->where('t_alumno.fk_cat_carrera', $_POST['carrera_rep_carrera'])->get();
			foreach($consulta as $promedio){
				if($promedio->calificacion == 'NA'){
					$resultado[$promedio->clave_oficial][1][1]++;
					if($promedio->presento != 1){
						$resultado[$promedio->clave_oficial][1][2]++;
					}					
				}else{
					$resultado[$promedio->clave_oficial][1][0]++;
				}
			}
			echo json_encode($resultado);			
		}
	}
	call_user_func('Estadisticas::'.$_POST['funcion']);
?>