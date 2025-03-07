<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">PERIODOS LABORALES</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('vigencia_periodo') ?>">PERIODOS LABORALES</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Periodos laborales</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-plus overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_agregar_periodo" name="frm_agregar_periodo">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_agregar_periodo") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_de_periodo" class="form-select">
                        <option value="" selected>Selecciona el periodo</option>
                    </select>
                    <label for="seleccion_de_periodo" class="text-primary text-small"><i class="fa-solid fa-user-clock me-2"></i>Seleccion del periodo</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <input type="date" class="form-control" id="fecha_inical" name="fecha_inicial" placeholder="Fecha inicial">
                    <label for="fecha_inicial" class="text-primary text-small"><i class="fa-solid fa-clock me-2"></i>Fecha inicial</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <input type="date" class="form-control" id="fecha_final" name="fecha_final" placeholder="Fecha final">
                    <label for="fecha_final" class="text-primary text-small"><i class="fa-solid fa-clock me-2"></i>Fecha final</label>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 text-center">
                    <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                    <button type="button" class="btn btn-primary" id="btn_agregar_periodo">Agregar periodo</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="container" id="contenido_tabla_vigencia_periodos">
    <div class="row justify-content-around py-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_vigencia_periodos">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Periodo</th>
                            <th scope="col">Fecha inicial</th>
                            <th scope="col">Fecha final</th>
                            <th scope="col">Fecha inicial 2</th>
                            <th scope="col">Fecha final 2</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_vigencia_periodos">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>