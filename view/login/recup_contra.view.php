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
                    <p class="text-center fs-6 text-muted fs-md-1">Ingresa tu correo Institucional.<br>Recibiras las instrucciones correspondientes para la recuperacion de tu cuenta.</p>
                    <form id="frm_login" class="form-grup">
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control text-secondary" id="correo_institucional" name="correo_institucional" placeholder="Correo institucional">
                            <label for="correo_institucional" class="form-label text-primary"><i class="fa-solid fa-at me-2"></i>Correo Institucional</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-secondary" id="correo" name="correo" placeholder="Correo Personal">
                            <label for="correo" class="form-label text-primary"><i class="fas fa-user-alt me-2"></i>Correo Personal</label>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="button" class="btn borded-0" data-bs-toggle="tooltip" data-bs-placement="top" title ="Introduce el correo que nos proporcionaste al inscribirte para confirmar que sea tu correo institucional"><i class="fas fa-question-circle"></i></button>
                        </div>
                        <div class="text-center">
                            <a href="<?=Router::redirigir('login')?>" class="text-muted">¿Volver al login?</a>
							<button type="submit" class="btn btn-primary w-100 shadow mt-2" id="btnSesion"><i class="fa-solid fa-arrow-right-to-bracket me-2"></i>Recuperar Cuenta</button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
<script src="<?=CONTROLLER?>controller_recu_contra.js"></script>