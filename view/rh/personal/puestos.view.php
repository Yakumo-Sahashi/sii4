<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">PUESTOS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('puestos') ?>">PUESTOS</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                        <!-- <div class="col">
                            <a href="<?= Router::redirigir('reorganizar_clave') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-check fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Reorganizar clave</span>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="col">
                            <a href="<?= Router::redirigir('creacion_puestos') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-clipboard-user fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Creacion de puestos</span>
                                    </div>
                                </div>
                            </a>
                        </div><!-- 
                        <div class="col">
                            <a href="<?= Router::redirigir('asignacion_nivel_puesto') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-person-circle-plus fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Asignación de nivel de puesto</span>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="col">
                            <a href="<?= Router::redirigir('asignacion_puestos_personal') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-plus fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Asignación de puestos a personal</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>