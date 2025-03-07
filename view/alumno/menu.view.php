<?php

use config\Router;

require_once realpath('./vendor/autoload.php');
?>
<li class="nav-item my-2">
    <div class="accordion accordion-flush" id="accordion-alumnos">
        <!----------------Sección Inscripciones----------------->
        <!-- <div class="accordion-item">
            <h2 class="accordion-header" id="flush-grupos">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="small"><i class="fa-solid fa-address-book me-2"></i>Inscripciones</div>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-alumnos">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('grupos_carrera') ?>">
                        <i class="fa-solid fa-person-circle-question me-2"></i>
                        <span class="small">Solicitud de inscripción</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('grupos_carrera') ?>">
                        <i class="fa-solid fa-list-check me-2"></i>
                        <span class="small">Selección de materias</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('grupos_carrera') ?>">
                        <i class="fa-solid fa-user-clock me-2"></i>
                        <span class="small">Horario Reinscripcion</span>
                    </a>
                </div>
            </div>
        </div> -->
        <!---------------Sección Información Escolar------------------->
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-grupos">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <div class="small"><i class="fa-solid fa-school-circle-exclamation me-2"></i>Información Escolar</div>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-alumnos">
                <div class="accordion-body">
                   <!--  <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('servicio_social') ?>">
                        <i class="fa-solid fa-user-plus me-2"></i>
                        <span class="small">Servicio social</span>
                    </a> -->
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('datos_socioeconomicos') ?>">
                        <i class="fa-solid fa-money-check-dollar me-2"></i>
                        <span class="small">Datos socioeconómicos</span>
                    </a> -->
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('boletas_calificaciones') ?>">
                        <i class="fa-solid fa-list-check me-2"></i>
                        <span class="small">Boleta de calificaciones</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('avance_reticular') ?>">
                        <i class="fa-solid fa-address-card me-2"></i>
                        <span class="small">Avance reticular</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('kardex_reticular') ?>">
                        <i class="fa-solid fa-user-check me-2"></i>
                        <span class="small">Kardex de calificaciones</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('horarios_alumnos') ?>">
                        <i class="fa-solid fa-user-clock me-2"></i>
                        <span class="small">Horarios</span>
                    </a>
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('examenes_globales_especiales') ?>">
                        <i class="fa-solid fa-server me-2"></i>
                        <span class="small">Calificaciones de examenes globales y especiales</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('calificaciones_parciales') ?>">
                        <i class="fa-solid fa-address-book me-2"></i>
                        <span class="small">Calificaciones parciales</span>
                    </a> -->
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('evaluacion_docente') ?>">
                        <i class="fa-solid fa-user-group me-2"></i>
                        <span class="small">Evaluación Docente</span>
                    </a>
                </div>
            </div>
        </div>
        <!-------------Sección Evaluación Docente--------------->
       <!--  <div class="accordion-item">
            <h2 class="accordion-header" id="flush-grupos">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <div class="small"><i class="fa-solid fa-user-group me-2"></i>Evaluación Docente</div>
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-alumnos">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('grupos_carrera') ?>">
                        <i class="fa-solid fa-user-group me-2"></i>
                        <span class="small">Evaluación Docente</span>
                    </a>
                </div>
            </div>
        </div> -->
    </div>
</li>