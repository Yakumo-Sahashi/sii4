<?php

use config\Token; ?>
<div class="container d-none" id="seccion_datos_generales">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Actualización de datos generales</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-file overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_datos_generales" name="frm_datos_generales" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_datos_generales") ?>" hidden>
        <input type="text" id="fk_control" name="fk_control" value="" hidden>
        <input type="text" id="id_persona_alumno" name="id_persona_alumno" value="" hidden>
        <input type="text" id="id_direccion_alumno" name="id_direccion_alumno" value="" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido_p_alumno" name="apellido_p_alumno" placeholder="Apellido paterno" value="">
                    <label for="apellido_p_alumno" class="text-primary">Apellido paterno</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido_m_alumno" name="apellido_m_alumno" placeholder="Apellido materno" value="">
                    <label for="apellido_m_alumno" class="text-primary">Apellido materno</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_alumno" name="nombre_alumno" placeholder="Nombre" value="">
                    <label for="nombre_alumno" class="text-primary">Nombre</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="num_ctrl_alumno" name="num_ctrl_alumno" placeholder="Numero de control" value="" readonly>
                    <label for="num_ctrl_alumno" class="text-primary">Numero de control</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="lugar_nacimiento_alumno" name="lugar_nacimiento_alumno">
                        <option value="">Seleccionar</option>
                        <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                        <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                        <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                        <option value="CAMPECHE">CAMPECHE</option>
                        <option value="COAHUILA">COAHUILA</option>
                        <option value="COLIMA">COLIMA</option>
                        <option value="CHIAPAS">CHIAPAS</option>
                        <option value="CHIHUAHUA">CHIHUAHUA</option>
                        <option value="DISTRITO FEDERAL">DISTRITO FEDERAL</option>
                        <option value="DURANGO">DURANGO</option>
                        <option value="ESTADO DE MEXICO">ESTADO DE MÉXICO</option>
                        <option value="GUANAJUATO">GUANAJUATO</option>
                        <option value="GUERRERO">GUERRERO</option>
                        <option value="HIDALGO">HIDALGO</option>
                        <option value="JALISCO">JALISCO</option>
                        <option value="MICHOACÁN">MICHOACÁN</option>
                        <option value="MORELOS">MORELOS</option>
                        <option value="NAYARIT">NAYARIT</option>
                        <option value="NUEVO LEÓN">NUEVO LEÓN</option>
                        <option value="OAXACA">OAXACA</option>
                        <option value="PUEBLA">PUEBLA</option>
                        <option value="QUERÉTARO">QUERÉTARO</option>
                        <option value="QUINTANA ROO">QUINTANA ROO</option>
                        <option value="SAN LUIS POTOSI">SAN LUIS POTOSÍ</option>
                        <option value="SINALOA">SINALOA</option>
                        <option value="SONORA">SONORA</option>
                        <option value="TABASCO">TABASCO</option>
                        <option value="TAMAULIPAS">TAMAULIPAS</option>
                        <option value="TLAXCALA">TLAXCALA</option>
                        <option value="VERACRUZ">VERACRUZ</option>
                        <option value="YUCATAN">YUCATÁN</option>
                        <option value="ZACATECAS">ZACATECAS</option>
                        <option value="NACIDO EN EL EXTRANJERO">NACIDO EN EL EXTRANJERO</option>
                    </select>
                    <label for="lugar_nacimiento_alumno" class="text-primary">Lugar de nacimiento</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fecha_nac_alumno" name="fecha_nac_alumno" placeholder="Fecha de nacimiento" value="">
                    <label for="fecha_nac_alumno" class="text-primary">Fecha de nacimiento</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="sexo_alumno" name="sexo_alumno">
                        <option value="">Seleccionar</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    <label for="sexo_alumno" class="text-primary">Sexo</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="estado_civil_alumno" name="estado_civil_alumno">
                        <option value="">Estado Civil</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        <option value="4">Separación en proceso judicial</option>
                        <option value="5">Viudo</option>
                        <option value="6">Concubinato</option>
                    </select>
                    <label for="estado_civil_alumno" class="text-primary">Estado civil</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefono_alumno" minLength="10" name="telefono_alumno" placeholder="Teléfono" value="">
                    <label for="telefono_alumno" class="text-primary">Teléfono</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="curp_alumno" name="curp_alumno" placeholder="CURP" value="">
                    <label for="curp_alumno" class="text-primary">CURP</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="correo_alumno" name="correo_alumno" placeholder="Correo electrónico" value="">
                    <label for="correo_alumno" class="text-primary">Correo electrónico</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-check form-switch mb-3">
                    <input class="" type="checkbox" id="escritura_manual_generales" name="escritura_manual_generales">
                    <label class="" for="escritura_manual_generales">Edicion Manual</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="codigo_p_alumno" name="codigo_p_alumno" placeholder="Código postal" maxLength="5" value="">
                    <label for="codigo_p_alumno" class="text-primary text-small">Código postal</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="estado_generales" name="estado_generales" placeholder="Estado" value="" readonly>
                    <label for="estado_generales" class="text-primary"><i class="fa-solid fa-city me-2"></i>Estado</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="alcaldia_generales" name="alcaldia_generales" placeholder="Alcaldia" value="" readonly>
                    <label for="alcaldia_generales" class="text-primary"><i class="fa-regular fa-map me-2"></i>Alcaldia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="colonia_generales" name="colonia_generales">
                        <option value="" selected>Seleccionar colonia</option>
                    </select>
                    <label for="colonia_generales" class="text-primary"><i class="fa-solid fa-archway me-2"></i>Colonia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="calle_generales" name="calle_generales" placeholder="Calle" value="">
                    <label for="calle_generales" class="text-primary small"><i class="fas fa-directions me-2"></i>Calle</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input name="no_exterior_generales" type="text" class="form-control break_size" id="no_exterior_generales" placeholder="Mz. 0000">
                    <label for="no_exterior_generales" class="text-primary"><i class="fas fa-sort-numeric-up me-2"></i> No. Exterior</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input name="no_interior_generales" type="text" class="form-control break_size" id="no_interior_generales" placeholder="Lt. 0000">
                    <label for="no_interior_generales" class="text-primary"><i class="fas fa-sort-numeric-down-alt me-2"></i> No. Interior</label>
                </div>
            </div>
           
        </div>
        <div class="row my-3">
            <div class="col text-lg-end text-md-end text-sm-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_alumno">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_actualizar_alumnos">Actualizar</button>
            </div>
        </div>
    </form>
</div>