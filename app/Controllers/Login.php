<?php 
    use config\Token;
    use config\Sesion;
    use model\TablaUsuario;
    require_once realpath('../../vendor/autoload.php');
    class Login {        
        static function iniciar_sesion(){            
            $resultado = TablaUsuario::select('id_usuario','correo_usuario','estado','password','fk_persona','t_cat_rol.rol','t_cat_rol.descripcion_rol','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','t_cat_rol.fk_cat_organigrama')->join('t_cat_rol','t_usuario.fk_cat_rol','t_cat_rol.id_cat_rol')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('correo_usuario',$_POST['correo_institucional'])->orWhere('usuario',$_POST['correo_institucional'])->first();
            if ($resultado && password_verify($_POST['password'], $resultado->password)) {
                if($resultado->estado == '0'){
                    Sesion::crear_sesion([
                        'id_usuario'=>$resultado->id_usuario,
                        'fk_persona'=>$resultado->fk_persona,
                        'rol'=>  $resultado->rol, 
                        'descripcion_rol'=> $resultado->descripcion_rol,
                        'correo_usuario'=> $resultado->correo_usuario, 
                        'estado'=> $resultado->estado,
                        'nombre_persona'=> $resultado->nombre_persona,
                        'apellido_paterno'=> $resultado->apellido_paterno,
                        'apellido_materno'=> $resultado->apellido_materno,
                        'estado'=> 1,
                        'depto'=> $resultado->fk_cat_organigrama,
                        'deptos'=> $resultado->rol == "DIR" ? ['cbas'=>'','sis'=>'','ges'=>'','ind'=>''] : '',
                        'token_usuario'=> Token::generar_token()
                    ]);
                    self::actualizar_estado($resultado['id_usuario'], 1);
                    echo json_encode(["1","Credenciales de acceso validas!","dashboard"]);
                }else if($resultado->estado == '2'){
                    echo json_encode(["3","La cuenta a la que quiere acceder esta inhabilitada.\nPor favor pongase en contacto con el administrador."]);	
                }else{
                    echo json_encode(["2","La cuenta a la que quiere acceder esta siendo utilizada en otro dispositivo.\n¿Desea cerrar la sesion anterior e iniciar en este dispositivo?"]);
                }                
            }else {
                echo json_encode(["0","Correo electronico o constraseña no validos"]);		
            }
        }
        static function actualizar_estado($usuario, $estado){
            TablaUsuario::where('id_usuario',$usuario)->update(array('estado'=> $estado));          
        }       
        static function cerrar_sesion(){
            self::actualizar_estado(Sesion::datos_sesion('id_usuario'),0);
            Sesion::destruir_sesion();       
            echo json_encode(["1","Cerrando sesion...","login"]);
        } 
        static function verificacion_acceso(){            
            $resultado = TablaUsuario::where('correo_usuario',$_POST['correo_institucional'])->orWhere('usuario',$_POST['correo_institucional'])->first();
            return $resultado->id_usuario;
        }    
        static function comprobar_sesion(){  
            $resultado = TablaUsuario::where('id_usuario',Sesion::datos_sesion('id_usuario'))->first();
            echo json_encode([$resultado->estado]);
                
        } 
        static function cerrar_sesion_dispositivo(){
            self::actualizar_estado(self::verificacion_acceso(), 0);
            echo json_encode(["1"]);
        }
        static function cerrar_sesion_anterior(){
            Sesion::destruir_sesion();       
            echo json_encode(["1","Cerrando sesion...","login"]);
        } 
    }
    call_user_func('Login::'.$_POST['funcion']);
?>