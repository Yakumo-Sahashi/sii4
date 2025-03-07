<?php
	use config\Token;
	use Illuminate\Database\Capsule\Manager as Capsule;
	use config\Sesion;
	use model\CatalogoPuesto;
	use model\CatalogoNivelPuesto;
	use model\CatalogoOrganigrama;
	use model\CatalogoCategoria;
	use model\CatalogoEstatus;
	use model\CatalogoDirectorio;
	use model\CatalogoEscolaridad;
	use model\TablaDireccion;
	use model\CatalogoEscuelaProcedencia;
	use model\TablaPersona;
	use model\TablaPersonal;
	require_once realpath('../../vendor/autoload.php');

	class RhPersonal {
		static function mostrarPuestos(){
			$consulta = CatalogoPuesto::select('id_cat_puestos','clave_puesto','descripcion_puesto','descripcion_nivel_puesto','fk_cat_nivel_puesto')->join('t_cat_nivel_puesto','t_cat_puestos.fk_cat_nivel_puesto','t_cat_nivel_puesto.id_cat_nivel_puesto')->get();
			echo json_encode($consulta);
		}
		static function mostrarInfo(){
			$consulta = TablaPersonal::select('id_personal','rfc','nombre_persona','apellido_paterno','apellido_materno','fk_cat_puestos','descripcion_puesto')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_puestos','t_personal.fk_cat_puestos','t_cat_puestos.id_cat_puestos')->where('estatus_eliminado','0')->get();
			echo json_encode($consulta);
		}
		static function mostrarInfoPersonal(){
			$consulta = TablaPersonal::select('id_personal','rfc','nombre_persona','apellido_paterno','apellido_materno','rfc','descripcion_estatus','tipo_trabajador')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_estatus','t_personal.fk_cat_estatus','t_cat_estatus.id_cat_estatus')->where('estatus_eliminado','0')->where('id_personal','!=','0')->get();
			echo json_encode($consulta);
		}
		static function consultarClave(){
			$consulta = CatalogoPuesto::select('clave_puesto')->orderBy('t_cat_puestos.id_cat_puestos','desc')->first();
			return $consulta->clave_puesto +=1;
			// echo json_encode($consulta);
		}
		static function crearPuesto(){
			if (Token::comprobar_token_frm("frm_crear_puesto",$_POST['tk_frm'])) {
				$insertar = new CatalogoPuesto();
				$insertar -> descripcion_puesto = $_POST['descripcion_puesto'];
				$insertar-> clave_puesto = self::consultarClave();
				$insertar->fk_cat_nivel_puesto = $_POST['nivel_puesto'];
				if ($insertar->save()) {
					echo json_encode(["1","Se ha creado correctamente el puesto"]);
				}else{
					echo json_encode(["0","No se ha creado correctamente"]);
				}
			}else{
				echo json_encode(["2","Solicitud no valida!"]);
			}
		}
		static function obtenerCategoria(){
			$consulta = CatalogoCategoria::select('id_cat_categorias','descripcion','categoria')->get();
			echo '<option value="" selected>Seleccionar la categoria</option>';
			foreach($consulta as $categoria){
				echo '<option value="'.$categoria['categoria'].'">'.$categoria['descripcion'].'</option>';
			}
		}
		static function obtenerEstatus(){
			$consulta = CatalogoEstatus::select('id_cat_estatus','descripcion_estatus')->get();
			echo '<option value="" selected>Seleccionar el estatus</option>';
			foreach($consulta as $estatus){
				echo '<option value="'.$estatus['id_cat_estatus'].'">'.$estatus['descripcion_estatus'].'</option>';
			}
		}
		static function obtenerArea(){
			$consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->get();
			echo '<option value="" selected>Departamento de Adscripcion</option>';
			foreach($consulta as $area){
				echo '<option value="'.$area['id_cat_organigrama'].'">'.$area['descripcion'].'</option>';
			}
		}
		static function obtenerPuestos(){
			$consulta = CatalogoPuesto::select('id_cat_puestos','descripcion_puesto')->get();
			echo '<option value="" selected>Seleccionar el puesto</option>';
			foreach($consulta as $puesto){
				echo '<option value="'.$puesto['id_cat_puestos'].'">'.$puesto['descripcion_puesto'].'</option>';
			}
		}
		static function obtenerPersonal(){
			$consulta = TablaPersonal::select('id_personal','rfc','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('estatus_eliminado','0')->where('id_personal','!=','0')->get();
			echo '<option value="" selected>Selecciona el personal</option>';
			foreach($consulta as $personal){
				echo '<option value="'.$personal['id_personal'].'">'.$personal['rfc'].' | '.$personal['apellido_paterno'].' '.$personal['apellido_materno'].' '.$personal['nombre_persona'].'</option>';
			}
		}
		static function obtenerNiveles(){
			$consulta = CatalogoNivelPuesto::select('id_cat_nivel_puesto','descripcion_nivel_puesto')->get();
			echo '<option value="" selected>Seleccionar el nivel puesto</option>';
			foreach($consulta as $puesto){
				echo '<option value="'.$puesto['id_cat_nivel_puesto'].'">'.$puesto['descripcion_nivel_puesto'].'</option>';
			}
		}
		static function consulta_nivel_estudios(){
            $consulta = CatalogoEscolaridad::get();
			echo '<option value="" selected>Seleccionar el nivel de escolaridad</option>';
            foreach ($consulta as $escolaridad) {
                echo '<option value="' . $escolaridad['id_cat_escolaridad'] . '">' . $escolaridad['escolaridad'] . '</option>';
            }
        }
		static function actualizarNivel(){
			if(Token::comprobar_token_frm("frm_asignar_nivel",$_POST['tk_frm'])){
				$update = CatalogoPuesto::where('id_cat_puestos',$_POST['seleccion_puesto'])->update(['fk_cat_nivel_puesto'=>$_POST['nivel_puesto']]);
				if($update==0){
					echo json_encode(["0","Error al actualizar informacion!"]);
				}else{
					echo json_encode(["1","La informacion se ha actualizado!"]);
				}
			}else{
				echo json_encode(["2","Solicitud no valida!"]);
			}
		}
		static function actualizarPuestoPersonal(){
			if(Token::comprobar_token_frm("frm_asignar_personal",$_POST['tk_frm'])){
				$update = TablaPersonal::where('id_personal',$_POST['seleccion_personal'])->update(['fk_cat_puestos'=>$_POST['seleccion_puesto']]);
				if($update==0){
					echo json_encode(["0","Error al actualizar informacion!"]);
				}else{
					echo json_encode(["1","La informacion se ha actualizado!"]);
				}
			}else{
				echo json_encode(["2","Solicitud no valida!"]);
			}
		}
		static function actualizarJefe(){
			if(Token::comprobar_token_frm("frm_actualizar_jefe",$_POST['tk_frm'])){
				$update = TablaPersonal::where('id_personal',$_POST['seleccion_personal'])->update(['fk_cat_organigrama'=>$_POST['seleccion_area']]);
				if($update==0){
					echo json_encode(["0","Error al actualizar informacion!"]);
				}else{
					echo json_encode(["1","La informacion se ha actualizado!"]);
				}
			}else{
				echo json_encode(["2","Solicitud no valida!"]);
			}
		}


		/* Crear Personal */
		static function insertar_direccion_cat(){
			$directorio = new CatalogoDirectorio();
			$directorio->codigo_postal = $_POST['codigo_postal_empleado'];
			$directorio->colonia = $_POST['colonia_empleado'];
			$directorio->alcaldia = $_POST['alcaldia_empleado'];
			$directorio->entidad_federativa = $_POST['estado_empleado'];
			$directorio->save();
        }
		static function crear_direccion(){
            $no_interior = empty($_POST['no_interior_empleado']) ? "s/n" : $_POST['no_interior_empleado'];
            $no_exterior = empty($_POST['no_exterior_empleado']) ? "s/n" : $_POST['no_exterior_empleado'];
            if(isset($_POST['escritura'])){
                self::insertar_direccion_cat();
            }
			$direccion = new TablaDireccion();
			$direccion->codigo_postal =$_POST['codigo_postal_empleado'];
			$direccion->entidad_federativa = $_POST['estado_empleado'];
			$direccion->alcaldia = $_POST['alcaldia_empleado'];
			$direccion->colonia = $_POST['colonia_empleado'];
			$direccion->calle = $_POST['calle_empleado'];
			$direccion->numero_interior = $no_interior;
			$direccion->numero_exterior = $no_exterior;
            $direccion->save();
            return $direccion->id_direccion;            
        }
		static function crear_persona($fk_direccion){
			$na = "Mexicana";
			$persona = new TablaPersona();
			$persona->fk_cat_sexo = $_POST['selector_sexo_empleado'];
			$persona->fk_cat_estado_civil = $_POST['selector_edo_civil_empleado'];
			$persona->fk_cat_escuela_procedencia = $_POST['nivel_escolar_empleado'];
			$persona->fk_direccion = $fk_direccion;
			$persona->nombre_persona = $_POST['nombres_empleado'];
			$persona->apellido_paterno = $_POST['apellido_paterno_empleado'];
			$persona->apellido_materno = $_POST['apellido_materno_empleado'];
			$persona->curp = $_POST['curp_empleado'];
			$persona->rfc = $_POST['rfc_empleado'];
			$persona->telefono = $_POST['telefono_empleado'];
			$persona->correo = $_POST['correo_electronico_empleado'];
			$persona->fecha_nacimiento = $_POST['fecha_nacimiento_empleado'];
			$persona->lugar_nacimiento = $_POST['lugar_nacimiento_empleado'];
			$persona->nacionalidad = $na;
			$persona->save();
            return $persona->id_persona;
        }
		
		static function crear_personal(){
			if(Token::comprobar_token_frm('frm_creacion_empleado',$_POST['tk_frm'])){
				try{
					//Capsule::connection()->beginTransaction();
					$id_direccion = self::crear_direccion();			
					$id_persona = self::crear_persona($id_direccion);
					$personal = new TablaPersonal();
					$personal->fk_cat_organigrama = $_POST['departamento_ads_acad_empleado'];
					$personal->fk_persona = $id_persona;
					$personal->tipo_trabajador = $_POST['seleccion_tipo_trabajador'];
					$personal->nombramiento = $_POST['nombramiento_empleado'];
					$personal->fk_cat_escolaridad = $_POST['nivel_escolar_empleado'];
					$personal->fk_cat_estatus = $_POST['estatus_empleado'];
					$personal->estatus_eliminado = 0;
					$personal->fk_cat_puestos = 248;
					if (!$personal->save()) {
						throw new Exception('No se pudo crear el empleado');
					}
					//Capsule::connection()->commit();
					echo json_encode(["1", "La creacion del nuevo empleado ha sido correcta!"]);
				}catch(Exception $e){
					//Capsule::connection()->rollBack();
					echo json_encode(["0","Error al procesar datos:". $e->getMessage()]);
				}
			}else{
                echo json_encode(["0","Solicitud no valida"]);
            }
		}
		/* Eliminar => deshabilitar */
		static function eliminar_personal(){
			$update = TablaPersonal::where('id_personal',$_POST['id_personal'])->update(['estatus_eliminado'=>1]);
			return $update;
		}
		/* Actualizar informacion */
		static function precargar_empleado(){
			$consulta = TablaPersonal::select('id_personal','rfc','curp','nombre_persona','apellido_paterno','apellido_materno','telefono','correo','fecha_nacimiento','lugar_nacimiento','fk_cat_sexo','fk_cat_estado_civil','codigo_postal', 'colonia', 'calle', 'numero_interior', 'numero_exterior','tipo_trabajador','nombramiento','fk_cat_organigrama','fk_cat_estatus','fk_cat_escolaridad','id_persona','id_direccion')->where('id_personal',$_POST['id_empleado'])->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_direccion','t_persona.fk_direccion', 't_direccion.id_direccion')->first();
			echo json_encode($consulta);
		}
		static function actualizar_direccion($id_direccion){
            $no_interior = empty($_POST['no_interior_empleado']) ? "s/n" : $_POST['no_interior_empleado'];
            $no_exterior = empty($_POST['no_exterior_empleado']) ? "s/n" : $_POST['no_exterior_empleado'];
			$update = TablaDireccion::where('id_direccion', $id_direccion)->update(['codigo_postal' => $_POST['codigo_postal_empleado'],'entidad_federativa' => $_POST['estado_empleado'],'alcaldia' => $_POST['alcaldia_empleado'],'colonia' => $_POST['colonia_empleado'],'calle' => $_POST['calle_empleado'],'numero_interior' => $no_interior,'numero_exterior' => $no_exterior]);
            return $update;
        }
		static function actualizar_persona($id_persona){
            $update = TablaPersona::where('id_persona', $id_persona)->update(['fk_cat_sexo' => $_POST['selector_sexo_empleado'],'rfc'=>$_POST['rfc_empleado'],'fk_cat_estado_civil' => $_POST['selector_edo_civil_empleado'],'fk_cat_escuela_procedencia' => $_POST['nivel_escolar_empleado'],'nombre_persona' => $_POST['nombres_empleado'],'apellido_paterno' => $_POST['apellido_paterno_empleado'],'apellido_materno' => $_POST['apellido_materno_empleado'],'curp' => $_POST['curp_empleado'],'telefono' => $_POST['telefono_empleado'],'correo' => $_POST['correo_electronico_empleado'],'fecha_nacimiento' => $_POST['fecha_nacimiento_empleado']]);
            return $update;            
        }
		static function actualizar_informacion_personal(){
			if(Token::comprobar_token_frm("frm_modificar_empleado",$_POST['tk_frm'])){
				$direccion = self::actualizar_direccion($_POST['id_direccion']);
                $persona = self::actualizar_persona($_POST['id_persona']);
				$update = TablaPersonal::where('id_personal',$_POST['id_empleado'])->update(['fk_cat_organigrama'=>$_POST['departamento_ads_acad_empleado'],'tipo_trabajador'=>$_POST['seleccion_tipo_trabajador'],'nombramiento'=>$_POST['nombramiento_empleado']]);
				if($direccion||$persona||$update){
					/* inicio_gobierno = $_POST['inicio_gobierno_year_empleado'].''.$_POST['inicio_gobierno_periodo_empleado']; 
						'inicio_gobierno'=>$_POST['inicio_gobierno_year_empleado'].''.$_POST['inicio_gobierno_periodo_empleado']
					
					*/
                    echo json_encode(["1","La informacion se ha actualizado!"]);
				}else{
					echo json_encode(["0","Error al actualizar informacion!"]);
                }         
			}else{
                echo json_encode(["2","Solicitud no valida!"]);
            } 
		}
		
	}
	call_user_func('RhPersonal::'.$_POST['funcion']);
?>