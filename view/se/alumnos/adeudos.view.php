<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Adeudos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('adeudos') ?>">Adeudos</a></li>
        </ol>
    </nav>
</div>
<div class="container" id="botones">
    <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 my-3">
        <div class="col">
            <span class="btn w-100 p-0" id="btn_registrar_adeudo">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-file-signature fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3 ">Registrar</span>
                    </div>
                </div>
            </span>
        </div>
        <div class="col">
            <span class="btn w-100 p-0" id="btn_consultar_adeudo">
                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-sack-xmark fa-4x mx-auto d-block"></i>
                        <span class="d-block mt-3 ">Consultar y eliminar</span>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>

<div class="container d-none" id="seccion_registrar">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Registrar adeudo</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-file-signature overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_registro_adeudo" name="frm_registro_adeudo">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_registro_adeudo") ?>" hidden>
        <div class="row p-4">
            <div class="col-lg-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="num_ctrl_registro" name="num_ctrl_registro" placeholder="Numero de control" value="">
                    <label for="num_ctrl_registro" class="text-primary"><i class="fa-solid fa-arrow-up-1-9 me-2"></i>Numero de control</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo_registro" name="periodo_registro">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo_registro" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- NOTA: No se colocaron las opciones de este select ya que en la docuemntacion no se especifican -->
                <div class="form-floating mb-3">
                    <select class="form-select" id="tipo_adeudo" name="tipo_adeudo">
                        <option value="" selected>Seleccionar tipo de adeudo</option>
                        <option value="Biblioteca">Biblioteca</option>
                        <option value="Escolares">Escolares</option>
                        <option value="Financieros">Financieros</option>
                    </select>
                    <label for="tipo_adeudo" class="text-primary"><i class="fa-solid fa-filter-circle-dollar me-2"></i>Tipo de adeudo</label>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Observaciones" id="observaciones" name="observaciones"></textarea>
                    <label for="observaciones" class="text-primary"><i class="fa-solid fa-comment-dollar me-2"></i>Observaciones</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="btn_cancelar_registro">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_registrar_adeudo">Registrar</button>
            </div>
        </div>
    </form>
</div>

<form class="container d-none" id="seccion_consultar_adeudo" method="post">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Consultar y eliminar adeudo</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-sack-xmark overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="form-floating mb-5">
                <input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Numero de control" value="">
                <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-up-1-9 me-2"></i>Numero de control</label>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_canc_consulta">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btn_consultar_adeudo">Consultar</button>
        </div>
    </div>
</form>
<div class="container my-4 d-none" id="seccion_adeudo">
    <div class="row">
        <div class="col">
            <h5>Adeudos del alumno</h5>
        </div>
    </div>
    <div class="row justify-content-center d-md-flex py-2">
        <div class="col-lg-2 mt-4 text-center">
            <img id="crop-image" class="thumb img-perfil-usuario overflow-hidden mb-5" src=""></i>
        </div>
        <div class="col-lg-10">
            <div class="row justify-content-center mt-4 py-2">
                <div class="col-lg-6 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="nombre_alumno" name="nombre_alumno" value="" disabled>
                        <label for="nombre_alumno" class="small">Nombre del alumno</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="numb" class="form-control small" id="numero_control" name="numero_control" value="" disabled>
                        <label for="numero_control" class="small">Numero de control</label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="form-floating mb-3">
                        <input type="numb" class="form-control small" id="semestre" name="semestre" value="" disabled>
                        <label for="floatingInputValue" class="small">Semestre</label>
                    </div>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-lg-4 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="periodo_escolar" name="periodo_escolar" value="" disabled>
                        <label for="periodo_escolar" class="small">Periodo escolar</label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="carrera" name="carrera" value="" disabled>
                        <label for="carrera" class="small">Carrera</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="prom_acumulado" name="prom_acumulado" value="" disabled>
                        <label for="prom_acumulado" class="small">Prom. acumulado</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="especialidad" name="especialidad" value="" disabled>
                        <label for="especialidad" class="small">Especialidad</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_adeudo">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Periodo</th>
                            <th scope="col">Tipo de adeudo</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla_adeudo">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col text-end">
            <span type="button" id="btn_canc_lista" class="btn btn-secondary text-white">Cancelar</span>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>se/adeudos/adeudos.controller.js"></script>