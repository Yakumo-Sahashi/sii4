<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">CREACIÓN DE PUESTOS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('puestos') ?>">PUESTOS</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('creacion_puestos') ?>">CREACIÓN DE PUESTOS</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Creación de puesto</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-plus overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_crear_puesto" name="frm_crear_puesto">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_crear_puesto") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="desc_puesto" name="descripcion_puesto" placeholder="DESCRIPCION DE PUESTO">
                    <label for="desc_puesto" class="text-primary"><i class="fa-solid fa-file-pen me-2"></i>Descripción de puesto</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-floating">
                    <select name="nivel_puesto" class="form-select" id="nivel_puesto">
                        <option value="" selected>Seleccionar nivel de puesto</option>
                        <!--
                        <option value="0">0</option>
                        <option value="1">Jefes de área y coordinadores</option>
                        <option value="2">Jefes de departamento</option>
                        <option value="3">Director</option>
                        <option value="4">SubDirector</option>
                        <option value="5">Jefes de proyecto y laboratorio</option>-->
                    </select>
                    <label for="nivel_puesto" class="text-primary small"><i class="fa-solid fa-layer-group me-2"></i>Nivel de puesto</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3 text-center">
                <a href="<?= Router::redirigir('puestos') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                <button type="button" class="btn btn-primary" id="btn_crear_puesto">Crear</button>
            </div>
        </div>
    </form>
</div>
<div class="container my-3">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_crear_puesto">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Clave de Puesto</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Nivel de Puesto</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_crear_puesto">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>rh/personal/puestos/creacion_puestos.controller.js"></script>