<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Actas de residencias</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('actas_residencias') ?>">Actas de residencias</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Emisión de actas de residencias</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-address-card overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_actas_residencias" name="frm_actas_residencias" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_actas_residencias") ?>" hidden>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo" name="periodo">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Numero de control">
                    <label for="Numero de control" class="text-primary"><i class="fa-solid fa-arrow-down-9-1 me-2"></i>Numero de control</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col text-center">
                <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white">cancelar</a>
                <button type="button" class="btn btn-primary" id="btn_emitir_acta">Emitir</button>
            </div>
        </div>
    </form>
</div>