<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Generar reticula</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir($_GET['view'])?>">Generar reticula</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <form id="frm_reticula"  enctype="multipart/form-data" method="POST">
                <div class="form-floating">
                    <select class="form-select" id="carrera" name="carrera">
                        <option value="" selected>Seleccionar Carrera</option>
                    </select>
                    <label for="carrera" class="text-primary"><i class="fa-solid fa-filter me-2"></i> Carrera</label>
                </div>
            </form>
        </div>
    </div>
</div>