<?php
    use config\Router;
    use config\Token;
    use config\Sesion;
    require_once realpath('./vendor/autoload.php');
    date_default_timezone_set('America/Mexico_City');
	$hora = date("i:s");
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Perfil</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('perfil') ?>">Perfil</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0 my-4 card shadow p-5">
    <div class="row justify-content-center">
        <div class="col-2 text-end">
            <input type="text" id="usuario" name="usuario" value="<?=Sesion::datos_sesion('rol')?>" hidden>
            <div id="img_foto" class="thumb btn-hover d-flex me-4" style='background-image: url("<?=DEP_IMG?><?= Sesion::datos_sesion('rol')?><?= Sesion::datos_sesion('rol') == "ALUMNO" || Sesion::datos_sesion('rol') == "DOCENTE" ? '/'.Sesion::datos_sesion('id_usuario') : ""?>/fotografia.webp?img=<?=$hora?>");'>
                <button id="ver_img" type="button" class="align-self-center mx-auto d-block btn btn-primary btn-lg rounded-circle <?= Sesion::datos_sesion('rol') == "ALUMNO" ? 'd-none' : ''?>" title="Editar fotografia"><i class="fa-solid fa-camera mb-1 mt-1"></i></button>
            </div>
        </div>
        <div class="col-4">
            <h1 class="text-primary fw-bold fs-5 mt-4"><?= Sesion::datos_sesion('nombre_persona') . ' ' . Sesion::datos_sesion('apellido_paterno') . ' ' . Sesion::datos_sesion('apellido_materno') ?></h2>
                <h2 class="text-secondary fs-5"><?= Sesion::datos_sesion('descripcion_rol') ?></h3>
        </div>
        <hr class="mt-4 mb-3">
    </div>
    <!-- <div class="row justify-content-center">
        <div class="col-8">
            <div class="text-center text-primary mb-3">Acerca</div>
            <p class="fst-italic acerca text-muted">
                Sunt est soluta temporibus accusantium neque nam maiores cumque
                temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae
                quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
            </p>
        </div>
    </div> -->
    <div class="container p-0" id="seccion_info_perfil">
        <div class="row mt-5 justify-content-center">
            <div class="col">
                <h5 class="card-title text-primary mb-3">Detalles</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" value="<?= Sesion::datos_sesion('id_usuario') ?>" hidden name="id">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control text-secondary" id="floatingInput" value="<?= Sesion::datos_sesion('nombre_persona') . ' ' . Sesion::datos_sesion('apellido_paterno') . ' ' . Sesion::datos_sesion('apellido_materno') ?>" placeholder="" readonly="readonly" name="nombre_completo">
                    <label for="floatingInput" class="form-label text-primary fw-bold">Nombre completo</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control text-secondary" id="floatingInput" value="TecNM Campus Milpa Alta II" disabled>
                    <label for="floatingInput" class="form-label text-primary ">Instituto</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control text-secondary" id="floatingInput" value="<?= Sesion::datos_sesion('descripcion_rol') ?>" disabled>
                    <label for="floatingInput" class="form-label text-primary">Rol</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control text-secondary" id="floatingInput" value="<?= Sesion::datos_sesion('correo_usuario') ?>" readonly name="correo_institucional">
                    <label for="floatingInput" class="form-label text-primary fw-bold">Correo institucional</label>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-0 mt-4" id="seccion_cambio_pass">
        <form action="" id="frm_cambio_pass" name="frm_cambio_pass">
            <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_cambio_pass") ?>" hidden>
            <input type="text" name="id_usuario" value="<?= Sesion::datos_sesion('id_usuario')?>" hidden>
            <div class="row justify-content-center">
                <div class="col-12">
                    <hr>
                    <h5 class="card-title text-primary mb-3">Cambio de contraseña</h5>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control text-secondary" id="password_actual" name="password_actual" placeholder="Contraseña actual">
                        <label for="password_actual" class="form-label text-primary"><i class="fa-solid fa-key me-2"></i>Contraseña actual</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control text-secondary" id="nueva_password" name="nueva_password" placeholder="Nueva contraseña">
                        <label for="nueva_password" class="form-label text-primary"><i class="fa-solid fa-lock me-2"></i>Nueva contraseña</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control text-secondary" id="confirmar_password" name="confirmar_password" placeholder="Confirmar contraseña">
                        <label for="confirmar_password" class="form-label text-primary"><i class="fa-solid fa-lock me-2"></i>Confirmar contraseña</label>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <button type="button" class="btn btn-secondary text-white" id="btn_cancel_act_pass">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btn_act_pass">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="" id="botones_prin">
        <div class="row mt-3">
            <div class="col text-center">
                <!-- <button type="button" class="btn btn-secondary text-white" id="btn_editar_info">Editar</button> -->
                <button type="button" class="btn btn-primary text-white" id="btn_cambiar_pass">Cambiar contraseña</button>
            </div>
        </div>
    </div>
    <div class="" id="botones_editar">
    <div class="row mt-3">
        <div class="col text-center">
            <button type="button" class="btn btn-secondary text-white" id="btn_cancel_user">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btn_act_user">Actualizar</button>
        </div>
    </div>
    </div>

</div>
<?php require_once 'fotografia.view.php'; ?>
<script src="<?= CONTROLLER?>usuario/recorte.controller.js"></script>
<script src="<?= CONTROLLER ?>usuario/informacion.controller.js"></script>