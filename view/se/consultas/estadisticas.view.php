<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Estadisticas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Estadisticas</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3">
    <div class="row">
        <div class="col text-center">
            <h4>Índice de reprobación de materias</h4>
        </div>
    </div>
</div>
<div class="container p-5">
    <form action="" id="frm_estadisticas">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating">
                    <select class="form-select" id="carrera" name="carrera">
                        <option value=" " selected>Seleccionar carrera</option>
                    </select>
                    <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating">
                    <select class="form-select" id="periodo" name="periodo">
                        <option value=" " selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col my-5 text-center">
                <button class="btn btn-primary" type ="submit" id="btn_consultar">Consultar</button>
            </div>
        </div>
    </form>
</div>
<div class="container" id="container_tabla">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_estadisticas">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Cursaron</th>
                            <th scope="col">Aprobaron</th>
                            <th scope="col">Indice Aprobacion</th>
                            <th scope="col">Reprobaron</th>
                            <th scope="col">Indice reprobacion</th>
                            <th scope="col">Decersion</th>
                            <th scope="col">Indice decersion</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_estadisticas">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>se/consultas/estadisticas.controller.js"></script>