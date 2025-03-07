<?php

use config\Router;


require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">DATOS SOCIOECONÓMICOS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('datos_socioeconomicos') ?>">DATOS SOCIOECONÓMICOS</a></li>
        </ol>
    </nav>
</div>

<div class="container mt-3" id="seccion_tabla_datos_generales_alumno">
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Datos personales</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_datos_personales">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No. De Control</th>
                            <th scope="col">Nombre completo del Alumno</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Prom. Acum</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Especialidad</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_datos_personales">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Datos Socioeconómicos</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_datos_socioeconomicos">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nivel máximo de estudios del padre</th>
                            <th scope="col">Nivel máximo de estudios de la madre</th>
                            <th scope="col">Con quién vives actualmente</th>
                            <th scope="col">Ingresos mensuales</th>
                        </tr>
                        <tr class="text-center">
                            <th scope="col">Ocupación o trabajo del padre</th>
                            <th scope="col">Ocupación o trabajo de la madre</th>
                            <th scope="col">De quien dependes económicamente</th>
                            <th scope="col">La casa donde vives es:</th>
                        </tr>
                        <tr class="text'center">
                            <th scope="col">Cuartos que tienes en casa</th>
                            <th scope="col">Personas que viven en casa</th>
                            <th scope="col">¿Cuántas personas incluyendote a ti, dependen del principal sustento?</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_datos_socioeconomicos">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Datos de Emergencia</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_datos_emergencia">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Tipo de sangre</th>
                            <th scope="col">En caso de Emergencia ¿Con quién nos podemos comunicar?</th>
                            <th scope="col">Calle con Número exterior</th>
                            <th scope="col">Colonia Localidad</th>
                            <th scope="col">Código postal</th>
                            <th scope="col">Municipio</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Lugar de Trabajo</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_datos_emergencia">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col mb-5 text-center">
            <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
            <button type="button" class="btn btn-primary" id="btn_actualizar_datos_socio">Actualizar</button>
        </div>
    </div>
</div>