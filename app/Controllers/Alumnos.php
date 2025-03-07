<?php
	use config\Token;
	use config\Sesion;
	use model\TablaAlumno;
	use model\TablaDireccion;
	use model\TablaPersona;
    use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');
	class Alumnos {
		static function consultar_alumnos(){
            if(isset($_POST['filtro'])){
                if($_POST['tipo'] == "carrera"){
					$consulta = TablaAlumno::select('id_usuario','id_alumno','t_alumno.fk_persona', 'numero_control', 'nombre_persona', 'apellido_paterno', 'apellido_materno', 'carrera', 'semestre')->join('t_persona', 't_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control', 't_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->join('t_usuario', 't_persona.id_persona', 't_usuario.fk_persona')->where('t_alumno.fk_cat_carrera',$_POST['filtro'])->get();
                }else if($_POST['tipo'] == "control") {
					$consulta = TablaAlumno::select('id_usuario','id_alumno','t_alumno.fk_persona', 'numero_control', 'nombre_persona', 'apellido_paterno', 'apellido_materno', 'carrera', 'semestre')->join('t_persona', 't_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control', 't_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->join('t_usuario', 't_persona.id_persona', 't_usuario.fk_persona')->where('t_alumno.periodo_ingreso', ($_POST['filtro'].'1'))->orWhere('t_alumno.periodo_ingreso',($_POST['filtro'].'3'))->get();
                }else {
                    $consulta = TablaAlumno::select('id_usuario','id_alumno','t_alumno.fk_persona', 'numero_control', 'nombre_persona', 'apellido_paterno', 'apellido_materno', 'carrera', 'semestre')->join('t_persona', 't_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control', 't_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->join('t_usuario', 't_persona.id_persona', 't_usuario.fk_persona')->where('t_alumno.semestre', $_POST['filtro'])->get();
                }
            }else{
				$consulta = TablaAlumno::select('id_usuario','id_alumno','t_alumno.fk_persona', 'numero_control', 'nombre_persona', 'apellido_paterno', 'apellido_materno', 'carrera', 'semestre')->join('t_persona', 't_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control', 't_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->join('t_usuario', 't_persona.id_persona', 't_usuario.fk_persona')->get();
            }
            echo json_encode($consulta);
        }	
		
		static function obtener_periodo($periodo){
            return $periodo[4] == "1" ? "ENE-JUN 20" . $periodo[2] . $periodo[3] : "AGO-DIC 20" . $periodo[2] . $periodo[3];
        }
		
        static function precargar_alumno(){
			$consulta = TablaAlumno::select('apellido_paterno','apellido_materno','nombre_persona','lugar_nacimiento','fecha_nacimiento', 'fk_cat_sexo','fk_cat_estado_civil','telefono','curp','correo','codigo_postal', 'colonia', 'calle', 'numero_interior', 'numero_exterior','t_alumno.fk_cat_carrera', 'fk_cat_especialidad', 'periodo', 'periodos_revalidados', 'fk_cat_tipo_ingreso', 'fk_cat_estatus','numero_control','id_usuario','id_direccion', 'id_alumno','id_persona','fk_cat_escuela_procedencia')->join('t_persona', 't_alumno.fk_persona', 't_persona.id_persona')->join('t_numero_control', 't_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_carrera', 't_alumno.fk_cat_carrera', 't_cat_carrera.id_cat_carrera')->join('t_direccion','t_persona.fk_direccion', 't_direccion.id_direccion')->join('t_periodo_escolar','t_alumno.fk_periodo_ingreso','t_periodo_escolar.id_periodo_escolar')->where('id_alumno', $_POST['id_alumno'])->join('t_usuario', 't_persona.id_persona', 't_usuario.fk_persona')->first();
			$consulta['periodo_ingreso'] = self::obtener_periodo(''.$consulta->periodo);  
            echo json_encode($consulta); 
        }

		static function actualizar_direccion($id_direccion){
            $no_interior = empty($_POST['no_interior']) ? "s/n" : $_POST['no_interior'];
            $no_exterior = empty($_POST['no_exterior']) ? "s/n" : $_POST['no_exterior'];
			$update = TablaDireccion::where('id_direccion', $id_direccion)->update(['codigo_postal' => $_POST['codigo_postal'],'entidad_federativa' => $_POST['estado'],'alcaldia' => $_POST['alcaldia'],'colonia' => $_POST['colonia'],'calle' => $_POST['calle'],'numero_interior' => $no_interior,'numero_exterior' => $no_exterior]);
            return $update;
        }

		static function actualizar_persona($id_persona){
            $update = TablaPersona::where('id_persona', $id_persona)->update(['fk_cat_sexo' => $_POST['selector_sexo'],'fk_cat_estado_civil' => $_POST['selector_edo_civil'],'fk_cat_escuela_procedencia' => $_POST['nivel_escolar'],'nombre_persona' => $_POST['nombres'],'apellido_paterno' => $_POST['apellido_paterno'],'apellido_materno' => $_POST['apellido_materno'],'curp' => $_POST['curp'],'telefono' => $_POST['telefono'],'correo' => $_POST['correo_electronico'],'fecha_nacimiento' => $_POST['fecha_nacimiento']]);
            return $update;            
        }

		static function actualizar_inf_alumno(){
            if(Token::comprobar_token_frm("frm_creacion_alumno",$_POST['tk_frm'])){
                $direccion = self::actualizar_direccion($_POST['id_direccion']);
                $persona = self::actualizar_persona($_POST['id_persona']);
                $semestre = 1;
                $periodos_revalidados = empty($_POST['periodos_revalidados']) ? 0 : $_POST['periodos_revalidados'];
                $update = TablaAlumno::where('id_alumno', $_POST['id_alumno'])->update(['fk_cat_especialidad' => $_POST['especialidad'], 'fk_cat_estatus' => $_POST['estatus_alumno'],'fk_cat_carrera' => $_POST['carrera_reticula'], 'fk_cat_reticula' => $_POST['plan_est'],'fk_cat_tipo_ingreso' => $_POST['tipo_ingresos'],'lugar_nacimiento' => $_POST['lugar_nacimiento'],'periodos_revalidados' => $periodos_revalidados]);
                if($direccion || $persona || $update){
					echo json_encode(["0","Error al actulizar informacion1!"]);
				}else{
                    echo json_encode(["1","La informacion se ha actualizado!"]);
                }         
            }else{
                echo json_encode(["2","Solicitud no valida!"]);
            }        
        }
		
		static function remplazar_foto(){
			$data = $_POST['img'];
			$img_arreglo = explode(";", $data);
			$img_arreglo2 = explode(",", $img_arreglo[1]);
			$dat =  base64_decode($img_arreglo2[1]);
			$nombre_img = '../../public/img/ALUMNO/'. $_POST['alumno'] . '/'.'fotografia.webp';
			if(file_put_contents($nombre_img, $dat)){
				echo json_encode(["1","La imagen se ha recortado y cargado de manera correcta en el servidor"]);
			}else {
				echo json_encode(["0","Se ha producido un error al procesar la imagen!"]);
			}
		}
        static function alumnos_inscritos(){
            $digito = TablaPeriodoEscolar::select('periodo')->where('id_periodo_escolar',$_POST['periodo'])->first();
            $resp = $digito->periodo;
            $consulta = TablaAlumno::select('id_alumno','t_numero_control.numero_control','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','semestre','creditos_aprobados','creditos_cursados', 'promedio_final_alcanzado')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->where('t_alumno.fk_cat_carrera',$_POST['carrera'])->where('t_alumno.periodo_ingreso',$resp)->get();

            if($consulta){
				echo json_encode($consulta);
			}else{
				echo json_encode('');
			}
        }
	}
	call_user_func('Alumnos::'.$_POST['funcion']);
?>