<?php
    namespace config;
    use config\Conector;
    use PDO;
    require_once realpath('../../vendor/autoload.php');

    class CBD extends Conector{
        static $tabla = 't_usuario';
        static function all(){
            $tabla = self::$tabla;
            $query = "SELECT * FROM $tabla";
            return call_user_func('Login::consulta',$query);
        } 

        static function select_from($parametros){
            $tabla = self::$tabla;
            $seleccion = gettype($parametros) == 'array' ? implode(',',$parametros) : $parametros;
            $query = "SELECT $seleccion FROM $tabla";
            return call_user_func('Login::consulta',$query);
        }

        static function where($parametros){
            $tabla = self::$tabla;
            $where = 'WHERE ';
            $i = count($parametros);
            foreach($parametros as $campo => $valor){
                $where .= ($i > 1 ? "$campo = '$valor' AND " : "$campo = '$valor'");
                $i--;
            }
            $query = "SELECT * FROM $tabla $where";
            return call_user_func('self::consulta',$query);
        }

        static function join($parametros){
            $tabla = self::$tabla;
            $where = 'INNER JOIN ';
            $i = count($parametros);
            foreach($parametros as $campo => $valor){
                $where .= ($i > 1 ? "$campo = '$valor' AND " : "$campo = '$valor'");
                $i--;
            }
            $query = "SELECT * FROM $tabla";
            return call_user_func('Login::consulta',$query);
        }

        static function consulta($query){
            parent::abrir_conexion();
            $consulta = parent::obtener_conexion()->prepare("$query");
            $consulta -> execute();
            parent::cerrar_conexion();
            return $consulta -> fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>