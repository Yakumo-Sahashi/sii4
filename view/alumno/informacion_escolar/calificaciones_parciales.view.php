<?php

use config\Router;


require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">CALIFICACIONES PARCIALES</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('calificaciones_parciales') ?>">CALIFICACIONES PARCIALES</a></li>
        </ol>
    </nav>
</div>
<!---Nota: Aqui sale el numero de control y el nombre del alumno---->
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
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_datos_personales">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <h4 class="fs-4 fw-bold text-primary text-center">Calificaciones parciales</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_calificaciones_parciales">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Unidad 1</th>
                            <th scope="col">Unidad 2</th>
                            <th scope="col">Unidad 3</th>
                            <th scope="col">Unidad 4</th>
                            <th scope="col">Unidad 5</th>
                            <th scope="col">Unidad 6</th>
                            <th scope="col">Unidad 7</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_calificaciones_parciales">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col mb-5 text-center">
            <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cerrar">Cerrar</a>
        </div>
    </div>
</div>