<?php
	use config\Router;
use config\Sesion;
use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Horario Docente</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>
					Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Horario Docente</a>
			</li>
		</ol>
	</nav>
</div>
<div class="container p-0">
	<div class="row justify-content-around py-5">
		<div class="col-md-12 text-center">
			<div class="container">
				<form class="row justify-content-center py-2" action="app/docs/horario_docente.doc.php" method="post" target="_blank">
					<div class="col-lg-12 text-center">
						<div class="row d-md-flex justify-content-center mb-4">
							<h3 class="me-auto mb-4">Horario de clases</h3>
							<div class="col-md-12 text-center text-primary">
								<i class="fa-solid fa-calendar-week fa-5x mx-auto d-block"></i>
							</div>
							<div class="col mt-4">
								<input type="text" name="persona" value="<?=Sesion::datos_sesion('fk_persona')?>" hidden>
								<button type="submit" class="btn btn-primary"><i class="fa-solid fa-print me-2"></i> Imprimir Horario</button>
							</div>
						</div>
					</div>
				</form>
				<div class="row align-items-center">
					<div class="col-md-12 col-small-12 mb-4">
						<div class="table-responsive">
							<table class="table table-sm table-responsive-lg table-striped table-hover"
								id="table_created_rooms">
								<thead class="text-center fw-bolder">
									<th>Clave</th>
									<th>Asignatura</th>
									<th>Grupo</th>
									<th>Hrs</th>
									<th>Lunes</th>
									<th>Martes</th>
									<th>Miércoles</th>
									<th>Jueves</th>
									<th>Viernes</th>
									<th>Sábado</th>
								</thead>
								<tbody id="tabla_horarios" class="text-center">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= CONTROLLER ?>docente/horario_docente.controller.js"></script>