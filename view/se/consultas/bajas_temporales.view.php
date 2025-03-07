<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Bajas temporales</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Bajas temporales</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3">
    <div class="row">
        <div class="col text-center">
            <h4>Bajas temporales del periodo en curso</h4>
        </div>
    </div>
</div>
<div class="container p-5">
    <form action="" id="frm_estadisticas">
        <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_estadisticas")?>" hidden>
        <div class="row d-flex justify-content-around">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating">
                    <select class="form-select" id="carrera" name="carrera">
                        <option value="" selected>Seleccionar carrera</option>
                    </select>
                    <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col my-5 text-center">
                <button class="btn btn-primary" id="btn_consultar">Consultar</button>
            </div>
        </div> -->
    </form>
</div>
<div class="container" id="container_tabla">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_estadisticas">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No. control</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ap. Paterno</th>
                            <th scope="col">Ap. Materno</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Tipo baja</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_estadisticas">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>se/consultas/bajas_temporales.controller.js"></script>
<!-- 
    FORMS 
- frm_estadisticas

    BOTONES
- btn_consultar

 -->