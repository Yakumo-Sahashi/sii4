<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">PLAZAS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('plazas') ?>">PLAZAS</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Agregar modificar y eliminar plaza</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-plus overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="frm_asignar_plaza" name="frm_asignar_plaza">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_asignar_plaza") ?>" hidden>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="seleccion_personal" id="seleccion_personal" class="form-select">
                        <option value="" selected>Selecciona el personal</option>
                    </select>
                    <label for="seleccion_personal" class="text-primary text-small"><i class="fa-solid fa-id-card me-2"></i>Personal</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-3">
                <div class="form-floating">
                    <select name="selecccion_categoria" id="seleccion_categoria" class="form-select">
                        <option value="" selected>Selecciona la categoria</option>
                    </select>
                    <label for="seleccion_categoria" class="text-primary"><i class="fa-solid fa-book me-2"></i>Categoria</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <input type="text" readonly class="form-control small" id="diagonal" name="diagonal">
                    <label for="diagonal" class="small text-primary"><i class="fa-solid fa-list-ol me-2"></i></i>Diagonal</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <input type="text" readonly class="form-control small" id="unidad" name="unidad">
                    <label for="unidad" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Unidad</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <input type="text" readonly class="form-control small" id="sub_unidad" name="sub_unidad">
                    <label for="sub_unidad" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Sub-Unidad</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="form-floating">
                    <input type="text" readonly class="form-control small" id="horas" name="horas">
                    <label for="horas" class="small text-primary"><i class="fa-solid fa-clock me-2"></i>Horas</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col-lg-6 col-md-6 text-small mb-3">
                <div class="form-floating">
                    <select name="seleccion_estatus" class="form-select">
                        <option value="" selected>Selecciona el estatus</option>
                    </select>
                    <label for="seleccion_puesto" class="text-primary text-small"><i class="fa-solid fa-rectangle-ad me-2"></i>Estatus</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 text-small mb-3">
                <div class="form-floating">
                    <input type="text" readonly class="form-control small" id="efecto_iniciales" name="efectos_iniciales">
                    <label for="efectos_iniciales" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Efecto iniciales</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 text-small mb-3">
                <div class="form-floating">
                    <input type="text" readonly class="form-control small" id="efectos_finales" name="efectos_finales">
                    <label for="efectos_finales" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Efectos finales</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col mb-3 text-center">
                <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
                <button type="button" class="btn btn-primary" id="btn_asignar_plaza">Asignar</button>
            </div>
        </div>
    </form>
</div>
<div class="container mt-3">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_plazas">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Diagonal</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Sub-Unidad</th>
                            <th scope="col">Horas</th>
                            <th scope="col">Tipo de movimiento</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Efectos iniciales</th>
                            <th scope="col">Efectos finales</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_plazas">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_modificar_plaza"><i class="fa-regular fa-pen-to-square"></i></button></td>
                                <td></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/modal_plazas.php'; ?>
<script src="<?= CONTROLLER ?>rh/personal/plazas.controller.js"></script>