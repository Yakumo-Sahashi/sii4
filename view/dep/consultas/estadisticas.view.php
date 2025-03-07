<?php

use config\Router;
use config\Token;
require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Estadísticas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('estadisticas_dep') ?>">Estadísticas</a></li>
        </ol>
    </nav>
</div>
<div class="container" id="seccion_consulta">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4"></h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-chart-line overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_consulta" name="frm_consulta" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_consulta" name="periodo_consulta">
                        <option value="" selected>Seleccione el periodo</option>
                    </select>
                    <label for="periodo_consulta" class="text-primary">Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="estadistico_consulta" name="estadistico_consulta">
                        <option value="" selected>Seleccione el estadístico</option>
                        <option value="inscripcion">Inscripcion</option>
                        <option value="edad_alumno">Edades de Alumnos</option>
                        <option value="edad_docente">Edades de Personal</option>
                        <option value="reprobacion_materia">Indice de reprobacion por materias -carrera</option>
                        <option value="reprobacion_carrera">Indice de reprobacion por carrera</option>
                        <option value="promedio_cal">Promedio de calificaciones</option>
                    </select>
                    <label for="estadistico_consulta" class="text-primary">Estadístico</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 d-none" id="select_carrera">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_rep_carrera" name="carrera_rep_carrera">
                        <option value="" selected>Selecciona la carrera</option>
                    </select>
                    <label for="carrera_rep_carrera" class="text-primary">Carrera</label>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <!-- <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white">Cancelar</a> -->
                <button type="submit" class="btn btn-primary" id="btn_consulta">Consultar</button>
            </div>
        </div>
    </form>
</div>
<!---------------------Seccion Inscripcion --------------------------------->
<div class="container my-5 d-none" id="seccion_inscripcion">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <div class="fs-4"> Estadístico de inscripción</div>
            <!-- Aqui se coloca el periodo que se escogio  -->
            <div class="fs-5">Periodo <span id="periodo_estadistico" class="fs-5 ms-2"></span></div>
        </div>
    </div>
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-clipboard-user overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_inscripcion">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Carrera</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">1</th>
                            <th scope="col">2</th>
                            <th scope="col">3</th>
                            <th scope="col">4</th>
                            <th scope="col">5</th>
                            <th scope="col">6</th>
                            <th scope="col">7</th>
                            <th scope="col">8</th>
                            <th scope="col">9</th>
                            <th scope="col">10</th>
                            <th scope="col">11</th>
                            <th scope="col">12</th>
                            <th scope="col">>12</th>
                            <th scope="col">Total</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_inscripcion">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-end">
            <div class="me-4">Total alumnos inscritos <span class="ms-2 fw-bold" id="total_inscripcion"></span></div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar_inscripcion">Regresar</button>
        </div>
    </div>
</div>
<!---------------------Seccion edades de los alumnos--------------------------------->
<div class="container my-5 d-none" id="seccion_edades_alumnos">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <div class="fs-4"> Estadístico de las edades de los alumnos</div>
            <!-- Aqui se coloca el periodo que se escogio  -->
            <div class="fs-5">Periodo <span id="periodo_edades_alumnos" class="fs-5 ms-2"></span></div>
        </div>
    </div>
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_edades_alumnos">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Carrera</th>
                            <th scope="col">Sexo</th>
                            <th scope="col"><=18</th>
                            <th scope="col">19</th>
                            <th scope="col">20</th>
                            <th scope="col">21-23</th>
                            <th scope="col">24-27</th>
                            <th scope="col">28-30</th>
                            <th scope="col">31-33</th>
                            <th scope="col">34-36</th>
                            <th scope="col">37-39</th>
                            <th scope="col">40-42</th>
                            <th scope="col">43-45</th>
                            <th scope="col">>45</th>
                            <th scope="col">Total</th>
                        </tr>
                    <thead>
                    <tbody id="contenido_tabla_edades_alumnos">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar_edades_alumno">Regresar</button>
        </div>
    </div>
</div>
<!---------------------Seccion edades de los docentes--------------------------------->
<div class="container my-5 d-none" id="seccion_edades_docentes">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <div class="fs-4"> Estadístico de las edades de los docentes</div>
            <!-- Aqui se coloca el periodo que se escogio  -->
            <div class="fs-5">Periodo <span id="periodo_edades_docentes" class="fs-5 ms-2"></span></div>
        </div>
    </div>
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_edades_docentes">
                    <thead>
                        <tr class="text-center small">
                            <th scope="col">Nombramiento</th>
                            <th scope="col">Sexo</th>
                            <th scope="col"> >=18 </th>
                            <th scope="col">19</th>
                            <th scope="col">20</th>
                            <th scope="col">21-23</th>
                            <th scope="col">24-27</th>
                            <th scope="col">28-30</th>
                            <th scope="col">31-33</th>
                            <th scope="col">34-36</th>
                            <th scope="col">37-39</th>
                            <th scope="col">40-42</th>
                            <th scope="col">43-45</th>
                            <th scope="col">46-48</th>
                            <th scope="col">49-51</th>
                            <th scope="col">52-54</th>
                            <th scope="col">55-57</th>
                            <th scope="col">58-60</th>
                            <th scope="col">>=61</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_edades_docentes">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar_edades_docentes">Regresar</button>
        </div>
    </div>
</div>
<!---------------------Seccion Reprobacion por carreras--------------------------------->
<div class="container d-none" id="seccion_reprobacion_carrera">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-3">Estadístico de reprobación de materias por carrera</h4>
        <div class="col-lg-12 text-center mb-3">
            <div class="fs-5">Carrera <span id="carrera_reprobacion" class="ms-2 fw-bold"></span></div>
            <div class="fs-5">Periodo <span id="periodo_reprobacion" class="ms-2 fw-bold"></span></div>
        </div>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-1">
                <h3 class="me-auto"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-circle-xmark overflow-hidden text-primary mx-auto mb-1"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5 justify-content-around" id="seccion_tabla_reprobacion_carrera">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_rep_carrera">
                    <thead>
                        <tr class="text-center small">
                            <th scope="col">Materia</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Aprobaron</th>
                            <th scope="col">Indice aprobación</th>
                            <th scope="col">Reprobaron</th>
                            <th scope="col">Indice Reprobación</th>
                            <th scope="col">Desertaron</th>
                            <th scope="col">Indice Decersion</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_rep_carrera">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar_rep_carrera">Regresar</button>
        </div>
    </div>
</div>
<!---------------------Seccion Materias reprobadas--------------------------------->
<div class="container my-5 d-none" id="seccion_materias_rep">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <div class="fs-4">Alumnos reprobados por carrera</div>
            <!-- Aqui se coloca el periodo que se escogio  -->
            <div class="fs-5">Periodo <span id="periodo_materias_rep" class="fs-5 ms-2"></span></div>
        </div>
    </div>
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-xmark overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_alumnos_rep">
                    <thead>
                        <tr class="text-center small">
                            <th scope="col">Carrera</th>
                            <th scope="col">Ninguna materia</th>
                            <th scope="col">1 materia</th>
                            <th scope="col">2 materias</th>
                            <th scope="col">3 materias</th>
                            <th scope="col">4 materias</th>
                            <th scope="col">5 materias</th>
                            <th scope="col">5 materias o más</th>
                            <th scope="col">Porcentaje de reprobación</th>
                            <th scope="col">Total</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_alumnos_rep">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar_alumnos_rep">Regresar</button>
        </div>
    </div>
</div>
<!---------------------Seccion Promedio de calificaciones--------------------------------->
<div class="container my-5 d-none" id="seccion_promedio">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <div class="fs-4">Promedio de calificaciones</div>
            <!-- Aqui se coloca el periodo que se escogio  -->
            <div class="fs-5">Periodo <span id="periodo_promedio" class="fs-5 ms-2"></span></div>
        </div>
    </div>
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-chart-bar overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_promedios">
                    <thead>
                        <tr class="text-center small">
                            <th scope="col">Carrera</th>
                            <th scope="col">1°</th>
                            <th scope="col">2°</th>
                            <th scope="col">3°</th>
                            <th scope="col">4°</th>
                            <th scope="col">5°</th>
                            <th scope="col">6°</th>
                            <th scope="col">7°</th>
                            <th scope="col">8°</th>
                            <th scope="col">9°</th>
                            <th scope="col">10°</th>
                            <th scope="col">11°</th>
                            <th scope="col">12°</th>
                            <th scope="col">>12°</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_promedios">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_regresar_alumnos_promedio">Regresar</button>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>dep/consultas/estadisticas.controller.js"></script>