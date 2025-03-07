<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Ajuste de capacidad de grupos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('inscripciones') ?>">Inscripciones</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Ajuste de capacidad de grupos</a></li>
        </ol>
    </nav>
</div>
 <div class="container">
    <div class="row">
        <div class="col text-primary text-center">
            <h5 class="my-5"> Actualizar capacidad de grupo</h5>
        </div>
    </div>
    <form action="" id="frm_grupo" name="frm_grupo">
        <!-- <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_grupo") ?>" hidden> -->
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera" name="carrera">
                        <option value="" selected>Seleccionar carrera</option>
                    </select>
                    <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo" name="periodo">
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="semestre" name="semestre">
                        <option value="0">Todos los semestres</option>
                        <?php
                            for($i=1; $i<13; $i++){
                                echo "<option value=".$i.">".$i."</option>";
                            }
                        ?>
                    </select>
                    <label for="semestre" class="text-primary"><i class="fa-solid fa-bars-staggered me-2"></i>Semestre</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button type="button" class="btn btn-primary mt-3" id="btn_aceptar">Aceptar</button>
            </div>
        </div>
    </form>
</div>
<div class="container my-5" id="seccion_tabla_grupos">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="">
                    <thead>
                        <tr class="text-center small">
                            <th scope="col">Materia</th>
                            <th scope="col">Gpo</th>
                            <th scope="col">Excl Car</th>
                            <th scope="col">Inscritos</th>
                            <th scope="col">Cap</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo de</th>
                            <!-- <th scope="col">Actualizar capacidad</th> -->
                        </tr>
                        <thead>
                        <tbody id="tabla_alumno">
                            <tr>
                                <th data-bs-toggle="modal" data-bs-target="#modal_actualizar_grupo">Ejemplo</th>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL ACTUALIZAR CAPACIDAD -->
<div class="modal fade" id="modal_actualizar_grupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="modal-dialog" action="" id="frm_act_capacidad" name="frm_act_capacidad">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar capacidad del grupo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_act_capacidad") ?>" hidden>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="materia" name="materia" value="" disabled>
                            <label for="materia" class="text-primary"><i class="fa-solid fa-book me-2"></i>Materia</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="grupo" name="grupo" value="" disabled>
                            <label for="grupo" class="text-primary"><i class="fa-solid fa-user-group me-2"></i>Grupo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="capacidad_anterior" name="capacidad_anterior" value="" disabled>
                            <label for="capacidad_anterior" class="text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Capacidad anterior</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nueva_capacidad" name="nueva_capacidad">
                            <label for="nueva_capacidad" class="text-primary"><i class="fa-solid fa-arrow-up-1-9 me-2"></i>Nueva capacidad</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_act_capacidad">Actualizar</button>
            </div>
        </div>
    </form>
</div>

<script src="<?=CONTROLLER?>dep/inscripciones/ajusteCapacidadGrupo.controller.js"></script>