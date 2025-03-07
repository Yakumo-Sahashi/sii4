<?php

use config\Router;

require_once realpath('./vendor/autoload.php');
?>
<li class="nav-item my-2">
    <div class="accordion accordion-flush" id="accordion-grupos">
        <!-------------Seccion de Grupos--------------->
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-grupos">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="small"><i class="fa-solid fa-user-group me-2"></i>Grupos</div>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-grupos">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('grupos_carrera') ?>">
                        <i class="fa-solid fa-users-rectangle me-2"></i>
                        <span class="small">Grupos por carrera</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('grupos_departamento') ?>">
                        <i class="fa-solid fa-people-roof me-2"></i>
                        <span class="small">Grupos por departamento</span>
                    </a>
                </div>
            </div>
        </div>
        <!-------------Seccion de docentes--------------->
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-docentes">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                    <div class="small"><i class="fa-solid fa-glasses me-2"></i>Docentes</div>
                </button>
            </h2>
            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-grupos">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('asignacion_grupo') ?>">
                        <i class="fa-solid fa-person-arrow-down-to-line  me-2"></i>
                        <span class="small">Asignación a grupo</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('asig_temporal_depto') ?>">
                        <i class="fa-solid fa-users-rays me-2"></i>
                        <span class="small">Asignación temporal a otro depto</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('plazas_asignadas') ?>">
                        <i class="fa-solid fa-user-tag me-2"></i>
                        <span class="small">Plazas asignadas</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('horarios_examenes') ?>">
                        <i class="fa-regular fa-clock me-2"></i>
                        <span class="small">Horarios examenes</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('examenes_especiales') ?>">
                        <i class="fa-solid fa-file-circle-xmark me-2"></i>
                        <span class="small">Sin calificar examenes especiales</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('lista_asistencia') ?>">
                        <i class="fa-solid fa-file-circle-check me-2"></i>
                        <span class="small">Lista de asistencia</span>
                    </a>
                </div>
            </div>
        </div>
        <!------------Seccion de Alumnos-------------->
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-alumnos">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <div class="small"><i class="fa-solid fa-user me-2"></i>Alumnos</div>
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-grupos">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alumnos_general') ?>">
                        <i class="fa-solid fa-user-group me-2"></i>
                        <span class="small">Alumnos general</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alumnos_inscritos') ?>">
                        <i class="fa-solid fa-people-group me-2"></i>
                        <span class="small">Alumnos inscritos</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('estadistica_cbas') ?>">
                        <i class="fa-solid fa-file-circle-check me-2"></i>
                        <span class="small">Estadistica</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</li>