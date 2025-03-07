<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Creación de aulas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir($_GET['view']) ?>">Creación de aulas</a></li>
        </ol>
    </nav>
</div>

<div class="container p-0">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-door-open overflow-hidden text-primary mx-auto mb-1"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 mb-5">
        <div class="col-lg-12 text-center">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-map-marked me-2"></i>Ver mapa</button>
        </div>
    </div>
    <form id="frm_agregar_aula" enctype="multipart/form-data" method="POST">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 text-start">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_aula" name="nombre_aula" placeholder="Aula" maxlength="100">
                    <label for="nombre_aula" class="text-primary"><i class="fas fa-signature me-2"></i>Nombre de aula</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 text-start">
                <div class="form-floating">
                    <input type="text" class="form-control" id="capacidad" name="capacidad" placeholder="Capacidad" maxlength="2" id="background_ability">
                    <label for="floatingInputValue" class="text-primary"><i class="fas fa-user-friends me-2"></i>Capacidad</label>
                </div>
                <div class="form-text pb-2" id="message_label"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6 text-start mt-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="ubicacion" placeholder="Ubicación" maxlength="100">
                    <label for="ubicacion" class="text-primary"><i class="fas fa-map-marker-alt me-2"></i>Ubicación</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 text-start col-sm-6 border bg-white me-4 p-3 mb-3">
                <label for="estatus_aula" class="form-label w-100 text-center">Estatus de aula</label>
                <div class="form-control border-0 d-flex justify-content-center">
                    <div class="form-check form-switch" id="btn_cambiar">
                        <input class="form-check-input" type="checkbox" name="btn_inactivo" id="btn_inactivo" value="btn_inactivo" checked role="switch">
                        <label class="form-check-label" value="btn_inactivo" for="btn_inactivo" id="cambio_texto" checked>Activo</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 text-start col-sm-6 border bg-white p-3">
                <label for="agregar_observacion" class="form-label text-center w-100">Agregar observación</label>
                <div class="form-control border-0 p-0 text-center">
                    <span class="btn btn-outline-primary btn-lg" id="agregar_observacion" name="agregar_observacion"><i class="fas fa-comment-alt"></i></span>
                </div>
            </div>
        </div>
        <div class="row" id="contenedor_observaciones">
            <div class="col-lg-12">
                <label for="observaciones" class="form-label">Observaciones:</label>
                <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-12 text-end">
                <span class="btn btn-primary" id="button_create"><i class="fas fa-plus me-2"></i>Crear</span>
            </div>
        </div>
    </form>
    <div class="row mb-5" id="container_table">
        <div class="col-lg-12">
            <div class="border-bottom mb-4 text-uppercase fs-5 pb-2 small">Aulas creadas</div>
            <div class="table-responsive">
                <table class="table table-hover table-sm table-responsive-lg text-center" id="tabla_aula_contenido">
                    <thead class="text-center fw-bolder">
                        <th>Nombre de aula</th>
                        <th>Capacidad</th>
                        <th>Ubicación</th>
                        <th>Estatus</th>
                        <th>Observaciones</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody id="tabla_aula">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<a href="<?= Router::redirigir('dashboard') ?>" class="btn btn-flotante"><i class="fa-solid fa-arrow-rotate-left"></i></a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mapa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="planta_baja" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?php require_once './public/svg/dep/mapa_planta/Planta_Baja_V2_2.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="primer_nivel" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <?php require_once './public/svg/dep/mapa_planta/Primer_Nivel_V2_1.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="segundo_nivel" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <?php require_once './public/svg/dep/mapa_planta/Segundo_Nivel_V2_1.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="tercer_nivel" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <?php require_once './public/svg/dep/mapa_planta/Tercer_Nivel_V2.php'; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-outline-primary btn-acad me-4" id="planta_baja" data-bs-toggle="pill" data-bs-target="#planta_baja" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            Planta Baja
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-outline-success btn-acad me-4" id="primer_nivel" data-bs-toggle="pill" data-bs-target="#primer_nivel" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Primer Nivel
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-outline-info btn-acad me-4" id="segundo_nivel" data-bs-toggle="pill" data-bs-target="#segundo_nivel" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Segundo Nivel
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="btn btn-outline-warning btn-acad me-4" id="tercer_nivel" data-bs-toggle="pill" data-bs-target="#tercer_nivel" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Tercer Nivel
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="aulaActualizar" tabindex="-1" aria-labelledby="aulaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Aula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_actualizar_aula" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 text-start">
                            <label for="nombre_aula" class="form-label">Nombre de aula</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                <input type="hidden" class="form-control break_size" id="funcion_actualizar" maxlength="100">
                                <input name="id_cat_aula" type="hidden" class="form-control break_size" id="id_cat_aula" maxlength="100">
                                <input name="actualizar_nombre_aula" type="text" class="form-control break_size" id="actualizar_nombre_aula" placeholder="Aula" maxlength="100">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-start">
                            <label for="capacidad" class="form-label">Capacidad</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="background_abilit_actualizar"><i class="fas fa-user-friends"></i></span>
                                <input name="actualizar_capacidad" type="text" class="form-control break_size" id="actualizar_capacidad" placeholder="Capacidad" maxlength="2">
                            </div>
                            <div class="form-text pb-2" id="message_label_actualizar"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 text-start">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <input name="actualizar_ubicacion" type="text" class="form-control break_size" id="actualizar_ubicacion" placeholder="Ubicación" maxlength="100">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <label for="estatus_aula" class="form-label w-100 text-center">Estatus de aula</label>
                            <div class="form-control border-0 d-flex justify-content-center">
                                <div class="form-check form-switch" id="actualizar_btn_cambiar">
                                    <input class="form-check-input" type="checkbox" name="actualizar_btn_inactivo" id="actualizar_btn_inactivo" role="switch">
                                    <label class="form-check-label" value="btn_inactivo" for="btn_inactivo" id="actualizar_cambio_texto"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row" id="contenedor_observaciones">
                            <div class="col-lg-12">
                                <label for="observaciones" class="form-label">Observaciones:</label>
                                <textarea name="actualizar_observaciones" id="actualizar_observaciones" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar Aula</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>dep/aula/listado_aulas.controller.js"></script>
<script src="<?= CONTROLLER ?>dep/aula/aula.controller.js"></script>