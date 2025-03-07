<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Creacion de usuarios</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir($_GET['view'])?>">Creacion de usuarios</a></li>
        </ol>
    </nav>
</div>
<div class="container mb-5" id="listado_info">
    <div class="row justify-content-center py-2">
        <div class="col-lg-12 text-center">
            <form id="frm_crear_usuario_nuevo" class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4">Creacion de usuarios</h3>
                <div class="col-md-12 mb-4 text-center text-primary">
                    <i class="fa-solid fa-user-plus fa-5x mx-auto d-block"></i>								
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <select class="form-select small" id="tipo_persona" name="tipo_persona">
                            <option value="" selected>Seleccionar tipo</option>
                            <option value="1">Personal del Instituto</option>
                            <option value="2">Alumno</option>
                        </select>
                        <label for="tipo_persona" class="text-primary small"><i class="fa-solid fa-people-group me-2"></i>Tipo persona</label>
                    </div>
                </div> 
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <select class="form-select small" id="persona" name="persona">
                            <option value="" selected>Seleccionar persona</option>
                        </select>
                        <label for="persona" class="text-primary small"><i class="fa-solid fa-person me-2"></i>Persona</label>
                    </div>
                </div>   
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="correo_inst" name="correo_inst" value="">
                        <label for="correo_inst" class="text-primary small"><i class="fa-solid fa-envelope me-2"></i>Correo institucional</label>
                    </div>
                </div> 
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="usuario" name="usuario" value="">
                        <label for="usuario" class="text-primary small"><i class="fa-solid fa-user me-2"></i>Nombre usuario</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <select class="form-select small" id="rol_usuario" name="rol_usuario">
                            <option value="" selected>Seleccionar rol</option>
                        </select>
                        <label for="rol_usuario" class="text-primary small"><i class="fa-solid fa-chalkboard-user me-2"></i>Rol Usuario</label>
                    </div>
                </div> 
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control small" id="password_usuario" name="password_usuario" value="">
                        <label for="password_usuario" class="text-primary small"><i class="fa-solid fa-lock me-2"></i>Contraseña</label>
                    </div>
                </div>   
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Crear usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?=CONTROLLER?>admin/usuarios/creacion_usuarios.controller.js"></script>