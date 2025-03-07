<?php

use config\Token; ?>
<div class="container d-none" id="seccion_datos_emergencia">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Actualización de datos de emergencia</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-kit-medical overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="POST" id="frm_datos_emergencia" name="frm_datos_emergencia">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_datos_emergencia") ?>" hidden>
        <div class="row justify-content-center row-cols-sm-12 p-3">
            <div class="col-lg-3 col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="tipo_sangre" name="tipo_sangre" placeholder="Tipo de sangre" maxlength="3" value="">
                    <label for="tipo_sangre" class="text-primary"><i class="fa-solid fa-droplet me-2"></i>Tipo de sangre</label>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="contacto_emergencia" name="contacto_emergencia" placeholder="En caso de emergencia ¿Con quién nos podemos comunicar?" value="">
                    <label for="contacto_emergencia" class="text-primary text-small"><i class="fa-solid fa-truck-medical me-2"></i>En caso de emergencia ¿Con quién nos podemos comunicar?</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center row-cols-sm-12">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-check form-switch">
                    <input class="" type="checkbox" id="escritura_manual_emergencia" name="escritura_manual_emergencia">
                    <label class="" for="escritura_manual_emergencia">Edicion Manual</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center row-cols-sm-12 p-3">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="codigo_postal_emergencia" name="codigo_postal_emergencia" placeholder="Código Postal" value="">
                    <label for="codigo_postal_emergencia" class="text-primary text-small"><i class="fa-solid fa-hashtag me-2"></i>Código Postal</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="estado_emergencia" name="estado_emergencia" placeholder="Estado" value="" readonly>
                    <label for="estado_emergencia" class="text-primary small"><i class="fa-solid fa-mountain-sun me-2"></i>Estado</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="municipio_emergencia" name="municipio_emergencia" placeholder="Municipio" value="" readonly>
                    <label for="municipio_emergencia" class="text-primary small"><i class="fa-solid fa-house-chimney-crack me-2"></i>Municipio</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-2">
                    <select class="form-select" id="colonia_emergencia" name="colonia_emergencia">
                        <option value="" selected>Seleccionar colonia</option>
                    </select>
                    <label for="colonia_emergencia" class="text-primary"><i class="fa-solid fa-archway me-2"></i>Colonia</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="calle_emergencia" name="calle_emergencia" placeholder="Calle" value="">
                    <label for="calle_emergencia" class="text-primary small"><i class="fas fa-directions me-2"></i>Calle</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-2">
                    <input name="no_exterior_emergencia" type="text" class="form-control break_size" id="no_exterior_emergencia" placeholder="Mz. 0000">
                    <label for="no_exterior_emergencia" class="text-primary"><i class="fas fa-sort-numeric-up me-2"></i> No. Exterior</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-2">
                    <input name="no_interior_emergencia" type="text" class="form-control break_size" id="no_interior_emergencia" placeholder="Lt. 0000">
                    <label for="no_interior_emergencia" class="text-primary"><i class="fas fa-sort-numeric-down-alt me-2"></i> No. Interior</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="">
                    <label for="telefono" class="text-primary small"><i class="fa-solid fa-phone me-2"></i>Telefono</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="lugar_trabajo" name="lugar_trabajo" placeholder="Lugar de trabajo" value="">
                    <label for="lugar_trabajo" class="text-primary"><i class="fa-solid fa-street-view me-2"></i>Lugar de trabajo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="telefono_trabajo" name="telefono_trabajo" placeholder="Teléfono del trabaj" value="">
                    <label for="telefono_trabajo" class="text-primary"><i class="fa-solid fa-phone-volume me-2"></i>Teléfono del trabajo</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-end">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_emergencia">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_actualizar_emergencia">Actualizar</button>
            </div>
        </div>
    </form>
</div>