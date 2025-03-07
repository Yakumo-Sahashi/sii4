<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">listado_horario</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">listado_horario</a></li>
		</ol>
	</nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Listado Horarios</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
					<i class="icono-seccion fa-solid fa-list overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container p-0">
	<div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="table-responsive">
                <!--table-bordered border-primary-->
                <table class="table table-sm table-responsive-lg table-striped table-hover" id="table_created_rooms">
                    <thead class="text-center fw-bolder">
						<th>No.</th>
                        <th>Nombre</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody id="tabla_horarios" class="text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?=CONTROLLER?>rh/horarios/listado_horario.controller.js"></script>