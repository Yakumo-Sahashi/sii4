<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div class="<?=$letrero = $_GET['view']=="listado_alumno" ? "d-none" : "";?>">
    <h1 class="fs-4 fw-bold text-primary">Listado de usuarios</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir($_GET['view'])?>">Listado de usuarios</a></li>
        </ol>
    </nav>
</div>
<div class="container mb-5" id="listado_info">
    <div class="row justify-content-center py-2">
        <div class="col-lg-12 text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4">Listado de usuarios</h3>
                <div class="col-md-12 mb-4 text-center text-primary">
                    <i class="fa-solid fa-users-gear fa-5x mx-auto d-block"></i>								
                </div>
                <div class="col-lg-6 col-md-6 mb-3 text-center">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="select_rol" name="select_rol" aria-placeholder="Selecciona docente">
                            <option value="0">Todos</option>
                            <option value="1">Jefe de departamento</option>
                            <option value="19">Docente</option>
                            <option value="20">Alumno</option>
                            <option value="21">Administrador</option>
                        </select>
                        <label for="select_rol" class="text-primary"><i class="fa-solid fa-user-group me-2"></i>Usuario Rol</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center"
                    id="tabla_usuarios">
                    <thead class="text-center fw-bolder">
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Correo institucional</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Rol Usuario</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Editar</th>
                        </tr>
                        <thead>
                        <tbody id="tabla_contenido_usuario">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- MODAL -->
<div class="modal fade" id="datos_usuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_capturar" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="frm_actualizar_usuario">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_actualizar_usuario")?>" hidden>
                    <input type="text" name="id_usuario_upt" hidden>
                    <input type="text" id="id" name="id" hidden>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control small" id="nombre_usuario" name="nombre_usuario" value="" disabled>
                            <label for="nombre_usuario" class="text-primary small"><i class="fa-solid fa-address-card me-2"></i>Nombre</label>
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
                            <select class="form-select small" id="estado_cuenta" name="estado_cuenta">
                                <option value="0">Activo</option>
                                <option value="2">Deshabilitado</option>
                            </select>
                            <label for="estado_cuenta" class="text-primary small"><i class="fa-solid fa-user-clock me-2"></i>Estado cuenta</label>
                        </div>
                    </div>         
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="password" class="form-control small" id="password_usuario" name="password_usuario" value="">
                            <label for="password_usuario" class="text-primary small"><i class="fa-solid fa-lock me-2"></i>Actualizar contraseña</label>
                        </div>
                    </div>        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="btn_actualizar_datos">Actualizar</button>
            </div>
        </form>
    </div>
</div>


<script src="<?=CONTROLLER?>admin/usuarios/usuarios.controller.js"></script>