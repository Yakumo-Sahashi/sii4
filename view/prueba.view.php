<?php
	use config\Router;
	use config\Token;
	require_once realpath('./vendor/autoload.php');
?>
<div>
	<h1 class="fs-4 fw-bold text-primary">prueba</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i> Inicio</a></li>
			<li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">prueba</a></li>
		</ol>
	</nav>
</div>
<div class="container p-0">
	<div class="row justify-content-around py-5">
		<div class="col-md-12 text-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-12 col-small-12 mb-4">
						<form id="frm_prueba" method="POST" class="form-grup mb-3 ml-3 mr-3 ">
							<img src="<?=DEP_IMG?>user.png" alt="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>