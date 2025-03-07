<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	use model\TablaHistoriaAlumno;
	use model\TablaSeleccionMaterias;

	require_once realpath('../../vendor/autoload.php');

	class AlumnosInscritos {
		static function calificacion($id){
			$calificaciones = TablaHistoriaAlumno::select('calificacion','t_cat_materias.creditos_totales')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->where('fk_numero_control',$id)->get();
			$promedio = 0;
			$cont = 0;
			$creditos = 0;
			foreach($calificaciones as $cal){
				if($cal['calificacion'] != 'NA'){
					$promedio += $cal['calificacion'];
					$creditos +=  $cal['creditos_totales'];
					$cont++;
				}
			}
			return ['pro'=>$promedio == 0 ? 0 :round($promedio/$cont,2),'credit'=>$creditos];
		}

		static function mostrar_alumnos_incritos(){
			$consulta = TablaSeleccionMaterias::select('id_alumno','fk_persona','t_alumno.fk_numero_control','numero_control', 'nombre_persona', 'apellido_paterno', 'apellido_materno', 't_alumno.semestre','t_cat_materias.creditos_totales','t_alumno.fk_cat_carrera')->join('t_grupo','t_seleccion_materias.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_alumno','t_seleccion_materias.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera', 't_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_numero_control','t_alumno.fk_numero_control', 't_numero_control.id_numero_control')->where('t_seleccion_materias.fk_cat_periodo',$_POST['periodo'])->where('t_cat_carrera.id_cat_carrera',$_POST['carrera'])->orderBy('t_seleccion_materias.fk_numero_control','asc')->get();

			$i = 0;
			$temp = 0;
			if(count($consulta) > 0){
				foreach($consulta as $alumno){
					if(isset($listado[$i]['id_alumno'])){
						if($alumno['id_alumno'] != $temp){
							$listado[$i]['promedio'] = self::calificacion($listado[$i]['fk_numero_control']);
							$i++;
							$listado[$i]['id_alumno'] = $alumno['id_alumno'];
							$listado[$i]['fk_persona'] = $alumno['fk_persona'];
							$listado[$i]['fk_numero_control'] = $alumno['fk_numero_control'];
							$listado[$i]['fk_cat_carrera'] = $alumno['fk_cat_carrera'];
							$listado[$i]['numero_control'] = $alumno['numero_control'];
							$listado[$i]['nombre'] = $alumno['apellido_paterno'].' '.$alumno['apellido_materno'].' '.$alumno['nombre_persona'];
							$listado[$i]['semestre'] = $alumno['semestre'];
							$listado[$i]['carga'] = $alumno['creditos_totales'];		
							$temp = $alumno['id_alumno'];		
						}else{
							$listado[$i]['carga'] += $alumno['creditos_totales'];					
						}
					}else{
						$listado[$i]['id_alumno'] = $alumno['id_alumno'];
						$listado[$i]['fk_persona'] = $alumno['fk_persona'];
						$listado[$i]['fk_numero_control'] = $alumno['fk_numero_control'];
						$listado[$i]['fk_cat_carrera'] = $alumno['fk_cat_carrera'];
						$listado[$i]['numero_control'] = $alumno['numero_control'];
						$listado[$i]['nombre'] = $alumno['apellido_paterno'].' '.$alumno['apellido_materno'].' '.$alumno['nombre_persona'];
						$listado[$i]['semestre'] = $alumno['semestre'];
						$listado[$i]['carga'] = $alumno['creditos_totales'];
						$temp = $alumno['id_alumno'];
					}
				}
				$listado[$i]['promedio'] = self::calificacion($listado[$i]['fk_numero_control']);
			}else{
				$listado = [];
			}
			echo json_encode($listado);
		}		
	}
	call_user_func('AlumnosInscritos::'.$_POST['funcion']);
?>