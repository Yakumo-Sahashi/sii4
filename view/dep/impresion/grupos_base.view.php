<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Grupos base</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Impresion</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Grupos base</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-5">
    <form action="" id="frm_grupo_base" name="frm_grupo_base">
        <!-- <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_grupo_base")?>" hidden> -->
        <div class="row justify-content-center py-2">
            <div class="col text-center">
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 class="me-auto mb-4"></h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center">
                        <div class="float-start mb-5">
                            <img class="thumb fa-solid fa-user-group text-primary overflow-hidden"></i>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <!-- <div class="form-floating mb-3">
                            <select class="form-select" id="periodo" name="periodo" aria-placeholder="Periodo">
                                <option selected>Seleccionar periodo</option>
                            </select>
                            <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="tipo" name="tipo" aria-placeholder="Selecciona el tipo">
                                <option selected>Seleccionar tipo</option>
                            </select>
                            <label for="tipo" class="text-primary"><i class="fa-solid fa-filter me-2"></i></i>Tipo</label>
                        </div> -->
                        <div class="form-floating mb-3 mt-3">
                            <select class="form-select" id="carrera" name="carrera" aria-placeholder="Selecciona la carrea">
                                <option selected>Seleccionar carrea</option>
                            </select>
                            <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col text-center">
                <!-- <a href="<?=Router::redirigir('')?>" class="btn btn-danger me-2">Cancelar</a> -->
                <!-- <button type="submit" class="btn btn-primary" id="btn_aceptar">Aceptar</button> -->
            </div>
        </div>
    </form>
    <div class="row justify-content-around mt-5">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_grupos">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Nombre Materia</th>
                            <th scope="col">Nombre docente</th>
                            <th scope="col">Capacidad Grupo</th>
                            <th scope="col">Alumnos Inscritos</th>
                            <th scope="col">Disponibilidad</th>                            
                        </tr>
                    <thead>   
                    <tbody id="tabla_contenido_grupos">                        
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?=CONTROLLER?>dep/impresion/grupoBase.controller.js"></script>