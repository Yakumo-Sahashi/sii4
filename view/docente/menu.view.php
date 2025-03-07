<?php

use config\Router;

require_once realpath('./vendor/autoload.php');
?>
<li class="nav-item my-2">
    <div class="accordion accordion-flush" id="accordion-alumnos">
        <!----------------Sección Inscripciones----------------->
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-grupos">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="small"><i class="fa-solid fa-book me-2"></i>Funciones Docente</div>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordion-alumnos">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('reporte_curso') ?>">
                        <i class="fa-solid fa-file-contract me-2"></i>
                        <span class="small">Reporte de inicio de curso</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('calificaciones_parciales') ?>">
                        <i class="fa-solid fa-pen me-2"></i>
                        <span class="small">Calificaciones parciales</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('periodo_curso') ?>">
                        <i class="fa-solid fa-calendar-week me-2"></i>
                        <span class="small">Captura calificaciones</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('horario_docente') ?>">
                        <i class="fa-solid fa-clock me-2"></i>
                        <span class="small">Horario del periodo en curso</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</li>