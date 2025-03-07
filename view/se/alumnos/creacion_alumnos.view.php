<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div class="<?=$letrero = $_GET['view']=="listado_alumno" ? "d-none" : "";?>">
    <h1 class="fs-4 fw-bold text-primary">Creacion de alumnos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir($_GET['view'])?>">Creacion de alumnos</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0">
    <div class="row justify-content-around">
        <div class="col">
            <div class="progress mt-4">
                <div id="progreso-form" class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
                    role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
</div>
<div class="container p-3">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <form id="frm_creacion_alumno"  enctype="multipart/form-data" method="POST">
                <div id="identificacion"></div>
                <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_creacion_alumno")?>" hidden>
                <div class="row d-md-flex justify-content-center mb-4"> 
                    <h3 id="form-part" class="me-auto mb-4"></h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center">
                        <div class="float-start mb-3">
                            <span type="button"><img id="img_foto" class="thumb" src="public/img/user.png" title="fotografia" alt="fotografia"></span>
                            <div class="btn-group-vertical mb-5 mx-0 px-0">
                                <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <input type="text" id="numero_control" name="numero_control" value="" hidden> 
                        <label for="no_control" class="form-label">Numero de Control</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                            <input style="border-right: none;" name="no_control" readonly style="height: 75px;" type="text" class="form-control fs-2 break_size" id="no_control" placeholder="No. Control">
                            <span class="input-group-text" style="background-color: #E7ECEC; border-left: none;" id="incremento_decr">
                                <div class="btn-group-vertical" role="group" aria-label="Basic example">
                                    <button type="button" id="btn_incrementar" class="btn btn-link text-primary border-0"><i class="fas fa-caret-up"></i></button>
                                    <button type="button" id="btn_decrementar" class="btn btn-link text-primary border-0"><i class="fas fa-caret-down"></i></button>
                                </div>
                            </span>
                            <button type="button" class="btn btn-danger" id="btn_control_manual"><i class="fa-solid fa-lock"></i></button>
                        </div>
                    </div>
                </div>
                <div>
                    <?php include_once 'includes/form_part_uno.php'?>
                    <?php include_once 'includes/form_part_dos.php'?>
                    <?php include_once 'includes/form_part_tres.php'?>
                    <div class="d-flex flex-row gap-2 justify-content-end w-100">
                        <?php if($_GET['view']=="listado_alumno"):?>
                        <button type="button" id="cancelar_edicion" class="btn btn-danger mt-2">Cancelar</button>
                        <?php endif?>
                        <button type="button" id="atras" class="btn btn-secondary mt-2 text-white">Atras</button>
                        <button type="button" id="siguiente" class="btn btn-primary mt-2">Siguiente</button>
                        <button type="button" id="crear_alumno" class="btn btn-primary mt-2">Crear Alumno</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once 'includes/modal_recorte_foto.php';?>
<script src="<?=CONTROLLER?>se<?=$control = $_GET['view']=="listado_alumno" ? "/editar_alumno/": "/creacion_alumno/";?>creacion_alumnos.controller.js"></script>
<script src="<?=CONTROLLER?>se<?=$control = $_GET['view']=="listado_alumno" ? "/editar_alumno/": "/creacion_alumno/";?>datos_catalogo.controller.js"></script>
<script src="<?=CONTROLLER?>se<?=$control = $_GET['view']=="listado_alumno" ? "/editar_alumno/": "/creacion_alumno/";?>recorte.controller.js"></script>
<!-- 
FORMS
- frm_creacion_alumno

BOTONES
- ver_img
- btn_incrementar
- btn_decrementar
- cancelar_edicion
- atras
- siguiente
- crear_alumno
 -->