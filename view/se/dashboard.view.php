<?php

use config\Router;

require_once realpath('./vendor/autoload.php');
////composer dump-autoload
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('dashboard') ?>">Dashboard</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active small text-primary" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Alumnos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Numeros de Control</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Carrera</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="semestre-seccion" data-bs-toggle="tab" data-bs-target="#semestre-tab" type="button" role="tab" aria-controls="contact" aria-selected="false">Semestre</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="consultas-seccion" data-bs-toggle="tab" data-bs-target="#consultas-tab" type="button" role="tab" aria-controls="contact" aria-selected="false">Consultas</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link small text-primary" id="inscripciones-seccion" data-bs-toggle="tab" data-bs-target="#inscripciones-tab" type="button" role="tab" aria-controls="contact" aria-selected="false">Inscripciones</button>
                </li> -->
            </ul>
            <div class="tab-content" id="myTabContent">
                <!--------------------------------- Alumnos ----------------------------------------->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                        <div class="col">
                            <a href="<?= Router::redirigir('autorizacion_inscripcion') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-check fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Autorización de inscripciones</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('alumnos') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-plus fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Creacion de Alumnos</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="col">
                            <a href="<?= Router::redirigir('listado_alumno') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="far fa-list-alt  fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Listado de Alumnos</span>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <!-- <div class="col">
                            <a href="<?= Router::redirigir('alta_alumnos') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-check fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Alta de alumnos</span>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="col">
                            <a href="<?= Router::redirigir('modificaciones_alumno') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-pen fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Modificaciones de datos del alumno</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('examenes') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-file-signature fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Examenes especiales o globales</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('calificaciones_actas') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-file-contract fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Calificaciones y actas</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('historial_academico') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-clock-rotate-left fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Historial academico</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('mejores_promedios') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-medal fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Mejores Promedios</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('kardex') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-file-lines fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Kardex</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('adeudos') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-money-bill-wave fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Adeudos</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="col">
                            <a href="<?= Router::redirigir('eliminar_alumno') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-xmark fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Eliminar alumno</span>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="col">
                            <a href="<?= Router::redirigir('constancias') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-address-card fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Constancias</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!------------------------------ Seccion Numeros de control --------------->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                        <div class="col">
                            <a href="<?= Router::redirigir('ctrl') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-tachograph-digital fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Creacion de Numeros de control</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('listado_numeros_ctrl') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-rectangle-list fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Listado de numeros de control</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--------------------------- Seccion Carrera ---------------------------------------->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                        <div class="col">
                            <a href="<?= Router::redirigir('carreras') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-graduation-cap fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Carreras</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('especialidades') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-tie fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Especialidades</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('materias_se') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-book fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Materias</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('plan_curricular') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-file-lines fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Plan curricular</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                       <!--  <div class="col">
                            <a href="<?= Router::redirigir('emision_certificados') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-address-card fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Emisión de certificados</span>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <!-- <div class="col">
                            <a href="<?= Router::redirigir('actas_residencias') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-file fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Actas de residencias</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        -->
                    </div>
                </div>
                <!---------------------------- Seccion Semestre ------------------------------------->
                <div class="tab-pane fade" id="semestre-tab" role="tabpanel" aria-labelledby="semestre-tab">
                    <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                        <div class="col">
                            <a href="<?= Router::redirigir('periodos') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-calendar fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Periodos escolares</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('cierre_semestre') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-file-circle-xmark fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Cierre de semestre</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('actas_calificaciones') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-file-contract fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Actas de calificaciones</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('boletas') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-regular fa-address-card fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Boletas</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!---------------------------- Seccion Consultas ------------------------------------->
                <div class="tab-pane fade" id="consultas-tab" role="tabpanel" aria-labelledby="consultas-tab">
                    <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                        <div class="col">
                            <a href="<?= Router::redirigir('consulta_grupo') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-group fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Consulta de grupo</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('estadisticas') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-chart-simple fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Estadisticas</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('bajas_temporales') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-slash fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Bajas temporales</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('actas_sin_calificar') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-file-circle-xmark fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Actas sin calificar</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('alumnos_egresados') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-graduate fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Alumnos egresados</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('alumnos_generales') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-check fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Alumnos generales</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="<?= Router::redirigir('alumnos_inscritos') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-clipboard-user fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Alumnos Inscritos</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-----------------------------Seccion Inscripciones---------------------------->
                <!-- <div class="tab-pane fade" id="inscripciones-tab" role="tabpanel" aria-labelledby="inscripciones-tab">
                    <div class="row row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 my-3">
                        <div class="col">
                            <a href="<?= Router::redirigir('autorizacion_inscripcion') ?>" class="btn w-100 p-0">
                                <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-user-check fa-4x mx-auto d-block"></i>
                                        <span class="d-block mt-3">Autorización de inscripciones</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!------------------>

<!-- 
    FORMS 
- 
    BOTONES 
- home-tab 
- profile-tab
- contact-tab
- semestre-seccion
- consultas-seccion
 -->
