<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">AUTORIZACIÓN DE INSCRIPCIÓN</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('puestos') ?>">AUTORIZACIÓN DE INSCRIPCIÓN</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Autorización de inscripción</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_autorizar_inscripcion" name="frm_autorizar_inscripcion">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_autorizar_inscripcion") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_periodo_inscripcion" class="form-select">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="seleccion_periodo_inscripcion" class="text-primary text-small"><i class="fa-solid fa-user-clock me-2"></i>Seleccion de periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-floating">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="numero_control_inscripcion" name="numero_control_inscripcion" placeholder="Numero de control">
                        <label for="numero_control_inscripcion" class="text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Numero de control</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-floating">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="recibo_pago_inscripcion" name="recibo_pago_inscripcion" placeholder="Recibo de pago">
                        <label for="recibo_pago_inscripcion" class="text-primary"><i class="fa-solid fa-user-check me-2"></i>Recibo de pago</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3 text-center">
                <button type="submit" class="btn btn-primary" id="btn_autorizar_inscripcion">Autorizar</button>
            </div>
        </div>
    </form>
</div>
<script src="<?=CONTROLLER?>se/autorizacion/autorizacionInscripcion.controller.js"></script>