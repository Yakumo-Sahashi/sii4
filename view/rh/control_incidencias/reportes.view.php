<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">REPORTES</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('reportes') ?>">REPORTES</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Reportes</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_agregar_periodo" name="frm_procesar_reporte">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_procesar_reporte") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_de_periodo" id="seleccion_de_periodo" class="form-select">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="seleccion_de_periodo" class="text-primary text-small"><i class="fa-solid fa-user-clock me-2"></i>Seleccion del periodo</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <select name="seleccion_de_mes" id="seleccion_del_tipo" class="form-select">
                        <option value="" selected>Selecciona el mes</option>
                    </select>
                    <label for="seleccion_de_mes" class="text-primary text-small"><i class="fa-solid fa-calendar-days me-2"></i>Seleccion del mes</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" placeholder="Fecha de emision">
                    <label for="fecha_emision" class="text-primary text-small"><i class="fa-regular fa-calendar-days me-2"></i>Fecha de emision</label>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="iniciales" name="iniciales" placeholder="Iniciales">
                    <label for="iniciales" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Iniciales</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="seleccion_del_tipo" id="seleccion_del_tipo" class="form-select">
                        <option value="" selected>Seleccione el tipo</option>
                    </select>
                    <label for="seleccion_del_tipo" class="text-primary text-small"><i class="fa-solid fa-user-clock me-2"></i>Seleccione el tipo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="RFC" id="RFC" class="form-select">
                        <option value="" selected>Seleccione el personal</option>
                    </select>
                    <label for="RFC" class="text-primary text-small"><i class="fa-solid fa-file-lines me-2"></i>Seleccione personal</label>
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