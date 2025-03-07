<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
    date_default_timezone_set('America/Mexico_City');
	$year = date("Y");
    $fecha = date("Y-m-d");
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Constancias</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('constancias') ?>">Constancias</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Generación de constancias</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-address-card overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="app/docs/constancia_kardex_alumno.doc.php" id="frm_constancias" name="frm_constancias" method="POST" target="_blank">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_constancias") ?>" hidden>
        <div class="row mt-3">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="num_ctrl" name="num_ctrl" placeholder="Numero de control" required>
                    <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Numero de control</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" value="<?=$fecha?>" id="fecha" name="fecha" placeholder="Fecha de emisión" required>
                    <label for="fecha" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Fecha de emisión</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo" name="periodo" required>
                        <option value="" selected>Seleccionar periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-solid fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="tipo" name="tipo" required>
                        <option value="" selected>Selecciona el tipo</option>
                        <option value="0">Por semestre</option>
                        <option value="1">Materias cursando</option>
                        <option value="2">Constancia de avance</option>
                        <option value="3">De estudios simple</option>
                        <option value="4">Transito estudiantil</option>
                        <option value="5">Lengua extrangera</option>
                        <option value="6">IMSS</option>
                        <option value="7">Kardex</option>
                        <option value="8">No incoveniencia</option>
                    </select>
                    <label for="tipo" class="text-primary"><i class="fa-solid fa-filter me-2"></i>Tipo</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4 col-md-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="depto" name="depto" placeholder="Oficio No." value="SE" readonly>
                    <label for="depto" class="text-primary"><i class="fa-solid fa-user-tie"></i> Usuario</label>
                </div>
            </div>
            <div class="col-4 col-md-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="no_oficio" name="no_oficio" placeholder="Oficio No." value="" required>
                    <label for="no_oficio" class="text-primary"><i class="fa-solid fa-hashtag"></i> Oficio No.</label>
                </div>
            </div>
            <div class="col-4 col-md-3">
                <div class="form-floating mb-3">
                    <input type="" class="form-control" id="year_oficio" name="year_oficio" placeholder="Año" value="<?=$year?>" readonly>
                    <label for="year_oficio" class="text-primary"><i class="fa-regular fa-calendar-days"></i> Año</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" id="traslado">                 
        </div>
        <div class="row my-3">
            <div class="col text-center">
                <button type="button" id="btn_limpiar_contenido" class="btn btn-secondary text-white">Limpiar</button>
                <button type="submit" class="btn btn-primary" id="btn_genera_constancia">Generar</button>
            </div>
        </div>
    </form>
</div>

<script src="<?=CONTROLLER?>se/constancias/constancias.controller.js"></script>