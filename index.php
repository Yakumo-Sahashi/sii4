<?php error_reporting(E_ALL ^ E_NOTICE);?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        require_once 'app/Config/Config.php';
        require_once 'app/dependencias.php';
    ?>
</head>
<body class="bg-light">
    <?php require_once 'view/main/loader.view.php';?>
    <?php require_once 'view/main/header.view.php';?>
    <script src="<?=DEP_SCRIPT;?>b5/bootstrap.bundle.min.js"></script>
    <script src="<?=CONTROLLER;?>main.js"></script>
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <main class="main" id="main">
            <section class="section my-4">
                <?php 
                    use config\Sesion;
                    use config\Router;
                    use config\Token;
                    require_once realpath('./vendor/autoload.php');
                    Router::direccion();
                ?>
            </section>
        </main>
        <a href="<?= Router::redirigir('')?>" class="btn-flotante"><i class="fa-solid fa-house"></i></a>
        <a href="#" class="d-flex align-items-center justify-content-center back-to-top text-white"><i class="fa-solid fa-chevron-up"></i></a>
        <?php require_once 'view/main/footer.view.php';?>
    </div>
    <?php require_once 'view/main/ciclo.modal.php'; ?>
    <?php 
    if(Sesion::validar_sesion()):?>
    <script src="<?=CONTROLLER;?>sesion/sesion.controller.js"></script>
    <!-- <script src="<?=CONTROLLER;?>notificacion/notificacion.controller.js"></script> -->
    <?php endif;?>
    <script src="<?=CONTROLLER;?>interfaz.js"></script>
</body>
</html>