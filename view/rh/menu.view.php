<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<li class="nav-item my-2">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <div class="small"><i class="fa-solid fa-user me-2"></i>Personal</div>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('creacion_empleado') ?>">
                        <i class="fa-solid fa-user-plus me-2"></i>
                        <span class="small">Creación de empleados</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('modificar_eliminar_registro') ?>">
                        <i class="fa-solid fa-address-card me-2"></i>
                        <span class="small">Modificar y eliminar registro</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('puestos') ?>">
                        <i class="fa-solid fa-users me-2"></i>
                        <span class="small">Puestos</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('jefes')?>">
                        <i class="fa-solid fa-user-tie me-2"></i>
                        <span class="small">Jefes</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('calendario')?>">
                        <i class="fa-solid fa-calendar-week me-2"></i>
                        <span class="small">Actualizar calendario</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('horarios_registro') ?>">
                        <i class="fa-solid fa-house-laptop me-2"></i>
                        <span class="small">Registro Horarios</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('listado_horario') ?>">
                        <i class="fa-solid fa-list me-2"></i>
                        <span class="small">Listado Horarios</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('horarios')?>">
                        <i class="fa-regular fa-clock me-2"></i>
                        <span class="small">Calculo de Incidencias</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <div class="small"><i class="fa-solid fa-book-open-reader me-2"></i>Reportes de personal</div>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('fichas_expediente') ?>">
                        <i class="fa-solid fa-image-portrait me-2"></i>
                        <span class="small">Fichas de expediente de personal</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('plantilla_personal') ?>">
                        <i class="fa-solid fa-clipboard-user me-2"></i>
                        <span class="small">Plantilla de personal</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('listado') ?>">
                        <i class="fa-solid fa-arrow-down-a-z me-2"></i>
                        <span class="small">Listado</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('puesto_personal_estructura')?>">
                        <i class="fa-regular fa-address-book me-2"></i>
                        <span class="small">Puesto de personal de acuerdo a estructura</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('personal')?>">
                        <i class="fa-solid fa-people-group me-2"></i>
                        <span class="small">Personal</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('plazas_reporte')?>">
                        <i class="fa-solid fa-user-group me-2"></i>
                        <span class="small">Reporte de plazas</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <div class="small"><i class="fa-solid fa-user-gear me-2"></i>Control de incidencias</div>
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('vigencia_periodo') ?>">
                        <i class="fa-solid fa-user-clock me-2"></i>
                        <span class="small">Vigencia de periodos</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('reportes') ?>">
                        <i class="fa-solid fa-address-book me-2"></i>
                        <span class="small">Reportes</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('justificacion') ?>">
                        <i class="fa-solid fa-user-lock me-2"></i>
                        <span class="small">Justificación</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('incidencia')?>">
                        <i class="fa-solid fa-table-cells me-2"></i>
                        <span class="small">Incidencia</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('horario_departamento')?>">
                        <i class="fa-solid fa-clock me-2"></i>
                        <span class="small">Horario por departamento</span>
                    </a>
                    <a class="nav-link collapsed mb-2" href="<?= Router::redirigir('estadistica')?>">
                        <i class="fa-solid fa-table-list me-2"></i>
                        <span class="small">Estadística</span>
                    </a>
                </div>
            </div>
        </div> -->
    </div>
</li>