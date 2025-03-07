<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Especialidades</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Especialidades</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-3">
    <div class="row justify-content-center py-2">
        <div class="col-lg-12 text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4">Creacion de especialidad</h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center">
                    <div class="float-start mb-3">
                        <img id="img_foto" class="thumb fa-solid fa-user-tie text-primary" src="" style="overflow: hidden;">
                        <div class="btn-group-vertical mb-5 mx-0 px-0">
                            <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="frm_crear_especialidad">
                        <div class="row align-items-end mb-3 justify-content-center mt-3">
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <input name="nombre_especialidad" type="text" class="form-control break_size" id="nombre_especialidad" placeholder="Nombre de la especialidad" maxlength="100">
                                    <label for="nombre_especialidad" class="text-primary"><i class="fa-solid fa-file-signature me-2"></i> Nombre de la especialidad</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <select class="form-select break_size" id="carrera_reticula" name="carrera_reticula">
                                        <option value="" selected>Seleccionar</option>
                                        <option value="1">Sistemas</option>
                                        
                                    </select>
                                    <label for="carrera_reticula" class="text-primary"><i class="fa-solid fa-rectangle-list me-2"></i> Carrera/Reticula</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <input name="periodo_inicio" type="date" class="form-control break_size" id="periodo_inicio" placeholder="Periodo de Inicio" min="<?php echo date("Y-m-d",strtotime(date("Y-m-d")))?>">
                                    <label for="periodo_inicio" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i> Periodo de Inicio</label>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-end mb-3 justify-content-center mt-3">
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <input name="periodo_liquidacion" type="date" class="form-control break_size" id="periodo_liquidacion" placeholder="Periodo de liquidacion" min="<?php echo date("Y-m-d",strtotime(date("Y-m-d")))?>">
                                    <label for="periodo_liquidacion" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i> Periodo de liquidacion</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <input name="creditos_especialidad" type="text" class="form-control break_size" id="creditos_especialidad" placeholder="Creditos de especialidad" min="0">
                                    <label for="creditos_especialidad" class="text-primary"><i class="fa-regular fa-address-card me-2"></i> Creditos de especialidad</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 text-start">
                                <div class="form-floating mb-3">
                                    <input name="creditos_optativos" type="text" class="form-control break_size" id="creditos_optativos" placeholder="Creditos de optativos" min="0">
                                    <label for="creditos_optativos" class="text-primary"><i class="fa-solid fa-bars me-2"></i> Creditos de optativos</label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-lg-12 text-end">
                                <button class="btn btn-primary" type="submit" id="btn_crear"><i class="fas fa-plus me-2"></i>Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col">
            <h2 class="border-bottom mb-4 text-uppercase fs-5 pb-2">Especialidades creadas</h2>
            <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-hover table-sm table-responsive-lg text-center" id="tabla_listado_especialidad">
                    <thead class="text-center fw-bolder">
                        <th>Nombre de la especialidad</th>
                        <th>Carrera/Reticula</th>
                        <th>Periodo Inicio</th>
                        <th>Periodo Liquidacion</th>
                        <th>Creditos especialidad</th>
                        <th>Creditos optativos</th>
                        <th>Modficar</th>
                        <th>Inhabilitar</th>
                    </thead>
                    <tbody id="tabla_especialidad">
                        <tr class="small">
                            <th>Desarrollo web</th>
                            <th>ING SIS COMP</th>
                            <th>12/12/12</th>
                            <th>12/12/12</th>
                            <th>12</th>
                            <th>23</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar especialidad-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="aulaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Especialidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_actualizar_especialidad">
                    <input type="text" value="" name="id_especialidad_actualizado" hidden>
                    <div class="row mb-2">
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <input name="nombre_especialidad_actualizado" type="text" class="form-control break_size small" id="nombre_especialidad_actualizado" placeholder="Nombre de la especialidad" maxlength="100">
                                <label for="nombre_especialidad_actualizado" class="text-primary small"><i class="fa-solid fa-file-signature me-2"></i> Nombre de especialidad</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <select class="form-select break_size small" id="carrera_reticula_actualizado" name="carrera_reticula_actualizado">
                                    <option value="" selected>Seleccionar</option>
                                </select>
                                <label for="carrera_reticula_actualizado" class="text-primary small"><i class="fa-solid fa-rectangle-list me-2"></i> Carrera/Reticula</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <input name="periodo_inicio_actualizado" value="" type="date" class="form-control break_size small" id="periodo_inicio_actualizado" placeholder="Periodo de Inicio">
                                <label for="periodo_inicio_actualizado" class="text-primary small"><i class="fa-regular fa-calendar-check me-2"></i> Periodo de Inicio</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="periodo_liquidacion_actualizado" value="" type="date" class="form-control break_size small" id="periodo_liquidacion_actualizado" placeholder="Periodo de liquidacion">
                                <label for="periodo_liquidacion_actualizado" class="text-primary small"><i class="fa-regular fa-calendar-xmark me-2"></i> Periodo de liquidacion</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="creditos_especialidad_actualizado" type="text" class="form-control break_size small" id="creditos_especialidad_actualizado" placeholder="Creditos de especialidad" min="0">
                                <label for="creditos_especialidad_actualizado" class="text-primary small"><i class="fa-regular fa-address-card me-2"></i> Creditos de especialidad</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input name="creditos_optativos_actualizado" type="text" class="form-control break_size small" id="creditos_optativos_actualizado" placeholder="Creditos de optativos" min="0">
                                <label for="creditos_optativos_actualizado" class="text-primary small"><i class="fa-solid fa-bars me-2"></i> Creditos de optativos</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btn_actualizar_cancelar" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar especialidad</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>se/especialidades/especialidades.controller.js"></script>
<!-- 
    FORMS
- frm_crear_especialidad
- frm_actualizar_especialidad
- 
    BOTONES 
- ver_img
- btn_crear
- btn_actualizar_cancelar
- btn_actualizar
 -->