<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">CONSULTA DE BOLETAS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('boletas_calificaciones') ?>">CONSULTA DE BOLETAS</a></li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">CONSULTA DE BOLETAS</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 aling-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-list overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_consulta_calificaciones" name="frm_consulta_calificaciones">
        <input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_consulta_calificaciones') ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3 d-none">
                <div class="form-floating">
                    <input type="text" name="numero_control" id="numero_control" class="form-control" placeholder="Número de control">
                    <label for="numero_control" class="text-primary text-small"><i class="fa-solid fa-signature me-2"></i>Número de control</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="opcion_periodo_calificaciones" id="opcion_periodo_calificaciones" class="form-select">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="opcion_periodo_calificaciones" class="text-primary text-small"><i class="fa-solid fa-address-book me-2"></i>Selecciona el periodo</label>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container mt-3 d-none" id="seccion_tabla_boleta_calificaciones">
    <div class="row justify-content-center">
        <h4 class="fs-4 fw-bold text-primary text-center">Resultados de calificaciones</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-responsive-lg mt-3 text-center table-bordered border-light table-striped" id="tabla_boleta_calificaciones">
                    <thead id="datos_alumno">
                    </thead>
                    <tbody id="contenido_tabla_boleta_calificaciones">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>alumno/informacion_escolar/boleta_alumno.controller.js"></script>