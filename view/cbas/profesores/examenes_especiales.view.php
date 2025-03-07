<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">DOCENTE SIN CALIFICAR EXAMENES ESPECIALES</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('examenes_especiales') ?>">DOCENTES SIN CALIFICAR EXAMENES ESPECIALES</a></li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">DOCENTES SIN CALIFICAR EXAMENES ESPECIALES</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 aling-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
        <form action="" method="post" id="frm_examenes_especiales" name="frm_examenes_especiales">
            <input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_examenes_especiales') ?>" hidden>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-4 mb-3">
                    <div class="form-floating">
                        <input type="text" readonly name="seleccion_departamento_plaza" id="seleccion_departamento_plaza" class="form-control"/>
                        <label for="seleccion_departamento_plaza" class="text-primary text-small"><i class="fa-solid fa-building-user me-2"></i>Selecciona el departamento</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 mb-3">
                    <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control" id="periodo" name="periodo" placeholder="Periodo"/>
                        <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                    </div>
                </div>
            </div>			
        </form>
    </div>
</div>
<div class="container mt-3" id="seccion_tabla_especiales_1">
    <div class="row justify-content-center">
        <div class="col-12">
            <h4 class="text-center mt-3 mb-5">LISTA DE DOCENTES SIN CALIFICAR</h4>
        </div>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_especiales_1">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nombre completo</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Clave de la materia</th>
                            <th scope="col">Nombre de la materia</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_especiales_1"></tbody>
                </table>
            </div>
        </div>
        <div class="col-12 py-4">
            <hr>
        </div>
    </div>
</div>
<div class="container mt-3" id="seccion_tabla_especiales_2">
    <div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">MATERIAS SIN DOCENTE ASIGNADO</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_especiales_2">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Clave de la materia</th>
                            <th scope="col">Nombre de la materia</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_especiales_2"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container mt-3" id="seccion_tabla_especiales_3">
    <div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">MATERIAS SOLICITADAS SIN DOCENTE ASIGNADO</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_especiales_3">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Clave de la materia</th>
                            <th scope="col">Nombre de la materia</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_especiales_3"></tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->

<script src="<?=CONTROLLER?>cbas/profesores/examenesEspecialesSC.controller.js"></script>