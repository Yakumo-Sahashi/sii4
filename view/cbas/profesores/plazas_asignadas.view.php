<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">REPORTE DE INFORMACIÓN DE PERSONAL</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('plazas_asignadas') ?>">REPORTE DE INFORMACIÓN DE PERSONAL</a></li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">REPORTE DE INFORMACIÓN DE PERSONAL</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 aling-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
        <form action="" method="post" id="frm_plaza_asignada" name="frm_plaza_asignada">
            <input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_plaza_asignada') ?>" hidden>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" readonly name="seleccion_departamento_plaza" id="seleccion_departamento_plaza" class="form-control"/>
                        <label for="seleccion_departamento_plaza" class="text-primary text-small"><i class="fa-solid fa-building-user me-2"></i>Selecciona el departamento</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
               <!--  <div class="col mb-5 text-center">
                    <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                    <button type="button" class="btn btn-primary" id="btn_cargar_plaza">Cargar</button>
                </div> -->
            </div>
        </form>
    </div>
</div>
<div class="container mt-3" id="seccion_tabla_plaza_asignada">
    <div class="row justify-content-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_plaza_asignada">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Designación</th>
                            <th scope="col">Escolaridad</th>
                            <th scope="col">Clave plaza</th>
                            <th scope="col">Tipo de nombramiento</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_plaza_asignada"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>cbas/profesores/plazasAsignadas.controller.js"></script>