<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">CREACIÓN DE PARALELO</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">CREACIÓN DE PARALELO</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0 mt-5">
    <form id="frm_agregar_paralelo" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_agregar_paralelo")?>" hidden>
        <div class="row justify-content-evenly">
            <!-- GRUPO DE ORIGEN -->
            <div class="col-md-5 text-start card-form">
                <h1 class="text-center lead mb-5">Grupo Origen</h1>
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_origen" name="carrera_origen">
                        <option value="" selected>Seleccionar carrera</option>
                    </select>
                    <label for="carrera_origen" class="text-primary"><i class="fas fa-graduation-cap me-2"></i>Carrera</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="materia_origen" name="materia_origen">
                        <option value="" selected>Seleccionar materia</option>
                    </select>
                    <label for="materia" class="text-primary"><i class="fas fa-book me-2"></i>Materia</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="grupo_origen" name="grupo_origen">
                        <option value="" selected>Seleccionar grupo</option>
                    </select>
                    <label for="grupo_origen" class="text-primary"><i class="fas fa-user-group me-2"></i>Grupo</label>
                </div>
            </div>

            <!-- GRUPO DE PARALELO -->
            <div class="col-md-5 text-start card-form">
                <h1 class="text-center lead mb-5">Grupo Paralelo</h1>

                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_paralelo" name="carrera_paralelo">
                        <option value="" selected>Seleccionar carrera</option>
                    </select>
                    <label for="carrera_paralelo" class="text-primary"><i class="fas fa-graduation-cap me-2"></i>Carrera</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="semestre_paralelo" name="semestre_paralelo">
                        <option value="">Seleccionar semestre</option>
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
                    <label for="semestre_paralelo" class="text-primary"><i class="fas fa-user-clock me-2"></i>Semestre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_grupo_paralelo" name="nombre_grupo_paralelo" placeholder="Nombre grupo">
                    <label for="nombre_grupo_paralelo" class="text-primary"><i class="fas fa-user-group me-2"></i>Nombre grupo</label>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col text-end">
                <button class="btn btn-primary" id="button_crear"><i class="fas fa-plus me-2"></i>Crear</button>
            </div>
        </div>
    </form>
    <div class="row mb-5" id="seccion_tabla_grupo">
        <div class="col-lg-12">
            <h2 class="mb-5 text-uppercase fs-5 pb-2">Grupos paralelos Creados</h2>
            <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-hover table-sm table-responsive-lg text-center" id="tabla_grupos_paralelos">
                    <thead class="text-center fw-bolder">
                        <th>Carrera</th>
                        <th>Materia</th>
                        <th>Gpo origen</th>
                        <th>Gpo paralelo</th>
                        <th>Semestre</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody id="contenido_grupo_paralelo">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>dep/grupo_paralelo/grupo_paralelo.controller.js"></script>