<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<li class="nav-item my-2">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="small"><i class="fa-solid fa-user me-2"></i>Alumnos</div>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('autorizacion_inscripcion') ?>">
                        <i class="fa-solid fa-user-check me-2"></i>
                        <span class="small">Autorización de inscripción</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alumnos') ?>">
                        <i class="fa-solid fa-user-plus me-2"></i>
                        <span class="small">Creacion de alumnos</span>
                    </a>
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('listado_alumno') ?>">
                        <i class="far fa-list-alt me-2"></i>
                        <span class="small">Listado de alumnos</span>
                    </a> -->
                    <!-- <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alta_alumnos') ?>">
                        <i class="fa-solid fa-user-check me-2"></i>
                        <span class="small">Alta de alumnos</span>
                    </a> -->
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('modificaciones_alumno') ?>">
                        <i class="fa-solid fa-user-pen me-2"></i>
                        <span class="small">Modificaciones de datos del alumno</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('calificaciones_actas') ?>">
                        <i class="fa-solid fa-file-contract me-2"></i>
                        <span class="small">Calificaciones y actas</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('historial_academico') ?>">
                        <i class="fa-solid fa-clock-rotate-left me-2"></i>
                        <span class="small">Historial academico</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('examenes') ?>">
                        <i class="fa-solid fa-file-signature me-2"></i>
                        <span class="small">Examenes especial o globales</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('mejores_promedios') ?>">
                        <i class="fa-solid fa-medal me-2"></i>
                        <span class="small">Mejores promedios</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('kardex') ?>">
                        <i class="fa-regular fa-file-lines me-2"></i>
                        <span class="small">Kardex</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('adeudos') ?>">
                        <i class="fa-solid fa-money-bill-wave me-2"></i>
                        <span class="small">Adeudos</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('constancias') ?>">
                        <i class="fa-regular fa-address-card me-2"></i>
                        <span class="small">Constancias</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <div class="small"><i class="fa-regular fa-rectangle-list me-2"></i> Numeros de control</div>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed" href="<?= Router::redirigir('ctrl') ?>">
                        <i class="fa-solid fa-tachograph-digital me-2"></i>
                        <span class="small">Creacion de numeros de control</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('listado_numeros_ctrl') ?>">
                        <i class="fa-regular fa-rectangle-list me-2"></i>
                        <span class="small">Listado de numeros de control</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed fw-lighter text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <div class="small"><i class="fa-solid fa-graduation-cap me-2"></i> Carrera</div>
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed" href="<?= Router::redirigir('carreras') ?>">
                        <i class="fa-solid fa-graduation-cap me-2"></i>
                        <span class="small">Carreras</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('especialidades') ?>">
                        <i class="fa-solid fa-user-tie me-2"></i>
                        <span class="small">Especialiades</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('materias_se') ?>">
                        <i class="fa-solid fa-book me-2"></i>
                        <span class="small">Materias</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('plan_curricular') ?>">
                        <i class="fa-regular fa-file-lines me-2"></i>
                        <span class="small">Plan curricular</span>
                    </a>
                    <!-- <a class="nav-link collapsed" href="<?= Router::redirigir('emision_certificados') ?>">
                        <i class="fa-regular fa-address-card me-2"></i>
                        <span class="small">Emisión de certificados</span>
                    </a> -->
                   <!--  <a class="nav-link collapsed" href="<?= Router::redirigir('actas_residencias') ?>">
                        <i class="fa-regular fa-file me-2"></i>
                        <span class="small">Actas de residencias</span>
                    </a> -->
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingSemestre">
                <button class="accordion-button collapsed fw-lighter text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSemestre" aria-expanded="false" aria-controls="flush-collapseSemestre">
                    <div class="small"><i class="fa-solid fa-arrow-up-1-9 me-2"></i> Semestre</div>
                </button>
            </h2>
            <div id="flush-collapseSemestre" class="accordion-collapse collapse" aria-labelledby="flush-headingSemestre" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed" href="<?= Router::redirigir('periodos') ?>">
                        <i class="fa-regular fa-calendar me-2"></i>
                        <span class="small">Periodos Escolares</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('cierre_semestre') ?>">
                        <i class="fa-solid fa-file-circle-xmark me-2"></i>
                        <span class="small">Cierre de semestre</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('actas_calificaciones') ?>">
                        <i class="fa-solid fa-file-contract me-2"></i>
                        <span class="small">Actas de calificaciones</span>
                    </a>
                    <a class="nav-link collapsed" href="<?= Router::redirigir('boletas') ?>">
                        <i class="fa-regular fa-address-card me-2"></i>
                        <span class="small">Boletas</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Consultas -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingConsultas">
                <button class="accordion-button collapsed fw-lighter text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseConsultas" aria-expanded="false" aria-controls="flush-collapseConsultas">
                    <div class="small"><i class="fa-solid fa-magnifying-glass me-2"></i>Consultas</div>
                </button>
            </h2>
            <div id="flush-collapseConsultas" class="accordion-collapse collapse" aria-labelledby="flush-headingSemestre" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('consulta_grupo') ?>">
                        <i class="fa-solid fa-user-group me-2"></i>
                        <span class="small">Consulta de grupo</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('estadisticas') ?>">
                        <i class="fa-solid fa-chart-simple me-2"></i>
                        <span class="small">Estadisticas</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('bajas_temporales') ?>">
                        <i class="fa-solid fa-user-slash me-2"></i>
                        <span class="small">Bajas temporales</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('actas_sin_calificar') ?>">
                        <i class="fa-solid fa-file-circle-xmark me-2"></i>
                        <span class="small">Actas sin calificar</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alumnos_egresados') ?>">
                        <i class="fa-solid fa-user-graduate me-2"></i>
                        <span class="small">Alumnos egresados</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alumnos_generales') ?>">
                        <i class="fa-solid fa-user-check me-2"></i>
                        <span class="small">Alumnos generales</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('alumnos_inscritos') ?>">
                        <i class="fa-solid fa-clipboard-user me-2"></i>
                        <span class="small">Alumnos Inscritos</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</li>