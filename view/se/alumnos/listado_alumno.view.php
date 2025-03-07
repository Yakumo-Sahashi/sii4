<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary"><?=$letrero = $_GET['view']=="listado_alumno" ? "Listado de alumnos" : "CREACION DE ALUMNOS";?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir($_GET['view'])?>"><?=$letrero?></a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 my-5" id="listado_info">
    <div class="row justify-content-around py-5">
        <div class="col-md-3">
            <div class="form-floating">
                <select name="carrera" class="form-select">
                    <option value="0">Todas</option>
                    <option value="1">Ingeniería en Gestión Empresarial</option>
                    <option value="2">Ingeniería Industrial</option>
                    <option value="3">Ingeniería en Sistemas Computacionales</option>
                </select>
                <label for="carrera" class="text-primary"><i class="fa-solid fa-filter me-2"></i>Filtrar por carrera</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <select name="semestre" class="form-select">
                    <option value="0">Todos</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <label for="semestre" class="text-primary"><i class="fa-solid fa-layer-group me-2"></i>Filtrar por semestre</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <select name="control" class="form-select">
                    <option value="0">Todos</option>
                   <?php
                    $year = date("Y");
                    $year = $year.'';
                    $digito = $year[2].$year[3];
                    for($i = 13; $i <= intval($digito); $i++):?>
                    <option value="20<?=$i?>"><?=$i?>1190000</option>
                    <?php endfor?>
                </select>
                <label for="control" class="text-primary"><i class="fa-solid fa-list-ol me-2"></i>Filtrar por No. Control</label>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_listado_alumno">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Fotografia</th>
                            <th scope="col">No. Control</th>
                            <th scope="col">Nombre(s)</th>
                            <th scope="col">Ap. Paterno</th>
                            <th scope="col">Ap. Materno</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Semestre</th>                            
                            <th scope="col">Editar</th>
                            <!-- <th scope="col">Borrar</th> -->
                        </tr>
                    <thead>   
                    <tbody id="tabla_alumno">                        
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>se/listado_alumno/listado_alumnos.controller.js"></script>
<div id="editar_info" hidden>
   <?php
        require_once './view/se/alumnos/creacion_alumnos.view.php';
    ?> 
</div>
