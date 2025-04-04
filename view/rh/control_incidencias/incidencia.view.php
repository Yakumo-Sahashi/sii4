<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">CONSULTAS DE INCIDENCIAS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('incidencia') ?>">CONSULTAS DE INCIDENCIAS</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Consulta de incidencias</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_consulta_incidencia" name="frm_consulta_incidencia">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta_incidencia") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_de_periodo" id="seleccion_de_periodo" class="form-select">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="seleccion_de_periodo" class="text-primary text-small"><i class="fa-solid fa-user-clock me-2"></i>Seleccion del periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                        <label for="fecha" class="text-primary text-small"><i class="fa-regular fa-calendar-days me-2"></i>Fecha</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 text-center">
                    <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                    <button type="button" class="btn btn-primary" id="btn_buscar">Buscar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container" id="">
    <div class="row justify-content-around py-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_justificar_incidencia">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Fecha de incidencia</th>
                            <th scope="col">Descripción de incidencia</th>
                            <th scope="col">Borrar</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_justificar_incidencia">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>