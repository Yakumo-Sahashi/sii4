<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary text-uppercase">Calificaciones parciales</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>
					Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Calificaciones
					parciales</a></li>
		</ol>
	</nav>
</div>
<div class="container p-0">
	<div class="row justify-content-around py-5">
		<div class="col-md-12 text-center">
			<div class="container">
				<div class="row justify-content-center py-2">
					<div class="col-lg-12 text-center">
						<div class="row d-md-flex justify-content-center mb-4">
							<h3 class="me-auto mb-4">Calificaciones parciales</h3>
							<div class="d-none" id="titulos">
								<div class="col-12 text-center">
									<span class="fs-5 me-2">Periodo: <span class="fs-5 fw-bold"
											id="titulo_periodo"></span></span>
								</div>
								<div class="col-12 text-center">
									<span class="fs-5 me-2">Materia: <span class="fs-5 fw-bold" id="titulo_materia"></span></span>
								</div>
								<div class="col-12 text-center mb-3">
									<span class="fs-5 me-2">Grupo: <span class="fs-5 fw-bold" id="titulo_grupo"></span></span>
								</div>
							</div>
							<div class="col-md-12 text-center text-primary">
								<i class="fa-regular fa-rectangle-list fa-5x mx-auto d-block"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="row justify-content-around" id="listado_materias">
					<div class="col">
						<div class="table-responsive">
							<table class="table table-md table-hover table-responsive-lg mt-3 text-center"
								id="tabla_materias_parcial">
								<thead>
									<tr class="text-center">
										<th scope="col">Materia</th>
										<th scope="col">Grupo</th>
										<th scope="col">Alumnos inscritos</th>
										<th scope="col">Captura Cal.</th>
										<th scope="col">Reporte inicio</th>
										<th scope="col">Lista asistencia</th>
									</tr>
									<thead>
									<tbody id="tabla_materias">
									</tbody>
							</table>
						</div>
					</div>
				</div>
				<form id="frm_calificaciones_parciales" class="row justify-content-around d-none">
					<div class="col-md-12">
						<button type="button" class="btn btn-secondary text-white" id="btn_regresar">Regresar</button>
						<button type="submit" class="btn btn-primary">Registrar calificaciones</button>
						<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
							<strong><i class="fa-solid fa-circle-exclamation me-2"></i>Importante!</strong>
							<ul>
								<li>Las calificaciones menores a 70 seran tratadas como 0 y no se calcularan dentro del promedio.</li>
								<li>
									Si existe mas de 1 unidad reprobada el apartado "Acredita" tendra una <i class="fa-solid fa-xmark text-danger"></i>  de lo contrario <i class="fa-solid fa-circle-check text-success"></i>
								</li>
							</ul>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					</div>
					<div class="col">
						<input type="text" name="grupo_id" hidden>
						<input type="text" name="n_unidades" hidden>
						<div class="table-responsive">
							<table class="table table-md table-hover table-striped table-responsive-lg mt-3 text-center"
								id="tabla_calificacion_parcial">
								<thead>
									<tr class="text-center" id="titulos_tabla">
									</tr>
								<thead>
								<tbody id="tabla_calificacion">
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?= CONTROLLER?>docente/documentos/calificaciones_parciales.controller.js"></script>