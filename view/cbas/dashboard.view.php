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
                    <button class="nav-link active small text-primary" id="grupo-seccion" data-bs-toggle="tab" data-bs-target="#grupo-tab" type="button" role="tab" aria-controls="contact" aria-selected="true">Grupos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="docente-seccion" data-bs-toggle="tab" data-bs-target="#docente-tab" type="button" role="tab" aria-controls="contact" aria-selected="true">Docentes</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="alumnos-seccion" data-bs-toggle="tab" data-bs-target="#alumnos-tab" type="button" role="tab" aria-controls="contact" aria-selected="false">Alumnos</button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <!------------------------------ seccion grupo -->
            <div class="tab-pane fade show active" id="grupo-tab" role="tabpanel" aria-labelledby="grupo-tab">
                <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('grupos_carrera') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-users-rectangle fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Grupos por carrera</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('grupos_departamento') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-people-roof fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Grupos por departamento</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!------------------------------ seccion docentes -->
            <div class="tab-pane fade show" id="docente-tab" role="tabpanel" aria-labelledby="docente-tab">
                <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('asignacion_grupo') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-person-arrow-down-to-line fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Asignación a grupo</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('asig_temporal_depto') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-users-rays fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Asignación temporal a otro depto</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('horarios_examenes') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-regular fa-clock fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Horarios examenes</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('examenes_especiales') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-circle-xmark fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Sin calificar examenes especiales</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('lista_asistencia') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-circle-check fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Lista de asistencia</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('plazas_asignadas') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-user-tag fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Plazas asignadas</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--------------------------------------seccion de alumnos--------------------->
            <div class="tab-pane fade" id="alumnos-tab" role="tabpanel" aria-labelledby="alumnos-tab">
                <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('alumnos_general') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-user-group fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Alumnos general</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('alumnos_inscritos') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-people-group fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Alumnos inscritos</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('estadistica_cbas') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-signal fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Estadistica</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>