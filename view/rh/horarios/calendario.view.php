<?php
	use config\Router;
	use config\Token;
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Actualizar calendario</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Actualizar calendario</a></li>
		</ol>
	</nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Actualizar calendario</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
					<i class="icono-seccion fa-solid fa-calendar-week overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-0">
	<div class="row justify-content-around py-2">
		<div class="col-md-12 text-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-small-12 mb-4">
						<form id="frm_calendario" method="POST" action="app/docs/excel_incidencias.doc.php" class="form-grup mb-3 ml-3 mr-3" enctype="multipart/form-data" target="_blank">
							<input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_calendario")?>" hidden>
							
							<div class="row justify-content-center">
								<div class="col-md-5 mb-3">
									<div class="form-floating mb-3">
										<input name="archivo" type="file" class="form-control" placeholder=".PNG,.JPGE,JPG,WEB" accept=".png,.jpg,.jpge,.webp">
										<label for="archivo" class="text-primary text-small"><i class="fa-solid fa-image me-2"></i>.PNG,.JPGE,JPG,WEB</label>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-5">
									<button type="submit" class="btn btn-primary w-100 mb-3" id="btn_inicar_proceso"><i class="fa-solid fa-image me-2"></i>Cargar imagen</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= CONTROLLER ?>rh/horarios/calendario.controller.js"></script>