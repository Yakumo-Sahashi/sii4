<?php

use config\Token; ?>
<div class="container d-none" id="seccion_datos_trabajo">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Actualización de datos del trabajo del alumno</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-briefcase overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_trabajo_alumno" name="frm_trabajo_alumno">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_trabajo_alumno") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de la empresa" value="">
                    <label for="nombre_empresa" class="text-primary"><i class="fa-solid fa-signature me-2"></i>Nombre de la empresa</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_jefe" name="nombre_jefe" placeholder="Nombre del jefe inmediato superior " value="">
                    <label for="nombre_jefe" class="text-primary"><i class="fa-solid fa-user-tie me-2"></i>Nombre del jefe inmediato superior </label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-floating mb-3">
                    <!-- NOTA: las opciones de este select no se mostraron en la docuemntacion , son especulaciones -->
                    <select class="form-select" id="turno_trabajo" name="turno_trabajo">
                        <option value="" selected>Seleccionar turno</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Nocturno">Nocturno</option>
                    </select>
                    <label for="turno_trabajo" class="text-primary"><i class="fa-solid fa-user-clock me-2"></i>Turno</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-check form-switch mb-3">
                    <input class="" type="checkbox" id="escritura_manual_trabajo" name="escritura_manual_trabajo">
                    <label class="" for="escritura_manual_trabajo">Edicion Manual</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cp_trabajo" name="cp_trabajo" placeholder="Código postal" value="">
                    <label for="cp_trabajo" class="text-primary small"><i class="fa-solid fa-hashtag me-2"></i>Código postal</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="estado_trabajo" name="estado_trabajo" placeholder="Estado" value="" readonly>
                    <label for="estado_trabajo" class="text-primary"><i class="fa-solid fa-city me-2"></i>Estado</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="alcaldia_trabajo" name="alcaldia_trabajo" placeholder="Alcaldia" value="" readonly>
                    <label for="alcaldia_trabajo" class="text-primary"><i class="fa-regular fa-map me-2"></i>Alcaldia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="colonia_trabajo" name="colonia_trabajo">
                        <option value="" selected>Seleccionar colonia</option>
                    </select>
                    <label for="colonia_trabajo" class="text-primary"><i class="fa-solid fa-archway me-2"></i>Colonia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="calle_trabajo" name="calle_trabajo" placeholder="Calle" value="">
                    <label for="calle_trabajo" class="text-primary small"><i class="fas fa-directions me-2"></i>Calle</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input name="no_exterior_trabajo" type="text" class="form-control break_size" id="no_exterior_trabajo" placeholder="Mz. 0000">
                    <label for="no_exterior_trabajo" class="text-primary"><i class="fas fa-sort-numeric-up me-2"></i> No. Exterior</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input name="no_interior_trabajo" type="text" class="form-control break_size" id="no_interior_trabajo" placeholder="Lt. 0000">
                    <label for="no_interior_trabajo" class="text-primary"><i class="fas fa-sort-numeric-down-alt me-2"></i> No. Interior</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <!-- NOTA: las opciones de este select se generan con js -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="entidad_federativa_trabajo" name="entidad_federativa_trabajo">
                        <option value="" selected>Seleccionar entidad</option>
                    </select>
                    <label for="entidad_federativa_trabajo" class="text-primary"><i class="fa-regular fa-building me-2"></i>Entidad federativa</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefono_trabajo" name="telefono_trabajo" placeholder="Teléfono" value="">
                    <label for="telefono_trabajo" class="text-primary"><i class="fa-solid fa-phone me-2"></i>Teléfono</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="puesto_ocupa" name="puesto_ocupa" placeholder="Puesto que ocupa" value="">
                    <label for="puesto_ocupa" class="text-primary"><i class="fa-solid fa-briefcase me-2"></i>Puesto que ocupa</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-8">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="antiguedad_trabajo" name="antiguedad_trabajo" placeholder="Antigüedad" value="">
                    <label for="antiguedad_trabajo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Antigüedad</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-lg-end text-sm-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_canc_trabajo_alumno">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_act_trabajo_alumno">Actualizar</button>
            </div>
        </div>
    </form>
</div>