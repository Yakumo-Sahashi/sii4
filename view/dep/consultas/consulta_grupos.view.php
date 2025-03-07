<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Grupos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('lista_asistencias') ?>">Grupos</a></li>
        </ol>
    </nav>
</div>
<!-- Seccion donde el usuario escoge su opcion -->
<div class="container my-5" id="seccion_opciones">
    <div class="row justify-content-center row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
        <div class="col mb-3">
            <span class="btn w-100 p-0" id="op_grupo_deparamento">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-regular fa-building fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Por departamento</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col mb-3">
            <span class="btn w-100 p-0" id="op_grupo_carrera">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-graduation-cap fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Por carrera</span>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
<!-- Esta seccion se genera si el usuario escoge 'Por departamento' -->
<div class="container" id="seccion_deparamento">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Consulta de grupo por departamento</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-building overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_consulta_grupo_departamento" name="frm_consulta_grupo_departamento">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta_grupo_departamento") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="departamento" name="departamento">
                        <option value="" selected>Seleccione el departamento</option>
                        <option value="">Laboratorio de quimica</option>
                    </select>
                    <label for="departamento" class="text-primary"><i class="fa-regular fa-building me-2"></i>Departamento</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_departamento" name="carrera_departamento">
                        <option value="" selected>Seleccione la carrera</option>
                    </select>
                    <label for="carrera_departamento" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_departamento" name="periodo_departamento">
                        <option value="" selected>Selecciona el periodo</option>

                    </select>
                    <label for="periodo_departamento" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="semestre_departamento" name="semestre_departamento">
                        <option value="0" selected>Todos</option>
                        <?php for ($j = 1; $j < 13; $j++) : ?>
                            <option value="<?= $j ?>"><?= $j ?></option>
                        <?php endfor ?>
                    </select>
                    <label for="semestre_departamento" class="text-primary"><i class="fa-solid fa-arrow-up-9-1 me-2"></i>Semestre</label>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="orden_departamento" name="orden_departamento">
                        <option value="" selected>Selecciona el orden</option>
                        <option value="materia" >Materia</option>
                        <option value="docente" >Docente</option>
                    </select>
                    <label for="orden_departamento" class="text-primary"><i class="fa-solid fa-arrow-down-short-wide me-2"></i>Ordenado por</label>
                </div>
            </div> -->
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_atras_departamento">Atras</button>
                <button type="submit" class="btn btn-primary" id="btn_aceptar_departamento">Aceptar</button>
            </div>
        </div>
    </form>
</div>


<!-- 
    NOTA esta seccion no esta terminada por falta de informacion en la documentacion 
    Esta seccion se genera si el usuario escoge 'Por carrera'
-->
<div class="container" id="seccion_carrera">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Consulta de grupo por carrera</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-graduation-cap overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_consulta_grupo_carrera" name="frm_consulta_grupo_carrera">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta_grupo_carrera") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera" name="carrera">
                        <option value="" selected>Seleccione la carrera</option>
                    </select>
                    <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_carrera" name="periodo_carrera">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="periodo_carrera" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="semestre_carrera" name="semestre_carrera">
                        <option value="0" selected>Todos</option>
                        <?php for ($j = 1; $j < 13; $j++) : ?>
                            <option value="<?= $j ?>"><?= $j ?></option>
                        <?php endfor ?>
                    </select>
                    <label for="semestre_carrera" class="text-primary"><i class="fa-solid fa-arrow-up-9-1 me-2"></i>Semestre</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_atras_carrera">Atras</button>
                <button type="submit" class="btn btn-primary" id="btn_aceptar_carrera">Aceptar</button>
            </div>
        </div>
    </form>
</div>

<script src="<?=CONTROLLER?>dep/consultas/consultaGrupos.controller.js"></script>