<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<div class="container mb-4">
    <div class="row justify-content-center mt-3 mb-5">
        <div class="col-md-6 align-self-center">
            <h4 class="text-center pb-2">Listado de horarios y grupos</h4>
        </div>
        <div class="col-md-4 align-self-center">
            <div class="form-floating">
                <select class="form-select" id="carrera_horario" name="carrera_horario">
                    <option value="0">Todas</option>
                    <option value="1">Ingeniería en Gestión Empresarial</option>
                    <option value="2">Ingeniería Industrial</option>
                    <option value="3">Ingeniería en Sistemas Computacionales</option>
                </select>
                <label for="carrera_horario" class="text-primary"><i class="fa-solid fa-filter me-2"></i>Filtrar por carrera</label>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="table-responsive">
                <!--table-bordered border-primary-->
                <table class="table table-sm table-responsive-lg table-striped table-hover" id="table_created_rooms">
                    <thead class="text-center fw-bolder">
                        <th>Asignatura</th>
                        <th>Grupo</th>
                        <th>Hrs</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                        <th>Paralelo</th>
                    </thead>
                    <tbody id="tabla_horarios" class="text-center">
                        <tr>
                            <th>
                               <a href="<?= Router::redirigir('editar_horario') ?>">Ejemplo</a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>dep/horario_grupo/listado_horarios.controller.js"></script>