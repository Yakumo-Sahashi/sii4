<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Asignación a grupo</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Asignación a grupo</a></li>
		</ol>
	</nav>
</div>
<div class="container p-0">
	<div class="row justify-content-center">
        <h4 class="text-center mt-3 mb-5">ASIGNACIÓN A GRUPO</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 aling-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
	<div class="row justify-content-around py-5" >
		<div class="col-md-12 text-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-small-12 mb-4">
						<form id="frm_asignacion_grupo" method="POST" class="form-grup mb-3 ml-3 mr-3 ">
							<input type="text" id="tk_frm" value="<?= Token::generar_token_frm('frm_asignacion_grupo') ?>" hidden>
							<div class="row justify-content-center">
								<div class="col-lg-6 col-md-4 mb-3">
									<div class="form-floating">
										<input type="text" readonly name="seleccion_departamento_plaza" id="seleccion_departamento_plaza" class="form-control"/>
										<label for="seleccion_departamento_plaza" class="text-primary text-small"><i class="fa-solid fa-building-user me-2"></i>Selecciona el departamento</label>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-lg-3 col-md-3 mb-3">
									<div class="form-floating mb-3">
										<input type="text" readonly class="form-control" id="periodo" name="periodo" placeholder="Periodo"/>
										<label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
									</div>
								</div>
								<div class="col-lg-6 col-md-4 mb-3">
									<div class="form-floating">
										<select name="carrera_reticula" id="carrera_reticula" class="form-select">
											<option value="" selected>Selecciona la carrera</option>
										</select>
										<label for="carrera_reticula" class="text-primary text-small"><i class="fa-solid fa-graduation-cap me-2"></i>Selecciona la carrera</label>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 mb-3">
									<div class="form-floating mb-3">
										<select class="form-select" id="semestre" name="semestre" aria-placeholder="Selecciona el tipo">
											<option value="0" selected>Todos</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
										</select>
										<label for="semestre" class="text-primary"><i class="fa-solid fa-filter me-2"></i></i>Semestre</label>
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
	<div class="row justify-content-around d-none" id="tabla_horarios_m">
		<div class="col-md-12 mb-4 text-center">
			<h2>Lista de grupos existentes</h2>
		</div>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_horario_grupos">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Gpo</th>
                            <th scope="col">Cap</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo</th>
                            <th scope="col">Inscr</th>
                        </tr>
                        <thead>
                        <tbody id="tabla_horario_grupos_contenido">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="docentes_area"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <form id="frm_asignacion_docente" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Asignación de docente a grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="row justify-content-around mt-1 mb-3">
                        <div class="col-md-12 text-center">
							<input type="text" name="id_grupo_add" id="id_grupo_add" value="" hidden>
                        </div>
						<div class="col-12">
							<div class="form-floating mb-3">
								<input type="text" readonly name="materia" id="materia" class="form-control"/>
								<label for="materia" class="text-primary text-small"><i class="fa-solid fa-file-signature me-2"></i>Materia</label>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating mb-3">
								<input type="text" readonly name="grupo" id="grupo" class="form-control"/>
								<label for="grupo" class="text-primary text-small"><i class="fa-solid fa-people-group me-2"></i>Grupo</label>
							</div>
						</div>
                        <div class="col-12 text-center">
							<div class="form-floating mb-3">
								<select class="form-select" id="select_docente" name="select_docente" aria-placeholder="Selecciona docente">
									<option value="" selected>Seleccionar docente</option>
								</select>
								<label for="select_docente" class="text-primary"><i class="fa-solid fa-user-tie me-2"></i>Docente</label>
							</div>
                        </div>
						<div class="col-12 text-end">
							<div class="form-check form-check-inline text-primary">
								<input class="form-check-input" type="checkbox" id="permitir_cruce" name="permitir_cruce" value="1">
								<label class="form-check-label" for="permitir_cruce">Permitir cruce de horario <i class="fa-solid fa-hourglass-half me-2"></i></label>
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

<script src="<?= CONTROLLER ?>cbas/docentes/asignacion_grupo.controller.js"></script>