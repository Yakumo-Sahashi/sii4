<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Análisis de materias</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('analisis_materias') ?>">Análisis de materias</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4"></h4>
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
<!-- Seccion donde se se hace la consulta de las materias -->
<div class="container" id="seccion_consulta_materias">
    <form action="" method="POST" id="frm_consulta" name="frm_consulta">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_consulta" name="periodo_consulta">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="periodo_consulta" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_consulta" name="carrera_consulta">
                        <option value="" selected>Selecciona la carrera</option>
                    </select>
                    <label for="carrera_consulta" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="especialidad_consulta" name="especialidad_consulta">
                        <option value="" selected>Selecciona la especialidad</option>
                    </select>
                    <label for="especialidad_consulta" class="text-primary"><i class="fa-solid fa-user-graduate me-2"></i>Especialidad</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <!-- <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white">Cancelar</a> -->
                <button type="submit" class="btn btn-primary" id="btn_consultar">Consultar</button>
            </div>
        </div>
    </form>
</div>
<!-- Esta seccion se genera despues de realizar la consulta -->
<div class="container-fluid p-0 my-2 d-none" id="seccion_tabla_materias">
    <div class="row my-5">
        <div class="col text-center">
            <!-- llenar con la carrera , especialidad y periodo que se escogio -->
            <h5>Materias de <span class="fw-bold ms-2" id="carrera_escogida"></span></h5>
            <h5>Especialidad: <span class="fw-bold ms-2" id="especialidad_escogida"></span></h5>
            <h5>Periodo: <span class="fw-bold ms-2" id="periodo_escogido"></span></h5>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar">Regresar</button>
        </div>
    </div>
    <div class="row justify-content-center p-0">
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 1
            </div>
            <!-- Id de la seccion donde se llenara de las materias -->
            <div id="seccion_materias_1">

                <!-- 
                    Estructura de la materia , lo unico a modificar es la clase del fondo y el contenido.
                    en caso de haber un espacio vacio en la tabla colocar la estructura 2 
                -->

                <!-- Estructura materia 1 -->
                <!-- <div class="p-1 text-center border cuadricula overflow-scroll text-small sin-scroll bg-cuadricula-verde" data-bs-toggle="modal" data-bs-target="#analisis_materia_modal">
                    <div class="mt-1">

                    </div>
                </div> -->

                <!-- Estructura materia 2 (vacia) -->
                <!-- <div class="p-1 text-center border cuadricula overflow-scroll text-small sin-scroll">
                    <div class="mt-1">

                    </div>
                </div> -->

            </div>
        </div>
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 2
            </div>
            <div id="seccion_materias_2"></div>
        </div>
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 3
            </div>
            <div id="seccion_materias_3"></div>
        </div>
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 4
            </div>
            <div id="seccion_materias_4"></div>
        </div>
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 5
            </div>
            <div id="seccion_materias_5"></div>
        </div>
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 6
            </div>
            <div id="seccion_materias_6"></div>
        </div>
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 7
            </div>
            <div id="seccion_materias_7"></div>
        </div>
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 8
            </div>
            <div id="seccion_materias_8"></div>
        </div>
        <div class="col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 9
            </div>
            <div id="seccion_materias_9"></div>
        </div>
    </div>
</div>


<!-- Modal analisis de la materia -->
<div class="modal fade" id="analisis_materia_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container p-0">
                    <div class="row">
                        <div class="col text-center">
                            <span class="fs-5 me-2">Análisis de la materia</span>
                            <span class="fs-5 fw-bold" id="titulo_modal_materia"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <span class="me-2">Para el periodo</span>
                            <span class="fw-bold" id="titulo_modal_periodo"></span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_analisis">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Situación escolar</th>
                                        </tr>
                                        <thead>
                                        <tbody>
                                            <tr>
                                                <td id="cantidad_1"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">Han cursado y aprobado la materia</td>
                                            </tr>
                                            <tr>
                                                <td id="cantidad_2"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">No tiene derecho por no cumplir con los requisitos</td>
                                            </tr>
                                            <tr>
                                                <td id="cantidad_3"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">Están actualmente cursando en 1ra. oportunidad</td>
                                            </tr>
                                            <tr>
                                                <td id="cantidad_4"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">Están actualmente cursando 2da. oportunidad</td>
                                            </tr>
                                            <tr>
                                                <td id="cantidad_5"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">No la han cursado habiéndola reporbado en 1ra oportunidad</td>
                                            </tr>
                                            <tr>
                                                <td id="cantidad_6"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">No la han cursado teniendo ya los requisitos aprobados</td>
                                            </tr>
                                            <tr>
                                                <td id="cantidad_7"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">La tienen en examen especial</td>
                                            </tr>
                                            <tr>
                                                <td id="cantidad_8"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">Tienen examen especial aprobado</td>
                                            </tr>
                                            <tr>
                                                <td id="cantidad_9"></td>
                                                <td data-bs-toggle="modal" data-bs-target="#situacion_materia_modal">Población inscrita en la carrera cursando materias</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal" id="btn_cerrar_modal_analisis">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal situacion escolar de la materia-->
<div class="modal fade" id="situacion_materia_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container p-0">
                    <div class="row">
                        <div class="col text-center">
                            <span class="fs-5 me-2">Materia</span>
                            <span class="fs-5 fw-bold" id="titulo_modal_materia_situacion"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <span class="fs-5 fw-bold" id="titulo_sitacion_modal">
                                <!-- ejem 
                                    Alumos que Están actualmente cursando segunda oportunidad , segun la opcion a escoger
                                -->
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <span class="me-2">Para el periodo</span>
                            <span class="fw-bold" id="titulo_modal_periodo_situacion"></span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_situacion">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">No. Control</th>
                                            <th scope="col">Alumno</th>
                                            <th scope="col">Generales</th>
                                            <th scope="col">Reticula</th>
                                            <th scope="col">Horario</th>
                                            <th scope="col">Kardex</th>
                                        </tr>
                                        <thead>
                                        <tbody id="contenido_tabla_situacion">
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal" id="btn_cerrar_modal_situacion">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>dep/consultas/analisisMaterias.controller.js"></script>

<!-- Id's de la vista

    -Info a llenar
        carrera_escogida
        especialidad_escogida
        periodo_escogido
    
    -Secciones
        seccion_consulta_materias
        seccion_tabla_materias
        seccion_materias_1
        seccion_materias_2
        seccion_materias_3
        seccion_materias_4
        seccion_materias_5
        seccion_materias_6
        seccion_materias_7
        seccion_materias_8
        seccion_materias_9

    -Formularios
        frm_consulta

    -Inputs
        periodo_consulta
        carrera_consulta
        especialidad_consulta

    -Btn
        btn_consultar
        btn_regresar
        btn_cerrar_modal_analisis
        btn_cerrar_modal_situacion

    -Modal
        analisis_materia_modal
        titulo_modal_materia
        titulo_modal_periodo

        situacion_materia_modal
        titulo_modal_materia_situacion
        titulo_sitacion_modal
        titulo_modal_periodo_situacion

        -Cantidades a llenar
            cantidad_1
            cantidad_2
            cantidad_3
            cantidad_4
            cantidad_5
            cantidad_6
            cantidad_7
            cantidad_8
            cantidad_9


    -Tablas
        tabla_analisis
        

        tabla_situacion
        contenido_tabla_situacion

 -->