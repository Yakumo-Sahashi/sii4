<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">CREACIÓN DE EMPLEADO</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('creacion_empleado') ?>">CREACIÓN DE EMPLEADOS</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0">
    <div class="row justify-content-around">
        <div class="col">
            <div class="progress mt-4">
                <div id="progreso-form" class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>
<div class="container p-3">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <form id="frm_creacion_empleado" enctype="multipart/form-data" method="POST">
                <div id="identificacion"></div>
                <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_creacion_empleado") ?>" hidden>
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 id="form-part" class="me-auto mb-4"></h3>
                    <div class="col-lg-2 col-md-12 align-self-end text-center">
                        <div class="float-center mb-3">
                            <span type="button"><img id="img_foto" class="thumb" src="public/img/user.png" title="fotografia" alt="fotografia"></span>
                            <div class="btn-group-vertical mb-5 mx-0 px-0">
                                <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <div class="form-floating mt-4">
                            <input type="text" id="rfc_empleado" name="rfc_empleado" class="form-control" placeholder="RFC">
                            <label for="rfc_empleado" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>RFC</label>
                        </div>
                    </div>
                </div>
                <div>
                    <?php include_once 'includes/form_part_uno.php' ?>
                    <?php include_once 'includes/form_part_dos.php' ?>
                    <?php include_once 'includes/form_part_tres.php' ?>
                    <div class="d-flex flex-row gap-2 my-3 justify-content-end w-100">
                        <?php if ($_GET['view'] == "listado_alumno") : ?>
                            <button type="button" id="cancelar_edicion" class="btn btn-danger mt-2">Cancelar</button>
                        <?php endif ?>
                        <button type="button" id="atras" class="btn btn-secondary mt-2 text-white">Atras</button>
                        <button type="button" id="siguiente" class="btn btn-primary mt-2">Siguiente</button>
                        <button type="button" id="crear_empleado" class="btn btn-primary mt-2">Crear Empleado</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>rh/personal/creacion_personal.controller.js"></script>