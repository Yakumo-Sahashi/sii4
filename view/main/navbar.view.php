<?php
    use config\Sesion;
    use config\Router;
    require_once ('./vendor/autoload.php');
?>
<aside class="sidebar bg-white" id="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="<?=Router::redirigir('')?>">
                <i class="fa-solid fa-grip me-2"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-heading">Funciones</li>
        <?php
            $usuario = in_array(Sesion::datos_sesion("rol"),CARRERA) ? 'cbas' : strtolower(Sesion::datos_sesion("rol"));
            require_once 'view/'.$usuario.'/menu.view.php'; 
        ?>
        <!-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="fa-solid fa-cubes-stacked"></i><span>Componentes</span><i
                    class="fa-solid fa-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="components-nav" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="alertas">
                        <i class="bi bi-circle"></i><span>Alertas</span>
                    </a>
                </li>
                <li>
                    <a href="botones">
                        <i class="bi bi-circle"></i><span>Botones</span>
                    </a>
                </li>
                <li>
                    <a href="cartas">
                        <i class="bi bi-circle"></i><span>Cartas</span>
                    </a>
                </li>
            </ul>
        </li> -->
        <li class="nav-heading">General</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="perfil">
                <i class="fa-solid fa-address-card me-2"></i> <span>Perfil</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-bs-toggle="modal" data-bs-target="#modal_ciclo">
                <i class="fas fa-calendar me-2"></i> <span>Ciclo</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link collapsed disabled" href="pagina_blanco">
                <i class="fa-regular fa-file me-2"></i> <span>Página en blanco</span>
            </a>
        </li> -->
    </ul>
</aside>