<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Crear aula</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Crear aula</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3">
    <div class="row justify-content-center py-2">
        <div class="col-lg-12 text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <div class="col-lg-2 col-md-6 align-self-end text-center">
                    <div class="float-start mb-3">
                        <span type="button"><img id="img_foto" class="thumb" src="https://e7.pngegg.com/pngimages/53/167/png-clipart-computer-icons-furniture-logo-door-puerta-angle-kitchen.png" title="fotografia" alt="fotografia"></span>
                        <div class="btn-group-vertical mb-5 mx-0 px-0">
                            <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-start mt-5">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-map-marked me-2"></i>Ver mapa</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="frm_agregar_aula" enctype="multipart/form-data" method="POST">
                        <div class="row align-items-end mb-3 justify-content-center mt-3">
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <input name="nombre_aula" type="text" class="form-control break_size" id="nombre_aula" placeholder="Aula" maxlength="100">
                                    <label for="nombre_aula" class="text-primary"><i class="fas fa-signature me-2"></i> Nombre del aula</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <input name="capacidad" type="text" class="form-control break_size" id="capacidad" placeholder="Capacidad" maxlength="2">
                                    <label for="capacidad" class="text-primary"><i class="fas fa-user-friends me-2"></i> Capacidad</label>
                                </div>
                                <div class="form-text" id="message_label"></div>
                            </div>
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <input name="ubicacion" type="text" class="form-control break_size" id="ubicacion" placeholder="Ubicación" maxlength="100">
                                    <label for="ubicacion" class="text-primary"><i class="fas fa-map-marker-alt me-2"></i> Ubicación</label>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end mb-3 justify-content-center mt-3">
                            <div class="col-lg-3 col-md-3 text-start col-sm-6">
                                <label for="estatus_aula" class="form-label w-100 text-center">Estatus de aula</label>
                                <div class="form-control d-flex justify-content-center">
                                    <div class="form-check form-switch" id="btn_cambiar">
                                        <input class="form-check-input" type="checkbox" name="btn_inactivo" id="btn_inactivo" value="btn_inactivo" checked role="switch">
                                        <label class="form-check-label" value="btn_inactivo" for="btn_inactivo" id="cambio_texto" checked>Activo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-3 text-start col-sm-6">
                                <label for="agregar_observacion" class="form-label text-center w-100">Agregar observación</label>
                                <div class="d-flex justify-content-center">
                                    <span class="btn btn-outline-primary btn-lg" id="agregar_observacion" name="agregar_observacion"><i class="fas fa-comment-alt"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="contenedor_observaciones">
                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control"></textarea>
                                    <label for="observaciones" class="text-primary">Observaciones:</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-lg-12 text-end">
                                <span class="btn btn-primary" id="button_create"><i class="fas fa-plus me-2"></i>Crear</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5" id="container_table">
        <div class="col-lg-12">
            <h2 class="border-bottom mb-4 text-uppercase fs-5 pb-2">Aulas creadas</h2>
            <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-hover table-sm table-responsive-lg text-center" id="table_created_rooms">
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mapa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="https://d500.epimg.net/cincodias/imagenes/2020/02/06/lifestyle/1580989436_276779_1580989485_noticia_normal.jpg" class="img-fluid" alt="">
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button type="button" class="btn btn-second" data-bs-dismiss="modal"><i class="fas fa-map-marker-alt me-2"></i>Nivel A</button>
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="fas fa-map-marker-alt me-2"></i>Nivel B</button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fas fa-map-marker-alt me-2"></i>Nivel C</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fas fa-map-marker-alt me-2"></i>Nivel D</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-sign-out-alt me-2"></i>Salir</button>
                </div>
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