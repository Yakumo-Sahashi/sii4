<?php

use config\Router;
use config\Token;
use Illuminate\Support\Facades\Route;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Eliminar alumno</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('eliminar_alumno') ?>">Eliminar alumno</a></li>
        </ol>
    </nav>
</div>
<div class="container my-3">
    <div class="row justify-content-center py-2">
        <div class="small mt-3 mb-5 text-muted">Es solo borrado del alumno, las bajas se manejan en la opción <a href="">Baja alumnos</a></div>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-xmark overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_eliminar_alumno" name="frm_eliminar_alumno" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_eliminar_alumno") ?>" hidden>
        <div class="row mt-3 justify-content-center">
            <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="num_ctrl" placeholder="Numero de control">
                    <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-up-1-9 me-2"></i>Numero de control</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col text-center">
                <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white me-2">Cancelar</a>
                <button type="button" class="btn btn-primary" id="btn_eliminar">Eliminar</button>
            </div>
        </div>
    </form>
</div>