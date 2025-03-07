<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	use model\TablaPersona;
	use model\TablaDireccion;
	use model\CatalogoDirectorio;
	require_once realpath('../../vendor/autoload.php');

	class ModificacionAlumno {
		static function precargar_generales(){
			$consulta = TablaAlumno::select('apellido_paterno','apellido_materno','nombre_persona','lugar_nacimiento','fecha_nacimiento', 'fk_cat_sexo','fk_cat_estado_civil','telefono','curp','correo','codigo_postal', 'colonia', 'calle', 'numero_interior', 'numero_exterior','numero_control','id_usuario','id_direccion', 'id_alumno','id_persona')->join('t_persona', 't_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control', 't_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_direccion','t_persona.fk_direccion', 't_direccion.id_direccion')->where('fk_numero_control', $_POST['id'])->join('t_usuario', 't_persona.id_persona', 't_usuario.fk_persona')->first(); 
            echo json_encode($consulta); 
        }

		static function obtener_periodo($periodo){
            return ($periodo[4] == "1") ? ("ENE-JUN 20" . $periodo[2] . $periodo[3]) : ("AGO-DIC 20" . $periodo[2] . $periodo[3]);
        }
		
		static function precargar_escolares(){
			$consulta = TablaAlumno::select('escuela_procedencia','t_alumno.fk_cat_carrera', 'fk_cat_especialidad', 'periodo', 'periodos_revalidados', 'fk_cat_tipo_ingreso', 'fk_cat_estatus','numero_control','id_alumno','id_persona','fk_escolaridad')->join('t_persona', 't_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control', 't_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->join('t_periodo_escolar','t_alumno.fk_periodo_ingreso','t_periodo_escolar.id_periodo_escolar')->where('fk_numero_control', $_POST['id'])->first();
			$consulta['periodo_ingreso'] = self::obtener_periodo(''.$consulta->periodo);  
            echo json_encode($consulta); 
        }

		static function insertar_direccion_cat(){
			$directorio = new CatalogoDirectorio();
			$directorio->codigo_postal = $_POST['codigo_p_alumno'];
			$directorio->colonia = $_POST['colonia_generales'];
			$directorio->alcaldia = $_POST['alcaldia_generales'];
			$directorio->entidad_federativa = $_POST['estado_generales'];
			$directorio->save();
        }

		static function actualizar_direccion(){
            if(isset($_POST['escritura_manual_generales'])){
                self::insertar_direccion_cat();
            }
            $no_interior = empty($_POST['no_interior_generales']) ? "s/n" : $_POST['no_interior_generales'];
            $no_exterior = empty($_POST['no_exterior_generales']) ? "s/n" : $_POST['no_exterior_generales'];
			TablaDireccion::where('id_direccion',$_POST['id_direccion_alumno'])->update(['codigo_postal' =>$_POST['codigo_p_alumno'],'entidad_federativa' => $_POST['estado_generales'],'alcaldia' => $_POST['alcaldia_generales'],'colonia' => $_POST['colonia_generales'],'calle' => $_POST['calle_generales'],'numero_interior' => $no_interior,'numero_exterior' => $no_exterior]);           
        }

		static function actualizar_persona(){
			self::actualizar_direccion();
			$na = "Mexicana";
			TablaPersona::where('id_persona',$_POST['id_persona_alumno'])->update(['fk_cat_sexo' => $_POST['sexo_alumno'],'fk_cat_estado_civil' => $_POST['estado_civil_alumno'],'nombre_persona' => $_POST['nombre_alumno'],'apellido_paterno' => $_POST['apellido_p_alumno'],'apellido_materno' => $_POST['apellido_m_alumno'],'curp' => $_POST['curp_alumno'],'telefono' => $_POST['telefono_alumno'],'correo' => $_POST['correo_alumno'],'fecha_nacimiento' => $_POST['fecha_nac_alumno'],'lugar_nacimiento' => $_POST['lugar_nacimiento_alumno'],'nacionalidad' => $na]);
			echo json_encode(['1','Datos generales actualizados con exito!']);
        }

		static function actualizar_alumno(){
			if(Token::comprobar_token_frm('frm_datos_escolares',$_POST['tk_frm'])){
				$periodos_revalidados = empty($_POST['periodos_revalidados_alumno']) ? 0 : $_POST['periodos_revalidados_alumno'];
				TablaAlumno::where('id_alumno',$_POST['id_escolar_alumno'])->update(['fk_cat_especialidad' => $_POST['especialidad_alumno'],'fk_cat_estatus' => $_POST['estatus_alumno'],'fk_cat_carrera' => $_POST['carrera_alumno'],'fk_cat_reticula' => $_POST['plan_est'],'fk_cat_tipo_ingreso' => $_POST['tipo_ingreso_alumno'],'fk_escolaridad' => $_POST['nivel_escolar_alumno'],'periodos_revalidados' => $periodos_revalidados,'escuela_procedencia'=>$_POST['escuela_alumno']]);
				echo json_encode(["1", "Datos escolares actualizados con exito!"]);	
			}else{
                echo "Solicitud no valida";
            }
		}
	}
	call_user_func('ModificacionAlumno::'.$_POST['funcion']);
?>