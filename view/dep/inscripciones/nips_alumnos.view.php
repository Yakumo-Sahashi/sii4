<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Contraseñas de Alumnos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir('')?>">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir('inscripciones')?>">Inscripciones</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-5" id="consulta_alumnos">
   <form action="" id="frm_consulta_contraseña">
        <div class="row justify-content-center py-2">
            <h4 class="text-center mt-3 mb-5">Consulta de contraseñas</h4>
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
                <button type="submit" class="btn btn-primary" id="btn_aceptar">Consultar</button>
            </div>
        </div>
   </form>
</div>
<div class="container p-5" id="datos_alumno">
    <form action="" id="frm_actualiza_contraseña">
        <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_actualiza_contraseña")?>" hidden>
        <div class="row justify-content-center py-2">
            <h3 class="text-center mb-5" id="titulo_cambio">Cambio de contraseña</h3>
            <div class="col-lg-2">
                <div class="float-start mb-3">
                    <span type="button"><img id="img_foto" class="thumb img-perfil-usuario" src="https://images.hdqwalls.com/wallpapers/bthumb/naruto-uzumaki-minimal-5k-ob.jpg" title="fotografia" alt="fotografia"></span>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row py-2">
                    <div class="col-lg-6">
                        <input type="text" id="id_usuario" name="id_usuario" hidden>
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
                </div>
                <div class="row py-2 mt-2">
                    <div class="col-5" id="contraseña_nueva">
                        <div class="form-floating">
                            <input type="password" class="form-control small" id="nueva_contrasenia" name="nueva_contrasenia">
                            <label for="nueva_contrasenia" class="small">Nueva contraseña</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-10 text-end">
                <button type="button" class="btn btn-secondary text-white" id="regresar">Regresar</button>
                <button type="submit" class="btn btn-primary" id="btn_actualizar_contraseña">Actualizar contraseña</button>
            </div>
        </div>
    </form>
</div>

<script src="<?=CONTROLLER?>dep/inscripciones/contraseñaAlumnos.controller.js"></script>