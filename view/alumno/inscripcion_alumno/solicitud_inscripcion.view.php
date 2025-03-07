<?php

use config\Router;


require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">SOLICITUD DE INSCRIPCIÓN</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('solicitud_inscripcion') ?>">SOLICITUD DE INSCRIPCIÓN</a></li>
        </ol>
    </nav>
</div>

<div class="container mt-3" id="seccion_tabla_datos_generales_inscripcion">
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Datos Generales</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_datos_generales_inscripcion">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Nombre(s)</th>
                            <th scope="col">No. De Control</th>
                            <th scope="col">Lugar de Nacimiento</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Sexo</th>
                        </tr>
                        <tr class="text-center">
                            <th scope="col">Estado Civil</th>
                            <th scope="col">Domicilio Actual (Calles y Número)</th>
                            <th scope="col">Colonia</th>
                            <th scope="col">Código Postal</th>
                            <th scope="col">Ciudad o Localidad</th>
                            <th scope="col">Entidad Federativa</th>
                            <th scope="col">Teléfono</th>
                        </tr>
                        <tr class="text-center">
                            <th scope="col">CURP</th>
                            <th scope="col">Correo electrónico</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_datos_generales_inscripcion">
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Datos Escolares</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_datos_escolares_inscripcion">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Carrera y retícula</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Becado por</th>
                            <th scope="col">Materia(s) en examen especial</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_datos_escolares_inscripcion">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Datos de trabajo del alumno</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_datos_trabajo_inscripcion">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nombre de la empresa</th>
                            <th scope="col">Domicilio (Calle y Número)</th>
                            <th scope="col">Colonia</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Entidad Federativa</th>
                            <th scope="col">Teléfono</th>
                        </tr>
                        <tr class="text-center">
                            <th scope="col">Puesto que ocupa</th>
                            <th scope="col">Antiguedad</th>
                            <th scope="col">Nombre del jefe inmediato superior</th>
                            <th scope="col">Turno</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_datos_trabajo_inscripcion">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col mb-5 text-center">
            <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
            <button type="button" class="btn btn-primary" id="btn_actualizar_soli_inscrip">Actualizar</button>
        </div>
    </div>
</div>