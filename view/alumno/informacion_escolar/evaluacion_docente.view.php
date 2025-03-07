<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Evaluacion Docente</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Evaluacion Docente</a></li>
		</ol>
	</nav>
</div>
<div class="container p-0">
	<div class="row justify-content-around py-5">
		<div class="col-md-12 text-center">
			<h1 class="text-center mt-3 mb-2">Evaluacion Docente <i class="fa-solid fa-user-check"></i></h1>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-small-12 mb-4">
						<form id="frm_evaluacion_docente" method="POST" class="form-grup mb-3 ml-3 mr-3 formulario">
							<div class="wrap">
								<div id="cuestionario"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= CONTROLLER ?>alumno/informacion_escolar/evaluacion_docente.controller.js"></script>