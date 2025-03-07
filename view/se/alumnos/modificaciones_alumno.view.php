<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Modificaciones de datos del alumno</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('modificaciones_alumno')?>">Modificaciones de datos del alumno</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-5" id="seccion_consulta">
    <form action="" id="frm_act" method="POST" name="frm_act">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta") ?>" hidden>
        <div class="row justify-content-center py-2">
            <h4 class="text-center mt-3 mb-5">Actualización de datos del alumno</h4>
            <div class="col text-center">
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 class="me-auto mb-4"></h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                        <img class="icono-seccion fa-solid fa-user-pen overflow-hidden text-primary mx-auto mb-5">
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Numero de control">
                            <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-up-1-9 me-2"></i>Numero de control</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary" id="btn_consultar">consultar</button>
            </div>
        </div>
    </form>
</div>
<?php 
    require_once 'includes_modificacion_datos/datos_alumno.view.php';
    require_once 'includes_modificacion_datos/datos_generales.view.php';
    require_once 'includes_modificacion_datos/datos_escolares.view.php';
    require_once 'includes_modificacion_datos/datos_familiares.view.php';
    require_once 'includes_modificacion_datos/datos_trabajo_alumno.view.php';
    require_once 'includes_modificacion_datos/cambio_instituto_equivalencia.view.php';
    require_once 'includes_modificacion_datos/datos_socioeconomicos.view.php';
    require_once 'includes_modificacion_datos/datos_emergencia.view.php';
    require_once 'includes/modal_recorte_foto.php';
?> 

<script src="<?=CONTROLLER?>se/modificacionesAlumno/modificacionAlumno.controller.js"></script>
<script src="<?=CONTROLLER?>se/modificacionesAlumno/datos_catalogo.controller.js"></script>
<script src="<?=CONTROLLER?>se/modificacionesAlumno/recorte.controller.js"></script>