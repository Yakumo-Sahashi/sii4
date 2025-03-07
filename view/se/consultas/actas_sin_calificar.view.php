<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Actas sin calificar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Actas sin calificar</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3">
    <div class="row">
        <div class="col text-center">
            <h4>Consulta de actas sin calificar</h4>
        </div>
    </div>
</div>
<div class="container p-5">
    <form action="" id="frm_actas">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating">
                    <select class="form-select" id="periodo" name="periodo">
                        <option selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating">
                    <select class="form-select" id="tipo" name="tipo">
                        <option value="" selected>Seleccionar tipo</option>
                        <option value="1">Curso normal</option>
                        <option value="2">Examenes especiales</option>
                    </select>
                    <label for="tipo" class="text-primary"><i class="fa-solid fa-filter me-2"></i>Tipo</label>
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
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_actas">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Profesor</th>
                            <th scope="col">Area</th>
                        </tr>
                        <thead>
                        <tbody id="cotenido_tabla_actas">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- 
    FORMS 
- frm_actas
- btn_consultar

    BOTONES 
- 
 -->
 <script src="<?=CONTROLLER?>se/consultas/calificaciones_actas.controller.js"></script>