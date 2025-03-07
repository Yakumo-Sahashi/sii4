<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?=Router::redirigir('aprobar_ctrl')?>">
        <i class="fas fa-check-double me-2"></i>
        <span>Aprobar Numeros de Control</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?=Router::redirigir('dashboard_se')?>">
        <i class="fa-solid fa-school-circle-check me-2"></i>
        <span>Servicios Escolares</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?=Router::redirigir('dashboard_dep')?>">
        <i class="fa-solid fa-chalkboard-user me-2"></i>
        <span>Division de Estudios Profesionales</span>
    </a>
</li>