<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">ESTADÍSTICA</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('estadistica') ?>">ESTADÍSTICA</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Estadística</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-wave-square overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_mostrar_estadistica" name="frm_mostrar_estadistica">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_mostrar_esstadistica") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_periodo" id="seleccion_periodo" class="form-select">
                        <option value="" selected>Seleccione el periodo</option>
                    </select>
                    <label for="seleccion_periodo" class="text-primary text-small"><i class="fa-solid fa-user-clock me-2"></i>Seleccion del periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" placeholder="Fecha de emision">
                    <label for="fecha_emision" class="text-primary text-small"><i class="fa-regular fa-calendar-days me-2"></i>Fecha de emision</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_del_tipo" id="seleccion_del_tipo" class="form-select">
                        <option value="" selected>Seleccione el tipo</option>
                    </select>
                    <label for="seleccion_del_tipo" class="text-primary text-small"><i class="fa-solid fa-user me-2"></i>Seleccione el tipo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_tipo_grafica" id="seleccion_tipo_grafica" class="form-select">
                        <option value="" selected>Seleccione la gráfica</option>
                    </select>
                    <label for="seleccion_tipo_grafica" class="text-primary text-small"><i class="fa-solid fa-signal me-2"></i>Seleccione la gráfica</label>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 text-center">
                    <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                    <button type="button" class="btn btn-primary" id="btn_procesar">Procesar</button>
                </div>
            </div>
        </div>
    </form>
</div>