<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Calificaciones y actas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>"></i>Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('calificaciones_actas') ?>">Calificaciones y actas</a></li>
        </ol>
    </nav>
</div>
<div id="seccion_botones_menu" class="container mt-5">
    <div class="row justify-content-center row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
        <div class="col">
            <span class="btn w-100 p-0" id="btn_periodo_normal">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-regular fa-calendar fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Periodo normal</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col">
            <a class="btn w-100 p-0" id="btn_examenes_esp_glo">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-file-contract fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Exámenes Especiales o Globales</span>
                    </div>
                </div>
            </a>
        </div>
       <!--  <div class="col">
            <span class="btn w-100 p-0" id="btn_generar_folios">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-regular fa-file-lines fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Generar Folios para Actas</span>
                    </div>
                </div>
            </span>
        </div> -->
    </div>
</div>
<!-- Esta seccion se genera al seleccionar la opcion "Generar Folios para Actas" | id del btn que la genera -> 'btn_generar_folios'-->
<div class="container d-none" id="seccion_folios">
    <div class="row">
        <div class="col text-center border-bottom">
            <h5>Generar Folios para Actas</h5>
        </div>
    </div>
    <div class="row my-4 justify-content-center row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
        <div class="col">
            <span class="btn w-100 p-0" id="btn_folios_periodo">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-calendar fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Periodo normal</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col">
            <span class="btn w-100 p-0" id="btn_folio_examenes_esp_glo">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-file-contract fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Exámenes Especiales o Globales</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col">
            <span class="btn w-100 p-0" id="btn_folio_residencias">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-user-graduate fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Folios Residencias</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col-12 text-center">
            <span type="button" id="btn_canc_folio" class="btn btn-secondary text-white">Cancelar</span>
        </div>
    </div>
</div>

<!-- Esta seccion se genera al seleccionar la la opcion "periodo normal" | id del btn que la genera -> 'btn_periodo_normal' -->
<div class="contaier  d-none" id="seccion_periodo">
    <div class="row mb-3">
        <div class="col text-center">
            <h3>Calificaciones y actas - Periodo normal</h3>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-floating mb-3">
                <select class="form-select" id="select_periodo" name="select_periodo" aria-label="">
                    <option value="" selected>Seleccionar periodo</option>
                </select>
                <label for="select_periodo" class="text-primary"> <i class="fa-regular fa-calendar me-2"></i> Periodo</label>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <span type="button" id="btn_canc_periodo" class="btn btn-secondary text-white">Cancelar</span>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_periodo">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Profesor</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col text-small">Alumnos<br>Inscritos</th>
                            <th scope="col">Capturar</th>
                            <th scope="col">Acta</th>
                            <th scope="col">Excel</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_periodo_n">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Esta seccion se genera al seleccionar la la opcion "Exámenes Especiales o Globales" | id del btn que la genera -> 'btn_examenes_esp_glo' -->
<div class="contaier  d-none" id="seccion_examens_esp_glo">
    <div class="row mb-3">
        <div class="col text-center">
            <h3>Calificaciones y actas - Exámenes Especiales o Globales</h3>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-floating mb-3">
                <select class="form-select" id="select_exam_esp_glob" name="select_exam_esp_glob" aria-label="">
                    <option value="" selected>Seleccionar periodo</option>
                </select>
                <label for="select_exam_esp_glob" class="text-primary"> <i class="fa-regular fa-calendar me-2"></i> Periodo</label>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <span type="button" id="btn_canc_ex_especial" class="btn btn-secondary text-white">Cancelar</span>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_exam_esp_glo">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Alumnos<br>Inscritos</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Acta</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_exam_esp_glo">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Esta seccion se genera al seleccionar la la opcion "folios periodo normal" | id del btn que la genera -> 'btn_folios_periodo' -->
<div class="contaier  d-none" id="seccion_folios_periodo">
    <div class="row mb-3">
        <div class="col text-center">
            <h5>Generar Folios para Actas - Periodo normal</h5>
        </div>
    </div>
    <form action="" method="POST" id="frm_folios_periodos" name="frm_folios_periodos">
        <div class="row justify-content-center mt-5">
            <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_folios_periodos") ?>" hidden>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="select_folios_periodo" name="select_folios_periodo" aria-label="">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="select_folios_periodo" class="text-primary"> <i class="fa-regular fa-calendar me-2"></i> Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="folio_periodo" name="folio_periodo" placeholder="Folio inicial">
                    <label for="folio_periodo" class="text-primary"><i class="fa-solid fa-arrow-down-9-1 me-2"></i>Folio inicial</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_folio_periodo">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_genera_folio_periodo">Aceptar</button>
            </div>
        </div>
    </form>
</div>

<!-- Esta seccion se genera al seleccionar la la opcion "folios Examenes esp" | id del btn que la genera -> 'btn_folio_examenes_esp_glo' -->
<div class="contaier d-none" id="seccion_folios_examenes_esp_glo">
    <div class="row mb-3">
        <div class="col text-center">
            <h5>Generar Folios para Actas - Exámenes Especiales o Globales</h5>
        </div>
    </div>
    <form action="" method="POST" id="frm_folios_examen_esp_glo" name="frm_folios_examen_esp_glo">
        <div class="row justify-content-center mt-5">
            <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_folios_examen_esp_glo") ?>" hidden>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="select_folios_examen" name="select_folios_examen" aria-label="">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="select_folios_examen" class="text-primary"> <i class="fa-regular fa-calendar me-2"></i> Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="folio_examen" name="folio_examen" placeholder="Folio inicial">
                    <label for="folio_examen" class="text-primary"><i class="fa-solid fa-arrow-down-9-1 me-2"></i>Folio inicial</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_folio_examen">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_genera_folio_examen">Aceptar</button>
            </div>
        </div>
    </form>
</div>

<div class="container d-none" id="seccion_folios_residencias">
    <div class="row mb-3">
        <div class="col text-center">
            <h5>Generar Folios para Actas - Folios Residencias</h5>
        </div>
    </div>
    <div class="row">
        <div class="col p-5">
            <p class="text-muted">
                Nota: <br>
                Este procedimiento puede o no tardar varios minutos, se recomienda tener paciencia por favor
            </p>
        </div>
    </div>
    <form action="" method="POST" id="frm_folios_residencias" name="frm_folios_residencias">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_folios_residencias") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="select_folio_residencias" name="select_folio_residencias">
                        <option value="" selected>Seleccionar periodo</option>

                    </select>
                    <label for="select_folio_residencias" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_folios_residencias">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_generar_folios_residencias">Aceptar</button>
            </div>
        </div>
    </form>
</div>
<!-- MODAL CAPTURAR-->
<div class="modal fade" id="modal_capturar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_capturar" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <form id="frm_captura_cal_normal" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Captura de calificaciones</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="materia_normal" id="materia_normal" value="" readonly>
                                <label for="materia_normal">Materia</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="grupo_normal" id="grupo_normal" value="" readonly>
                                <label for="grupo_normal">Grupo</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="docente_normal" id="docente_normal" readonly>
                                <label for="docente_normal">Docente</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="periodo_normal" id="periodo_normal" value="" readonly>
                                <label for="periodo_normal">Periodo</label>
                            </div>
                        </div>
                        <hr class="my-2">
                    </div>
                    <div class="row my-4">
                        <div class="col-12 text-center">
                            <h4><b>Calificaciones</b></h4>
                        </div>
                    </div>
                    <div class="row justify-content-center" id="seccion_calificaciones">
                        <!-- Esta seccion se genera a travez de js -->
                        <hr class="my-2">
                        <div class="col-lg-1 col-md-4 col-sm-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="No." value="1" readonly>
                                <label for="" class="small">No.</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-8 col-sm-9">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-small" placeholder="No. Control" value="191190073" readonly>
                                <label for="" class="small">No. Control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-9">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-small" placeholder="Alumno" value="Hernandez Gutierrez Luis Alberto" readonly>
                                <label for="" class="small">Alumno</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Calificación" value="90">
                                <label for="" class="small">Calificación</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="tipo_evaluacion">
                                </select>
                                <label for="" class="small">Tipo Evaluacion</label>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-12 text-center align-self-center">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="no_presento">
                                <label for="no_presento" class="form-check-label text-small">No Presento</label>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control  text-center" readonly placeholder="Repite" value="S">
                                <label for="" class="small">Repite</label>
                            </div>
                        </div>
                        <hr class="my-2">
                        <!-- Esta seccion se genera a travez de js -->
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Capturar</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal_capturar_cal_ex" tabindex="-1" aria-labelledby="modal_capturar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form id="frm_calificacion_especial" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Captura de calificaciones</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="materia_ex_esp" value="" readonly>
                                <label for="materia_ex_esp">Materia</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="docente" readonly value="No hay docente">
                                <label for="docente">Docente</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="periodo_ex_esp" value="" readonly>
                                <label for="periodo_ex_esp">Periodo</label>
                            </div>
                        </div>
                        <hr class="my-2">
                    </div>
                    <div class="row my-4">
                        <div class="col-12 text-center">
                            Calificaciones
                        </div>
                    </div>
                    <div class="row justify-content-center" id="seccion_calificaciones_esp">
                        <!-- Esta seccion se genera a travez de js -->
                        <hr class="my-2">
                        <div class="col-lg-2 col-md-4 col-sm-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="No." value="1" readonly>
                                <label for="" class="small">No.</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-8 col-sm-9">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control " placeholder="No. Control" value="191190073" readonly>
                                <label for="" class="small">No. Control</label>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-9">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Alumno" value="Hernandez Gutierrez Luis Alberto" readonly>
                                <label for="" class="small">Alumno</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Calificación" value="90">
                                <label for="" class="small">Calificación</label>
                            </div>
                        </div>
                        <hr class="my-2">
                        <!-- Esta seccion se genera a travez de js -->
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Capturar</button>
            </div>
        </form>
    </div>
</div>
<script src="<?=CONTROLLER?>se/calificaciones_actas/calificaciones_actas.controller.js"></script>