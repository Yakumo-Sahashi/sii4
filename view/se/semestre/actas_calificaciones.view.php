<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Actas de calificaciones</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('actas_calificaciones') ?>">Actas de calificaciones</a></li>
        </ol>
    </nav>
</div>

<div class="container mt-5" id="seccion_opciones">
    <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 my-3">
        <div class="col">
            <span class="btn w-100 p-0" id="op_periodo_normal">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-regular fa-calendar-check fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3 ">Calificaciones por periodo curso normal</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col">
            <span class="btn w-100 p-0" id="op_docente_normal">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-user-check fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3 ">Calificaciones por docente curso normal</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col">
            <span class="btn w-100 p-0" id="op_examenes_periodo">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-regular fa-calendar fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3 ">Examenes especiales por periodo</span>
                    </div>
                </div>
            </span>
        </div>
        <!-- <div class="col">
            <span class="btn w-100 p-0" id="op_examenes_docente">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-chalkboard-user fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3 ">Examenes especiales por docente</span>
                    </div>
                </div>
            </span>
        </div> -->
    </div>
</div>
<div class="container d-none" id="seccion_exam_docente">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Actas de calificaciones - Exámenes especiales por docente</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-chalkboard-user overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_exam_docente" name="frm_exam_docente" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_exam_docente") ?>" hidden>
        <div class="row justify-content-center p-0">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_exam_docente" name="periodo_exam_docente">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo_exam_docente" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="docente_exam_docente" name="docente_exam_docente">
                        <option value="" selected>Seleccionar docente</option>
                    </select>
                    <label for="docente_exam_docente" class="text-primary"><i class="fa-solid fa-chalkboard-user me-2"></i>Docente</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_exam_docente">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_aceptar_exam_docente">Aceptar</button>
            </div>
        </div>
    </form>
</div>
<div class="container d-none" id="seccion_exam_periodo">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Actas de calificaciones - Exámenes especiales por periodo</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-calendar overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="app/docs/acta_calificacion_especial_bloque.doc.php" id="frm_exam_periodo" name="frm_exam_periodo" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_exam_periodo") ?>" hidden>
        <div class="row justify-content-center p-0">
            <div class="col-lg-4 col-md-6 col-sm-5">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_exam_periodo" name="periodo_exam_periodo" required>
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo_exam_periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_exam_periodo">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_aceptar_exam_periodo">Aceptar</button>
            </div>
        </div>
    </form>
</div>
<div class="container d-none" id="seccion_docente_normal">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Actas de calificaciones - Docente curso normal</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_docente_normal" name="frm_docente_normal" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_docente_normal") ?>" hidden>
        <div class="row justify-content-center p-0">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_docente_normal" name="periodo_docente_normal">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo_docente_normal" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 col-ms-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="docente_docente_normal" name="docente_docente_normal">
                        <option value="" selected>Seleccionar docente</option>
                    </select>
                    <label for="docente_docente_normal" class="text-primary">Docente</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_docente_normal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_aceptar_docente_normal">Aceptar</button>
            </div>
        </div>
    </form>
</div>
<div class="container d-none" id="seccion_periodo_normal">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Actas de calificaciones - Periodo curso normal</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-calendar-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="app/docs/acta_calif_periodo_normal.doc.php" id="frm_periodo_normal" name="frm_periodo_normal" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_periodo_normal") ?>" hidden>
        <div class="row justify-content-center p-0">
            <div class="col-lg-4 col-md-6 col-sm-5">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_periodo_normal" name="periodo_periodo_normal" required>
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo_periodo_normal" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_periodo_normal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_aceptar_periodo_normal">Aceptar</button>
            </div>
        </div>
    </form>
</div>

<div class="container d-none" id="seccion_tabla_actas">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_actas">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Alumnos inscritos</th>
                            <th scope="col">Acta</th>
                            <th scope="col">Excel</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_actas">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container d-none" id="seccion_tabla_actas_esp">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_actas_esp">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Alumnos inscritos</th>
                            <th scope="col">Acta</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_actas_esp">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>se/semestre/actas_calificaciones.controller.js"></script>