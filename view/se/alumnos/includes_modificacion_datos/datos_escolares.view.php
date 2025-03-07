<?php

use config\Token; ?>
<div class="container d-none" id="seccion_datos_escolares">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Actualización de datos escolares</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-graduation-cap overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_datos_escolares" name="frm_datos_escolares">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_datos_escolares") ?>" hidden>
        <input type="text" id="id_escolar_alumno" name="id_escolar_alumno" value="" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_alumno" name="carrera_alumno">
                        <option value="" selected>Seleccionar carrera y retícula</option>
                    </select>
                    <label for="carrera_alumno" class="text-primary">Carrera y retícula</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="especialidad_alumno" name="especialidad_alumno">
                        <option value="" selected>Seleccionar especialidad</option>
                    </select>
                    <label for="especialidad_alumno" class="text-primary">Especialidad</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" name="plan_est" id="plan_est" value="" hidden>
                    <input type="text" class="form-control" id="plan_estudios_alumno" name="plan_estudios_alumno" placeholder="Plan de estudios" value="" readonly>
                    <label for="plan_estudios_alumno" class="text-primary">Plan de estudios</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="periodo_ingreso_alumno" name="periodo_ingreso_alumno" placeholder="Periodo Ingreso IT" value="" readonly>
                    <label for="periodo_ingreso_alumno" class="text-primary small">Periodo Ingreso IT</label>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="year_ingreso_alumno" name="year_ingreso_alumno" placeholder="Año de ingreso IT" value="">
                    <label for="year_ingreso_alumno" class="text-primary small">Año de ingreso IT</label>
                </div>
            </div> -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="periodos_revalidados_alumno" name="periodos_revalidados_alumno" placeholder="Periodos revalidados" value="" readonly>
                    <label for="periodos_revalidados_alumno" class="text-primary small">Periodos revalidados</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-check mt-3 ms-5 mb-3 form-switch">
                    <input class="form-check-input" type="checkbox" id="cb_revalidado" name="cb_revalidado">
                    <label class="form-check-label text-small" for="cb_revalidado">Editar periodos revalidados</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="tipo_ingreso_alumno" name="tipo_ingreso_alumno">
                        <option value="" selected>Selecciona el tipo</option>
                    </select>
                    <label for="tipo_ingreso_alumno" class="text-primary small">Tipo de ingreso al plantel</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="nivel_escolar_alumno" name="nivel_escolar_alumno">
                        <option value="" selected>Selecciona el nivel escolar</option>
                    </select>
                    <label for="nivel_escolar_alumno" class="text-primary">Nivel escolar</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="escuela_alumno" name="escuela_alumno" placeholder="Escuela de procedencia" value="">
                    <label for="escuela_alumno" class="text-primary">Escuela de procedencia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="estatus_alumno" name="estatus_alumno">
                        <option value="" selected></option>
                    </select>
                    <label for="estatus_alumno" class="text-primary">Estatus del alumno</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-lg-end text-md-end text-sm-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_escolares">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_act_escolares">Actualizar</button>
            </div>
        </div>
    </form>
</div>