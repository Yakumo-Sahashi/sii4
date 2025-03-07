<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Plan curricular</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('plan_curricular') ?>">Plan curricular</a></li>
        </ol>
    </nav>
</div>

<!-- Seccion de la consulta-->
<div class="container" id="seccion_consulta">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-file-lines overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_consulta" name="frm_consulta">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta") ?>" hidden>
        <div class="row justify-content-center my-2">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="select_carrera" name="select_carrera">
                        <option selected>Seleccionar carrera/reticula</option>
                    </select>
                    <label for="select_carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera/Reticula</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="select_especialidad" name="select_especialidad">
                        <option selected>Seleccionar carrera/reticula</option>
                    </select>
                    <label for="select_especialidad" class="text-primary"><i class="fa-solid fa-user-graduate me-2"></i>Especialidad</label>
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

<!-- Esta seccion se genera despues de realizar la consulta -->
<div class="container-fluid p-0 my-5 d-none" id="seccion_tabla_materias">
    <div class="row justify-content-center my-5">
        <div class="col text-center">
            <!-- Aqui colocar la carrera y especialidad  escogida -->
            <h4 class="ms-2 fw-bold">Plan curricular: <span id="carrera_elegida" class="h5"></span></h4>
            <h5 class="ms-2 fw-bold">Especialidad: <span id="especialidad_elegida" class="h6"></span></h5>
        </div>
        <div class="col-12 text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar">Regresar</button>
        </div>
    </div>
    <div class="row justify-content-center p-0">
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 1
            </div>
            <!-- Id de la seccion donde se llenara de las materias -->
            <div id="seccion_materias_1">

                 <!-- 
                    Estructura de la materia , lo unico a modificar es la clase del fondo y el contenido.
                -->
                <div class="p-1 text-center border cuadricula text-small sin-scroll  bg-cuadricula-verde" data-bs-toggle="modal" data-bs-target="#editar_materia_modal">
                    <div class="mt-1">

                    </div>
                </div>

                <!-- Estructura materia 2 (Para agregar una materia) -->
                <div class="p-1 text-center border cuadricula small sin-scroll " data-bs-toggle="modal" data-bs-target="#agregar_materia_modal">
                    <div class="mt-4">
                        Seleccionar materia
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 2
            </div>
            <div id="seccion_materias_2">

            </div>
        </div>
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 3
            </div>
            <div id="seccion_materias_3"></div>
        </div>
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 4
            </div>
            <div id="seccion_materias_4"></div>
        </div>
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 5
            </div>
            <div id="seccion_materias_5"></div>
        </div>
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 6
            </div>
            <div id="seccion_materias_6"></div>
        </div>
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 7
            </div>
            <div id="seccion_materias_7"></div>
        </div>
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 8
            </div>
            <div id="seccion_materias_8"></div>
        </div>
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 9
            </div>
            <div id="seccion_materias_9"></div>
        </div>
    </div>
</div>

<!------------------------ Modal Actualizar Materia -------------------------------------->
<div class="modal fade" id="editar_materia_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form class="modal-content" id="frm_actualizar_materia" name="frm_actualizar_materia">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_actualizar_materia") ?>" hidden>
                <input type="text" value="" name="id_materia" id="id_materia" hidden>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control text-small" value="" id="materia_actualizar" name="materia_actualizar" placeholder="Materia" value="" disabled>
                                    <label for="materia_actualizar" class="text-primary small"><i class="fa-solid fa-book me-2"></i>Materia</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control text-small" value="" id="area_academica_actualizar" name="area_academica_actualizar" placeholder="Área academica" value="" disabled>
                                    <label for="area_academica_actualizar" class="text-primary small">Área academica</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="" id="clave_oficial_actualizar" name="clave_oficial_actualizar" placeholder="Clave Oficial" value="">
                                    <label for="clave_oficial_actualizar" class="text-primary small"><i class="fa-solid fa-key me-2"></i>Clave Oficial</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="select_especialidad_actualizar" name="select_especialidad_actualizar">
                                        <option selected>Seleccionar especialidad</option>
                                    </select>
                                    <label for="select_especialidad_actualizar" class="text-primary small"><i class="fa-solid fa-user-graduate me-2"></i>Especialidad a la que pertenece</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="" id="orden_certificado_actualizar" name="orden_certificado_actualizar" placeholder="Órden en Certificado">
                                    <label for="orden_certificado_actualizar" class="text-primary small"><i class="fa-solid fa-arrow-up-wide-short me-2"></i>Órden en Certificado</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="estatus_materia_actualizar" name="estatus_materia_actualizar">
                                        <option value="" selected>Seleccionar estatus</option>
                                        <option value="A">Activa</option>
                                        <option value="I">Inactiva</option>
                                    </select>
                                    <label for="estatus_materia_actualizar" class="text-primary small"><i class="fa-solid fa-book-bookmark me-2"></i>Estatus de la materia</label>
                                </div>
                            </div>
                            <hr class="my-2">
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="" id="horas_teoricas_actualizar" name="horas_teoricas_actualizar" placeholder="Horas Teóricas">
                                    <label for="horas_teoricas_actualizar" class="text-primary small"><i class="fa-regular fa-clock me-2"></i>Horas Teóricas</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="" id="horas_practicas_actualizar" name="horas_practicas_actualizar" placeholder="Horas Prácticas">
                                    <label for="horas_practicas_actualizar" class="text-primary small"><i class="fa-solid fa-clock me-2"></i>Horas Prácticas</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="" id="creditos_totales_actualizar" name="creditos_totales_actualizar" placeholder="Créditos Totales">
                                    <label for="creditos_totales_actualizar" class="text-primary small"><i class="fa-solid fa-hashtag me-2"></i>Créditos Totales</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="" id="creditos_prerrequisito_actualizar" name="creditos_prerrequisito_actualizar" placeholder="Créditos Prerrequisito">
                                    <label for="creditos_prerrequisito_actualizar" class="text-primary text-small"><i class="fa-solid fa-list-ol me-2"></i>Créditos Prerrequisito</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_actualizar">Actualizar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Agregar Materia-->
<div class="modal fade" id="agregar_materia_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Seleccionar Materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="frm_agregar_materia" name="frm_agregar_materia">
                    <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_agregar_materia") ?>" hidden>
                    <input type="text" id="id_espacio" name="id_espacio" value="" hidden>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="materia" name="materia">
                                        <option value="" selected>Seleccionar materia</option>
                                    </select>
                                    <label for="materia" class="text-primary small"><i class="fa-solid fa-book me-2"></i>Materia</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="area_academica" name="area_academica" readonly disabled>
                                        <option selected>Seleccionar area</option>
                                    </select>
                                    <label for="area_academica" class="text-primary small"><i class="fa-solid fa-location-dot me-2"></i>Área Académica</label>
                                </div>
                            </div>
                            <hr class="my-2">
                        </div>
                        <div id="seccion_agregar_materia">
                            <div class="row">
                                <div class="my-3 text-mute">Datos de la materia</div>
                                <div class="col-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="" id="clave_oficial" name="clave_oficial" placeholder="Clave Oficial" value="" readonly>
                                        <label for="clave_oficial" class="text-primary small"><i class="fa-solid fa-key me-2"></i>Clave Oficial</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="" id="clave" name="clave" placeholder="Clave" value="" readonly>
                                        <label for="clave" class="text-primary small"><i class="fa-solid fa-key me-2"></i>Clave</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="select_especialidad_agregar" name="select_especialidad_agregar" disabled>
                                            <option value="" selected>Seleccionar especialidad</option>
                                        </select>
                                        <label for="select_especialidad_agregar" class="text-primary small"><i class="fa-solid fa-user-graduate me-2"></i>Especialidad a la que pertenece</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="orden_certificado" name="orden_certificado" placeholder="Órden en Certificado" readonly>
                                        <label for="orden_certificado" class="text-primary small"><i class="fa-solid fa-arrow-up-wide-short me-2"></i>Órden en Certificado</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="estatus_materia" name="estatus_materia" disabled>
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
                                        <input type="text" class="form-control" id="horas_teoricas" name="horas_teoricas" placeholder="Horas Teóricas" readonly>
                                        <label for="horas_teoricas" class="text-primary small"><i class="fa-regular fa-clock me-2"></i>Horas Teóricas</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="horas_practicas" name="horas_practicas" placeholder="Horas Prácticas" readonly>
                                        <label for="horas_practicas" class="text-primary small"><i class="fa-solid fa-clock me-2"></i>Horas Prácticas</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="creditos_totales" name="creditos_totales" placeholder="Créditos Totales" readonly>
                                        <label for="creditos_totales" class="text-primary small"><i class="fa-solid fa-hashtag me-2"></i>Créditos Totales</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="creditos_prerrequisito" name="creditos_prerrequisito" placeholder="Créditos Prerrequisito" readonly>
                                        <label for="creditos_prerrequisito" class="text-primary text-small"><i class="fa-solid fa-list-ol me-2"></i>Créditos Prerrequisito</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------- SECCION AGREGAR NUEVA MATERIA ------------------------>
                        <div id="seccion_nueva_materia">
                            <div class="row">
                                <div class="my-3 text-mute">Datos de la nueva materia</div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="nivel_escolar" name="nivel_escolar" disabled>
                                            <option value="" selected>Seleccionar nivel</option>
                                            <option value="L">Licenciatura</option>
                                            <option value="P">Postgrado</option>
                                        </select>
                                        <label for="nivel_escolar" class="text-primary"><i class="fa-solid fa-bars me-2"></i>Nivel escolar</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="tipo_materia" name="tipo_materia" disabled>
                                            <option value="" selected>Seleccionar tipo</option>
                                        </select>
                                        <label for="tipo_materia" class="text-primary"><i class="fa-solid fa-filter me-2"></i>Tipo de materia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo" readonly>
                                        <label for="nombre_completo" class="text-primary"><i class="fa-solid fa-signature me-2"></i>Nombre completo</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nombre_abreviado" name="nombre_abreviado" placeholder="Nombre abreviado" readonly>
                                        <label for="nombre_abreviado" class="text-primary">Nombre abreviado</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="clasificacion_acredi" name="clasificacion_acredi" placeholder="Clasificación Acreditación" readonly>
                                        <label for="clasificacion_acredi" class="text-primary">Clasificación Acreditación</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-success" href="<?=Router::redirigir('materias_se')?>">Crear nueva materia</a>
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary disabled" id="btn_agregar_amateria_plan">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>se/plancurricular/plancurricular.controller.js"></script>