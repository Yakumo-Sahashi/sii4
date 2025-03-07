<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Alumnos inscritos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i
                        class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Alumnos inscritos</a>
            </li>
        </ol>
    </nav>
</div>
<div id="buscador">
    <div class="container p-3">
        <div class="row">
            <div class="col text-center">
                <h4>Listado de alumnos inscritos</h4>
            </div>
        </div>
    </div>
    <div class="container p-5">
        <form action="" id="frm_actas">
            <div class="row d-flex justify-content-around">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating">
                        <select class="form-select" id="carrera" name="carrera">
                            <option value="" selected>Seleccionar carrera</option>

                        </select>
                        <label for="carrera" class="text-primary"><i
                                class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="periodo" name="periodo">
                            <option selected>Seleccionar periodo</option>

                        </select>
                        <label for="periodo" class="text-primary"><i
                                class="fa-regular fa-calendar me-2"></i></i>Periodo</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col my-5 text-center">
                    <button class="btn btn-primary" type="submit" id="btn_consultar">Consultar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container d-none" id="container_tabla">
    <div class="row justify-content-around">
        <form method="POST" action="app/docs/excel_alumnos_inscritos.doc.php" class="col-12 text-center mb-3" target="_blank">
            <input type="text" name="carrera_imp" hidden>
            <input type="text" name="periodo_imp" hidden>
            <button type="button" class="btn btn-secondary text-white" id="btn_regresa_busqueda">Cancelar</button>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-file-excel me-2"></i>Descargar</button>
        </form>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_alumnos">
                    <thead>
                        <tr class="text-center">
                            <th>No. Control</th>
                            <th>Alumno</th>
                            <th>Semestre</th>
                            <th>Cr. Apr</th>
                            <th>Carga</th>
                            <th>Promedio</th>
                            <th>Generales</th>
                            <th>Reticula</th>
                            <th>Horario</th>
                        </tr>
                        <thead>
                        <tbody id="cotenido_tabla_alumnos">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid p-0 my-5 d-none" id="seccion_reticula">
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
                <div class="p-1 text-center border cuadricula text-small sin-scroll  bg-cuadricula-verde"
                    data-bs-toggle="modal" data-bs-target="#editar_materia_modal">
                    <div class="mt-1">

                    </div>
                </div>

                <!-- Estructura materia 2 (Para agregar una materia) -->
                <div class="p-1 text-center border cuadricula small sin-scroll " data-bs-toggle="modal"
                    data-bs-target="#agregar_materia_modal">
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
<div class="container mt-4 d-none" id="codigo_colores">
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
<!-- Modal -->
<div class="modal fade" id="datos_generales" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="datos_generalesLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="datos_generalesLabel">Información General</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="contenido_modal">
                <div class="row justify-content-center">
                    <div class="col-lg-2 text-center align-self-center">
                        <div class="mt-4">
                            <span type="button"><img id="img_foto" class="thumb mx-auto d-block"
                                    src="public/img/user.png" title="fotografia" alt="fotografia"></span>
                        </div>
                        <br>
                        <label for="">Fotografía</label>
                    </div>
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table
                                class="table able-md table-hover table-responsive-lg mt-3 table-bordered border-light text-center">
                                <tbody id="contenido_tabla_datos_alumno">
                            </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
    <script src="<?= CONTROLLER ?>se/consultas/alumnos_incritos.controller.js"></script>