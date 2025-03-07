<?php
	use config\Router;
	use config\Token;
	use config\Sesion;
	require_once realpath('./vendor/autoload.php');
	date_default_timezone_set('America/Mexico_City');
    $fecha_actual = date("Y-m-d");
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Horarios para examenes especiales o globales</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Horarios para examenes especiales o globales</a></li>
		</ol>
	</nav>
</div>
<div class="container p-0">
	<div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5 text-uppercase">Horarios para examenes especiales o globales</h4>
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
						<form id="frm_horarios_examenes" method="POST" class="form-grup mb-3 ml-3 mr-3 ">
							<input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_asignacion_grupo') ?>" hidden>
							<div class="row justify-content-center">
								<div class="col-lg-6 col-md-4 mb-3">
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
							</div>							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-around">
		<div class="col-md-12 mb-4 text-center">
			<h2>Materias seleccionadas para examen especial o global</h2>
		</div>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_examenes">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Alumnos</th>
                            <th scope="col">Presidente</th>
							<th scope="col">Fecha examen</th>
                            <th scope="col">Horario/ Aula</th>
                            <th scope="col">Programar</th>
                        </tr>
                        <thead>
                        <tbody id="tabla_examenes_contenido">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="solicitud_examen"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form id="frm_asignacion_horario" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Asignación de horarios para examenes especiales o globales</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="row justify-content-around mt-1 mb-3">
                        <div class="col-md-7 text-center">
							<input type="text" name="id_materia" id="id_materia" value="" hidden>
							<input type="text" name="id_sol_examen" id="id_sol_examen" value="" hidden>
							<div class="form-floating mb-3">
								<input type="text" readonly name="materia" id="materia" class="form-control"/>
								<label for="materia" class="text-primary text-small"><i class="fa-solid fa-file-signature me-2"></i>Materia</label>
							</div>
                        </div>
					</div>
					<div class="row justify-content-around mt-1 mb-3">
                        <div class="col-md-6 text-center">
							<div class="form-floating mb-3">
								<select class="form-select" id="select_presidente" name="select_presidente" aria-placeholder="Selecciona docente">
									<option value="" selected>Seleccionar docente</option>
								</select>
								<label for="select_presidente" class="text-primary"><i class="fa-solid fa-user-tie me-2"></i>Presidente</label>
							</div>
                        </div>
						<div class="col-md-6 text-center">
							<div class="form-floating mb-3">
								<select class="form-select" id="select_secretario" name="select_secretario" aria-placeholder="Selecciona docente">
									<option value="" selected>Seleccionar docente</option>
								</select>
								<label for="select_secretario" class="text-primary"><i class="fa-solid fa-user-tie me-2"></i>Secretari@</label>
							</div>
                        </div>
						<div class="col-md-6 text-center">
							<div class="form-floating mb-3">
								<select class="form-select" id="select_vocal" name="select_vocal" aria-placeholder="Selecciona docente">
									<option value="" selected>Seleccionar docente</option>
								</select>
								<label for="select_vocal" class="text-primary"><i class="fa-solid fa-user-tie me-2"></i>Vocal</label>
							</div>
                        </div>
					</div>
					<div class="row justify-content-around mt-1 mb-3">
						<div class="col-md-3">
							<div class="form-floating mb-3">
								<input type="date" class="form-control" id="fecha_examen" name="fecha_examen" aria-placeholder="fecha" min="<?=$fecha_actual?>"/>
								<label for="fecha_examen" class="text-primary text-small"><i class="fa-regular fa-calendar-days me-2"></i>Fecha examen</label>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-floating mb-3">
								<select class="form-select" id="hora_inicio" name="hora_inicio" aria-placeholder="Selecciona hora inicio">
									<option value="">--:--</option>	
									<?php for ($j = 7; $j < 21; $j++) : ?>
										<option value="<?= $j ?>"><?= $j > 9 ? $j : '0' . $j ?>:00</option>
									<?php endfor ?>
								</select>
								<label for="hora_inicio" class="text-primary text-small"><i class="fa-regular fa-clock me-2"></i>Hora inicio</label>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-floating mb-3">
								<select class="form-select" id="hora_fin" name="hora_fin" aria-placeholder="Selecciona hora fin">
									<option value="" selected></option>
								</select>
								<label for="hora_fin" class="text-primary text-small"><i class="fa-regular fa-clock me-2"></i>Hora fin</label>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-floating mb-3">
								<select class="form-select" id="aula" name="aula" aria-placeholder="Selecciona docente">
									<option value="" selected>Seleccionar aula</option>
								</select>
								<label for="aula" class="text-primary text-small"><i class="fa-solid fa-door-open me-2"></i>Aula</label>
							</div>
						</div>
                    </div>                                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Asignar</button>
            </div>
        </form>
    </div>
</div>

<script src="<?= CONTROLLER ?>cbas/alumnos/horarios_examenes.controller.js"></script>