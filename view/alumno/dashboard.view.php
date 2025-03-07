<?php

use config\Router;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('') ?>">Dashboard</a></li>
        </ol>
    </nav>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active small text-primary" id="informacion-seccion" data-bs-toggle="tab" data-bs-target="#informacion-tab" type="button" role="tab" aria-controls="contact" aria-selected="true">Información Escolar</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="inscripcion-seccion" data-bs-toggle="tab" data-bs-target="#inscripcion-tab" type="button" role="tab" aria-controls="contact" aria-selected="false">Inscripciones</button>
                </li> -->
                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="evaluacion-docente-seccion" data-bs-toggle="tab" data-bs-target="#evaluacion-docente-tab" type="button" role="tab" aria-controls="contact" aria-selected="false">Evaluación Docente</button>
                </li> -->
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <!------------------------------ seccion información escolar ------------------------------------>
            <div class="tab-pane fade show active" id="informacion-tab" role="tabpanel" aria-labelledby="informacion-tab">
                <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                   <!--  <div class="col-6 col">
                        <a href="<?= Router::redirigir('servicio_social') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-user-plus fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Servicio Social</span>
                                </div>
                            </div>
                        </a>
                    </div> -->
                    <!-- <div class="col-6 col">
                        <a href="<?= Router::redirigir('datos_socioeconomicos') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-money-check-dollar fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Datos socioeconómicos</span>
                                </div>
                            </div>
                        </a>
                    </div> -->
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('boletas_calificaciones') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-list-check fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Boletas de calificaciones</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('avance_reticular') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-address-card fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Avance reticular</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('kardex_reticular') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-user-check fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Kardex de calificaciones</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('horarios_alumnos') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-user-clock fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Horarios</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('evaluacion_docente') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-user-group fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Evaluación docente</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                    <!-- <div class="col-6 col">
                        <a href="<?= Router::redirigir('examenes_globales_especiales') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-server fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Calificaciones de examenes globales y especiales</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('calificaciones_parciales') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-address-book fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Calificaciones parciales</span>
                                </div>
                            </div>
                        </a>
                    </div> -->
                    
                </div>
            </div>
            <!------------------------------ seccion inscripcion  ------------------------------------------->
            <!-- <div class="tab-pane fade" id="inscripcion-tab" role="tabpanel" aria-labelledby="inscripcion-tab">
                <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('solicitud_inscripcion') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-person-circle-question fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Solicitud de inscripción</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('seleccion_materias') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-list-check fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Selección de materias</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('horario_reinscripcion') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-user-clock fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Horario Reinscripción</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> -->
            <!--------------------------------------seccion evaluación docente--------------------->
            <!-- <div class="tab-pane fade" id="evaluacion-docente-tab" role="tabpanel" aria-labelledby="evaluacion-docente-tab">
                <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('evaluacion_docente') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-user-group fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Evaluación docente</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>