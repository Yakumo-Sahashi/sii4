<?php

use config\Router;
use config\Sesion;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">HORARIO ALUMNO</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('horarios_alumnos') ?>">HORARIO ALUMNO</a></li>
        </ol>
    </nav>
</div>
<form action="app/docs/horario_alumno.doc.php" method="post" class="container mt-3" id="seccion_tabla_datos_escolares_alumno" target="_blank">
    <input type="text" name="alumno" id="alumno" value="" hidden>
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Datos personales</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-responsive-lg mt-3 text-center" id="tabla_datos_personales">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th scope="col">No. Control</th>
                            <th scope="col">Nombre Alumno</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Prom. Acum</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_datos_personales">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Horario Alumno</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_horario_alumno">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Cr</th>
                            <th scope="col">Lunes</th>
                            <th scope="col">Martes</th>
                            <th scope="col">Miercoles</th>
                            <th scope="col">Jueves</th>
                            <th scope="col">Viernes</th>
                            <th scope="col">Sábado</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_horario_alumno">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col mb-5 text-center">
            <!-- <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cerrar">Cerrar</a> -->
            <button type="submit" class="btn btn-primary" id="btn_imprimir_horario">Imprimir</button>
        </div>
    </div>
</form>

<script src="<?=CONTROLLER?>alumno/informacion_escolar/horario_alumno.controller.js"></script>