<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Reporte de inicio de curso</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Reporte de inicio de curso</a></li>
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
							<h3 class="me-auto mb-4">Reporte de inicio de curso</h3>
							<div class="col-md-12 text-center text-primary">
								<i class="fa-solid fa-calendar-week fa-5x mx-auto d-block"></i>								
							</div>
						</div>
					</div>
				</div>
				<div class="row justify-content-around">
					<div class="col">
						<div class="table-responsive">
							<table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_listado_reporte">
								<thead>
									<tr class="text-center">
										<th scope="col">Materia</th>
										<th scope="col">Grupo</th>
										<th scope="col">Alumnos inscritos</th>
										<th scope="col">Imprimir</th>
									</tr>
								<thead>   
								<tbody id="tabla_reporte">                        
								</tbody>                
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= CONTROLLER ?>docente/documentos/reporte_curso.controller.js"></script>