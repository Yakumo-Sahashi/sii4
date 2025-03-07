<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">PERSONAL POR CATEGORÍA</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('personal') ?>">PERSONAL</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('personal_categoria') ?>">PERSONAL POR CATEGORÍA</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Personal por categoría</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_seleccion_categoria" name="frm_seleccion_categoria">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_seleccion_categoria") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_categoria_personal" class="form-select">
                        <option value="" selected>Selecciona la categoría</option>
                    </select>
                    <label for="seleccion_categoria_personal" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selecciona la categoría</label>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 text-center">
                    <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                    <button type="button" class="btn btn-primary" id="btn_buscar_categoria">Buscar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-----------------Esta sección se genera a partir de seleccionar la categoría y dar clic en el btn buscar------------------------>
<div class="container" id="seccion_tabla_personal">
    <div class="row justify-content-around py-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_personal_categoria">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">Sub-Unidad</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Diagonal</th>
                            <th scope="col">Horas</th>
                            <th scope="col">Desde</th>
                            <th scope="col">Hasta</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_personal_categoria">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= CONTROLLER ?>rh/reportes_personal/persona/personal_categoria.controller.js"></script>