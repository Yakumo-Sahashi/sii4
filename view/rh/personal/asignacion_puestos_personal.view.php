<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">ASIGNACIÓN DE PUESTOS A PERSONAL</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('puestos') ?>">PUESTOS</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('asignacion_puestos_personal') ?>">ASIGNACIÓN DE PUESTOS A PERSONAL</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Asignación de puestos a personal</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-plus overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_asignar_personal" name="frm_asignar_personal">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_asignar_personal") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_personal" class="form-select">
                        <option value="" selected>Selecciona el personal</option>
                    </select>
                    <label for="seleccion_personal" class="text-primary text-small"><i class="fa-solid fa-layer-group me-2"></i>Seleccion de personal</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-floating">
                    <select name="seleccion_puesto" class="form-select">
                        <option value="" selected>Selecciona el puesto</option>
                    </select>
                    <label for="seleccion_puesto" class="text-primary"><i class="fa-solid fa-layer-group me-2"></i>Seleccion de  puesto</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3 text-center">
                <a href="<?= Router::redirigir('puestos') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                <button type="button" class="btn btn-primary" id="btn_asignar_puesto_personal">Asignar</button>
            </div>
        </div>
    </form>
</div>
<div class="container my-3">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_asignar_puesto_personal">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">Descripción del puesto</th>
                            <!-- <th scope="col">Borrar</th> -->
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_asignar_puesto_personal">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>rh/personal/puestos/asignacion_personal_puestos.controller.js"></script>