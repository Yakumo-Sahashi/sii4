<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Alumnos egresados</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Alumnos egresados</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-5">
    <div class="row">
        <div class="col text-center">
            <h4>Consulta de alumnos egresados en un periodo</h4>
        </div>
    </div>
</div>
<div class="container p-5">
    <form id="frm_alumnos_egresados" method="POST">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo" name="periodo">
                        <option selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating">
                    <select class="form-select" id="carrera" name="carrera">
                        <option value="0">Todas</option>
                    </select>
                    <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col my-5 text-center">
                <button type="submit" class="btn btn-primary" id="btn_consultar">Consultar</button>
            </div>
        </div>
    </form>
</div>
<div class="container" id="container_tabla">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_egresados">
                    <thead>
                        <tr class="text-center">
                            <th>No. control</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Promedio</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_egresados">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="<?= CONTROLLER ?>se/alumnos_egresados/alumnos_egresados.controller.js"></script>
</div>
<!-- 
    FORMS 
- frm_alumnos_egresados

    BOTONES
- btn_consultar
 -->