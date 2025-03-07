<?php

use config\Router;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('') ?>">Dashboard</a></li>
        </ol>
    </nav>
</div>

<div class="container mb-5">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active small text-primary" id="certificacion-seccion" data-bs-toggle="tab" data-bs-target="#certificacion-tab" type="button" role="tab" aria-controls="contact" aria-selected="true">Funciones Docente</button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <!------------------------------ seccion información escolar ------------------------------------>
            <div class="tab-pane fade show active" id="certificacion-tab" role="tabpanel" aria-labelledby="certificacion-tab">
                <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('reporte_curso') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file-contract fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Reporte de inicio de curso</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('calificaciones_parciales') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-pen fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Calificaciones parciales</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('periodo_curso') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-calendar-week fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Captura calificaciones</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col">
                        <a href="<?= Router::redirigir('horario_docente') ?>" class="btn w-100 p-0">
                            <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-clock fa-4x mx-auto d-block"></i>
                                    <span class="d-block mt-3">Horario del periodo en curso</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>