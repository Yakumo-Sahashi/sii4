<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Boletas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('boletas') ?>">Boletas</a></li>
        </ol>
    </nav>
</div>

<!-- Seccion donde el usuario escoge entre boleta individual o de bloque -->
<div class="container" id="seccion_opciones">
    <div class="row justify-content-center row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 my-3">
        <div class="col">
            <span class="btn w-100 p-0" id="op_boleta_individual" type="button">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-regular fa-address-card fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Boletas individuales</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col">
            <span class="btn w-100 p-0" id="op_boleta_bloque" type="button">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-users-rectangle fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Boletas por bloque</span>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
<!-- Esta seccion se genera despues de escoger la opcion 'boletas individuales' -->
<div class="container d-none" id="seccion_consulta_boleta_individual">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Consulta de boleta individual</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-address-card overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_consulta_boleta" name="frm_consulta_boleta" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta_boleta") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Numero de control">
                    <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-down-9-1 me-2"></i>Numero de control</label>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo" name="periodo">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_consulta">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_consultar">Consultar</button>
            </div>
        </div>
    </form>
</div>
<!-- Esta seccion se genera despues de realizar la consulta de boleta individual-->
<div class="container d-none" id="seccion_resultado_calificaciones_individual">
    <div class="row mb-4">
        <div class="col text-center">
            <h5>Resultado de calificaciones</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="float-start mb-3 mt-2">
                <span type="button"><img id="img_foto" class="thumb" src="public/img/user.png" title="fotografia" alt="fotografia"></span>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="row justify-content-center py-2">
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="nombre_alumno" name="nombre_alumno" value="" readonly>
                        <label for="nombre_alumno" class="small">Nombre del alumno</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <input type="text" id="fk_numero_control" name="fk_numero_control" value="" hidden>
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="numero_control" name="numero_control" value="" readonly>
                        <label for="numero_control" class="small">Numero de control</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="semestre" name="semestre" value="" readonly>
                        <label for="floatingInputValue" class="small">Semestre</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-2">
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="periodo_escolar" name="periodo_escolar" value="" readonly>
                        <label for="periodo_escolar" class="small">Periodo escolar</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="carrera" name="carrera" value="" readonly>
                        <label for="carrera" class="small">Carrera</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="prom_acumulado" name="prom_acumulado" value="" readonly>
                        <label for="prom_acumulado" class="small">Prom. acumulado</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="especialidad" name="especialidad" value="" readonly>
                        <label for="especialidad" class="small">Especialidad</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-3">
        <div class="col text-center">
            <form action="app/docs/boleta_individual.doc.php" method="post" target="_blank">
                <input type="text" value="" name="id_alumno_boleta" hidden>
                <input type="text" value="" name="id_periodo_boleta" hidden>
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_resultado">Cancelar</button>
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-print"></i> Imprimir</button>
            </form>
        </div>
    </div>
    <div class="row my-5 justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_calificaciones">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Cr.</th>
                            <th scope="col">Calificación</th>
                            <th scope="col">Tipo evaluacion</th>
                            <th scope="col">Observaciones</th>
                        </tr>
                        <thead>
                        <tbody id="tabla_calificaciones_cont">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-3">
        <div class="col-6 small text-muted">
            <p>La boleta de calificaciones correspondiente estara disponible de acuerdo la fecha de del Calendario escolar</p>
        </div>
    </div>
</div>
<!-- Esta seccion se genera despues de escoger la opcion 'boletas por bloque' -->
<div class="container d-none" id="seccion_boleta_bloque">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Emisión de boletas de calificaciones por bloque</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-users-rectangle overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="app/docs/boleta_bloque.doc.php" method="POST" id="frm_boleta_bloque" name="frm_boleta_bloque">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_boleta_bloque") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_bloque" name="periodo_bloque" required>
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="periodo_bloque" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_bloque" name="carrera_bloque" required>
                        <option value="" selected>Selecciona la carrera</option>
                    </select>
                    <label for="carrera_bloque" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="form-floating">
                    <select type="select-control" class="form-control" id="semestre_bloque" name="semestre_bloque">
                        <option value="0">Todos</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <label for="semestre_bloque" class="text-primary"><i class="fa-solid fa-arrow-up-9-1 me-2"></i>Semestre</label>
                </div>
            </div> -->
        </div>
        <div class="row my-4">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_bloque">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_emitir_bloque">Emitir</button>
            </div>
        </div>
    </form>
</div>

<script src="<?=CONTROLLER?>se/semestre/boletas.controller.js"></script>