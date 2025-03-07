<?php 
    namespace config;
    use PDO;
    use PDOException;
    define('NOMBRE_SERVIDOR', "localhost");
    define('NOMBRE_BD', "itma2");
    define('NOMBRE_USUARIO', "root");
    define('PASSWORD', "");

    class Conector {
        private static $conexion;
        static function abrir_conexion(){
            if(!isset(self::$conexion)){
                try{                    
                    self::$conexion = new PDO('mysql:host=' . NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);
                    self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conexion -> exec('SET CHARACTER SET utf8');
                } catch (PDOException $e) {
                    echo "Error de conexion :" . $e;
					die();
                }
            }
        }
        static function cerrar_conexion(){   
			if(isset(self::$conexion)){                 
				self::$conexion = null;			
			}
		}
        static function obtener_conexion(){
			return self::$conexion;
		}
    }
?>