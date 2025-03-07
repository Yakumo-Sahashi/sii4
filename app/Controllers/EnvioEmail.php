<?php
	use config\Token;
	use config\Sesion;
	use model;
	require_once realpath('../../vendor/autoload.php');

	class EnvioEmail {
		static function mandar_info_correo($correo,$pass_descrip){
            $correo = $_POST['correo'];
            $correo_electronico = new PHPMailer();
            $correo_electronico -> isSMTP();
            $correo_electronico -> SMTPAuth = true;
            $correo_electronico -> SMTPSecure = 'tls';
            $correo_electronico -> Host ='smtp.live.com';
            $correo_electronico -> Port = '587';
            $correo_electronico -> Username = 'amaterasu.system.itma@gmail.com';
            $correo_electronico -> Password = 'proyectoAmaterasu04';
            $correo_electronico -> setFrom('amaterasu.system.itma@gmail.com', 'Instituto Tecnologico de Milpa Alta II');
            $correo_electronico -> addAddress($correo, 'Informacion de tu cuenta');
            $correo_electronico -> Subject = 'Felicidades ha sido inscrito exitosamente en el Instituto Tecnologico de Milpa Alta II';
            $correo_electronico -> Body = ' 
                                            <img src="http://itmilpaalta2.net/img/itma2.png" style="width: 200px; height: auto;">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d4/Logo-TecNM-2017.png" style="width: 300px; height: auto; margin-left: 100px">
                                            <h2>Instituto Tecnologico de Milpa Alta II</h2><br>
                                            <h4>Sistema Integral de Informacion:</h4>
                                            <br>
                                            <p>A continuacion encontraras tus nuevos datos de inicio de sesion:</p>
                                            <p style="color:#142d54;"><b>Correo Institucional:  '.$correo.'</b></p>
                                            <p style="color:#142d54;"><b>Password:  '.$pass_descrip.'</b></p>
                                            <br>
                                            <p>Por cuestiones de seguridad se recomienda cambiar el password despues de iniciar sesion</p>
                                        ';    
            $correo_electronico -> isHTML(true);
            return $correo_electronico -> send() ? "Envio correcto!" : "Error al enviar email";
        }		
	}
	call_user_func('EnvioEmail::'.$_POST['funcion']);
?>