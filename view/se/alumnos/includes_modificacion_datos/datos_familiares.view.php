<?php

use config\Token; ?>
<div class="container d-none" id="seccion_datos_familiares">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Actualización de datos Familiares</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-people-roof overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_datos_familiares" name="frm_datos_familiares">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_datos_familiares") ?>" hidden>
        <div class="row justify-content-center">
            <div class="small">Datos del Padre</div>
            <hr class="my-3">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_padre" name="nombre_padre" placeholder="Nombre del padre" value="">
                    <label for="nombre_padre" class="text-primary"><i class="fa-solid fa-person me-2"></i>Nombre del Padre</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido_p_padre" name="apellido_p_padre" placeholder="Apellido paterno" value="">
                    <label for="apellido_p_padre" class="text-primary"><i class="fa-solid fa-person me-2"></i>Apellido paterno</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido_m_padre" name="apellido_m_padre" placeholder="Apellido materno" value="">
                    <label for="apellido_m_padre" class="text-primary"><i class="fa-solid fa-person me-2"></i>Apellido materno</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-check form-switch mb-3">
                    <input class="" type="checkbox" id="escritura_manual_padre" name="escritura_manual_padre">
                    <label class="" for="escritura_manual_padre">Edicion Manual</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cp_padre" name="cp_padre" placeholder="Código postal" value="">
                    <label for="cp_padre" class="text-primary small"><i class="fa-solid fa-hashtag me-2"></i>Código postal</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="estado_padre" name="estado_padre" placeholder="Estado" value="" readonly>
                    <label for="estado_padre" class="text-primary"><i class="fa-solid fa-city me-2"></i>Estado</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="alcaldia_padre" name="alcaldia_padre" placeholder="Alcaldia" value="" readonly>
                    <label for="alcaldia_padre" class="text-primary"><i class="fa-regular fa-map me-2"></i>Alcaldia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="colonia_padre" name="colonia_padre">
                        <option value="" selected>Seleccionar colonia</option>
                    </select>
                    <label for="colonia_padre" class="text-primary"><i class="fa-solid fa-archway me-2"></i>Colonia</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="calle_padre" name="calle_padre" placeholder="Calle" value="">
                    <label for="calle_padre" class="text-primary small"><i class="fas fa-directions me-2"></i>Calle</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input name="no_exterior_padre" type="text" class="form-control break_size" id="no_exterior_padre" placeholder="Mz. 0000">
                    <label for="no_exterior_padre" class="text-primary"><i class="fas fa-sort-numeric-up me-2"></i> No. Exterior</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input name="no_interior_padre" type="text" class="form-control break_size" id="no_interior_padre" placeholder="Lt. 0000">
                    <label for="no_interior_padre" class="text-primary"><i class="fas fa-sort-numeric-down-alt me-2"></i> No. Interior</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="entidad_padre" name="entidad_padre">
                        <option value="" selected>Seleccionar Entidad</option>
                    </select>
                    <label for="entidad_padre" class="text-primary"><i class="fa-regular fa-building me-2"></i>Entidad federativa</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefono_padre" name="telefono_padre" placeholder="Teléfono del padre" value="">
                    <label for="telefono_padre" class="text-primary"><i class="fa-solid fa-phone me-2"></i>Teléfono del padre</label>
                </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="small">Datos de la Madre</div>
            <hr class="my-3">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_madre" name="nombre_madre" placeholder="Nombre de la madre" value="">
                    <label for="nombre_madre" class="text-primary"><i class="fa-solid fa-person me-2"></i>Nombre de la madre</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido_p_madre" name="apellido_p_madre" placeholder="Apellido paterno" value="">
                    <label for="apellido_p_madre" class="text-primary"><i class="fa-solid fa-person me-2"></i>Apellido paterno</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido_m_madre" name="apellido_m_madre" placeholder="Apellido materno" value="">
                    <label for="apellido_m_madre" class="text-primary"><i class="fa-solid fa-person me-2"></i>Apellido materno</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-check form-switch mb-3">
                    <input class="" type="checkbox" id="escritura_manual_madre" name="escritura_manual_madre">
                    <label class="" for="escritura_manual_madre">Edicion Manual</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="cp_madre" name="cp_madre" placeholder="Código postal" value="">
                    <label for="cp_madre" class="text-primary small"><i class="fa-solid fa-hashtag me-2"></i>Código postal</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="estado_madre" name="estado_madre" placeholder="Estado" value="" readonly>
                    <label for="estado_madre" class="text-primary"><i class="fa-solid fa-city me-2"></i>Estado</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="alcaldia_madre" name="alcaldia_madre" placeholder="Alcaldia" value="" readonly>
                    <label for="alcaldia_madre" class="text-primary"><i class="fa-regular fa-map me-2"></i>Alcaldia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="colonia_madre" name="colonia_madre">
                        <option value="" selected>Seleccionar colonia</option>
                    </select>
                    <label for="colonia_madre" class="text-primary"><i class="fa-solid fa-archway me-2"></i>Colonia</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="calle_madre" name="calle_madre" placeholder="Calle" value="">
                    <label for="calle_madre" class="text-primary small"><i class="fas fa-directions me-2"></i>Calle</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input name="no_exterior_madre" type="text" class="form-control break_size" id="no_exterior_madre" placeholder="Mz. 0000">
                    <label for="no_exterior_madre" class="text-primary"><i class="fas fa-sort-numeric-up me-2"></i> No. Exterior</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input name="no_interior_madre" type="text" class="form-control break_size" id="no_interior_madre" placeholder="Lt. 0000">
                    <label for="no_interior_madre" class="text-primary"><i class="fas fa-sort-numeric-down-alt me-2"></i> No. Interior</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="entidad_madre" name="entidad_madre">
                        <option value="" selected>Seleccionar Entidad</option>
                    </select>
                    <label for="entidad_madre" class="text-primary"><i class="fa-regular fa-building me-2"></i>Entidad federativa</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefono_madre" name="telefono_madre" placeholder="Teléfono de la madre" value="">
                    <label for="telefono_madre" class="text-primary"><i class="fa-solid fa-phone me-2"></i>Teléfono de la madre</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button type="button" class="btn btn-secondary text-white" id="btn_canc_familiares">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_act_familiares">Actualizar</button>
            </div>
        </div>
    </form>
</div>