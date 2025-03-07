<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Asignación temporal de docente a otro departamento</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Asignación temporal de docente a otro departamento</a></li>
		</ol>
	</nav>
</div>
<div class="container p-0">
	<div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5 text-uppercase">Asignación temporal de docente a otro departamento</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 aling-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
	<div class="row justify-content-around py-5">
		<div class="col-md-12 text-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-small-12 mb-4">
						<form id="frm_asig_temporal_depto" method="POST" class="form-grup mb-3 ml-3 mr-3 ">
							<input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_asignacion_grupo') ?>" hidden>
							<div class="row justify-content-center">
								<div class="col-lg-6 col-md-4 mb-3">
									<input type="text" name="id_departamento_plaza" id="id_departamento_plaza" hidden/>
									<div class="form-floating">
										<input type="text" readonly name="seleccion_departamento_plaza" id="seleccion_departamento_plaza" class="form-control"/>
										<label for="seleccion_departamento_plaza" class="text-primary text-small"><i class="fa-solid fa-building-user me-2"></i>Selecciona el departamento</label>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 mb-3">
									<div class="form-floating mb-3">
										<input type="text" readonly class="form-control" id="periodo" name="periodo" placeholder="Periodo"/>
										<label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 mb-3 text-center">
									<div class="form-floating mb-3">
										<select class="form-select" id="area_academica_org" name="area_academica_org">
											<option selected>Seleccionar area origen</option>
										</select>
										<label for="area_academica_org" class="text-primary small"><i class="fa-solid fa-location-dot me-2"></i>Área Académica de origen</label>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 mb-3 text-center">
									<div class="form-floating mb-3">
										<select class="form-select" id="select_docente" name="select_docente" aria-placeholder="Selecciona docente">
											<option value="" selected>Seleccionar docente</option>
										</select>
										<label for="select_docente" class="text-primary"><i class="fa-solid fa-user-tie me-2"></i>Docente</label>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 mb-3 text-center">
									<div class="form-floating mb-3">
										<select class="form-select" id="area_academica" name="area_academica">
											<option selected>Seleccionar area temporal</option>
										</select>
										<label for="area_academica" class="text-primary small"><i class="fa-solid fa-location-dot me-2"></i>Área Académica temporal</label>
									</div>
								</div>
								<div class="col-md-12">
									<div class="row my-3">
										<div class="col text-center">
											<button type="submit" class="btn btn-primary">Aceptar</button>
										</div>
									</div>
								</div>
							</div>												
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-around">
		<div class="col-md-12 mb-4 text-center">
			<h2>Docentes prestados a otro departamento en este periodo</h2>
		</div>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_docentes_temp">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Docente</th>
							<th scope="col">Depto. origen</th>
                            <th scope="col">Depto. temporal</th>
                            <th scope="col">Cancelar</th>
                        </tr>
                        <thead>
                        <tbody id="tabla_docentes_temp_contenido">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= CONTROLLER ?>cbas/docentes/asignacion_temporal_docente.controller.js"></script>