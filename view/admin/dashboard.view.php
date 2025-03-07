<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('home') ?>">Dashboard</a></li>
        </ol>
    </nav>
</div>
<div class="container p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                <div class="col">
                    <a href="<?= Router::redirigir('creacion_usuarios') ?>" class="btn w-100 p-0">
                        <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-user-plus fa-4x mx-auto d-block"></i>
                                <span class="d-block mt-3">Creacion de usuarios</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?= Router::redirigir('usuarios') ?>" class="btn w-100 p-0">
                        <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                            <div class="card-body text-center">
                                <i class="fas fa-users fa-4x mx-auto d-block"></i>
                                <span class="d-block mt-3">Usuarios</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>