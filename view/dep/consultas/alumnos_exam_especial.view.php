<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Alumnos en examen especial</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('alumnos_exam_especial') ?>">Alumnos en examen especial</a></li>
        </ol>
    </nav>
</div>
<div class="container my-3">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-clipboard-user overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="secccion_consulta">
    <form action="app/docs/alumnos_ex_especial.doc.php" method="POST" id="frm_consulta" name="frm_consulta" target="_blank">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo" name="periodo">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="periodo" class="text-primary">Periodo</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button id="btn_excel" class="btn btn-success" disabled><i class="fa-regular fa-file-excel"></i> Descargar Excel</button>
            </div>
        </div>
    </form>
</div>
<!-- Esta seccion se genera despues de hacer la consulta por periodo -->
<div class="container" id="seccion_tabla_alumnos">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_alumnos">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No. Control</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Calificacion</th>
                            <th scope="col">Tipo evaluación</th>
                            <th scope="col">Fecha especial</th>
                            <th scope="col">Autorización</th>
                        </tr>
                        <thead>
                        <tbody id="tabla_contenido_alumno">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?=CONTROLLER?>dep/consultas/alumnosExamenEspecial.controller.js"></script>
<!-- Id's de la vista

    -Secciones
        secccion_consulta
        seccion_tabla_alumnos

    -Inputs
        periodo
    
    -Btn
        btn_aceptar

        btn_regresar
        btn_excel

    -Formularios
        frm_consulta


    -Tabla
        tabla_alumnos
        tabla_contenido_alumno
-->