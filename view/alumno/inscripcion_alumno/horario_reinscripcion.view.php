<?php

use config\Router;


require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">INFORMACIÓN SOBRE REINSCRIPCIÓN</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('horario_reinscripcion') ?>">INFORMACIÓN SOBRE REINSCRIPCIÓN</a></li>
        </ol>
    </nav>
</div>
<div class="container mt-3" id="seccion_tabla_datos_generales_inscripcion">
    <div class="row justify-content-center">
        <h4 class="fs-4 fw-bold text-primary">Datos Generales</h4>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_informacion_reinscripcion">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Adeudos</th>
                        </tr>
                        <tr class="text-center">
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Lugar</th>
                            <th scope="col">Autorizado Escolares</th>
                            <th scope="col">Encuesta contestada</th>
                            <th scope="col">Biblioteca</th>
                            <th scope="col">Escolares</th>
                            <th scope="col">Financieros</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_informacion_reinscripcion">
                        <td></td>
                        <td></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>