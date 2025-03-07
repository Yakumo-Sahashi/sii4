<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">FICHAS DE EXPENDIENTES DE EMPLEADOS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('fichas_expedientes') ?>">FICHAS DE EXPENDIENTES DE EMPLEADOS</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Fichas de expendientes de empleados</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-id-badge overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_ficha_expediente">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">No. tarjeta</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Ver expediente</th>
                            </tr>
                            <thead>
                            <tbody id="contenido_tabla_ficha_expediente">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= CONTROLLER ?>rh/reportes_personal/ficha_expediente_personal.controller.js"></script>