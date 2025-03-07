<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAplicacionEvaluacion;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');

	class PeriodosEscolares {
		static function consultar_periodo(){
			$consulta = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_larga','fecha_inicio','fecha_termino','num_dias_clases','estado')->orderBy('id_periodo_escolar','desc')->get();
			if(count($consulta) > 0){
				echo json_encode($consulta);
			}else{
				echo json_encode([]);
			}
		}	
		
		static function precargar_periodo(){
			$consulta = TablaPeriodoEscolar::select('id_periodo_escolar','periodo','fecha_inicio','fecha_termino','inicio_vacacional','termino_vacacional','num_dias_clases','inic_encuesta_estudiantil','fin_encuesta_estudiantil')->where('id_periodo_escolar', $_POST['id'])->first();
			echo json_encode($consulta);
		}

		static function identificacion_periodo($periodo_year,$periodo){
			$identificacion_larga = '';
			$identificacion_corta = '';
			if($periodo == 1){
				$identificacion_larga = 'ENERO - JUNIO ' . $periodo_year;
				$identificacion_corta = 'ENE - JUN ' . $periodo_year;		
			}elseif($periodo == 3){
				$identificacion_larga = 'AGOSTO - DICIEMBRE ' . $periodo_year;
				$identificacion_corta = 'AGO - DIC ' . $periodo_year;	
			}else{
				$identificacion_larga = 'VERANO ' . $periodo_year;
				$identificacion_corta = 'VER ' . $periodo_year;
			}
			return [$identificacion_larga,$identificacion_corta];
		}

		static function asignar_fechas_evaluacion_alumno($periodo,$f_inicio,$f_fin){
			$insercion = new TablaAplicacionEvaluacion();
			$insercion->tipo_encuesta = 1;
			$insercion->fk_periodo_escolar = $periodo;
			$insercion->fecha_inicio = $f_inicio;
			$insercion->fecha_fin = $f_fin;
			$insercion->save();
		}

		static function creacion_periodo(){	
			$insercion = new TablaPeriodoEscolar();
			$identificacion = self::identificacion_periodo($_POST['year'],$_POST['periodo']);
			$insercion->periodo = ''.$_POST['year'].$_POST['periodo'];
			$insercion->identificacion_larga = $identificacion[0];
			$insercion->identificacion_corta  = $identificacion[1];
			$insercion->estado = 0;
			$insercion->fecha_inicio = $_POST['inicio_periodo'];
			$insercion->fecha_termino = $_POST['fin_periodo'];
			$insercion->inicio_vacacional = $_POST['inicio_vacaciones'];
			$insercion->termino_vacacional  = $_POST['fin_vacaciones'];
			$insercion->num_dias_clases = $_POST['dias_clase'];
			$insercion->inic_encuesta_estudiantil = $_POST['inicio_encuesta'];
			$insercion->fin_encuesta_estudiantil = $_POST['fin_encuesta'];
			/* $insercion->inic_seleccion_alumnos = $_POST['inicio_seleccion'];
			$insercion->fin_seleccion_alumnos = $_POST['fin_seleccion']; */
			$insercion->descripcion = $identificacion[0];
			if($insercion->save()){
				self::asignar_fechas_evaluacion_alumno($insercion->id_periodo_escolar,$_POST['inicio_encuesta'],$_POST['fin_encuesta']);
				echo json_encode(['1','El periodo escolar se ha creado de manera exitosa!']);
			}else{
				echo json_encode(['0','Se ha generado un error al crear el periodo escolar']);
			}
		}

		static function actualizar_estatus(){
			if($_POST['estatus'] == '0'){
				TablaPeriodoEscolar::where('estado','1')->update(['estado' => '0']);
			}
			$update = TablaPeriodoEscolar::where('id_periodo_escolar',$_POST['id'])->update(['estado' => $_POST['estatus']]);
			if($update){
				echo json_encode(['1','Periodo actualizada con exito!']);
			}else{
				echo json_encode(['0','Error al actualizar periodo!']);
			}
		}

		static function actualizar_fechas_evaluacion_alumno($periodo,$f_inicio,$f_fin){
			TablaAplicacionEvaluacion::where('fk_periodo_escolar',$periodo)->update(['fecha_inicio'=>$f_inicio,
			'fecha_fin'=>$f_fin]);
		}
		
		static function actualizar_periodo(){
			$identificacion = self::identificacion_periodo($_POST['year_actualizado'],$_POST['periodo_actualizado']);
			$cambios = ['periodo' => ''.$_POST['year_actualizado'].$_POST['periodo_actualizado'],
			'identificacion_larga' => $identificacion[0],
			'identificacion_corta' => $identificacion[1],
			'fecha_inicio' => $_POST['inicio_periodo_actualizado'],
			'fecha_termino' => $_POST['fin_periodo_actualizado'],
			'inicio_vacacional' => $_POST['inicio_vacaciones_actualizado'],
			'termino_vacacional'  => $_POST['fin_vacaciones_actualizado'],
			'num_dias_clases' => $_POST['dias_clase_actualizado'],
			'inic_encuesta_estudiantil' => $_POST['inicio_encuesta_actualizado'], 
			'fin_encuesta_estudiantil' => $_POST['fin_encuesta_actualizado'],
			/* 'inic_seleccion_alumnos' => $_POST['inicio_seleccion_actualizado'],
			'fin_seleccion_alumnos' => $_POST['fin_seleccion_actualizado'], */
			'descripcion' => $identificacion[0]];
			TablaPeriodoEscolar::where('id_periodo_escolar',$_POST['id_periodo_escolar'])->update($cambios);
			self::actualizar_fechas_evaluacion_alumno($_POST['id_periodo_escolar'],$_POST['inicio_encuesta_actualizado'],$_POST['fin_encuesta_actualizado']);
			echo json_encode(['1','El periodo escolar se ha modificado de manera exitosa!']);
		}


	}
	call_user_func('PeriodosEscolares::'.$_POST['funcion']);
?>