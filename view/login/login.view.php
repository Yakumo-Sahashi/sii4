<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<div class="container p-0">
	<div class="row justify-content-center py-5">
		<div class="col-lg-4 col-md-6 col-sm-8 col-10">
            <div class="card p-3 shadow-lg">
                <div class="card-body">
                    <div class="text-center">
                        <img class="mb-4" src="<?=DEP_IMG?>itma2.png" width="50%">
                    </div>
                    <form id="frm_login" class="form-grup">
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control text-secondary" id="correo_institucional" name="correo_institucional" placeholder="Correo institucional">
                            <label for="correo_institucional" class="form-label text-primary"><i class="fa-solid fa-at me-2"></i>Correo Institucional</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control text-secondary" id="password" name="password" placeholder="Contraseña">
                            <label for="password" class="form-label text-primary"><i class="fa-solid fa-lock me-2"></i>Contraseña</label>
                        </div>
                        <div class="mb-3 text-end">
                            <a href="<?=Router::redirigir('recuperacion')?>" class="text-muted">¿Olvidaste tu contraseña?</a>
                        </div>
                        <div class="mt-4">
							<button type="submit" class="btn btn-primary w-100 shadow" id="btnSesion"><i class="fa-solid fa-arrow-right-to-bracket me-2"></i>Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
<script src="<?=CONTROLLER?>login/login.controller.js"></script>