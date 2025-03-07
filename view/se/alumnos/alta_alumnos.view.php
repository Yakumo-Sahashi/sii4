<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div class="<?=$letrero = $_GET['view']=="listado_alumno" ? "d-none" : "";?>">
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Alta de alumnos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?=Router::redirigir($_GET['view'])?>">Alta de alumnos</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-5">
    <form action="" id="frm_consulta" name="frm_consulta">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_consulta") ?>" hidden>
        <div class="row justify-content-center py-2">
            <h4 class="text-center mt-3 mb-5">Nuevo alumno</h4>
            <div class="col text-center">
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 class="me-auto mb-4"></h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                        <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="numero_crl" name="numero_crl" placeholder="Numero de control">
                            <label for="numero_crl" class="text-primary"><i class="fa-solid fa-arrow-up-1-9 me-2"></i>Numero de control</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <a href="<?= Router::redirigir('')?>" class="btn btn-secondary text-white me-3">Cancelar</a>
                <button type="button" class="btn btn-primary" id="btn_alta">Dar de alta</button>
            </div>
        </div>
    </form>
</div>