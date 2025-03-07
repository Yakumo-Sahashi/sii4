<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Impresion de Horarios por carrera</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Impresion</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Horario por carrera</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-5">
    <form action="app/docs/horario.doc.php" method="post" target="_blank">
        <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_horario_carrera")?>" hidden>
        <div class="row justify-content-center py-2">
            <div class="col text-center">
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 class="me-auto mb-4"></h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center">
                        <div class="float-start mb-3">
                            <img class="thumb fa-regular fa-clock text-primary"></i>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="periodo" name="periodo" placeholder="Periodo">
                                <option selected>Selecciona el periodo</option>
                            </select>
                            <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="carrera" name="carrera" placeholder="Carrea">
                                <option selected>Selecciona la carrea</option>
                            </select>
                            <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col text-center">
                <!-- <a href="<?=Router::redirigir('')?>" class="btn btn-danger me-2">Cancelar</a> -->
                <button type="submit" class="btn btn-primary" id="btn_aceptar">Aceptar</button>
            </div>
        </div>
    </form>
</div>

<script src="<?=CONTROLLER?>dep/impresion/impresionHorario.controller.js"></script>