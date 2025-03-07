<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?= Router::redirigir('creacion_usuarios') ?>">
        <i class="fa-solid fa-user-plus me-2"></i>
        <span>Creacion de usuarios</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?= Router::redirigir('usuarios') ?>">
        <i class="fas fa-users me-2"></i>
        <span>Usuarios</span>
    </a>
</li>