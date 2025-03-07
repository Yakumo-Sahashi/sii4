<?php

use config\Router;


require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">AVANCE RETICULAR</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('avance_reticular') ?>">AVANCE RETICULAR</a></li>
        </ol>
    </nav>
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
                        <input type="text" class="form-control small" id="nombre_alumno" name="nombre_alumno" value="" disabled>
                        <label for="nombre_alumno" class="small">Nombre del alumno</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="numero_control" name="numero_control" value="" disabled>
                        <label for="numero_control" class="small">Numero de control</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="semestre" name="semestre" value="" disabled>
                        <label for="floatingInputValue" class="small">Semestre</label>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center py-2">
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="periodo_escolar" name="periodo_escolar" value="" disabled>
                        <label for="periodo_escolar" class="small">Periodo escolar</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="carrera" name="carrera" value="" disabled>
                        <label for="carrera" class="small">Carrera</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="prom_acumulado" name="prom_acumulado" value="" disabled>
                        <label for="prom_acumulado" class="small">Prom. acumulado</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="especialidad" name="especialidad" value="" disabled>
                        <label for="especialidad" class="small">Especialidad</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="tabla_movimientos">
    <div class="row justify-content-around mt-1 mb-3">
        <div class="col text-center">
            <button type="button" class="btn btn-primary" id="btn_mostrar_horario">Mostrar horario</button>
        </div>
    </div>
    <div class="row justify-content-center p-0">
        <div class="col-4 col-lg-auto col-md-auto col-sm-auto p-0 mb-2 border">
            <div class="encabezado bg-primary text-white p-0 text-center">
                Semestre <br> 1
            </div>
            <div id="seccion_materias_1">
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

<div class="container mt-4" id="codigo_colores">
    <div class="row justify-content-center p-2">
        Codigos de colores:
    </div>
    <div class="row justify-content-center p-0">
        <div class="p-1 text-center border cuadricula text-small sin-scroll  bg-cuadricula-verde">
            <span class="align-middle">Acreditada</span>
        </div>
        <div class="p-1 text-center border cuadricula text-small sin-scroll text-white  bg-cuadricula-morado">
            <span class="align-middle">Seleccionada</span>
        </div>
        <div class="p-1 text-center border cuadricula text-small sin-scroll  bg-cuadricula-amarillo">
            <span class="align-middle">Cursada sin acreditar. Prioridad para seleccion</span>
        </div>
        <div class="p-1 text-center border cuadricula text-small sin-scroll  bg-warning">
            <span class="align-middle">A examen especial</span>
        </div>
        <div class="p-1 text-center border cuadricula text-small sin-scroll  bg-cuadricula-rojo">
            <span class="align-middle">Examen especial reprobado</span>
        </div>
        <div class="p-1 text-center border cuadricula text-small sin-scroll bg-cuadricula-none">
            <span class="align-middle">Materia no dispobible en semestre</span>
        </div>
        <div class="p-1 text-center border cuadricula text-small sin-scroll  bg-cuadricula-azul">
            <span class="align-middle">Materia libre para seleccionar</span>
        </div>
        <div class="p-1 text-center border cuadricula text-small sin-scroll  bg-withe">
            <span class="align-middle">Materia no permitida hasta avance</span>
        </div>
    </div>
</div>

<div class="modal fade" id="materias_selecionadas_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <form class="modal-content" action="app/docs/horario_alumno.doc.php" method="post" target="_blank">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Vista previa horario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <div class="modal-body">
                    <input type="text" value="" id="alumno" name="alumno" hidden>
                    <div class="row justify-content-around mt-1 mb-3">
                        <div class="col-md-12 text-center mb-3">
                            <h3>Materias seleccionadas</h3>
                        </div>
                        <div class="col text-center">
                            <input type="text" value="" name="id_hr_alumno" id="id_hr_alumno" hidden>
                            <input type="text" value="" name="id_hr_carrera" id="id_hr_carrera" hidden>
                            <div class="table-responsive">
                                <table class="table table-sm table-responsive-lg table-striped table-hover table-bordered border-light">
                                    <thead class="text-center fw-bolder bg-primary text-white">
                                        <tr class="bg-primary text-white">
                                            <th>Materia</th>
                                            <th>Gpo</th>
                                            <th>Cr</th>
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miércoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                            <th>Sábado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="horario_alumno" class="text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="btn_imprimir_horario"><i class="fa-solid fa-print"></i> Imprimir</button>
            </div>
        </form>
    </div>
</div>

<script src="<?=CONTROLLER?>alumno/informacion_escolar/avance_reticula.controller.js"></script>