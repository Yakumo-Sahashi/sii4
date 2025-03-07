<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
	$dias = ["","lunes","martes","miercoles","jueves","viernes","sabado"];
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">Registro Horario</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">registro_horario</a></li>
		</ol>
	</nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Registro Horario</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
					<i class="icono-seccion fa-solid fa-house-laptop overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-0">
	<div class="row justify-content-around py-5">
		<div class="col-md-12 text-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-small-12 mb-4">
						<form id="frm_registro_horario" method="POST" class="form-grup mb-3 ml-3 mr-3 " enctype="multipart/form-data">
							<input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_registro_horario")?>" hidden>
							<div class="row">
								<div class="col-lg-8 col-md-6">
									<div class="form-floating">
										<select name="seleccion_personal" class="form-select">
											<option value="" selected>Selección de personal</option>
										</select>
										<label for="seleccion_personal" class="text-primary text-small"><i class="fa-solid fa-arrow-down-a-z me-2"></i>Selección de personal</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-floating mb-3">
										<input type="text" class="form-control" id="id_checador" name="id_checador" placeholder="ID en checador">
										<label for="id_checador" class="text-primary"><i class="fa-solid fa-file-pen me-2"></i>ID en checador</label>
									</div>
								</div>
							</div>
							<div class="row mt-5" id="asignar_horario">
								<div class="accordion" id="accordionExample">
									<?php for ($i = 1; $i < 7; $i++) : ?>
									<div class="accordion-item">
										<h2 class="accordion-header" id="heading<?=$i?>">
											<button class="accordion-button text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$i?>" aria-expanded="true" aria-controls="collapse<?=$i?>">
												<i class="fa-solid fa-clock me-2"></i><?=strtoupper($dias[$i]);?>
											</button>
										</h2>
										<div id="collapse<?=$i?>" class="accordion-collapse collapse <?=$i == 1 ? 'show' : '' ?>" aria-labelledby="heading<?=$i?>" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<div class="container text-center">
													<div class="row justify-content-center">
														<div class="col-md-5">
															<div class="row my-2 justify-content-center">
																<div class="col-lg-12">
																	<div class="py-2 mb-1">
																		<span class="text-primary"><b><i class="fa-solid fa-hourglass-start me-2"></i>Entrada:</b></span>
																	</div>
																</div>
																<div class="col-lg-12">
																	<div class="py-2 mb-1">
																		<span class="text-success"><b><i class="fa-solid fa-hourglass-end me-2"></i>Salida:</b></span>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-5 justify-content-center">
															<div class="row my-2">
																<div class="col-lg-12">
																	<div class="input-group mb-2">
																		<select class="form-select" name="hora_inicio_<?=$dias[$i]?>1" id="hora_inicio_<?=$dias[$i]?>1">
																			<option value="">--:--</option>
																			<?php for ($j = 7; $j < 21; $j++) : ?>
																				<option value="<?= $j ?>"><?= $j > 9 ? $j : '0' . $j ?>:00</option>
																			<?php endfor ?>
																		</select>
																	</div>
																</div>
																<div class="col-lg-12">
																	<div class="input-group mb-2">
																		<select class="form-select" name="hora_fin_<?=$dias[$i]?>1" id="hora_fin_<?=$dias[$i]?>1" disabled></select>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="add_<?=$dias[$i]?>1"></div>
													<div class="row justify-content-end">
														<div class="col-md-2">
															<button type="button" class="btn btn-outline-primary" id="btn_add_horario<?=$i?>"><i class="fa-regular fa-square-plus me-2"></i>Añadir</button>
														</div>
														<div class="col-md-1"></div>
													</div>
                                                </div>
											</div>
										</div>
									</div>
									<?php endfor?>
								</div>
							</div>
							<div class="row justify-content-end mt-3">
								<div class="col">
									<button type="submit" class="btn btn-primary">Añadir horario</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= CONTROLLER ?>rh/horarios/cargar_horarios.controller.js"></script>