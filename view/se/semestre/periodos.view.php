<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
    date_default_timezone_set('America/Mexico_City');
    $fecha_actual = date("Y-m-d");
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Periodos escolares</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Periodos escolares</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-3">
    <div class="row justify-content-center py-2">
        <div class="col-lg-12 text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4">Creacion de periodos escolares</h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center">
                    <div class="float-start mb-3">
                        <img id="img_foto" class="thumb fa-regular fa-calendar text-primary" src="" style="overflow: hidden;">
                        <div class="btn-group-vertical mb-5 mx-0 px-0">
                            <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-1">
    <form id="frm_creacion_periodo">
        <?php require_once 'includes_periodos/form_part_uno.php'; ?>
    </form>
</div>

<div class="container p-3 mt-3">
    <div class="row mb-5">
        <div class="col">
            <h2 class="border-bottom mb-4 text-uppercase fs-5 pb-2">Periodos creados</h2>
            <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-hover table-sm table-responsive-lg text-center" id="tabla_listado_periodos">
                    <thead class="text-center fw-bolder">
                        <th>No.</th>
                        <th>Periodo</th>
                        <th>Dias de clase</th>
                        <th>Periodo Inicio</th>
                        <th>Periodo Fin</th>
                        <th>Modficar</th>
                        <th>Inhabilitar</th>
                    </thead>
                    <tbody id="tabla_periodo">
                        <tr class="small">
                            <th>Enero-junio 2022</th>
                            <th>60</th>
                            <th>12/12/2002</th>
                            <th>12/12/2002</th>
                            <th><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_modificar_perido"><i class="fa-regular fa-pen-to-square"></i></button></th>
                            <th><button type="button" class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Periodo-->

<div class="modal fade" id="modal_modificar_perido" tabindex="-1" aria-labelledby="aulaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Periodo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_actualizar_periodo" method="POST">
                    <input type="text" value="" name="id_periodo_escolar" hidden>
                    <div class="row mb-2">
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <input class="form-control" readonly id="year_actualizado" name="year_actualizado" value="">
                                <label for="año_actualizado" class="text-primary"> <i class="fa-regular fa-calendar me-2"></i>Año</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="periodo_actualizado" name="periodo_actualizado">
                                    <option value="" selected>Seleccionar periodo</option>
                                    <option value="1">Enero - Junio</option>
                                    <option value="2">Verano</option>
                                    <option value="3">Agosto - Diciembre</option>
                                </select>
                                <label for="periodo_actualizado" class="text-primary"> <i class="fa-solid fa-calendar me-2"></i>Periodo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="inicio_periodo_actualizado" name="inicio_periodo_actualizado" read>
                                <label for="inicio_periodo_actualizado" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Inicio Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 text-start col-sm-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="fin_periodo_actualizado" name="fin_periodo_actualizado">
                                <label for="fin_periodo_actualizado" class="text-primary"><i class="fa-solid fa-calendar me-2"></i>Fin Periodo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-12 col-md-12 text-start col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="dias_clase_actualizado" name="dias_clase_actualizado">
                                <label for="dias_clase_actualizado" class="text-primary"><i class="fa-solid fa-list-ol me-2"></i>Dias de clase</label>
                            </div>
                        </div>
                        <hr class="my-2">
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="mb-3 small">Peridodo vacacional</div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="inicio_vacaciones_actualizado" name="inicio_vacaciones_actualizado" placeholder="Inicio">
                                <label for="inicio_vacaciones_actualizado" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio Vacacional</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fin_vacaciones_actualizado" name="fin_vacaciones_actualizado" placeholder="Fin">
                                <label for="fin_vacaciones_actualizado" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin Vacacional</label>
                            </div>
                        </div><!-- 
                        <div class="col">
                            <div class="mb-3 small">Examenes especiales</div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="inicio_examen_actualizado" name="inicio_examen_actualizado" placeholder="Inicio">
                                <label for="inicio_examen_actualizado" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fin_examen_actualizado" name="fin_examen_actualizado" placeholder="Fin">
                                <label for="fin_examen_actualizado" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin</label>
                            </div>
                        </div> -->
                        <div class="col">
                            <div class="mb-3 small">Encuesta estudiantil</div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="inicio_encuesta_actualizado" name="inicio_encuesta_actualizado" placeholder="Inicio">
                                <label for="inicio_encuesta_actualizado" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio Encuesta</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fin_encuesta_actualizado" name="fin_encuesta_actualizado" placeholder="Fin">
                                <label for="fin_encuesta_actualizado" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin Encuesta</label>
                            </div>
                        </div>
                        <hr class="my-2">
                    </div>
                    <!-- <div class="row justify-content-center py-2">
                        <div class="mb-3 small">Seleccion de materias para los alumnos</div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="inicio_seleccion_actualizado" name="inicio_seleccion_actualizado" placeholder="Inicio">
                                <label for="inicio_seleccion_actualizado" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fin_seleccion_actualizado" name="fin_seleccion_actualizado" placeholder="Fin">
                                <label for="fin_seleccion_actualizado" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin</label>
                            </div>
                        </div>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btn_actualizar_cancelar" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar periodo</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>se/periodos/periodos.controller.js"></script>
