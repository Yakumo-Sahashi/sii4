<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Problemas de inscripción</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('problemas_inscripcion') ?>">Problemas de inscripción</a></li>
        </ol>
    </nav>
</div>
<!-- Seccion donde el usuario escoge su opcion -->
<div class="container my-5" id="seccion_opciones">
    <div class="row justify-content-center row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
        <div class="col mb-3">
            <span class="btn w-100 p-0" id="op_programar_fechas">
                <div class="card shadow p-3 itma2-card itma2-card-hover">
                    <div class="card-body text-center">
                        <i class="fa-regular fa-calendar-check fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Programar fechas de atención</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col">
            <span class="btn w-100 p-0" id="op_seguimiento_problemas">
                <div class="card shadow p-3 itma2-card itma2-card-hover">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-magnifying-glass-arrow-right fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3">Seguimiento a problemas</span>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>

<!-- Esta seccion se genera si el usuario escoge 'Programar fechas de atencion' -->
<div class="container" id="seccion_programar_fechas">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Programar fechas de atención para alumnos con problemas de inscripción</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-calendar-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_programar_fecha" name="frm_programar_fecha">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_programar_fecha") ?>" hidden>
        <div class="row justify-content-center my-2">
            <div class="col-lg-3 col-md-6 col-sm-6 order-md-0 order-sm-0">
                <div class="form-floating mb-3">
                    <input type="text" id="fk_periodo_atencion" name="fk_periodo_atencion" hidden>
                    <input type="text" class="form-control" id="periodo_atencion" name="periodo_atencion" placeholder="Periodo de atención" disabled>
                    <label for="periodo_atencion" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 order-md-2 order-sm-2">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_atencion" name="carrera_atencion">
                        <option value="" selected>Seleccionar carrera</option>
                    </select>
                    <label for="carrera_atencion" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 order-md-1 order-sm-1">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fecha_atencion" name="fecha_atencion" placeholder="Fecha de atención">
                    <label for="fecha_atencion" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Fecha de atención</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row justify-content-center my-2">
                        <div class="col-lg-12 text-center">
                            <div class="small mb-3">Turnos</div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="minutos_turno_atencion" name="minutos_turno_atencion" value="60" maxlength="2" placeholder="Minutos por turno">
                                <label for="minutos_turno_atencion" class="text-primary small"><i class="fa-solid fa-stopwatch me-2"></i>Minutos por turno</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="cantidad_alumnos_atencion" name="cantidad_alumnos_atencion" value="10" maxlength="2" placeholder="Cantidad de alumnos">
                                <label for="cantidad_alumnos_atencion" class="text-primary small"><i class="fa-solid fa-user-group me-2"></i>Cantidad de alumnos</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row justify-content-center my-2">
                        <div class="col-lg-12 text-center">
                            <div class="small mb-3">Horario de atención</div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="hora_inicio_atencion" name="hora_inicio_atencion">
                                    <option value="">--:--</option>
                                    <?php for ($j = 7; $j < 21; $j++) : ?>
                                        <option value="<?= $j ?>"><?= $j > 9 ? $j : '0' . $j ?>:00</option>
                                    <?php endfor ?>
                                </select>
                                <label for="hora_inicio_atencion" class="text-primary"><i class="fa-regular fa-clock me-2"></i>Hora de inicio</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="hora_cierre_atencion" name="hora_cierre_atencion">
                                    <option value="" selected>--:--</option>
                                    <?php for ($j = 7; $j < 21; $j++) : ?>
                                        <option value="<?= $j ?>"><?= $j > 9 ? $j : '0' . $j ?>:00</option>
                                    <?php endfor ?>
                                </select>
                                <label for="hora_cierre_atencion" class="text-primary"><i class="fa-solid fa-clock me-2"></i>Hora de cierre</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row justify-content-center my-2">
                        <div class="col-lg-12 text-center">
                            <div class="small mb-3">Horario de comida</div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="hora_inicio_comida" name="hora_inicio_comida">
                                    <option value="" selected>--:--</option>
                                    <?php for ($j = 7; $j < 21; $j++) : ?>
                                        <option value="<?= $j ?>"><?= $j > 9 ? $j : '0' . $j ?>:00</option>
                                    <?php endfor ?>
                                </select>
                                <label for="hora_inicio_comida" class="text-primary"><i class="fa-regular fa-clock me-2"></i>Hora de inicio</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="hora_cierre_comida" name="hora_cierre_comida">
                                    <option value="" selected>--:--</option>
                                    <?php for ($j = 7; $j < 21; $j++) : ?>
                                        <option value="<?= $j ?>"><?= $j > 9 ? $j : '0' . $j ?>:00</option>
                                    <?php endfor ?>
                                </select>
                                <label for="hora_cierre_comida" class="text-primary"><i class="fa-solid fa-clock me-2"></i>Hora de cierre</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_atras_atencion">Atras</button>
                <button type="submit" class="btn btn-primary" id="btn_aceptar_atencion">Aceptar</button>
            </div>
        </div>
    </form>
</div>


<!-- NOTA esta seccion NO esta TERMINADA debido a falta de informacion en la documentacion

    Esta seccion se genera si el usuario escoge 'Seguimiento a problemas' -->

<div class="container" id="seccion_seguimiento_problemas">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Seguimiento a problemas</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-magnifying-glass-arrow-right overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_seguimiento_problemas" name="frm_seguimiento_problemas">
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_seguimiento" name="periodo_seguimiento">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo_seguimiento" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_atras_seguimiento">Atras</button>
                <!-- <button type="button" class="btn btn-primary" id="btn_aceptar_seguimiento">Aceptar</button> -->
            </div>
        </div>
    </form>
</div>

<script src="<?=CONTROLLER?>dep/inscripciones/problemasInscripcion.controller.js"></script>

<!-- Id's de la vista

    Opciones
        op_programar_fechas
        op_seguimiento_problemas

    -Secciones
        seccion_opciones
        seccion_programar_fechas
        seccion_seguimiento_problemas

    -Inputs
        fk_periodo_atencion
        periodo_atencion
        carrera_atencion
        fecha_atencion
        minutos_turno_atencion
        cantidad_alumnos_atencion
        hora_inicio_atencion
        hora_cierre_atencion
        hora_inicio_comida
        hora_cierre_comida

        periodo_seguimiento
    
    -btn
        btn_atras_atencion
        btn_aceptar_atencion
        btn_atras_seguimiento

    -Formularios
        frm_programar_fecha
        frm_seguimiento_problemas
-->