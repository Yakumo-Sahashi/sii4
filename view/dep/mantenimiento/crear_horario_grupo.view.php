<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">CREACIÓN DE HORARIOS Y GRUPOS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">CREACIÓN DE HORARIOS Y GRUPO</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0">
    <form id="frm_horario_grupo">
        <div class="row justify-content-center mt-5" id="horario_secion1">
            <div class="col-lg-6 mb-4">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h2 class="border-bottom pb-2 fs-5 text-muted">Datos generales</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="carrera" name="carrera" aria-label="">
                                    <option selected>Elegir carrera</option>
                                </select>
                                <label for="carrera" class="text-primary"><i class="fas fa-graduation-cap me-2"></i>Carrera</label>
                            </div>
                        </div>
                    </div>
                    <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_horario_grupo") ?>" hidden>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="text" id="periodo_id" name="periodo_id" value="" hidden>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="periodo" name="periodo" placeholder="Periodo" maxlength="100" readonly>
                                <label for="periodo" class="text-primary"><i class="fas fa-calendar-alt me-2"></i>Periodo</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="semestre" name="semestre">
                                    <option value="">Elegir semestre</option>
                                    <?php for ($j = 1; $j < 13; $j++) : ?>
                                        <option value="<?= $j ?>"><?= $j ?></option>
                                    <?php endfor ?>
                                </select>
                                <label for="semestre" class="text-primary"><i class="fas fa-user-clock me-2"></i>Semestre</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 " id="datos_materia_grupo">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h2 class="border-bottom pb-2 fs-5 text-muted">Datos sobre materia y grupo</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-6">

                            <div class="form-floating mb-3">
                                <select class="form-select" id="materia" name="materia">
                                    <option selected>Eligir materia</option>
                                </select>
                                <label for="materia" class="text-primary"><i class="fas fa-cubes me-2"></i>Materia</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave" maxlength="100" readonly>
                                <label for="clave" class="text-primary"><i class="fas fa-key me-2"></i>Clave</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="horas" name="horas" placeholder="Horas" maxlength="100" readonly>
                                <label for="horas" class="text-primary text-small"><i class="fas fa-clock me-2"></i>Horas semana</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-7">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombre_grupo" name="nombre_grupo" placeholder="Nombre del grupo" maxlength="100">
                                <label for="nombre_grupo" class="text-primary small"><i class="fas fa-signature me-2"></i>Nombre del grupo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-4 col-sm-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="capacidad" id="capacidad" placeholder="Capacidad">
                                <label for="capacidad" class="text-primary"><i class="fas fa-user-friends me-2"></i>Capacidad</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-center mt-3">
                    <div class="col">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cambio_exclusividad" class="form-label">Razon del cambio de exclusividad</label>
                                    <textarea class="form-control" name="razon_cambio_exclusividad" id="razon_cambio_exclusividad" rows="2" placeholder="Descripción" readonly></textarea>
                                </div>
                                <div class="col-md-3 mt-3 align-self-center text-center mt-lg-4">
                                    <label for="materia_exclusiva" class="form-label w-100">Materia exclusiva</label>
                                    <h5 class="form-check-label ms-2" for="materia_exclusiva" id="cambio_texto"><i class="fas fa-universal-access"></i></h5>
                                </div>
                                <div class="col-md-3 align-self-center text-center mt-lg-4">
                                    <label for="exclusivo">Cambiar exclusividad</label>
                                    <div class="form-check form-switch d-flex justify-content-center mt-2">
                                        <input class="form-check-input" type="checkbox" name="exclusivo" id="exclusivo">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row mt-4 mb-5 d-none" id="botones_materia_grupo">
                                <div class="col-lg-12 text-end">
                                    <div class="btn-group">
                                        <span class="btn btn-primary" id="ir_asignar_horario"><i class="fas fa-arrow-right me-2"></i>Siguiente</span>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row mt-4 mb-5 " id="botones_materia_grupo">
                    <div class="col-lg-12 text-end">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" id="ir_asignar_horario"><i class="fas fa-arrow-right me-2"></i>Siguiente</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 d-none" id="asignar_horario">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="row g-0">
                                <div class="col-sm-6 col-md-8 text-start border-bottom pb-2 fw-bolder my-2">
                                    <h2 class="fs-5">Asignación de horas por semana</h2>
                                </div>
                                <div class="col-sm-6 col-md-4 text-center border-bottom pb-2 fw-bolder my-2">
                                    <h2><span class="alert alert-success rounded-3 border-success p-2 g-0 fs-5" role="alert" id="contador_horas">Horas por asignar: </span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="tabla_horas" class="table-responsive">
                                <table class="table table-sm table-responsive-lg">
                                    <thead class="text-center fw-bolder">
                                        <th>Hora</th>
                                        <th>Lunes</th>
                                        <th>Martes</th>
                                        <th>Miércoles</th>
                                        <th>Jueves</th>
                                        <th>Viernes</th>
                                        <th>Sábado</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="container text-center">
                                                    <div class="row my-2">
                                                        <div class="col-lg-12">
                                                            <div class="py-2 mb-1">
                                                                <span><b>Inicial:</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-lg-12">
                                                            <div class="py-2 mb-1">
                                                                <span><b>Final:</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-lg-12">
                                                            <div class="py-2 mb-1">
                                                                <span><b>Aula:</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-lg-12">
                                                            <div class="py-2 mb-1">
                                                                <span><b>HRS:</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php for ($i = 1; $i < 7; $i++) : ?>
                                                <td>
                                                    <div class="container">
                                                        <div class="row my-2">
                                                            <div class="col-lg-12 text-center">
                                                                <div class="input-group mb-2">
                                                                    <select class="form-select" name="hora_inicio<?= $i ?>" id="hora_inicio<?= $i ?>" disabled>
                                                                        <option value="">--:--</option>
                                                                        <?php for ($j = 7; $j < 21; $j++) : ?>
                                                                            <option value="<?= $j ?>"><?= $j > 9 ? $j : '0' . $j ?>:00</option>
                                                                        <?php endfor ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12 text-center">
                                                                <div class="input-group mb-2">
                                                                    <select class="form-select" name="hora_fin<?= $i ?>" id="hora_fin<?= $i ?>" disabled></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12 text-center">
                                                                <div class="input-group mb-2">
                                                                    <select class="form-control form-control-sm" name="aula<?= $i ?>" id="aula<?= $i ?>" disabled>
                                                                        <option value="">Aula</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12 text-center">
                                                                <div class="input-group mb-3">
                                                                    <input class="form-control" type="text" name="horas_dia<?= $i ?>" id="horas_dia<?= $i ?>" placeholder="hrs" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php endfor ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 mb-5" id="_group_button_group">
                        <div class="col-lg-12 text-end">
                            <div class="btn-group">
                                <button class="btn btn-secondary text-white" type="button" id="btn_regresar">Anterior</button>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-plus me-2"></i>Registrar horario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require_once 'listado_horarios.view.php'; ?>
<script src="<?= CONTROLLER ?>dep/horario_grupo/horario_grupo.controller.js"></script>