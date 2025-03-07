<?php
    use config\Router;
    use config\Token;
    use config\Sesion;
    require_once realpath('./vendor/autoload.php');
?>
<div>
    <h1 class="fs-4 fw-bold text-primary">Examenes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Examenes</a></li>
        </ol>
    </nav>
</div>
<div class="container p-3 mt-5" id="solicitud_examen_expecial_sol">
    <div class="row justify-content-center py-2">
        <div class="col-lg-12 text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4">Solicitud de examen especial o global </h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center">
                    <div class="float-start mb-3">
                        <img id="img_foto" class="thumb fa-solid fa-graduation-cap text-primary" src="" style="overflow: hidden;">
                        <div class="btn-group-vertical mb-5 mx-0 px-0">
                            <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_solicitud">
        <div class="row justify-content-center py-2">
            <div class="col-6">
                <div class="form-floating">
                    <input type="text" class="form-control" name="numero_de_control" placeholder="Numero de control">
                    <label for="num_control" class="text-primary"><i class="fas fa-sort-numeric-down"></i> Numero de control</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <select class="form-select" name="periodo" aria-label="Floating label select example">
                        <option value="" selected>Seleccione el periodo</option>
                    </select>
                    <label for="periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-2">
            <div class="col text-center mt-4">
                <button class="btn btn-primary" type="submit" id="btn_solicitar">Solicitar</button>
            </div>
        </div>
    </form>
</div>

<!-- Seccion de solicitud -->
<div class="container d-none" id="datos_alumno">
    <div class="row justify-content-center py-2">
        <h3 class="text-center mb-4">Datos del alumno</h3>
        <div class="col-lg-2">
            <div class="float-start mb-3 mt-2">
                <span type="button"><img name="img_foto" id="img_foto" class="thumb" src="public/img/user.png" title="fotografia" alt="fotografia"></span>
                <div class="btn-group-vertical mb-5 mx-0 px-0">
                    <button id="ver_img" type="button" class="btn btn-outline-primary border-0 mb-4 d-none" title="Editar fotografia"><i class="fa-solid fa-pen-to-square"></i></button>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <form id="frm_examen_solicitud" class="row justify-content-center py-2" method="POST">
                <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_examen_solicitud")?>" hidden>
                <input type="text" id="id_num_control" name="id_num_control" hidden>
                <div class="col-lg-6">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="nombre_alumno" name="nombre_alumno" value="Hernandez Gutierrez Luis Alberto" disabled>
                        <label for="nombre_alumno" class="small">Nombre del alumno</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="numero_control" name="numero_control" value="191190073" disabled>
                        <label for="numero_control" class="small">Numero de control</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="numb" class="form-control small" id="semestre" name="semestre" value="7" disabled>
                        <label for="floatingInputValue" class="small">Semestre</label>
                    </div>
                </div>
                <div class="row justify-content-center py-2">
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="periodo_escolar" name="periodo_escolar" value="" disabled>
                        <label for="periodo_escolar" class="small">Periodo escolar</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="carrera" name="carrera" value="SIS" disabled>
                        <label for="carrera" class="small">Carrera</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="prom_acumulado" name="prom_acumulado" value="4.3" disabled>
                        <label for="prom_acumulado" class="small">Prom. acumulado</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="especialidad" name="especialidad" value="Desarrollo web" disabled>
                        <label for="especialidad" class="small">Especialidad</label>
                    </div>
                </div>
                </div>
                <div class="row justify-content-end py-2 mt-3">
                <hr>
                <div class="col-lg-5">
                    <div class="form-floating">
                        <select class="form-select" id="materia" name="materia">
                            <option selected>Seleccionar materia </option>
                        </select>
                        <label for="materia" class="text-primary"><i class="fa-solid fa-book me-2"></i>Materia</label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-floating">
                        <input type="text" class="form-control small" id="autorizacion" name="autorizacion" value="">
                        <label for="autorizacion" class="text-primary"><i class="fa-regular fa-square-check me-2"></i>No. Autorizacion</label>
                    </div>
                </div>
                <div class="col-lg-3 bg-white border">
                    <div class="form-check form-switch mt-3">
                        <input class="form-check-input" type="checkbox" role="switch" id="examen_global" name="examen_global" checked>
                        <label class="form-check-label text-primary" for="examen_global">Examen Global</label>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center py-2 mt-3">
                    <div class="col text-center">
                        <button type="button" class="btn btn-danger" id="btn_cancelar">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_agregar_examen">Agregar Examen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col">
            <form action="<?=SERVIDOR?>app/docs/ex_especial.doc.php" method="post" class="text-center" target="_blank">
                <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_ex_especial")?>" hidden>
                <input type="text" id="ex_numero_de_control" name="ex_numero_de_control" value="" hidden>
                <input type="text" id="ex_periodo" name="ex_periodo" value="" hidden>
                <button type="submit" class="btn btn-success mb-4 mt-2" id="btn_imprimir"><i class="fa-solid fa-print"></i> Imprimir</button>
            </form>
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_listado_examenes">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Periodo escolar</th>
                            <th scope="col">Autorizacion</th>
                            <th scope="col">Examen global</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    <thead>   
                    <tbody id="tabla_examenes">                        
                    </tbody>                
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= CONTROLLER ?>se/examenes/examenes.controller.js"></script>
<!-- 
FORMS 
- frm_solicitud
- frm_actualizar_carrera
- 

BOTONES
- btn_solicitar
- ver_img
- btn_agregar_examen
- btn_actualizar_cancelar
- btn_actualizar
Boton linea 156 sin id 
Boton linea 141 sin id 
 -->