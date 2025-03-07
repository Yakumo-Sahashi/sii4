<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">REPORTE DE PLAZAS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('plazas_reporte') ?>">REPORTE DE PLAZAS</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Personal registrado</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_seleccion_personal_registrado" name="frm_seleccion_personal_registrado">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_seleccion_personal_registrado") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="seleccion_reporte_plaza" class="form-select">
                        <option value="" selected>Selecciona la plaza</option>
                    </select>
                    <label for="seleccion_reporte_plaza" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selecciona la plaza</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="seleccion_tiempo_trabajo" class="form-select">
                        <option value="" selected>Selecciona el tiempo</option>
                    </select>
                    <label for="seleccion_tiempo_trabajo" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selecciona el tiempo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 mb-3">
                <div class="form-floating">
                    <select name="seleccion_concentado_personal" class="form-select">
                        <option value="" selected>Selecciona el concentrado</option>
                    </select>
                    <label for="seleccion_concentrado_personal" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selecciona el concentrado</label>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 text-center">
                    <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                    <button type="button" class="btn btn-primary" id="btn_buscar_plaza">Buscar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!--Esta sección se genera al utilizar el primer y segundo selector para hacer aparecer esta parte-->
<div class="container" id="seccion_tabla_categoria">
    <div class="row justify-content-around py-2">
        <div class="col">
            <h4 class="text-center mt-3 mb-5">Tabla por categoria</h4>
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_categoria">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">RFC</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">HRS</th>
                            <th scope="col">Total personal</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_categoria">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Esta seccion se genera al utilizar el primer y último select para que aparezca esta parte-->
<div class="container" id="seccion_tabla_concentrado">
    <div class="row justify-content-around py-2">
        <div class="col">
            <h4 class="text-center mt-3 mb-5">Tabla por concentrado</h4>
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_concentrado">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Categoría</th>
                            <th scope="col">Nombre de la categoría</th>
                            <th scope="col">Personal existente</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_concentrado">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>