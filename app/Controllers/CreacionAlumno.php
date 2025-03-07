<?php
	use config\Token;
	use config\Sesion;
	use model\CatalogoDirectorio;
	use model\CatalogoNControl;
	use model\TablaAlumno;
	use model\TablaDireccion;
	use model\TablaPersona;
	use model\TablaUsuario;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');

	class CreacionAlumno {
		static function obtener_periodo_actual(){
            $consulta = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
	        return $consulta['id_periodo_escolar'];
        }

		static function insertar_direccion_cat(){
			$directorio = new CatalogoDirectorio();
			$directorio->codigo_postal = $_POST['codigo_postal'];
			$directorio->colonia = $_POST['colonia'];
			$directorio->alcaldia = $_POST['alcaldia'];
			$directorio->entidad_federativa = $_POST['estado'];
			$directorio->save();
        }
		static function crear_direccion(){
            $no_interior = empty($_POST['no_interior']) ? "s/n" : $_POST['no_interior'];
            $no_exterior = empty($_POST['no_exterior']) ? "s/n" : $_POST['no_exterior'];
            if(isset($_POST['escritura'])){
                self::insertar_direccion_cat();
            }
			$direccion = new TablaDireccion();
			$direccion->codigo_postal =$_POST['codigo_postal'];
			$direccion->entidad_federativa = $_POST['estado'];
			$direccion->alcaldia = $_POST['alcaldia'];
			$direccion->colonia = $_POST['colonia'];
			$direccion->calle = $_POST['calle'];
			$direccion->numero_interior = $no_interior;
			$direccion->numero_exterior = $no_exterior;
            $direccion->save();
            return $direccion->id_direccion;            
        }
		static function crear_persona($fk_direccion){
			$na = "Mexicana";
			$persona = new TablaPersona();
			$persona->fk_cat_sexo = $_POST['selector_sexo'];
			$persona->fk_cat_estado_civil = $_POST['selector_edo_civil'];
			$persona->fk_cat_escuela_procedencia = $_POST['nivel_escolar'];
			$persona->fk_direccion = $fk_direccion;
			$persona->nombre_persona = $_POST['nombres'];
			$persona->apellido_paterno = $_POST['apellido_paterno'];
			$persona->apellido_materno = $_POST['apellido_materno'];
			$persona->curp = $_POST['curp'];
			//$persona->rfc = $_POST['curp'];
			$persona->telefono = $_POST['telefono'];
			$persona->correo = $_POST['correo_electronico'];
			$persona->fecha_nacimiento = $_POST['fecha_nacimiento'];
			$persona->lugar_nacimiento = $_POST['lugar_nacimiento'];
			$persona->nacionalidad = $na;
			$persona->save();
            return $persona->id_persona;
        }
		static function obtener_periodo(){
            date_default_timezone_set('America/Mexico_City');
            $mes_actual = date("m");
            $year_actual = date("Y");
            return $mes_actual <= 6 ? "" . $year_actual . "1" : "" . $year_actual . "3";
        }

		static function generarCorreoInstitucional(){
			if($_POST['numero_control'] == 'esc'){     
				return 'l' . $_POST['no_control'] . '@milpaalta2.tecnm.mx';    
			}else{
				$consulta = CatalogoNControl::select('numero_control')->where('id_numero_control',$_POST['numero_control'])->first();
				return 'l' . $consulta->numero_control . '@milpaalta2.tecnm.mx';            
			}
        }
		static function generarPassword() { 
            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8); 
        }  

		static function creacion_usuario($fk_persona){
            $rol = 8;
            $desconectado = 0;
            $correo = self::generarCorreoInstitucional();
            $password = self::generarPassword();
			$usuario = new TablaUsuario();
			$usuario->fk_persona = $fk_persona;
			$usuario->fk_cat_rol = $rol;
			$usuario->estado = $desconectado;
			$usuario->correo_usuario = $correo;
			$pass = password_hash($password, PASSWORD_BCRYPT);
			$usuario->password = $pass;
			$usuario->save();
            return $usuario->id_usuario;
        }

		static function cargar_carpeta($id_persona){                    
            $ruta = '../../public/img/ALUMNO/'.$id_persona.'/';
            if(!file_exists($ruta)){
                if(mkdir($ruta)) {
                    return true;
                }else {
                    return false;
                }
            }else {
                return true;
            }	           
        }

		static function crear_numero_control($control){
			$insercion = new CatalogoNControl();
			$insercion->numero_control = $control;
			$insercion->autorizar = 'autorizado';
			$insercion->estatus = 'disponible';
			$insercion->fk_periodo_escolar = self::obtener_periodo_actual();
			$insercion->save();
			return $insercion->id_numero_control;
		}

		static function crear_alumno(){
			if(Token::comprobar_token_frm('frm_creacion_alumno',$_POST['tk_frm'])){
				$id_direccion = self::crear_direccion();			
				$id_persona = self::crear_persona($id_direccion);
				$id_control_nuevo = '';
				$semestre = 1;
				$periodo_ingreso = self::obtener_periodo_actual();
				$periodos_revalidados = empty($_POST['periodos_revalidados']) ? 0 : $_POST['periodos_revalidados'];
				$alumno = new TablaAlumno();
				if($_POST['numero_control'] == 'esc'){
					$id_control_nuevo = self::crear_numero_control($_POST['no_control']);
					$alumno->fk_numero_control = $id_control_nuevo;
				}else{
					$alumno->fk_numero_control = $_POST['numero_control'];
				}
				$alumno->fk_persona = $id_persona;
				$alumno->fk_cat_especialidad = $_POST['especialidad'];
				$alumno->fk_cat_estatus = $_POST['estatus_alumno'];
				$alumno->fk_cat_carrera = $_POST['carrera_reticula'];
				$alumno->fk_cat_reticula = $_POST['plan_est'];
				$alumno->fk_cat_tipo_ingreso = $_POST['tipo_ingresos'];
				$alumno->semestre = $semestre;
				$alumno->fk_periodo_ingreso = $periodo_ingreso;
				$alumno->fk_escolaridad = $_POST['nivel_escolar'];
				$alumno->periodos_revalidados = $periodos_revalidados;
				$alumno->escuela_procedencia = $_POST['escuela_alumno'];
				$alumno->save();
				if($_POST['numero_control'] == 'esc'){
					$numero_control = CatalogoNControl::find($id_control_nuevo);
				}else{
					$numero_control = CatalogoNControl::find($_POST['numero_control']);
				}
				$numero_control->estatus = 'asignado';
				$numero_control->save();
				$id_usuario = self::creacion_usuario($id_persona);
				self::cargar_carpeta($id_usuario);
				echo json_encode(["1", "La creacion del nuevo alumno ha sido correcta!", $id_usuario]);	
			}else{
                echo "Solicitud no valida";
            }
		}
	}
	call_user_func('CreacionAlumno::'.$_POST['funcion']);
?>