<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">LISTA DE ASISTENCIA</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('lista_asistencia') ?>">LISTA DE ASISTENCIA</a></li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">LISTA DE ASISTENCIA</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 aling-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
        <form action="" method="post" id="frm_lista_asistencia" name="frm_lista_asistencia">
            <input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_lista_asistencia') ?>" hidden>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 mb-3">
                    <div class="form-floating">
                        <select name="seleccion_periodo_asistencia" id="seleccion_periodo_asistencia" class="form-select">
                            <option value="" selected>Selecciona el período</option>
                        </select>
                        <label for="seleccion_periodo_asistencia" class="text-primary text-small"><i class="fa-solid fa-calendar-days me-2"></i>Selecciona el período</label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-3">
                    <div class="form-floating">
                        <select name="seleccion_departamento_asistencia" id="seleccion_departamento_asistencia" class="form-select">
                            <option value="" selected>Selecciona el departamento</option>
                        </select>
                        <label for="seleccion_departamento_asistencia" class="text-primary text-small"><i class="fa-solid fa-building-user me-2"></i>Selecciona el departamento</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col mb-5 text-center">
                    <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                    <button type="button" class="btn btn-primary" id="btn_aceptar_asistencia">Aceptar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container mt-3" id="seccion_tabla_lista_asistencia">
    <div class="row justify-content-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_lista_asistencia">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Profesor</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Alumnos</th>
                            <th scope="col">Lista de asistencia</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_lista_asistencia"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>