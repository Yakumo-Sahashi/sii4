<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Creacion de numeros de control</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Creacion de numeros de control</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0">
    <div class="row">
       <!--  <div class="col-md-12 text-end">
            <h5 class="text-muted d-block">Periodo</h5>
            <h3 class="d-block">Agosto-Diciembre 2022</h3>
        </div> -->
    </div>
    <div class="row justify-content-around py-5">
        <div class="col-md-12 text-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 col-small-12 mb-4">
                        <form id="frm_num_ctrl" method="POST" class="form-grup mb-3 ml-3 mr-3 ">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_num_ctrl") ?>" hidden>
                                    <input type="text" id="estado_solicitud" name="estado_solicitud" value="" hidden>
                                    <input type="text" id="id_solicitud" name="id_solicitud" value="" hidden>
                                    <label for="rango_matriculas" class="form-label">Matriculas a solicitar</label>
                                    <div class="input-group mb-3 col-4">
                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                        <input type="text" class="form-control" id="num_matriculas" name="num_matriculas" aria-describedby="textHelp">
                                    </div>
                                    <div class="mt-2">
                                        <button id="enviar_solicitud" type="button" class="btn btn-primary"><i class="fas fa-share"></i> Enviar solicitud</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grid gap-3 mt-3">
                                        <div id="status_solicitud"> </div>
                                        <?php //include_once "view/se/includes/modal_numeros_control.php" ?>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around py-5">
        <div class="col col-md-12 text-center">
            <div class="container">
                <div class="row aling-items-center">
                    <div class="col col-md-12">
                        <table id="table_created_rooms" class="table table-hover table-sm table-responsive-lg mt-3" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        Se solicita
                                    </th>
                                    <th>
                                        Cantidad
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                    <th>
                                        Fecha Solicitud
                                    </th>
                                    <th>
                                        Fecha Atencion
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tabla_datos"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="<?= Router::redirigir('dashboard') ?>" class="btn btn-flotante"><i class="fa-solid fa-arrow-rotate-left"></i></a>
<script src="<?= CONTROLLER ?>se/tabla_solicitud.controller.js"></script>
<script src="<?= CONTROLLER ?>se/numeros_ctrl.controller.js"></script>


<!-- 
    1.- Form -> id="frmNumCtrl"
    2.- Input -> id="funcion" name="funcion"
    3.- Input -> id="estado-solicitud" name="estado-solicitud"
    4.- Input -> id="id-solicitud" name="id-solicitud"
    5.- Datalist -> id="tickmarks"
    6.- Button -> id="enviar_solicitud"
    7.- Button -> id="cancelar-solicitud"
    8.- Button -> id="status-solicitud"
    9.- Table -> id="tablaDatos"
    10.- Input -> id="tk_form" name="tk_form"
 -->