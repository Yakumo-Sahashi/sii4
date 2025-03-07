<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div class="<?= $letrero = $_GET['view'] == "listado_alumno" ? "d-none" : ""; ?>">
    <h1 class="fs-4 fw-bold text-primary">Historial academico</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Historial academico</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3" id="form_numero_ctrl">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <form id="frm_historial" enctype="multipart/form-data" method="POST">
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 class="me-auto mb-4">Altas y modificaciones</h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center">
                        <div class="float-start mb-3">
                            <span type="button"><img class="thumb" src="<?=DEP_IMG?>user.png"></span>
                            <div class="btn-group-vertical mb-5 mx-0 px-0">
                                <button type="button" class="btn btn-outline-primary border-0 mb-4 d-none"><i class="fa-solid fa-pen-to-square"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <div class="form-floating mb-3 mt-4">
                            <input name="num_ctrl" type="text" class="form-control break_size" id="num_ctrl" placeholder="Numero de control" maxlength="100">
                            <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-down-9-1 me-2"></i> Numero de control</label>
                        </div>
                    </div>
                </div>
                <div class="row d-md-flex justify-content-end mb-4">
                    <div class="col">
                        <button type="submit" id="btn_consultar" class="btn btn-primary">Consultar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container p-5" id="datos_alumno">
    <div class="row justify-content-center py-2">
        <h3 class="text-center mb-4">Datos del alumno</h3>
        <div class="col-lg-2">
            <div class="float-start mb-3 mt-2">
                <span type="button"><img id="img_foto" class="thumb" src="public/img/user.png" title="fotografia" alt="fotografia"></span>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="row justify-content-center py-2">
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="nombre_alumno" name="nombre_alumno" value="" readonly>
                        <label for="nombre_alumno" class="small">Nombre del alumno</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <input type="text" id="fk_numero_control" name="fk_numero_control" value="" hidden>
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="numero_control" name="numero_control" value="" readonly>
                        <label for="numero_control" class="small">Numero de control</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="semestre" name="semestre" value="" readonly>
                        <label for="floatingInputValue" class="small">Semestre</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-2">
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="periodo_escolar" name="periodo_escolar" value="" readonly>
                        <label for="periodo_escolar" class="small">Periodo escolar</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="carrera" name="carrera" value="" readonly>
                        <label for="carrera" class="small">Carrera</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="prom_acumulado" name="prom_acumulado" value="" readonly>
                        <label for="prom_acumulado" class="small">Prom. acumulado</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="especialidad" name="especialidad" value="" readonly>
                        <label for="especialidad" class="small">Especialidad</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end py-2 mt-3">
                <div class="col">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_agregar_materia">Agregar Materia</button>
                    <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_historial">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-2" id="datos_historial">
    <div class="row justify-content-around">
        <div class="col">
            <h2 class="border-bottom mb-4 text-uppercase fs-5 pb-2">Historial academico</h2>
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_historial">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Clave</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Calificacion</th>
                            <th scope="col">Tipo evaluacion</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_historial">
                            <tr>
                                <th>AS1</th>
                                <th>Calculo diferencial</th>
                                <th>8.5</th>
                                <th>Ev.reg.1ra</th>
                                <th>AGO-DIC/2015</th>
                                <th><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-pen-to-square"></i></button></th>
                                <th><button class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button></th>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Materia-->
<div class="modal fade" id="modal_actualizar_materia" tabindex="-1" aria-labelledby="aulaModalLabel" aria-hidden="true">
    <form class="modal-dialog" id="frm_actualizar_materia" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Materia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <form id="frm_actualizar_materia" method="POST"> -->
                <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_actualizar_materia")?>" hidden>
                <input type="text" name="id_materia_actualizado" value="" hidden>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input name="materia_fija" type="text" class="form-control break_size small" id="materia_fija" value="Calculo diferencial" readonly>
                                <label for="materia_fija" class="text-primary small"><i class="fa-solid fa-file-signature me-2"></i>Materia</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <input name="calificacion_actualizado" type="text" class="form-control break_size small" id="calificacion_actualizado" placeholder="Calificacion" maxlength="3">
                                <label for="calificacion_actualizado" class="text-primary small"><i class="fa-solid fa-file-signature me-2"></i>Calificacion</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <select class="form-select break_size small" id="evaluacion_actualizado" name="evaluacion_actualizado">
                                    <option value ="" selected>Seleccionar</option>
                                    <!-- <option value="0">Ev.Ord.1ra</option>
                                    <option value="1">Ev.Reg.1ra</option>
                                    <option value="2">Ev.Ext.1ra</option>
                                    <option value="3">Ev.Ord.2da</option>
                                    <option value="4">Ev.Reg.2ra</option>
                                    <option value="5">Ev.Esp</option>
                                    <option value="6">Ev.Esp.Au</option>
                                    <option value="7">Convalia</option>
                                    <option value="8">Equivalen</option> -->
                                </select>
                                <label for="evaluacion_actualizado" class="text-primary small"><i class="fa-solid fa-rectangle-list me-2"></i>Tipo de evaluacion</label>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btn_actualizar_cancelar" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_actualizar">Actualizar Materia</button>
            </div>
        </div>
    </form>
</div>

<!-- Modal Agregar Materia -->
<div class="modal fade" id="modal_agregar_materia" tabindex="-1" aria-labelledby="aulaModalLabel" aria-hidden="true">
    <form class="modal-dialog" id="frm_agregar_materia" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Materia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- <form id="frm_agregar_materia" method="POST"> -->
                    <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_agregar_materia")?>" hidden>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control small" id="nombre_alumno" name="nombre_alumno" value="Hernandez Gutierrez Luis Alberto" readonly>
                                <label for="nombre_alumno" class="small text-primary"><i class="fa-solid fa-user me-2"></i>Nombre del alumno</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select" id="agregar_materia" name="agregar_materia">
                                    <option selected>Seleccionar</option>
                                </select>
                                <label for="agregar_materia" class="text-primary"><i class="fa-solid fa-book me-2"></i>Materia</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <input name="agregar_calificacion" type="text" class="form-control break_size small" id="agregar_calificacion" placeholder="Calificacion" maxlength="3">
                                <label for="agregar_calificacion" class="text-primary small"><i class="fa-solid fa-file-signature me-2"></i>Calificacion</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-start">
                            <div class="form-floating mb-3">
                                <select class="form-select break_size small" id="agregar_evaluacion" name="agregar_evaluacion">
                                    <option selected>Seleccionar</option>
                                    <!-- <option value="0">Ev.Ord.1ra</option>
                                    <option value="1">Ev.Reg.1ra</option>
                                    <option value="2">Ev.Ext.1ra</option>
                                    <option value="3">Ev.Ord.2da</option>
                                    <option value="4">Ev.Reg.2ra</option>
                                    <option value="5">Ev.Esp</option>
                                    <option value="6">Ev.Esp.Au</option>
                                    <option value="7">Convalia</option>
                                    <option value="8">Equivalen</option> -->
                                </select>
                                <label for="agregar_evaluacion" class="text-primary small"><i class="fa-solid fa-rectangle-list me-2"></i>Tipo de evaluacion</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select" id="agregar_periodo" name="agregar_periodo">
                                    <option selected>Seleccionar</option>
                                </select>
                                <label for="agregar_periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" name="agregar_fecha_calificacion" id="agregar_fecha_calificacion" class="form-control break_size small" max="" date_format="YYYY-MM-DD">
                                <label for="agregar_fecha_calificacion" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Fecha de calificacion</label>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btn_agregar_cancelar" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_agregar">Agregar Materia</button>
            </div>
        </div>
    </form>
</div>
<script src="<?=CONTROLLER?>/se/historial_academico/historial_academico.controller.js"></script>
<!-- 
    FORMS 
- frm_historial
- frm_actualizar_materia
- frm_agregar_materia

    BOTONES 
- btn_consultar
- btn_actualizar_cancelar
- btn_actualizar
 -->