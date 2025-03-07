<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Materias</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('materias_se') ?>">Materias</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-book overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Seccion donde se hace el filtro de materas por carrera -->
<div class="container" id="seccion_seleccionar_carrera">
    <form action="" method="POST" id="frm_seleccionar_carrera" name="frm_seleccionar_carrera">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_seleccionar_carrera") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera" name="carrera">
                        <option selected>Seleccionar la carrera</option>
                    </select>
                    <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary" id="btn_consultar">Consultar</button>
            </div>
        </div>
    </form>
</div>

<!-- Esta seccion se genera despues de hacer el filtrado por carrera -->
<div class="container d-none" id="seccion_materias">
    <div class="row">
        <div class="col text-center">
            <!-- Rellenar informacion de la carrera con la opcion seleccionada , ejem: Sistemas comp, Gestion , Indus-->
            <h5>MATERIAS DE: <span class="fw-bold" id="info_carrera"></span></h5>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
            <!-- Boton que nos regresa a escoger de nuevo la materia -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="buscador" name="buscador" placeholder="Buscar materia">
                        <label for="buscador" class="text-primary"><i class="fa-solid fa-magnifying-glass me-2"></i>Buscar materia: nombre, clave oficial</label>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar">Regresar</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_agregar_materia">Agregar nueva materia</button>
            <button type="button" class="btn btn-success" id="btn_limpiar">Limpiar buscador</button>
        </div>
    </div>
    <div id="listado_materias">
        <div class="col-lg-3">
            <div class="container col-materia">
                <div class="row p-0">
                    <div class="col p-0 text-center">
                        <img class="icono-materia fa-solid fa-book overflow-hidden text-secondary my-4"></i>
                    </div>
                </div>
                <div class="row justify-content-center mb-4 p-0">
                    <div class="col-12 p-0 text-center">
                        <!-- Rellenar con el nombre de la materia -->
                        <div class="text-muted small" id="nombre_materia_info">Calculo diferencial</div>
                    </div>
                    <div class="col-12 text-center">
                        <!-- Rellenar con la clave de la materia -->
                        <div class="text-muted small" id="clave_materia_info">ACF-0901</div>
                    </div>
                    <div class="col-12 text-center">
                        <!-- Rellenar con los creditos de la materia -->
                        <div class="text-muted small" id="creditos_materia_info">3-2-5</div>
                    </div>
                    <div class="col-3 mt-3 mb-2">
                        <button class="btn btn-icono-materia" id="btn_deshabilitar"><i class="fa-regular fa-eye-slash small"></i></button>
                    </div>
                    <div class="col-3 mt-3 mb-2">
                        <button class="btn btn-icono-materia" id="btn_editar_materia" data-bs-toggle="modal" data-bs-target="#modal_editar_materia"><i class="fa-solid fa-pen small"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<!-- Modal Agregar Materia-->
<div class="modal fade" id="modal_agregar_materia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Agregar nueva materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="frm_agregar_materia" name="frm_agregar_materia">
                    <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_agregar_materia") ?>" hidden>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h4 class="my-3 text-mute">Datos de la nueva materia</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="area_academica" name="area_academica">
                                        <option selected>Seleccionar area</option>
                                    </select>
                                    <label for="area_academica" class="text-primary small"><i class="fa-solid fa-location-dot me-2"></i>Área Académica</label>
                                </div>
                            </div>
                            <hr class="my-2">
                        </div>
                        <div id="seccion_agregar_materia">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo">
                                        <label for="nombre_completo" class="text-primary"><i class="fa-solid fa-signature me-2"></i>Nombre completo</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nombre_abreviado" name="nombre_abreviado" placeholder="Nombre abreviado">
                                        <label for="nombre_abreviado" class="text-primary">Nombre abreviado</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="" id="clave_oficial" name="clave_oficial" placeholder="Clave Oficial" value="">
                                        <label for="clave_oficial" class="text-primary small"><i class="fa-solid fa-key me-2"></i>Clave Oficial</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="" id="clave" name="clave" placeholder="Clave" value="">
                                        <label for="clave" class="text-primary small"><i class="fa-solid fa-key me-2"></i>Clave</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="select_especialidad_agregar" name="select_especialidad_agregar">
                                            <option value="" selected>Seleccionar especialidad</option>
                                        </select>
                                        <label for="select_especialidad_agregar" class="text-primary small"><i class="fa-solid fa-user-graduate me-2"></i>Especialidad a la que pertenece</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="orden_certificado" name="orden_certificado" placeholder="Órden en Certificado">
                                        <label for="orden_certificado" class="text-primary small"><i class="fa-solid fa-arrow-up-wide-short me-2"></i>Órden en Certificado</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="estatus_materia" name="estatus_materia">
                                            <option value="" selected>Seleccionar estatus</option>
                                            <option value="A">Activa</option>
                                            <option value="I">Inactiva</option>
                                        </select>
                                        <label for="estatus_materia" class="text-primary small"><i class="fa-solid fa-book-bookmark me-2"></i>Estatus de la materia</label>
                                    </div>
                                </div>
                                <hr class="my-2">
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="horas_teoricas" name="horas_teoricas" placeholder="Horas Teóricas">
                                        <label for="horas_teoricas" class="text-primary small"><i class="fa-regular fa-clock me-2"></i>Horas Teóricas</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="horas_practicas" name="horas_practicas" placeholder="Horas Prácticas">
                                        <label for="horas_practicas" class="text-primary small"><i class="fa-solid fa-clock me-2"></i>Horas Prácticas</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="creditos_totales" name="creditos_totales" placeholder="Créditos Totales">
                                        <label for="creditos_totales" class="text-primary small"><i class="fa-solid fa-hashtag me-2"></i>Créditos Totales</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="creditos_prerrequisito" name="creditos_prerrequisito" placeholder="Créditos Prerrequisito">
                                        <label for="creditos_prerrequisito" class="text-primary text-small"><i class="fa-solid fa-list-ol me-2"></i>Créditos Prerrequisito</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------- SECCION AGREGAR NUEVA MATERIA ------------------------>
                        <div id="seccion_nueva_materia">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="nivel_escolar" name="nivel_escolar">
                                            <option value="" selected>Seleccionar nivel</option>
                                            <option value="L">Licenciatura</option>
                                            <option value="P">Postgrado</option>
                                        </select>
                                        <label for="nivel_escolar" class="text-primary"><i class="fa-solid fa-bars me-2"></i>Nivel escolar</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="tipo_materia" name="tipo_materia">
                                            <option value="" selected>Seleccionar tipo</option>
                                        </select>
                                        <label for="tipo_materia" class="text-primary"><i class="fa-solid fa-filter me-2"></i>Tipo de materia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="select_unidades" name="select_unidades">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                        <label for="select_unidades" class="text-primary"><i class="fa-solid fa-list-ol me-2"></i>Numero unidades</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="clasificacion_acredi" name="clasificacion_acredi" placeholder="Clasificación Acreditación">
                                        <label for="clasificacion_acredi" class="text-primary">Clasificación Acreditación</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_agregar_materia">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal actualizar materia -->
<div class="modal fade" id="modal_editar_materia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Actualizar Materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="frm_act_materia" name="frm_act_materia">
                    <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_act_materia") ?>" hidden>
                    <input type="text" name="id_materia" value="" hidden>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h4 class="my-3 text-mute">Datos de la materia</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="area_academica_act" name="area_academica_act">
                                        <option selected>Seleccionar area</option>
                                    </select>
                                    <label for="area_academica_act" class="text-primary small"><i class="fa-solid fa-location-dot me-2"></i>Área Académica</label>
                                </div>
                            </div>
                            <hr class="my-2">
                        </div>
                        <div id="seccion_agregar_materia">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nombre_completo_act" name="nombre_completo_act" placeholder="Nombre completo">
                                        <label for="nombre_completo_act" class="text-primary"><i class="fa-solid fa-signature me-2"></i>Nombre completo</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nombre_abreviado_act" name="nombre_abreviado_act" placeholder="Nombre abreviado">
                                        <label for="nombre_abreviado_act" class="text-primary">Nombre abreviado</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="" id="clave_oficial_act" name="clave_oficial_act" placeholder="Clave Oficial" value="">
                                        <label for="clave_oficial_act" class="text-primary small"><i class="fa-solid fa-key me-2"></i>Clave Oficial</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="" id="clave_act" name="clave_act" placeholder="Clave" value="">
                                        <label for="clave_act" class="text-primary small"><i class="fa-solid fa-key me-2"></i>Clave</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="select_especialidad_act" name="select_especialidad_act">
                                            <option value="" selected>Seleccionar especialidad</option>
                                        </select>
                                        <label for="select_especialidad_act" class="text-primary small"><i class="fa-solid fa-user-graduate me-2"></i>Especialidad a la que pertenece</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="orden_certificado_act" name="orden_certificado_act" placeholder="Órden en Certificado">
                                        <label for="orden_certificado_act" class="text-primary small"><i class="fa-solid fa-arrow-up-wide-short me-2"></i>Órden en Certificado</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="estatus_materia_act" name="estatus_materia_act">
                                            <option value="" selected>Seleccionar estatus</option>
                                            <option value="A">Activa</option>
                                            <option value="I">Inactiva</option>
                                        </select>
                                        <label for="estatus_materia_act" class="text-primary small"><i class="fa-solid fa-book-bookmark me-2"></i>Estatus de la materia</label>
                                    </div>
                                </div>
                                <hr class="my-2">
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="horas_teoricas_act" name="horas_teoricas_act" placeholder="Horas Teóricas">
                                        <label for="horas_teoricas_act" class="text-primary small"><i class="fa-regular fa-clock me-2"></i>Horas Teóricas</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="horas_practicas_act" name="horas_practicas_act" placeholder="Horas Prácticas">
                                        <label for="horas_practicas_act" class="text-primary small"><i class="fa-solid fa-clock me-2"></i>Horas Prácticas</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="creditos_totales_act" name="creditos_totales_act" placeholder="Créditos Totales">
                                        <label for="creditos_totales_act" class="text-primary small"><i class="fa-solid fa-hashtag me-2"></i>Créditos Totales</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="creditos_prerrequisito_act" name="creditos_prerrequisito_act" placeholder="Créditos Prerrequisito">
                                        <label for="creditos_prerrequisito_act" class="text-primary text-small"><i class="fa-solid fa-list-ol me-2"></i>Créditos Prerrequisito</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------- SECCION AGREGAR NUEVA MATERIA ------------------------>
                        <div id="seccion_nueva_materia">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="nivel_escolar_act" name="nivel_escolar_act">
                                            <option value="" selected>Seleccionar nivel</option>
                                            <option value="L">Licenciatura</option>
                                            <option value="P">Postgrado</option>
                                        </select>
                                        <label for="nivel_escolar_act" class="text-primary"><i class="fa-solid fa-bars me-2"></i>Nivel escolar</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="tipo_materia_act" name="tipo_materia_act">
                                            <option value="" selected>Seleccionar tipo</option>
                                        </select>
                                        <label for="tipo_materia_act" class="text-primary"><i class="fa-solid fa-filter me-2"></i>Tipo de materia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-floating">
                                        <select class="form-select" id="select_unidades_act" name="select_unidades_act">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                        <label for="select_unidades_act" class="text-primary"><i class="fa-solid fa-list-ol me-2"></i>Numero unidades</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="clasificacion_acredi_act" name="clasificacion_acredi_act" placeholder="Clasificación Acreditación">
                                        <label for="clasificacion_acredi_act" class="text-primary">Clasificación Acreditación</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_act_materia">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?=CONTROLLER?>se/carreras/materias.controller.js"></script>