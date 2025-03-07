<?php

use config\Router;
use config\Token;

require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary text-uppercase">Emisión de certificados</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-uppercase"><a href="<?= Router::redirigir('') ?>">Inicio</a></li>
            <li class="breadcrumb-item active text-uppercase"><a href="<?= Router::redirigir('emision_certificados') ?>">Emisión de certificados</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-4">Emisión de certificados</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-regular fa-address-card overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST" id="frm_certificados_emitir" name="frm_certificados_emitir">
        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_certificados_emitir") ?>" hidden>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                    <label for="fecha_emision" class="text-primary"><i class="fa-solid fa-calendar-days me-2"></i>Fecha de emisión</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="periodo" name="periodo">
                        <option value="" selected>Selecciona periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_director" name="nombre_director" placeholder="Nombre del director">
                    <label for="nombre_director" class="text-primary"><i class="fa-solid fa-signature me-2"></i>Nombre del director</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="iniciales_jefe" name="iniciales_jefe" placeholder="Iniciales del jefe de Depto. de SE.">
                    <label for="iniciales_jefe" class="text-primary small"><i class="fa-solid fa-signature me-2"></i>Iniciales del jefe de Depto. de SE.</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="no_registro" name="no_registro" placeholder="No. Registro">
                    <label for="no_registro" class="text-primary small"><i class="fa-solid fa-hashtag me-2"></i>No. Registro</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-8">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="libro" name="libro" placeholder="Libro">
                    <label for="libro" class="text-primary"><i class="fa-solid fa-book me-2"></i>Libro</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-7">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="fojas" name="fojas" placeholder="A fojas">
                    <label for="fojas" class="text-primary"><i class="fa-solid fa-filter me-2"></i>A fojas</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-5">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="Fecha de registro">
                    <label for="fecha_registro" class="text-primary"><i class="fa-solid fa-calendar me-2"></i>Fecha de registro</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio de equivalencia">
                    <label for="folio" class="text-primary"><i class="fa-solid fa-arrow-up-9-1 me-2"></i>Folio de equivalencia</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-5">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                    <label for="fecha" class="text-primary"><i class="fa-solid fa-calendar-week me-2"></i>Fecha</label>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 text-center">
                <div>Números de control a emitir</div>
            </div>
            <div class="col-12 text-center my-2 text-muted text-small">
                Rep -> Reposición &nbsp; &nbsp; Dup -> Duplicado
            </div>
        </div>
        <div class="row" id="seccion_num_ctrl">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_1" name="num_ctrl_1" placeholder="No. de control">
                                <label for="num_ctrl_1" class="text-small text-primary">1 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="rep1">
                                <label class="form-check-label text-small" for="rep1">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion1" id="dup1">
                                <label class="form-check-label text-small text-primary" for="dup1">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_2" name="num_ctrl_2" placeholder="No. de control">
                                <label for="num_ctrl_2" class="text-small text-primary">2 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="rep2">
                                <label class="form-check-label text-small" for="rep2">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion2" id="dup2">
                                <label class="form-check-label text-small text-primary" for="dup2">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="num_ctrl_3" name="num_ctrl_3" placeholder="No. de control">
                                <label for="num_ctrl_3" class="text-small text-primary">3 No. de control</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="rep3">
                                <label class="form-check-label text-small" for="rep3">Rep</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 border-top border-bottom border-end bg-white">
                            <div class="form-check mt-3 mb-3">
                                <input class="form-check-input" type="radio" name="opcion3" id="dup3">
                                <label class="form-check-label text-small text-primary" for="dup3">Dup</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row my-4">
            <div class="col text-center">
                <a href="<?= Router::redirigir('') ?>" class="btn btn-secondary text-white">Cancelar</a>
                <button type="button" class="btn btn-primary" id="btn_emitir_certificado">Emitir</button>
                <button type="button" class="btn btn-primary" id="btn_generar_num_ctrl">Generar mas No. de control</button>
            </div>
        </div>
    </form>
</div>