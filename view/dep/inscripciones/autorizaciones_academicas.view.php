<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Autorizaciones académicas</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Mantenimiento</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Inscripciones</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Autorizaciones académicas</a></li>
        </ol>
    </nav>
</div>
<form action="" id="frm_consulta_autorizacion">
    <div class="container p-3 mt-5">
        <div class="row justify-content-center py-2">
            <h4 class="text-center mt-3 mb-5">Autorizaciones académicas</h4>
            <div class="col text-center">
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 class="me-auto mb-4"></h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center">
                        <div class="float-start">
                            <img class="thumb" src="public/img/user.png"></i>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <div class="form-floating mt-4">
                            <input type="text" class="form-control" name="num_ctrl" id="num_ctrl" placeholder="Numero de control">
                            <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-down-9-1 me-2"></i>Numero de control</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary" id="btn_aceptar">Consultar</button>
            </div>
        </div>
    </div>
</form>
<div class="container mt-5" id="autorizacion">
    <form id="frm_autorizaciones_academicas">
        <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_autorizaciones_academicas")?>" hidden>
        <div class="row justify-content-center">
            <div class="col-8">
                <input type="text" id="fk_numero_control" name="fk_numero_control" hidden>
                <div class="form-floating mb-3">
                    <input class="form-control" id="nombre_alumno" name="nombre_alumno" disabled>
                    <label for="nombre_alumno" class="text-primary"><i class="fa-regular fa-circle-check me-2"></i>Se autoriza a:</label>
                </div>
                <input type="text" id="fk_periodo" name="fk_periodo" hidden>
                <div class="form-floating mb-3">
                    <input class="form-control" id="periodo" name="periodo" readonly>
                    <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>En el periodo:</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-8">
                <div class="form-floating mb-3">
                    <select class="form-select" id="select_autorizacion" name="select_autorizacion">
                        <option selected>Seleccionar tipo</option>
                    </select>
                    <label for="select_autorizacion" class="text-primary"><i class="fa-regular fa-circle-check me-2"></i>Tipo de autorización:</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Motivo de autorización" id="motivo_autorizacion" name="motivo_autorizacion"></textarea>
                    <label for="motivo_autorizacion" class="text-primary"><i class="fa-solid fa-user-check me-2"></i>Motivo de autorización</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="atras">Atras</button>
                <button type="submit" class="btn btn-primary" id="btn_aceptar">Autorizar</button>
            </div>
        </div>
    </form>
    <div class="row justify-content-around" id="tabla_motivos">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_autorizaciones">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Alumno</th>
                            <th scope="col">Periodo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Motivo</th>                            
                        </tr>
                    <thead>   
                    <tbody id="tabla_contenido_autorizaciones">                        
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>dep/inscripciones/autorizacionesAcademicas.controller.js"></script>