<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">LISTADO GENERAL DE PERSONAL</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('listado') ?>">LISTADO DE PERSONAL</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('listado_general') ?>">LISTADO GENERAL DE PERSONAL</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Listado general de personal</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-file-lines overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-around py-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_listado_general">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">RFC</th>
                            <th scope="col">CURP</th>
                            <th scope="col">Ingreso SEP</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_listado_general">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row py-2">
        <div class="col mt-3 text-center">
            <a href="<?= Router::redirigir('listado') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>rh/reportes_personal/listado/listado_general.controller.js"></script>