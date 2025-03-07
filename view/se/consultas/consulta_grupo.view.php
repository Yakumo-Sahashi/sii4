<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Consulta de grupo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Consulta de grupo</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3">
    <div class="row">
        <div class="col text-center">
            <h4>Consulta de grupo</h4>
        </div>
    </div>
</div>
<form id="frm_consulta_grupo" class="row justify-content-around p-5">
    <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta_grupo")?>" hidden>
    <div class="col-lg-5 col-md-7 col-sm-12">
        <div class="form-floating mb-3">
            <select class="form-select" id="carrera" name="carrera">
                <option value="" selected>Seleccionar carrera</option>
            </select>
            <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-floating mb-3">
            <select class="form-select" id="carrera_periodo" name="carrera_periodo">
                <option value="" selected>Seleccionar Perido</option>
            </select>
            <label for="carrera_periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
        </div>
    </div>
    <div class="col-lg-3 col-md-5 col-sm-12">
        <div class="form-floating mb-3">
            <select class="form-select" id="carrera_semestre" name="carrera_semestre">
                <option value="0" selected>Todos</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            <label for="carrera_semestre" class="text-primary"><i class="fa-regular fa-chart-bar me-2"></i>Semestre</label>
        </div>
    </div>
    <div class="col my-5 text-center">
        <button type="submit" class="btn btn-primary" id="btn_consultar">Consultar</button>
        <!-- <button type="button" class="btn btn-secondary text-white disabled" id="btn_cancelar_consulta">Cancelar</button> -->
    </div>
</form>
<div class="container d-none" id="seccion_tabla_consulta">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_docente">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Gpo</th>
                            <th scope="col">Cap</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_consulta">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php //require_once 'includes_consulta_grupo/consulta_docente.view.php'?>
<?php //require_once 'includes_consulta_grupo/consulta_carrera.view.php'?>
<?php //require_once 'includes_consulta_grupo/consulta_departamento.view.php'?>
<!-- 
    FORMS
-
    BOTONES 
- btn_consulta_departamento
 -->
 <script src="<?= CONTROLLER ?>se/consultas/consulta_grupos.controller.js"></script>