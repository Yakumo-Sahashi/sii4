<?php

use config\Router;

require_once realpath('./vendor/autoload.php');
?>

<li class="nav-item my-2">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <!-------------- Acordion Mantenimiento-->
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingMantenimiento">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseMantenimiento" aria-expanded="false" aria-controls="flush-collapseMantenimiento">
                    <div class="text-primary small"><i class="fa-solid fa-wrench me-2"></i>Mantenimiento</div>
                </button>
            </h2>
            <div id="flush-collapseMantenimiento" class="accordion-collapse collapse" aria-labelledby="flush-headingMantenimiento" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed" href="<?= Router::redirigir('aula_dep') ?>">
                        <i class="fas fa-door-open me-2"></i>
                        <span class="small">Crear Aula</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('crear_horario_grupo') ?>">
                        <i class="fas fa-users me-2"></i>
                        <span class="small">Crear grupo y horarios</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('crear_grupo_paralelo') ?>">
                        <i class="fas fa-book-open-reader me-2"></i>
                        <span class="small">Crear grupo paralelo</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('horario_carrera') ?>">
                        <i class="fa-solid fa-users-line me-2"></i>
                        <span class="small">Actualizar horario y grupo</span>
                    </a>
                </div>
            </div>
        </div>
        <!-------------- Acordion Impresión ------------------>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingImpresion">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseImpresion" aria-expanded="false" aria-controls="flush-collapseImpresion">
                    <div class="text-primary small"><i class="fa-solid fa-print me-2"></i>Impresión</div>
                </button>
            </h2>
            <div id="flush-collapseImpresion" class="accordion-collapse collapse" aria-labelledby="flush-headingImpresion" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('horario_carrera') ?>">
                        <i class="fa-regular fa-clock me-2"></i>
                        <span class="small">Horario por carrera</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('grupos_base') ?>">
                        <i class="fa-solid fa-user-group me-2"></i>
                        <span class="small">Grupos base</span>
                    </a>
                </div>
            </div>
        </div>
        <!-------------- Acordion Inscripciones --------------->
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingInscripciones">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseInscripciones" aria-expanded="false" aria-controls="flush-collapseIncripciones">
                    <div class="text-primary small"><i class="fa-solid fa-clipboard-user me-2"></i>Inscripciones</div>
                </button>
            </h2>
            <div id="flush-collapseInscripciones" class="accordion-collapse collapse" aria-labelledby="flush-headingInscripciones" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('inscripciones_periodo') ?>">
                        <i class="fas fa-door-open me-2"></i>
                        <span class="small">Inscripcion Periodo
                        </span>
                    </a>
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('verano') ?>">
                        <i class="fa-solid fa-cloud-sun me-2"></i>
                        <span class="small">Verano</span>
                    </a> -->
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('autorizaciones_academicas') ?>">
                        <i class="fa-solid fa-user-check me-2"></i>
                        <span class="small">Autorizaciones académicas</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('nips_alumnos') ?>">
                        <i class="fa-solid fa-key me-2"></i>
                        <span class="small">NIP'S de Alumnos</span>
                    </a>
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('ajuste_capacidad_grupos') ?>">
                        <i class="fa-solid fa-users-between-lines me-2"></i>
                        <span class="small">Ajuste de capacidad de grupos</span>
                    </a> -->
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('problemas_inscripcion') ?>">
                        <i class="fa-solid fa-user-xmark me-2"></i>
                        <span class="small">Problemas de inscripción</span>
                    </a> -->
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('residencias') ?>">
                        <i class="fa-regular fa-file-lines me-2"></i>
                        <span class="small">Residencias</span>
                    </a> -->
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingInscripciones">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseConsultas" aria-expanded="false" aria-controls="flush-collapseIncripciones">
                    <div class="text-primary small"><i class="fa-solid fa-magnifying-glass me-2"></i>Consultas</div>
                </button>
            </h2>
            <div id="flush-collapseConsultas" class="accordion-collapse collapse" aria-labelledby="flush-headingInscripciones" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('lista_asistencias') ?>">
                        <i class="fa-solid fa-list-check me-2"></i>
                        <span class="small">Lista de asistencias</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('consulta_grupos') ?>">
                        <i class="fa-solid fa-user-group me-2"></i>
                        <span class="small">Grupos</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alumnos_inscritos_dep') ?>">
                        <i class="fa-solid fa-clipboard-user me-2"></i>
                        <span class="small">Alumnos inscritos</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alumnos_exam_especial') ?>">
                        <i class="fa-solid fa-file-contract me-2"></i>
                        <span class="small">Alumnos en examen especials</span>
                    </a>
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('analisis_materias') ?>">
                        <i class="fa-solid fa-book me-2"></i>
                        <span class="small">Análisis de materia</span>
                    </a> -->
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('estadisticas_dep') ?>">
                        <i class="fa-solid fa-chart-line me-2"></i>
                        <span class="small">Estadisticas</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</li>