<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Actualizacion de horario y grupo</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('actualizar_horario_grupo') ?>">Actualizacion de horario y grupo</a></li>
        </ol>
    </nav>
</div>

<div class="container" id="lista_horarios_seleccion">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-users-line overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form class="row" id="frm_actualizar_horario_grupo" method="post">
        <div class="col">
            <div class="form-floating mb-3">
                <select class="form-select" id="carrera_reticula" name="carrera_reticula" aria-placeholder="Selecciona la carrea/reticula">
                    <option selected>Selecciona la carrea/reticula</option>
                </select>
                <label for="carrera_reticula" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera/Reticula</label>
            </div>
        </div>
       <!--  <div class="col">
            <div class="form-floating mb-3">
                <select class="form-select" id="periodo" name="periodo" aria-placeholder="Selecciona el periodo">
                    <option value="" selected>Selecciona el periodo</option>
                </select>
                <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
            </div>
        </div> -->
        <div class="col">
            <div class="form-floating mb-3">
                <select class="form-select" id="semestre" name="semestre" aria-placeholder="Selecciona el tipo">
                    <option value="0" selected>Todos</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
                <label for="semestre" class="text-primary"><i class="fa-solid fa-filter me-2"></i></i>Semestre</label>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row my-3">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row justify-content-around mt-5 d-none" id="tabla_horarios_m">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_horario_grupos">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Gpo</th>
                            <th scope="col">Cap</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo</th>
                            <th scope="col">Act.</th>
                            <th scope="col">Elim</th>
                        </tr>
                        <thead>
                        <tbody id="tabla_horario_grupos_contenido">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once 'editar_horario.view.php'; ?>

<script src="<?=CONTROLLER?>dep/mantenimiento/actualizarHorario.controller.js"></script>