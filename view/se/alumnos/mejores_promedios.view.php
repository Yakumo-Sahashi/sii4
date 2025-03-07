<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Mejores Promedio</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Mejores Promedios</a></li>
        </ol>
    </nav>
</div>

<div class="container p-3 mt-4">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <form action="" id="frm_mejores_promedios" name="frm_mejores_promedios">
                <div class="row d-md-flex justify-content-center mb-4">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" id="periodo" name="periodo">
                                <option value="" selected>Seleccionar Periodo</option>
                                <option value="1">2000/2002</option>
                            </select>
                            <label for="periodo" class="text-primary"><i class="fa-solid fa-calendar-minus me-2"></i>Periodo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" id="tipo" name="tipo">
                                <option value="" selected>Seleccionar el tipo</option>
                                <option value="1">Por promedio general</option>
                                <option value="2">Por semestre</option>
                            </select>
                            <label for="tipo" class="text-primary"><i class="fa-solid fa-bars me-2"></i>Tipo</label>
                        </div>
                    </div>
                </div>
                <div class="row d-md-flex justify-content-center mb-4">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" id="carrera" name="carrera">
                                <option value="" selected>Seleccionar carrera</option>
                                <option value="1">Sistemas</option>
                            </select>
                            <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                        </div>
                    </div>
                </div>
                <div class="row d-md-flex justify-content-center mb-4">
                    <div class="col-4 mt-5">
                        <button class="btn btn-primary" type="submit" id="btn_consultar">Consultar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container p-3" id="listado_mejores_promedios">
    <div class="row justify-content-center py-2">
        <div class="col">
            <h4 class="text-center">Mejores promedios</h4>
        </div>
    </div>
    <div class="row justify-content-around my-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_promedios">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No. Control</th>
                            <th scope="col">Alumno</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Promedio</th>
                        </tr>
                    <thead>
                    <tbody id="tabla_listado_promedios">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <div class="row justify-content-end">
        <div class="col-4 text-center">
            <div class="text-lighter mb-4">Exportar como:</div>
            <button class="btn btn-danger" id="btn-pdf" name="btn-pdf"><i class="fa-solid fa-file-pdf me-2"></i>PDF</button>
            <button class="btn btn-success" id="btn-excel" name="btn-excel"><i class="fa-solid fa-file-excel me-2"></i>EXCEL</button>
        </div>
    </div> -->
</div>
<script src="<?=CONTROLLER?>se/mejores_promedios/mejores_promedios.controller.js"></script>
<!-- 
    FORMS 
- frm_mejores_promedios
- 
    BOTONES
- btn-pdf
- btn-excel
- btn-consultar
 -->