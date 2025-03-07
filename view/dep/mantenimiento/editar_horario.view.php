<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
<div class="d-none" id="editar_horario_grupo_select">
    <div class="container">
        <div class="row">
            <div class="col text-center text-primary my-5">
                <h5> Actualización del horario</h5>
            </div>
        </div>
        <form action="" id="frm_act_horario" name="frm_act_horario">
            <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_act_horario")?>" hidden>
            <input type="text" id="id_actualizar_grupo" name="id_actualizar_grupo" value="" hidden>
            <input type="text" id="id_materia_actualizar" name="id_materia_actualizar" value="" hidden>
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="materia_actualizar" name="materia_actualizar" value="" disabled>
                        <label for="materia_actualizar" class="text-primary"><i class="fa-solid fa-book me-2"></i>Materia</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="capacidad_actualizar" name="capacidad_actualizar" value="">
                        <label for="capacidad_actualizar" class="text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Capacidad</label>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="grupo_actualizar" name="grupo_actualizar">
                        <label for="grupo_actualizar" class="text-primary"><i class="fa-solid fa-user-group me-2"></i>Grupo</label>
                    </div>
                    <div class="mb-3 border bg-white">
                        <label for="materia_exclusiva_act" class="form-label w-100 mt-1 text-primary">Materia exclusiva <i class="fa-solid fa-universal-access ms-2 small"></i></label>
                        <input class="form-check-input mb-2" type="checkbox" id="materia_exclusiva_act" value="option1">
                    </div>
                </div>
            </div>
            <div class="row justify-content-around mt-5">
                <div class="col-md-12 mb-3 text-center">
                    <h5>Horario Actual</h5>
                </div>
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-sm table-responsive-lg table-striped mt-3 text-center" id="tabla_horario">
                            <thead class="text-center fw-bolder">
                                <th>Hora</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miercoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                                <th>Sabado</th>
                            <thead>
                            <tbody id="tabla_horario_contenido">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-5" id="asignar_horario">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="row g-0">
                                    <div class="col-sm-4 col-md-6 text-start border-bottom pb-2 fw-bolder my-2">
                                        <h2 class="fs-5">Asignación de horas por semana</h2>
                                    </div>
                                    <div class="col-sm-4 col-md-2 fw-bolder my-2">
                                        <b><h5 id="total_horas"></h5></b>
                                    </div>
                                    <div class="col-sm-4 col-md-4 text-center border-bottom pb-2 fw-bolder my-2">
                                        <h2><span class="alert alert-success rounded-3 border-success p-2 g-0 fs-5" role="alert" id="contador_horas">Horas por asignar: </span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="tabla_horas" class="table-responsive">
                                    <table class="table table-sm table-responsive-lg">
                                        <thead class="text-center fw-bolder">
                                            <th>Hora</th>
                                            <th>Lunes</th>
                                            <th>Martes</th>
                                            <th>Miércoles</th>
                                            <th>Jueves</th>
                                            <th>Viernes</th>
                                            <th>Sábado</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="container text-center">
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="py-2 mb-1">
                                                                    <span><b>Inicial:</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="py-2 mb-1">
                                                                    <span><b>Final:</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="py-2 mb-1">
                                                                    <span><b>Aula:</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="py-2 mb-1">
                                                                    <span><b>HRS:</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php for ($i = 1; $i < 7; $i++) : ?>
                                                    <td>
                                                        <div class="container">
                                                            <div class="row my-2">
                                                                <div class="col-lg-12 text-center">
                                                                    <div class="input-group mb-2">
                                                                        <select class="form-select" name="hora_inicio<?= $i ?>" id="hora_inicio<?= $i ?>">
                                                                            <option value="">--:--</option>
                                                                            <?php for ($j = 7; $j < 21; $j++) : ?>
                                                                                <option value="<?= $j ?>"><?= $j > 9 ? $j : '0' . $j ?>:00</option>
                                                                            <?php endfor ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-lg-12 text-center">
                                                                    <div class="input-group mb-2">
                                                                        <select class="form-select" name="hora_fin<?= $i ?>" id="hora_fin<?= $i ?>"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-lg-12 text-center">
                                                                    <div class="input-group mb-2">
                                                                        <select class="form-control form-control-sm" name="aula<?= $i ?>" id="aula<?= $i ?>" disabled>
                                                                            <option value="">Aula</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col-lg-12 text-center">
                                                                    <div class="input-group mb-3">
                                                                        <input class="form-control" type="text" name="horas_dia<?= $i ?>" id="horas_dia<?= $i ?>" placeholder="hrs" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php endfor ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="button" class="btn btn-secondary text-white me-2" id="btn_cancelar_act">Cancelar</button>
                                <button type="submit" class="btn btn-primary" id="btn_act_horario">Actualizar horario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>