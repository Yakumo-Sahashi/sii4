<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Lista de asistencias</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('lista_asistencias') ?>">Lista de asistencias</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-list-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-4" id="seccion_consulta">
    <form action="" method="POST" id="frm_consulta" name="frm_consulta">
        <!-- <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta") ?>" hidden> -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="departamento" name="departamento">
                        <option value="" selected>Seleccionar area</option>
                    </select>
                    <label for="departamento" class="text-primary">Departamento</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo" name="periodo">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo" class="text-primary">Periodo</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col text-center">
                <!-- <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white">cancelar</a> -->
                <button type="submit" class="btn btn-primary" id="btn_consultar">Consultar</button>
            </div>
        </div>
    </form>
</div>

<div class="container" id="seccion_tabla_asistencia">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_asistencia">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Profesor</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Alumnos</th>
                            <th scope="col">Lista de asistencia</th>
                        </tr>
                        <thead>
                        <tbody id="tabla_contenido_asistencia">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>dep/consultas/listaAsistencia.controller.js"></script>

<!-- Id's de la vista

    -Secciones
        seccion_consulta

    -Inputs
        departamento
        periodo

    -Btn
        btn_consultar

    -Formularios
        frm_consulta
-->