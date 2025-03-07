<?php

use config\Router;


require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">EXÁMENES GLOBALES Y ESPECIALES</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('examenes_globales_especiales') ?>">EXÁMENES GLOBALES Y ESPECIALES</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-5" id="solicitud_examen_expecial_sol">
    <div class="row justify-content-center py-2">
        <div class="col-lg-12 text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4">EXÁMENES GLOBALES Y ESPECIALES</h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center">
                    <div class="float-start mb-3">
                        <img id="img_foto" class="thumb fa-solid fa-graduation-cap text-primary" src="" style="overflow: hidden;">
                        <div class="btn-group-vertical mb-5 mx-0 px-0">
                            <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_listado_examenes">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Calificacion</th>
                            <th scope="col">Tipo Evaluacion</th>
                        </tr>
                    <thead>   
                    <tbody id="tabla_examenes">                        
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>alumno/informacion_escolar/examenes_alumno.controller.js"></script>