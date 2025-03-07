<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">PERSONAL POR PUESTO</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('personal') ?>">PERSONAL</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('personal_puesto') ?>">PERSONAL POR PUESTO</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Personal por puesto</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_seleccion_puesto_personal" name="frm_seleccion_puesto_personal">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_seleccion_puesto_personal") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_puesto_personal" class="form-select">
                        <option value="" selected>Selecciona el puesto</option>
                    </select>
                    <label for="seleccion_puesto_personal" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selecciona el puesto</label>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 text-center">
                    <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                    <!-- <button type="button" class="btn btn-primary" id="btn_buscar_puesto">Buscar</button> -->
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container" id="seccion_tabla_puesto">
    <div class="row justify-content-around py-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_personal_puesto">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Nivel máximo de estudios</th>
                            <!-- <th scope="col">Plaza(s)</th> -->
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_personal_puesto">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>rh/reportes_personal/persona/personal_puesto.controller.js"></script>