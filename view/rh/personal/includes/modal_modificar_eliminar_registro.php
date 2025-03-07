<?php

use config\Router;
use config\Token;

?>

<div class="modal fade" id="modal_modificar" tabindex="-1" aria-labelledby="modificarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modificarModalLabel">Modificar registro de empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="frm_modificar_empleado" name="frm_modificar_empleado">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_modificar_empleado") ?>" hidden>
        <input type="text" id='id_empleado' name="id_empleado" hidden>
        <div class="identificacion" id="identificacion"></div>
        <div class="modal-body">
          <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active small" id="home-tab" data-bs-toggle="tab" data-bs-target="#generales-tab-pane" type="button" role="tab" aria-controls="generales-tab-pane" aria-selected="true">Datos Generales</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link small" id="domicilio-tab" data-bs-toggle="tab" data-bs-target="#domicilio-tab-pane" type="button" role="tab" aria-controls="domicilio-tab-pane" aria-selected="false">Información del domicilio</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link small" id="laboral-tab" data-bs-toggle="tab" data-bs-target="#laboral-tab-pane" type="button" role="tab" aria-controls="laboral-tab-pane" aria-selected="false">Información laboral</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="generales-tab-pane" role="tabpanel" aria-labelledby="generales-tab" tabindex="0">
              <div class="container my-4">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 ">
                    <div class="form-floating mb-2">
                      <input type="text" id="rfc_empleado" name="rfc_empleado" class="form-control" placeholder="RFC">
                      <label for="rfc_empleado" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>RFC</label>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 ">
                    <div class="form-floating mb-3">
                      <input name="curp_empleado" type="tel" class="form-control break_size" id="curp_empleado" placeholder="18 Caracteres" maxlength="18">
                      <label for="curp_empleado" class="text-primary"><i class="fas fa-address-card me-2"></i> CURP </label>
                    </div>
                  </div>
                </div>
                <div class="row align-items-end mb-3 prueba justify-content-center mt-3">
                  <div class="col-lg-4 col-md-6 col-sm-6 text-start">
                    <div class="form-floating mb-3">
                      <input name="apellido_paterno_empleado" type="text" class="form-control break_size" id="apellido_paterno_empleado" placeholder="Apellido" maxlength="100">
                      <label for="apellido_paterno_empleado" class="text-primary"><i class="fas fa-portrait me-2"></i> Apellido Paterno</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 text-start">
                    <div class="form-floating mb-3">
                      <input name="apellido_materno_empleado" type="text" class="form-control break_size" id="apellido_materno_empleado" placeholder="Apellido" maxlength="100">
                      <label for="apellido_materno_empleado" class="text-primary"><i class="fas fa-portrait me-2"></i> Apellido Materno</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 text-start">
                    <div class="form-floating mb-3">
                      <input name="nombres_empleado" type="text" class="form-control break_size" id="nombres_empleado" placeholder="Nombres" maxlength="100">
                      <label for="nombres_empleado" class="text-primary"><i class="fas fa-user me-2"></i> Nombre (s)</label>
                    </div>
                  </div>
                </div>
                <div class="row align-items-end mb-3 justify-content-center">
                  <div class="col-lg-4 col-md-6 text-start">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="lugar_nacimiento_empleado" name="lugar_nacimiento_empleado">
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
                      <label for="lugar_nacimiento_empleado" class="text-primary small"><i class="fas fa-map me-2"></i> Lugar de Nacimiento</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 text-start">
                    <div class="form-floating mb-3">
                      <input name="fecha_nacimiento_empleado" max="2004-12-31" date_format="YYYY-MM-DD" type="date" class="form-control" id="fecha_nacimiento_empleado" placeholder="Fecha">
                      <label for="fecha_nacimiento_empleado" class="text-primary small"><i class="fas fa-calendar-alt me-2"></i> Fecha de Nacimiento</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 text-start">
                    <div class="form-floating mb-3">
                      <select class="form-select" name="selector_sexo_empleado" id="selector_sexo_empleado">
                        <option value="">Seleccionar</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                      </select>
                      <label for="selector_sexo_empleado" class="text-primary"><i class="fas fa-venus-mars fa-lg me-2"></i> Sexo</label>
                    </div>
                  </div>
                </div>
                <div class="row align-items-end mb-3 prueba justify-content-center">
                  <div class="col-lg-4 col-md-6  col-sm-6 text-start">
                    <div class="form-floating mb-3">
                      <select class="form-select" name="selector_edo_civil_empleado" id="selector_edo_civil_empleado">
                        <option value="">Estado Civil</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        <option value="4">Separación en proceso judicial</option>
                        <option value="5">Viudo</option>
                        <option value="6">Concubinato</option>
                      </select>
                      <label for="selector_edo_civil_empleado" id="label_mt" class="text-primary"><i class="fas fa-ring me-2"></i> Estado Civil</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6  col-sm-6 text-start">
                    <div class="form-floating mb-3">
                      <input type="tel" class="form-control break_size" name="telefono_empleado" id="telefono_empleado" maxlength="10" placeholder="10 Digitos">
                      <label for="telefono_empleado" class="text-primary"><i class="fas fa-phone-alt me-2"></i> Telefono</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 text-start">
                    <div class="form-floating mb-3">
                      <input name="correo_electronico_empleado" type="email" class="form-control break_size" id="correo_electronico_empleado" placeholder="example@correo.com">
                      <label for="correo_electronico_empleado" class="text-primary"><i class="fas fa-at me-2"></i> Correo Electronico</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="domicilio-tab-pane" role="tabpanel" aria-labelledby="domicilio-tab" tabindex="0">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-6 mb-3 text-center">
                    <div id="check_ditar"></div>
                    <div class="form-check form-switch mt-5">
                      <input class="" type="checkbox" id="escritura_manual" name="escritura_manual">
                      <label class="" for="escritura_manual">Edicion Manual</label>
                      <!-- <button type="button" class="btn borded-0 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Escritura manual de Colonia, Alcaldia y Estado.">
                    <i class="fas fa-question-circle"></i>
                </button> -->
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center align-items-end mb-3">
                  <div class="col-lg-3 col-md-6 col-sm-6 text-start">
                    <div class="form-floating mb-3">
                      <input name="codigo_postal_empleado" type="text" maxLength="5" class="form-control break_size" id="codigo_postal_empleado" value="" placeholder="CP. 00000">
                      <label for="codigo_postal_empleado" class="text-primary"><i class="fas fa-sort-numeric-up-alt me-2"></i> Codigo Postal</label>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <input name="estado_empleado" type="text" class="form-control break_size" value="" id="estado_empleado" readonly placeholder="Estado">
                      <label for="estado_empleado" class="text-primary"><i class="fas fa-map-marked me-2"></i> Estado</label>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-9 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <input name="alcaldia_empleado" type="text" class="form-control break_size" id="alcaldia_empleado" readonly placeholder="Alcaldia">
                      <label for="alcaldia_empleado" class="text-primary"><i class="fas fa-archway me-2"></i>Alcaldia</label>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-9 text-start mt-md-2 ">
                    <div class="form-floating mb-3">
                      <select name="colonia_empleado" class="form-control break_size" id="colonia_empleado"></select>
                      <label for="colonia_empleado" class="text-primary"><i class="fas fa-map me-2"></i> Colonia</label>
                    </div>
                  </div>
                </div>
                <div class="row align-items-end justify-content-center mb-3">
                  <div class="col-lg-4 col-md-6 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <input name="calle_empleado" type="text" class="form-control break_size" id="calle_empleado" placeholder="Calle">
                      <label for="calle_empleado" class="text-primary"><i class="fas fa-directions me-2"></i> Calle</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <input name="no_exterior_empleado" type="text" class="form-control break_size" id="no_exterior_empleado" placeholder="Mz. 0000">
                      <label for="no_exterior_empleado" class="text-primary"><i class="fas fa-sort-numeric-up me-2"></i> No. Exterior</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <input name="no_interior_empleado" type="text" class="form-control break_size" id="no_interior_empleado" placeholder="Lt. 0000">
                      <label for="no_interior_empleado" class="text-primary"><i class="fas fa-sort-numeric-down-alt me-2"></i> No. Interior</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="laboral-tab-pane" role="tabpanel" aria-labelledby="laboral-tab" tabindex="0">
              <div class="container my-4">
                <div class="row justify-content-center mb-3">
                  <div class="col-lg-4 col-md-6 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <select name="seleccion_tipo_trabajador" id="seleccion_tipo_trabajador" class="form-select">
                        <option value="" selected>Selecciona el tipo de trabajador</option>
                        <option value="Base">Base</option>
                        <option value="Prof. Visit">Profesor de Visita</option>
                        <option value="Mixto">Mixto</option>
                      </select>
                      <label for="seleccion_tipo_trabajador" class="text-primary text-small"><i class="fa-solid fa-id-card me-2"></i>Tipo de Trabajador</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <select name="nombramiento_empleado" id="nombramiento_empleado" class="form-select">
                        <option value="" selected>Selecciona el Nombramiento</option>
                        <option value="D">Docente</option>
                        <option value="A">Administrativo</option>
                      </select>
                      <label for="nombramiento_empleado" class="text-primary text-small"><i class="fa-solid fa-id-card me-2"></i>Nombramiento</label>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <select name="departamento_ads_acad_empleado" id="departamento_ads_acad_empleado" class="form-select">
                        <option value="" selected>Departamento de Adscripcion</option>
                      </select>
                      <label for="departamento_ads_acad_empleado" class="text-primary text-small"><i class="fa-solid fa-id-card me-2"></i>Área</label>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mb-3">
                <div class="col-lg-4 col-md-6 text-start mt-md-2">
                  <div class="form-floating mb-3">
                    <select name="nivel_escolar_empleado" id="nivel_escolar_empleado" class="form-select">
                      <option value="" selected>Selecciona el nivel escolar</option>
                      <option value="1">Posgrado</option>
                        <option value="2">Bachillerato</option>
                        <option value="3">Licenciatura</option>
                        <option value="4">Bachillerato Técnico</option>
                        <option value="5">Bachillerato Profesional</option>
                    </select>
                    <label for="nivel_escolar_empleado" class="text-primary text-small"><i class="fas fa-graduation-cap me-2"></i> Nivel Escolar</label>
                  </div>
                </div>
                  <div class="col-lg-4 col-md-6 text-start mt-md-2">
                    <div class="form-floating mb-3">
                      <select name="estatus_empleado" id="estatus_empleado" class="form-select">
                        <option value="" selected>Selecciona el estatus</option>
                        <option value="1">Activo</option>
                        <option value="23">Inactivo</option>
                      </select>
                      <label for="estatus_empleado" class="small text-primary"><i class="fa-solid fa-rectangle-ad me-2"></i></i>Estatus</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="btn_guardar_cambios">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--  <option value="1">Posgrado</option>
                        <option value="2">Bachillerato</option>
                        <option value="3">Licenciatura</option>
                        <option value="4">Bachillerato Técnico</option>
                        <option value="5">Bachillerato Profesional</option> -->