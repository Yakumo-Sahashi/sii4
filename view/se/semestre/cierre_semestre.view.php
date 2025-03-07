<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Cierre de semestre</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir($_GET['view']) ?>">Cierre de semestre</a></li>
        </ol>
    </nav>
</div>
<div class="container mt-5">
    <div class="row row-cols-4 row-cols-lg-4 row-cols-sm-2">
        <div class="col mb-3">
            <span class="btn w-100 p-0" id="btn_act_materias_kardex">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-regular fa-file fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Actualizar materias en kardex</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col mb-3">
            <span class="btn w-100 p-0" data-bs-toggle="modal" data-bs-target="#modal_mensaje" id="btn_calcular_promedios">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-bars fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Calcular promedios de alumnos</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col mb-3">
            <span class="btn w-100 p-0" data-bs-toggle="modal" data-bs-target="#modal_mensaje" id="btn_status_alumnos">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-check-to-slot fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Actualizar estatus de alumnos</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col mb-3">
            <span class="btn w-100 p-0" data-bs-toggle="modal" data-bs-target="#modal_mensaje" id="btn_semestre_alumnos">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-graduation-cap fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Actualizar semestre de alumnos</span>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>

<div class="container" id="seccion_act_materias_kardex">
    <h5>Actualizar materias en kardex</h5>
    <hr class="mt-3 mb-5">
    <div class="row row-cols-lg-4 justify-content-center">
        <div class="col mb-3">
            <span class="btn w-100 p-0" data-bs-toggle="modal" data-bs-target="#modal_mensaje" id="btn_kardex_seleccion_materias">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-book fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">De seleccion de materias</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col mb-3">
            <span class="btn w-100 p-0" data-bs-toggle="modal" data-bs-target="#modal_mensaje" id="btn_kardex_ex_esp_autd">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-file-signature fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3 small">De exámenes especiales y autodidactas</span>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>


<!-------------- MODAL MENSAJE -------------->

<div class="modal fade" id="modal_mensaje" tabindex="-1" aria-labelledby="modal_mensaje" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="titulo_modal">Mensaje titulo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="p-5" align="justify" id="contenido_modal">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit commodi blanditiis ducimus cupiditate ullam minus omnis placeat quo dolores aliquam reiciendis ad laboriosam maxime quaerat quae, alias sapiente amet quod.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_aceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<script src="<?=CONTROLLER?>/se/cierre_semestre/cierre_semestre.controller.js"></script>