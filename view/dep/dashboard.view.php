<?php

use config\Router;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('home') ?>">Dashboard</a></li>
        </ol>
    </nav>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-primary small" id="mantenimiento-tab" data-bs-toggle="tab" data-bs-target="#mantenimiento-tab-pane" type="button" role="tab" aria-controls="mantenimiento-tab-pane" aria-selected="true">Mantenimiento</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-primary small" id="impresion-tab" data-bs-toggle="tab" data-bs-target="#impresion-tab-pane" type="button" role="tab" aria-controls="impresion-tab-pane" aria-selected="false">Impresión</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-primary small" id="inscripciones-tab" data-bs-toggle="tab" data-bs-target="#inscripciones-tab-pane" type="button" role="tab" aria-controls="inscripciones-tab-pane" aria-selected="false">Inscripciones</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-primary small" id="consultas-tab" data-bs-toggle="tab" data-bs-target="#consultas-tab-pane" type="button" role="tab" aria-controls="consultas-tab-pane" aria-selected="false">Consultas</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!------------------------------- Seccion Mantenimiento --------------->
                <div class="tab-pane fade show active" id="mantenimiento-tab-pane" role="tabpanel" aria-labelledby="mentenimiento-tab" tabindex="0">
                    <div class="container p-0">
                        <div class="row justify-content-center row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                            <div class="col">
                                <a href="<?= Router::redirigir('aula_dep') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fas fa-door-open fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Crear Aula</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= Router::redirigir('crear_horario_grupo') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fas fa-users fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Crear grupo y horarios</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= Router::redirigir('crear_grupo_paralelo') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fas fa-book-open-reader fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Crear grupo paralelo</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= Router::redirigir('actualizar_horario_grupo') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-users-line fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Actualizar horario y grupo</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------------------- Seccion Impresion ------------------>
                <div class="tab-pane fade" id="impresion-tab-pane" role="tabpanel" aria-labelledby="impresion-tab" tabindex="0">
                    <div class="container p-0">
                        <div class="row justify-content-center row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                            <div class="col">
                                <a href="<?= Router::redirigir('horario_carrera') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-regular fa-clock fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Horario por carrera</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= Router::redirigir('grupos_base') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-user-group fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Grupos base</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------------------- Seccion Inscripciones --------------->
                <div class="tab-pane fade" id="inscripciones-tab-pane" role="tabpanel" aria-labelledby="inscripciones-tab" tabindex="0">
                    <div class="container p-0">
                        <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 my-3">
                            <div class="col">
                                <a href="<?= Router::redirigir('inscripciones_periodo') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fas fa-door-open fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Inscripcion Periodo
                                                <span class="text-small">Ene-Jun | Ago - Dic | Verano</span>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div><!-- 
                            <div class="col">
                                <a href="<?= Router::redirigir('verano') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-cloud-sun fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Verano</span>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <div class="col">
                                <a href="<?= Router::redirigir('autorizaciones_academicas') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-user-check fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Autorizaciones académicas</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= Router::redirigir('nips_alumnos') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-key fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Contraseña de Alumnos</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- <div class="col">
                                <a href="<?= Router::redirigir('ajuste_capacidad_grupos') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-users-between-lines fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Ajuste de capacidad de grupos</span>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <!-- <div class="col">
                                <a href="<?= Router::redirigir('problemas_inscripcion') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-user-xmark fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Problemas de inscripción</span>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <!-- <div class="col">
                                <a href="<?= Router::redirigir('residencias') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-regular fa-file-lines fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Residencias</span>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!------------------------------- Seccion Consultas --------------->
                <div class="tab-pane fade" id="consultas-tab-pane" role="tabpanel" aria-labelledby="consulas-tab" tabindex="0">
                    <div class="container p-0">
                        <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 my-3">
                            <div class="col">
                                <a href="<?= Router::redirigir('lista_asistencias') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-list-check fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Lista de asistencias</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= Router::redirigir('consulta_grupos') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-user-group fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Grupos</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= Router::redirigir('alumnos_inscritos_dep') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-clipboard-user fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3">Alumnos inscritos</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="<?= Router::redirigir('alumnos_exam_especial') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-file-contract fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3 small">Alumnos en examen especial</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                           <!--  <div class="col">
                                <a href="<?= Router::redirigir('analisis_materias') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-book fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3 small">Análisis de materias</span>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <div class="col">
                                <a href="<?= Router::redirigir('estadisticas_dep') ?>" class="btn w-100 p-0">
                                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                        <div class="card-body text-center">
                                            <i class="fa-solid fa-chart-line fa-4x mx-auto d-block"></i>
                                            <span class="d-block mt-3 small">Estadisticas</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
