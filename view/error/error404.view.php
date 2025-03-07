<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Error 404</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>">Inicio</a></li>
            <li class="breadcrumb-item active">Error 404</li>
        </ol>
    </nav>
</div>
<div class="container p-0">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <img src="<?=DEP_IMG?>itma2.png" class="img-fluid mb-3" alt="Cargando...">
                <h1 class="text-primary">404</h1>
                <h2 class="text-secondary mb-5">La página que busca no esta disponible.</h2>
                <a class="btn btn-primary btn-lg" href="<?=Router::redirigir('')?>">Regresar</a>
            </div>
        </div>
    </div>
</div>