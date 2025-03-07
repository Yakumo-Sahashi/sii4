<?php

use config\Router;


require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">SOLICITUD DE SERVICIO SOCIAL</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('servicio_social') ?>">SOLICITUD DE SERVICIO SOCIAL</a></li>
        </ol>
    </nav>
</div>
