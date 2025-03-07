<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Captura de calificaciones</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Captura de calificaciones</a></li>
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
							<h3 class="me-auto mb-4">Captura de calificaciones</h3>
							<div class="col-md-12 text-center text-primary">
								<i class="fa-solid fa-list-check fa-5x mx-auto d-block"></i>
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
										<th scope="col">Acta</th>
                            			<th scope="col">Excel</th>
									</tr>
									<thead>
									<tbody id="tabla_materias">
									</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_capturar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_capturar" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <form id="frm_captura_cal_normal" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Captura de calificaciones</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="materia_normal" id="materia_normal" value="" readonly>
                                <label for="materia_normal">Materia</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="grupo_normal" id="grupo_normal" value="" readonly>
                                <label for="grupo_normal">Grupo</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="docente_normal" id="docente_normal" readonly>
                                <label for="docente_normal">Docente</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="periodo_normal" id="periodo_normal" value="" readonly>
                                <label for="periodo_normal">Periodo</label>
                            </div>
                        </div>
                        <hr class="my-2">
                    </div>
                    <div class="row my-4">
                        <div class="col-12 text-center">
                            <h4><b>Calificaciones</b></h4>
                        </div>
                    </div>
                    <div class="row justify-content-center" id="seccion_calificaciones">
                        <!-- Esta seccion se genera a travez de js -->
                        <hr class="my-2">
                        <div class="col-lg-1 col-md-4 col-sm-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="No." value="1" readonly>
                                <label for="" class="small">No.</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-8 col-sm-9">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-small" placeholder="No. Control" value="191190073" readonly>
                                <label for="" class="small">No. Control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-9">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-small" placeholder="Alumno" value="Hernandez Gutierrez Luis Alberto" readonly>
                                <label for="" class="small">Alumno</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" placeholder="Calificación" value="90">
                                <label for="" class="small">Calificación</label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="form-floating mb-3">
                                <select class="form-control" name="tipo_evaluacion">
                                </select>
                                <label for="" class="small">Tipo Evaluacion</label>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-12 text-center align-self-center">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="no_presento">
                                <label for="no_presento" class="form-check-label text-small">No Presento</label>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-3 col-sm-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control  text-center" readonly placeholder="Repite" value="S">
                                <label for="" class="small">Repite</label>
                            </div>
                        </div>
                        <hr class="my-2">
                        <!-- Esta seccion se genera a travez de js -->
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="btn_capturar_cal">Capturar</button>
            </div>
        </form>
    </div>
</div>
<script src="<?= CONTROLLER?>docente/captura_calificaciones.controller.js"></script>