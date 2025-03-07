<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">NUMEROS DE CONTROL</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir($_GET['view'])?>">NUMEROS DE CONTROL</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0">
    <div class="row justify-content-around py-5">
        <div class="col-md-12 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex flex-column align-items-center">

                        <h3 class="d-block d-sm-none d-sm-block d-md-none">Agosto-Diciembre 2021</h3>
                        <h3 class="d-none d-sm-block d-md-none">Agosto-Diciembre 2021</h3>

                        <form id="frm_aprobar_ctrl">
                            <input type="text" id="id_solicitud" name="id_solicitud" hidden>
                            <input type="text" id="num_ctrl" name="num_ctrl" hidden>
                            <input type="text" id="anio_ctrl" name="anio_ctrl" hidden>
                            <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_aprobar_ctrl")?>" hidden>
                            <label for="num_matriculas">Cantidad</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                <input readonly type="text" class="form-control" id="num_matriculas" name="num_matriculas" aria-describedby="textHelp">
                                
                            </div>
                            
                            <div class="d-grid gap-3 mt-3">
                                <button type="button" class="btn btn-outline-primary btn-acad btn-block" id="btn_generar" name="btn_generar"><i class="fas fa-plus-circle"></i> Generar Vista Previa</button>
                                <button type="button" class="btn btn-outline-success btn-acad btn-block" id="btn_aprobar" name="btn_aprobar"><i class="fas fa-check"></i> Aprobar</button>
                                <button type="button" class="btn btn-outline-danger btn-acad btn-block" id="btn_rechazar" name="btn_rechazar"><i class="fas fa-times"></i> Rechazar</button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="col-md-6 overflow-auto auth-table mt-4" style="max-height: 45vh;">
                        <table id="tabla_num_ctrl" class="table table-info table-striped table-hover table-bordered table-sm table-responsive-sm text-center">
                            <thead>
                                <tr class="sticky-top">
                                    <th scope="col">Numeros de Control</th>
                                    <th scope="col">Fecha de Generacion</th>
                                </tr>
                            </thead>
                            <tbody id="previo_control">

                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12">
                                <table id="tabla_solicitud_datos" class="table table-hover table-sm table-responsive-lg mt-3">
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
                                    <tbody id="tabla_datos">
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="dashboard" class="btn btn-flotante"><i class="fa-solid fa-arrow-rotate-left"></i></a>

<script src="<?= CONTROLLER ?>/acad/tabla_solicitud.controller.js"></script>
<script src="<?=CONTROLLER?>/acad/aprobar_ctrl.controller.js"></script>

<!-- 
    1.- form -> id="frmAprobarCtrl
    2.- input -> id="tk_form" name="tk_form"
    3.- input -> id="funcion" name="funcion"
    4.- input -> id="id_solicitud" name="id_solicitud"
    5.- input -> id="num_ctrl" name="num_ctrl"
    6.- input -> id="anio_ctrl" name="anio_ctrl"
    7.- input -> id="num-matriculas" name="num-matriculas"
    8.- button -> id="btn_generar" name="btn_generar"
    9.- button -> id="btn_aprobar" name="btn_aprobar"
    10.- button -> id="btn_rechazar" name="btn_rechazar"
    11.- table -> id="tabla-numCtrl"
 -->
