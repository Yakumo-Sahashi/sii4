<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">MODIFICAR Y ELIMINAR REGISTRO DE EMPLEADOS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('modificar_eliminar_registro') ?>">MODIFICAR Y ELIMINAR REGISTRO DE EMPLEADOS</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Modificar y eliminar registro de empleado</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_registro_empleados">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Tipo de trabajador</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_registro_empleados">
                            <tr>
                                <td>ejemplo</td>
                                <td>ejemplo</td>
                                <td>ejemplo</td>
                                <td>ejemplo</td>
                                <td>ejemplo</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_modificar">
                                        Launch demo modal
                                    </button>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/modal_modificar_eliminar_registro.php'; ?>
<script src="<?= CONTROLLER ?>rh/personal/modificar_eliminar_personal.controller.js"></script>