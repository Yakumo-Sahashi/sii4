<!-- <?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">REORGANIZAR CLAVE DE PUESTOS DE PERSONAL</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('puestos') ?>">PUESTOS</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir('reorganizar_clave') ?>">REORGANIZAR CLAVES DE PUESTOS DE PERSONAL</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Reorganizar clave de puestos de personal</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-user-check overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <a href="<?= Router::redirigir('puestos') ?>" class="btn btn-secondary text-white" id="btn_cancelar">Cancelar</a>
            <button type="button" class="btn btn-primary" id="btn_reorganizar">Reorganizar</button>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col my-3">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_reorganizar_clave">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Clave de Puesto</th>
                            <th scope="col">Puesto</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_reorganizar_clave">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->