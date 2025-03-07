<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Residencias</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('residencias') ?>">Residencias</a></li>
        </ol>
    </nav>
</div>
<div class="container" id="">
    <div class="row justify-content-center py-2">
        <!-- Titutlo incompleto por falta de info en la documentacion -->
        <h4 class="text-center mt-3 mb-4">Captura / Modificacion de información para residencias</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-file-lines overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Numero de control">
                <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-up-1-9 me-2"></i>Numero de control</label>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col text-center">
            <!-- <a href="<?= Router::redirigir('')?>" class="btn btn-secondary text-white" >Cancelar</a> -->
            <button type="button" class="btn btn-primary" id="btn_aceptar">Aceptar</button>
        </div>
    </div>
</div>


<!-- Id's de la vista


    -Inputs
        num_ctrl

    -Btn
        btn_aceptar
-->
