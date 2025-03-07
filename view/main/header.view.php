<?php
    use config\Sesion;
    use config\Router;
    require_once ('./vendor/autoload.php');
    date_default_timezone_set('America/Mexico_City');
	$hnav = date("i:s");
?>
<header class="header fixed-top bg-white shadow" id="header">
    <div class="h-100 d-none d-sm-flex d-md-flex d-lg-flex align-items-center justify-content-between px-3 py-2 bg-light">
        <div class="d-none d-sm-inline d-md-inline d-lg-inline">
            <img src="<?=DEP_IMG?>educacion.png" class="border-end pe-3" height="40px"
                alt="Cargando...">
            <img src="<?=DEP_IMG?>tecnm.png" class="border-end ps-1 pe-3" height="40px"
                alt="Cargando...">
            <img src="<?=DEP_IMG?>itma2.png" class="ps-2" height="40px" alt="Cargando...">
        </div>
        <div class="d-inline">
            <h1 class="d-none d-lg-inline text-secondary fs-5">Sistema Integral de Información | TecNM Campus Milpa Alta
                II</h1>
            <h1 class="d-none d-lg-none d-md-inline text-secondary fs-5">SII | TecNM Campus Milpa Alta II</h1>
            <h1 class="d-none d-lg-none d-md-none d-sm-inline text-secondary fs-5">SII</h1>
        </div>
    </div>
    <?php if(Sesion::validar_sesion()): ?>
    <div class="d-flex align-items-center justify-content-between w-100">
        <div class="d-flex align-items-center justify-content-between ms-3">
            <button type="button" class="btn btn-link toggle-sidebar-btn me-3"><i class="fa-solid fa-bars text-primary"></i></button>
            <div href="#" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block me-lg-3 text-primary fw-bold"><?=Sesion::datos_sesion('rol')?></span>
            </div>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-bell"></i>
                        <span class="badge bg-danger badge-number" id="noti">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            Tiene <b id="noti_2"></b> notificación(es)
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <div id="notificacion_2"></div>
                        <li class="dropdown-footer">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_notificaciones" ><span class="badge rounded-pill bg-primary p-2 ms-2">Mostrar todas las notificaciones</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?=DEP_IMG?><?=Sesion::datos_sesion('rol')?><?= Sesion::datos_sesion('rol') == "ALUMNO" || Sesion::datos_sesion('rol') == "DOCENTE" ? '/'.Sesion::datos_sesion('id_usuario') : ""?>/fotografia.webp?img=<?=$hnav?>" alt="Cargando..."
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?=Sesion::datos_sesion('nombre_persona').' '.Sesion::datos_sesion('apellido_paterno').' '.Sesion::datos_sesion('apellido_materno')?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?=Sesion::datos_sesion('correo_usuario')?></h6>
                            <span><?=Sesion::datos_sesion('descripcion_rol')?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?=Router::redirigir('perfil')?>">
                                <i class="fa-solid fa-user me-2"></i> 
                                <span>Mi perfil</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <button class="dropdown-item d-flex align-items-center" id="btn_cerrar_sesion">
                                <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                <span>Cerrar sesión</span>
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <?php endif?>
</header>
<?php 
    if(Sesion::validar_sesion()){
        require_once "navbar.view.php";
        //require_once 'notificaciones.modal.php';
    }
?>