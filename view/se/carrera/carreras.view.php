<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Carreras</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Carreras</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0">
    <!-- <div class="row justify-content-around">
        <div class="col">
            <div class="progress mt-4">
                <div id="progreso-form" class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div> -->
</div>
<div class="container p-3 mt-3">
    <div class="row justify-content-center py-2">
        <div class="col-lg-12 text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-3">Creacion de carrera</h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center">
                    <div class="float-start mb-3">
                        <img id="img_foto" class="thumb fa-solid fa-graduation-cap text-primary" src="" style="overflow: hidden;">
                        <div class="btn-group-vertical mb-5 mx-0 px-0">
                            <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="frm_agregar_carrera">
                        <?php include_once 'includes_carreras/form_part_uno.php' ?>
                        <?php include_once 'includes_carreras/form_part_dos.php' ?>
                        <div class="row my-5">
                            <div class="col-lg-12 text-end">
                                <!-- <span class="btn btn-danger" id="btn_cancelar">Cancelar</span>
                                <span class="btn btn-secondary text-light" id="btn_atras"></i>Atras</span>
                                <span class="btn btn-primary" id="btn_siguiente">Siguiente</span> -->
                                <button class="btn btn-primary" id="btn_crear" type="submit"><i class="fas fa-plus me-2"></i>Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col">
            <h2 class="border-bottom mb-4 text-uppercase fs-5 pb-2">Carreras creadas</h2>
            <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-hover table-sm table-responsive-lg text-center" id="tabla_listado_carreras">
                    <thead class="text-center fw-bolder">
                        <th>Nombre de la carrera</th>
                        <th>Nombre reducido</th>
                        <th>Siglas</th>
                        <th>Reticula</th>
                        <th>Modificar</th>
                        <th>Inhabilitar</th>
                    </thead>
                    <tbody id="tabla_carrera">
                        <tr>
                            <th>Ingenieria en sistemas computacionales</th>
                            <th>ING SIS COMP </th>
                            <th>SIS</th>
                            <th>3</th>
                            <th><button class="btn btn-success"><i class="fa-regular fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></button></th>
                            <th><button type="button" class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Carrera-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="aulaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Carrera</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_actualizar_carrera">
                    <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_actualizar_carrera")?>" hidden>
                    <input type="text" name="id_carrera_actualizado" value="" hidden>
                    <input type="text" name="id_reticula_actualizado" value="" hidden>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <input name="nombre_carrera_actualizado" type="text" class="form-control break_size" id="nombre_carrera_actualizado" placeholder="Nombre de la carrera<" maxlength="100">
                                <label for="nombre_carrera_actualizado" class="text-primary small"><i class="fa-solid fa-graduation-cap me-2"></i> Nombre de la carrera</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <input name="nombre_reducido_actualizado" type="text" class="form-control break_size" id="nombre_reducido_actualizado" placeholder="Nombre reducido" maxlength="15">
                                <label for="nombre_reducido_actualizado" class="text-primary small"><i class="fa-solid fa-file-signature me-2"></i> Nombre reducido</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <input name="siglas_actualizado" type="text" class="form-control break_size" id="siglas_actualizado" placeholder="Siglas" maxlength="15">
                                <label for="siglas_actualizado" class="text-primary small"><i class="fa-solid fa-filter me-2"></i> Siglas</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating">
                                <select class="form-select small" id="nivel_escolar_actualizado" name="nivel_escolar_actualizado">
                                    <option value="" selected>Seleccionar</option>
                                    <option value="L">Licenciatura</option>
                                </select>
                                <label for="nivel_escolar_actualizado" class="text-primary small"><i class="fa-solid fa-id-card-clip me-2"></i>Nivel escolar</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="clave_oficial_actualizado" type="text" class="form-control break_size" id="clave_oficial_actualizado" placeholder="Clave oficial" maxlength="100">
                                <label for="clave_oficial_actualizado" class="text-primary small"><i class="fa-solid fa-lock me-2"></i> Clave oficial</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="clave_oficial_actualizado" type="text" class="form-control break_size" id="clave_oficial_actualizado" placeholder="Clave oficial" maxlength="100">
                                <label for="clave_oficial_actualizado" class="text-primary small"><i class="fa-solid fa-shield me-2"></i> Clave DGEST</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="reticula_actualizado" type="text" class="form-control break_size" id="reticula_actualizado" placeholder="Reticula" maxlength="100">
                                <label for="reticula_actualizado" class="text-primary small"><i class="fa-solid fa-rectangle-list me-2"></i> Reticula</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="fecha_inicio_actualizado" value="" type="date" class="form-control break_size small" id="fecha_inicio_actualizado" placeholder="fecha de inicio">
                                <label for="fecha_inicio_actualizado" class="text-primary small"><i class="fa-solid fa-calendar-check me-2"></i> Fecha de inicio</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="fecha_cierre_actualizado" value="" type="date" class="form-control break_size" id="fecha_cierre_actualizado" placeholder="fecha_cierre">
                                <label for="fecha_cierre_actualizado" class="text-primary small"><i class="fa-solid fa-calendar-xmark me-2"></i> Fecha de cierre</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="creditos_actualizado" type="text" class="form-control break_size" id="creditos_actualizado" placeholder="Creditos totales" min="0">
                                <label for="creditos" class="text-primary small"><i class="fa-solid fa-bars me-2"></i> Creditos totales</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="carga_minima_actualizado" type="text" class="form-control break_size" id="carga_minima_actualizado" placeholder="Carga minima" min="0">
                                <label for="carga_minima_actualizado" class="text-primary small"><i class="fa-solid fa-arrow-down-wide-short me-2"></i> Carga minima</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="carga_maxima_actualizado" type="text" class="form-control break_size" id="carga_maxima_actualizado" placeholder="Carga maxima" min="0">
                                <label for="carga_maxima_actualizado" class="text-primary small"><i class="fa-solid fa-arrow-up-wide-short me-2"></i> Carga maxima</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btn_actualizar_cancelar" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar carrera</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>se/carreras/carreras.controller.js"></script>

<!-- 
    FORMS
- frm_agregar_carrera
- frm_actualizar_carrera
- 
    BOTONES 
- ver_img
- btn_cancelar
- btn_atras
- btn_siguiente
- btn_crear
- btn_actualizar_cancelar
- btn_actualizar


 -->