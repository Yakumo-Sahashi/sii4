<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">GRUPOS POR CARRERA</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('grupos_carrera') ?>">GRUPOS POR CARRERA</a></li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">Consulta grupos por carrera</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 aling-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_grupo_carrera" name="frm_grupo_carrera">
        <input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_grupo_carrera') ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="seleccion_carrera" id="seleccion_carrera" class="form-select">
                        <option value="" selected>Selecciona la carrera</option>
                    </select>
                    <label for="seleccion_carrera" class="text-primary text-small"><i class="fa-solid fa-layer-group me-2"></i>Selecciona la carrera</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="seleccion_periodo_carrera" id="seleccion_periodo_carrera" class="form-select">
                        <option value="" selected>Selecciona el período</option>
                    </select>
                    <label for="seleccion_periodo_carrera" class="text-primary text-small"><i class="fa-solid fa-layer-group me-2"></i>Selecciona el período</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="seleccion_semestre_carrera" id="seleccion_semestre_carrera" class="form-select">
                        <option value="0" selected>Todos</option>
                        <?php for ($j = 1; $j < 10; $j++) : ?>
                            <option value="<?= $j ?>"><?= $j ?></option>
                        <?php endfor ?>
                    </select>
                    <label for="seleccion_semestre_carrera" class="text-primary text-small"><i class="fa-solid fa-layer-group me-2"></i>Selecciona el semestre</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col mb-5 text-center">
                <!-- <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a> -->
                <button type="submit" class="btn btn-primary" id="btn_aceptar_carrera">Aceptar</button>
            </div>
        </div>
    </form>
</div>
<div class="container mt-3" id="seccion_tabla_grupos_carrera">
    <div class="row justify-content-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_grupos_carreras">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Cap</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_grupos_carrera"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>cbas/grupos/gruposCarrera.controller.js"></script>