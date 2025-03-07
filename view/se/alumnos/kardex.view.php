<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Kardex</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Kardex</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3" id="continer_frm_num_ctrl">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <form id="frm_num_crl">
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 class="me-auto mb-4">Kardex</h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center">
                        <div class="float-start mb-3">
                            <span type="button"><img class="thumb" src="public/img/user.png"></span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <div class="form-floating mb-3 mt-4">
                            <input name="num_ctrl" type="text" class="form-control break_size" id="num_ctrl" placeholder="Numero de control" maxlength="100">
                            <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-down-9-1 me-2"></i> Numero de control</label>
                        </div>
                    </div>
                </div>
                <div class="row d-md-flex justify-content-end mb-4">
                    <div class="col">
                        <button id="btn_consultar" class="btn btn-primary" type="submit">Consultar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container p-5 d-none" id="datos_alumno">
    <div class="row justify-content-center py-2">
        <h3 class="text-center mb-4">Datos del alumno</h3>
        <div class="col-lg-2">
            <div class="float-start mb-3 mt-2">
                <span type="button"><img id="img_foto" class="thumb" src="public/img/user.png" title="fotografia" alt="fotografia"></span>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="row justify-content-center py-2">
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="nombre_alumno" name="nombre_alumno" disabled>
                        <label for="nombre_alumno" class="small">Nombre del alumno</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="numero_control" name="numero_control" value="" disabled>
                        <label for="numero_control" class="small">Numero de control</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="semestre" name="semestre" value="" disabled>
                        <label for="floatingInputValue" class="small">Semestre</label>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center py-2">
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="carrera" name="carrera" disabled>
                        <label for="carrera" class="small">Carrera</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <form class="form-floating">
                        <input type="text" class="form-control small" id="plan_estudios" name="plan_estudios" disabled>
                        <label for="plan_estudios" class="small">Plan de estudios</label disabled>
                    </form>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="especialidad" name="especialidad" disabled>
                        <label for="especialidad" class="small">Especialidad</label>
                    </div>
                </div>
            </div>
            <div class="col text-end">
                <span type="button" id="btn_canc_kardex" class="btn btn-secondary text-white">Cancelar</span>
            </div>
        </div>
    </div>
</div>
<div class="container d-none" id="container_tablas_kardex">
    <div class="row justify-content-around">
        <div class="col">
            <!-- <div class="text-primary">Periodo: AGO-DIC/2015</div> -->
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center text-primary table-bordered border-light" id="tabla_kardex">
                    <tbody id="tabla_contenido_kardex">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?=CONTROLLER?>se/kardex/kardex.controller.js"></script>
<!-- 
    FORMS 
- frm_num_crl
- 

    BOTONES 
- btn_consultar
- img_foto
 -->