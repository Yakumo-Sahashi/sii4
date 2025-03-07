<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">GRUPOS POR DEPARTAMENTO</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('grupos_departamento') ?>">GRUPOS POR DEPARTAMENTO</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">Consulta grupos por departamento</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 aling-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_grupo_departamento" name="frm_grupo_departamento">
        <input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_grupo_departamento') ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_departamento" id="seleccion_departamento" class="form-select">
                        <option value="" selected>Selecciona el departamento</option>
                    </select>
                    <label for="seleccion_departamento" class="text-primary text-small"><i class="fa-solid fa-building me-2"></i>Selecciona el departamento</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 mb-3">
                <div class="form-floating">
                    <select name="seleccion_carrera_dep" id="seleccion_carrera_dep" class="form-select">
                        <option value="" selected>Selecciona la carrera</option>
                    </select>
                    <label for="seleccion_carrera_dep" class="text-primary text-small"><i class="fa-solid fa-layer-group me-2"></i>Selecciona la carrera</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="seleccion_periodo_dep" id="seleccion_periodo_dep" class="form-select">
                        <option value="" selected>Selecciona el período</option>
                    </select>
                    <label for="seleccion_periodo_dep" class="text-primary text-small"><i class="fa-solid fa-clock me-2"></i>Selecciona el período</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <select name="seleccion_semestre_dep" id="seleccion_semestre_dep" class="form-select">
                        <option value="0" selected>Todos</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <label for="seleccion_semestre_dep" class="text-primary text-small"><i class="fa-solid fa-layer-group me-2"></i>Selecciona el semestre</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col mb-5 text-center">
                <button type="submit" class="btn btn-primary" id="btn_aceptar_dep">Aceptar</button>
            </div>
        </div>
    </form>
</div>
<div class="container mt-3" id="seccion_tabla_grupos_dep">
    <div class="row justify-content-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_grupos_dep">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo</th>
                            <th scope="col">Cap</th>
                            <th scope="col">Inscr</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_grupos_dep"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>cbas/grupos/grupos_departamento.controller.js"></script>