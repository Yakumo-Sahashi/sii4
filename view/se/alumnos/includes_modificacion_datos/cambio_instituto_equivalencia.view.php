<?php

use config\Token; ?>
<div class="container d-none" id="seccion_cambio_instituto_equivalencia">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Cambio de instituto Tecnológico o equivalencia</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-school overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_cambio_instituto" name="frm_cambio_instituto" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_cambio_instituto")?>" hidden>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="escuela_procedencia" name="escuela_procedencia" placeholder="Escuela de procedencia" value="">
                    <label for="escuela_procedencia" class="text-primary">Escuela de procedencia</label>
                </div>
            </div>
            <div class="col">
                <!-- NOTA: Las opciones de este select no se incluyeron por que en la documentacion no se especificaron -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="tipo_escuela" name="tipo_escuela">
                        <option selected>Seleccionar opcion</option>
                    </select>
                    <label for="tipo_escuela" class="text-primary">Tipo de escuela</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="small mb-4">Datos del documento que amparan la equivalencia</div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="autoridad_educativa" name="autoridad_educativa" placeholder="Autoridad educativa" value="">
                    <label for="autoridad_educativa" class="text-primary">Autoridad educativa</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio" value="">
                    <label for="folio" class="text-primary">Folio</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fecha_elaboracion" name="fecha_elaboracion" placeholder="Fecha de elaboración" value="">
                    <label for="fecha_elaboracion" class="text-primary">Fecha de elaboración</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button type="button" class="btn btn-secondary text-white" id="btn_canc_cambio_instituto">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_act_cambio_instituto">Actualizar</button>
            </div>
        </div>
    </form>
</div>