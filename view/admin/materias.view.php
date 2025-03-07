<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Materias</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=Router::redirigir('')?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?=Router::redirigir($_GET['view'])?>">Materias</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3">
    <div class="row justify-content-center py-2">
        <div class="col text-center">
                <div class="row d-md-flex justify-content-center mb-4"> 
                    <h3 id="form-part" class="me-auto mb-4"></h3>
                    <div class="col-lg-12 col-md-6 align-self-center text-center">
                        <div class="form-floating">
                            <select class="form-select" id="carrera">
                                <option value="" selected>Seleccionar carrera</option>
                            </select>
                            <label class="text-primary" for="carrera"><i class="fa-solid fa-filter me-2"></i>Carrera</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4 my-5">
        <div class="col mb-5">
            <div class="card-materia text-center mb-3 w-50 position-relative">
                <div class="card-body">
                    <i class="img-fluid fas fa-9x fa-book card-icono-materia mb-4"></i>
                    <h6 class="card-title">Calculo diferencial</h6>
                    <div>ACF-0901</div>
                    <div class="fs-6">3-2-5</div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <button class="btn rounded-circle boton-ver-card">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn rounded-circle boton-editar-card">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn rounded-circle boton-eliminar-card">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <span type="button" data-bs-toggle="modal" data-bs-target="#modalHistorial" class="position-absolute top-0 start-100 translate-middle p-2 border rounded-circle historial-card">
                    <i class="fa-solid fa-clock-rotate-left historial-icon"></i>
                    <span class="visually-hidden">Historial</span>
                </span>
            </div>
        </div>
    </div>
</div>