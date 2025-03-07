<?php
	use config\Token;
	use config\Sesion;
	use model\TablaPrestamosMaestros;
	use model\TablaPeriodoEscolar;
	use model\TablaPersonal;
	use model\CatalogoOrganigrama;
	require_once realpath('../../vendor/autoload.php');

	class AsignacionTemporalDocente {
		static function consultar_origen_depto($id){
			$consulta = TablaPersonal::select('descripcion')->join('t_cat_organigrama','t_personal.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('id_personal',$id)->first();
			return $consulta->descripcion;
		}
		static function consultar_docentes(){
			$contenido[] = array();
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado', '1')->first();
			$consulta = TablaPrestamosMaestros::select('id_prestamos_maestros','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','t_persona.rfc','t_cat_organigrama.descripcion','t_prestamos_maestros.fk_personal')->join('t_personal','t_prestamos_maestros.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_organigrama','t_prestamos_maestros.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('t_prestamos_maestros.fk_cat_organigrama',Sesion::datos_sesion('depto'))->orWhere('t_personal.fk_cat_organigrama',Sesion::datos_sesion('depto'))->where('fk_periodo_escolar',$periodo->id_periodo_escolar)->get();
			$i = 0;
			foreach($consulta as $docente){
				$contenido[$i]['id_prestamos_maestros'] = $docente['id_prestamos_maestros'];
				$contenido[$i]['nombre_persona'] = $docente['nombre_persona'];
				$contenido[$i]['apellido_paterno'] = $docente['apellido_paterno'];
				$contenido[$i]['apellido_materno'] = $docente['apellido_materno'];
				$contenido[$i]['rfc'] = $docente['rfc'];
				$contenido[$i]['origen'] = self::consultar_origen_depto($docente['fk_personal']);
				$contenido[$i]['temp'] = $docente['descripcion'];
				$i++;
			}
			echo json_encode($contenido);
		}
		
		static function asignar_docente(){
			$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado', '1')->first();
			$insercion = new TablaPrestamosMaestros();
			$insercion->fk_periodo_escolar = $periodo->id_periodo_escolar;
			$insercion->fk_personal = $_POST['select_docente'];
			$insercion->fk_cat_organigrama = $_POST['area_academica'];
			if($insercion->save()){
				echo json_encode(['1',"Asiganción temporal de docente completada con exito!"]);
			}else{
				echo json_encode(['0',"No se asigno el docente al area seleccionada!"]);
			}
		}

		static function retirar_asignacion(){
			$delete = TablaPrestamosMaestros::where('id_prestamos_maestros',$_POST['id_docente'])->delete();
			if($delete){
				echo json_encode(['1',"Se ha retirado la siganción temporal con exito!"]);
			}else{
				echo json_encode(['0',"No se ha logrado retirar la asignacion del docente!"]);
			}
		}

		static function consultar_docentes_area(){
			echo '<option value="" selected>Seleccionar docente</option>';
			$consulta = TablaPersonal::select('id_personal','apellido_paterno','apellido_materno','nombre_persona','rfc')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_personal.nombramiento', 'D')->where('t_personal.fk_cat_organigrama', $_POST['area'])->get();
			foreach($consulta as $docente){
				if($docente->id_personal != 0){
					echo '<option value="'.$docente->id_personal.'"><p>'.$docente->apellido_paterno.' '.$docente->apellido_materno.' '.$docente->nombre_persona.' - '.$docente->rfc.'</p></option>';
				}
			}
        }

		static function consultar_area_academica(){
			echo '<option value="" Selected>Seleccionar area</option>';
			$consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->where('nivel','4')->where('tipo_area','D')->where('estado','1')->get();
			foreach($consulta as $departamento){
				if($departamento['id_cat_organigrama'] != 55){
					echo '<option value="' . $departamento['id_cat_organigrama'] . '">' . $departamento['descripcion'] . '</option>';
				}
			}
		}
	}
	call_user_func('AsignacionTemporalDocente::'.$_POST['funcion']);
?>