<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Verano</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('inscripciones') ?>">inscripciones</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('verano') ?>">Verano</a></li>
        </ol>
    </nav>
</div>
<form id="frm_inscripcion_verano">
    <div class="container p-3 mt-5">
        <div class="row justify-content-center py-2">
            <h4 class="text-center mt-3 mb-5">Seleccion de materias en verano</h4>
            <div class="col text-center">
                <div class="row d-md-flex justify-content-center mb-4">
                    <h3 class="me-auto mb-4"></h3>
                    <div class="col-lg-2 col-md-6 align-self-end text-center">
                        <div class="float-start">
                            <img class="thumb" src="public/img/user.png"></i>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-start">
                        <div class="form-floating mt-4">
                            <input type="text" class="form-control" name="num_ctrl" id="num_ctrl" placeholder="Numero de control">
                            <label for="num_ctrl" class="text-primary"><i class="fa-solid fa-arrow-down-9-1 me-2"></i>Numero de control</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary" id="btn_aceptar">Aceptar</button>
            </div>
        </div>
    </div>
</form>
<div class="container p-5" id="datos_alumno">
    <div class="row justify-content-center py-2">
        <h3 class="text-center mb-4">Datos del alumno</h3>
        <div class="col-lg-2">
            <div class="float-start mb-3 mt-2">
                <span type="button"><img id="img_foto" class="thumb img-perfil-usuario" src="https://images.hdqwalls.com/wallpapers/bthumb/naruto-uzumaki-minimal-5k-ob.jpg" title="fotografia" alt="fotografia"></span>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="row justify-content-center py-2">
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="nombre_alumno" name="nombre_alumno" value="" disabled>
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
                        <label for="semestre" class="small">Semestre</label>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center py-2">
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="periodo_escolar" name="periodo_escolar" value="" disabled>
                        <label for="periodo_escolar" class="small">Periodo escolar</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="carrera" name="carrera" value="" disabled>
                        <label for="carrera" class="small">Carrera</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="prom_acumulado" name="prom_acumulado" value="" disabled>
                        <label for="prom_acumulado" class="small">Prom. acumulado</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="especialidad" name="especialidad" value="" disabled>
                        <label for="especialidad" class="small">Especialidad</label>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col my-3 text-end">
                    <button class="btn btn-primary">Mostrar Movimientos</button>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="container" id="tabla_movimientos">
    <div class="row d-flex justify-content-center text-white text-center small">
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 1</div>
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 2</div>
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 3</div>
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 4</div>
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 5</div>
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 6</div>
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 7</div>
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 8</div>
        <div class="col-1 p-1 border bg-primary encabezado">Semestre 9</div>
    </div>
    <div class="row d-flex justify-content-center text-center small">
        <div class="col-1 p-1 border cuadricula overflow-scroll bg-verde-cuadricula">
            ASI <br>
            calculo <br>
            diferencial <br>
            12/12
        </div>
        <div class="col-1 p-1 border cuadricula overflow-scroll bg-warning">
            ASI <br>
            calculo <br>
            diferencial <br>
            12/12
        </div>
        <div class="col-1 p-1 border cuadricula overflow-scroll bg-morado-cuadricula text-white">
            ASI <br>
            calculo <br>
            diferencial <br>
            12/12
        </div>
        <div class="col-1 p-1 border cuadricula overflow-scroll">

        </div>
        <div class="col-1 p-1 border cuadricula overflow-scroll">

        </div>
        <div class="col-1 p-1 border cuadricula overflow-scroll">

        </div>
        <div class="col-1 p-1 border cuadricula overflow-scroll">

        </div>
        <div class="col-1 p-1 border cuadricula overflow-scroll">

        </div>
        <div class="col-1 p-1 border cuadricula overflow-scroll">

        </div>
        <div class="row justify-content-around mt-5">
            <div class="col text-center">
                <button type="button" class="btn btn-secondary text-white" id="atras">Atras</button>
            </div>
        </div>
    </div>

    <script src="<?=CONTROLLER?>dep/inscripciones/inscripcionesVerano.controller.js"></script>