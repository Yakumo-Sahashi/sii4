<?php 
    namespace config;
    use config\Sesion;
    class Router {
        static function direccion(){
            $direccion = isset($_GET['view']) ? $_GET['view'] : "dashboard";
            $view = explode("/", $direccion);
            $rol = Sesion::validar_sesion() ? strtolower(Sesion::datos_sesion('rol')) : 'sesion';
            $url = count($view) < 2 ? (array_key_exists($rol, DIRECCION) ? DIRECCION[$rol] : DIRECCION['error']) : DIRECCION['error'];
            $vista = array_key_exists($view[0], $url) ? $url[$view[0]] : (array_key_exists($view[0],DIRECCION['publico']) ? DIRECCION['publico'][$view[0]] : DIRECCION['error']);
            echo "<title>".$vista['titulo']."</title>";
            require_once 'view/'. $vista['url'] .'.view.php';
        }
        static function redirigir($url){
            return SERVIDOR . $url;
        }
    }

    class Redireccion{
        static function redirigir($url){
            echo '<script> window.location="'. $url .'" </script>';
        }
        static function validar_vista($usuario){
            if($usuario != Sesion::datos_sesion('rol')){
                Self::redirigir("home");
            }
        }
    }
?>