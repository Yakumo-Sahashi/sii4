<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">JEFES</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('jefes') ?>">JEFES</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Jefes de departamento</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-plus overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_actualizar_jefe" name="frm_actualizar_jefe">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_actualizar_jefe") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_area" class="form-select">
                        <option value="" selected>Selecciona el área</option>
                    </select>
                    <label for="seleccion_area" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selección de área</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-floating">
                    <select name="seleccion_personal" class="form-select">
                        <option value="" selected>Selección de personal</option>
                    </select>
                    <label for="seleccion_personal" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selección de personal</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3 text-center">
                <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                <button type="button" class="btn btn-primary" id="btn_actualizar_jefe">Actualizar</button>
            </div>
        </div>
    </form>
</div>
<script src="<?= CONTROLLER ?>rh/personal/jefes.controller.js"></script>