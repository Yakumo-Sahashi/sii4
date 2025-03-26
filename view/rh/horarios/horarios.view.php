<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
	$fecha_inicio = date('Y-m-01');
	$fecha_inicio_fin = date('Y-01-01');
	$fecha_fin = date('Y-m-d');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Calulo de Incidencias</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Calulo de Incidencias</a></li>
		</ol>
	</nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Calulo de Incidencias</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
					<i class="icono-seccion fa-regular fa-clock overflow-hidden text-primary mx-auto mb-4"></i>
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
						<form id="frm_incidencias" method="POST" action="app/docs/excel_incidencias.doc.php" class="form-grup mb-3 ml-3 mr-3" enctype="multipart/form-data" target="_blank">
							<input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_incidencias")?>" hidden>
							<div class="row justify-content-center">
								<div class="col-md-4 mb-3">
									<div class="form-floating mb-3">
										<input class="form-control" type="date" name="fecha_inicio" value="<?= $fecha_inicio ?>" required placeholder="Fecha Inicio" max="<?= $fecha_fin ?>" min="<?= $fecha_inicio_fin?>">
										<label for="fecha_inicio" class="text-primary text-small"><i class="fa-solid fa-calendar-day me-2"></i>Fecha Inicio</label>
									</div>
								</div>
								<div class="col-md-4 mb-3">
									<div class="form-floating mb-3">
										<input class="form-control" type="date" name="fecha_fin" value="<?= $fecha_fin ?>" required placeholder="Fecha Fin" max="<?= $fecha_fin ?>" min="<?= $fecha_inicio_fin?>">
										<label for="fecha_fin" class="text-primary text-small"><i class="fa-solid fa-calendar-days me-2"></i>Fecha Fin</label>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-7 d-none">
									<div class="form-floating mb-3">
										<select name="seleccion_personal" class="form-select">
											<option value="" selected>Selección de personal</option>
										</select>
										<label for="seleccion_personal" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selección de personal</label>
									</div>
								</div>
								<div class="col-md-5 mb-3">
									<div class="form-floating mb-3">
										<input name="archivo" type="file" class="form-control" placeholder="Horario.txt" accept=".txt">
										<label for="archivo" class="text-primary text-small"><i class="fa-solid fa-layer-group me-2"></i>Archivo .txt</label>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-5">
									<button type="submit" class="btn btn-primary w-100 mb-3" id="btn_inicar_proceso"><i class="fa-solid fa-calculator me-2"></i>Iniciar proceso</button>
								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-danger w-100" id="btn_reiniciar"><i class="fa-solid fa-arrow-rotate-right me-2"></i>Reiniciar</button>
								</div>
							</div>
							<div id="btn_excel" class="row justify-content-center d-none">
								<div class="col-md-4">
									<button type="submit" class="btn btn-success btn-lg w-100">Generar Excel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container p-0 d-none" id="mostrar_incidencias">
	<div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="table-responsive">
                <!--table-bordered border-primary-->
                <table class="table table-sm table-responsive-lg table-striped table-hover" id="table_created_rooms">
                    <thead class="text-center fw-bolder">
						<th>ID</th>
						<th>Nombre empleado</th>
						<th>Dia</th>
						<th>Fecha</th>
						<th>Entrada</th>
						<th>Estado Entrada</th>
						<th>Salida</th>
						<th>Estado Salida</th>
                    </thead>
                    <tbody id="tabla_incidencias" class="text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>rh/horarios/horarios.controller.js"></script>