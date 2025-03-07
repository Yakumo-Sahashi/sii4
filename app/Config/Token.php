<?php 
    namespace config;
    use config\Sesion;
    //require_once realpath('../../vendor/autoload.php');
    class Token{
        static function generar_token(){
            return bin2hex(random_bytes(32));
        }
        static function generar_token_frm($frm){
            return hash_hmac('sha256', $frm, Sesion::datos_sesion('token_usuario'));
        }
        static function comprobar_token_usuario($token_form){
            return hash_equals(Sesion::datos_sesion('token_usuario'), $token_form);
        }
        static function comprobar_token_frm($formulario, $token_form){
            $frm = hash_hmac('sha256', $formulario, Sesion::datos_sesion('token_usuario'));
            return hash_equals($frm, $token_form);
        }
    }
?>