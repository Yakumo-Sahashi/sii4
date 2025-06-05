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
<div class="container">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active small text-primary" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Personal</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="reportes-tap" data-bs-toggle="tab" data-bs-target="#reportes_personal" type="button" role="tab" aria-controls="reportes_personal" aria-selected="false">Reportes de Personal</button>
                </li> -->
                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="control_incidencias-tab" data-bs-toggle="tab" data-bs-target="#control_incidencias" type="button" role="tab" aria-controls="control_incidencias" aria-selected="false">Control de Incidencias</button>
                </li> -->
            </ul>
            <div class="tab-content" id="myTabContent">
                <!--------------------------------------Seccion de personal-------------------------->
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                        <div class="col">
                            <a href="<?= Router::redirigir('creacion_empleado') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-plus fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Creación de empleados</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('modificar_eliminar_registro') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-address-card fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Modificar y eliminar registros</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('puestos') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-users fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Puestos</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('jefes') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-tie fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Jefes</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="col">
                            <a href="<?= Router::redirigir('listado') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-arrow-down-a-z fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Listado</span>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="col">
                            <a href="<?= Router::redirigir('calendario') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-calendar-week fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Actualizar calendario</span>
                                    </div>
                                </div>
                            </a>
                        </div> 
                        <div class="col">
                            <a href="<?= Router::redirigir('horarios_registro') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-house-laptop fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Registro Horarios</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('listado_horario') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-list fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Listado Horarios</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('horarios') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-clock fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Calculo de Incidencias</span>
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