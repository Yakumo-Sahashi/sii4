<?php
    use config\Router;
    require_once realpath('./vendor/autoload.php');
?>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?=Router::redirigir('dashboard_admin')?>">
        <i class="fa-solid fa-chalkboard me-2"></i>
        <span>Administrador</span>
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
<li class="nav-item">
    <a class="nav-link collapsed" href="<?=Router::redirigir('dashboard_rh')?>">
        <i class="fa-solid fa-person-chalkboard me-2"></i>
        <span>Recursos Humanos</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?=Router::redirigir('dashboard_departamento')?>">
        <i class="fa-solid fa-person-shelter me-2"></i>
        <span>Jefe De Carrera</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="<?=Router::redirigir('aprobar_ctrl')?>">
        <i class="fas fa-check-double me-2"></i>
        <span>Aprobar Numeros de Control</span>
    </a>
</li>