<?php

use config\Router;
use config\Token;

?>

<div class="modal fade" id="modal_modificar_plaza" tabindex="-1" aria-labelledby="modificar_plazaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modificar_plazaModalLabel">Modificar plaza</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="" method="post" id="frm_modificar_plaza" name="frm_modificar_plaza">
                        <input type="text" id="tk_frm" name="tk_frm" value="<?= Token::generar_token_frm("frm_modificar_plaza") ?>" hidden>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-floating">
                                    <select name="actualizar_seleccion_personal" id="actualizar_seleccion_personal" class="form-select">
                                        <option value="" selected>Selecciona el personal</option>
                                    </select>
                                    <label for="actualizar_seleccion_personal" class="text-primary text-small"><i class="fa-solid fa-id-card me-2"></i>Personal</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-floating">
                                    <select name="actualizar_seleccion_categoria" id="actualizar_seleccion_categoria" class="form-select">
                                        <option value="" selected>Selecciona la categoria</option>
                                    </select>
                                    <label for="actualizar_seleccion_categoria" class="small text-primary"><i class="fa-solid fa-book me-2"></i>Categoria</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="actualizar_diagonal" name="actualizar_diagonal">
                                    <label for="actualizar_diagonal" class="small text-primary"><i class="fa-solid fa-list-ol me-2"></i></i>Diagonal</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="actualizar_unidad" name="actualizar_unidad">
                                    <label for="actualizar_unidad" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Unidad</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="actualizar_sub_unidad" name="actualizar_sub_unidad">
                                    <label for="actualizar_sub_unidad" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Sub-Unidad</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="actualizar_horas" name="actualizar_horas">
                                    <label for="actualizar_horas" class="small text-primary"><i class="fa-solid fa-clock me-2"></i>Horas</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control small" id="actualizar_efecto_iniciales" name="actualizar_efectos_iniciales">
                                    <label for="actualizar_efectos_iniciales" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Efecto iniciales</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control small" id="actualizar_efectos_finales" name="actualizar_efectos_finales">
                                    <label for="actualizar_efectos_finales" class="small text-primary"><i class="fa-solid fa-arrow-down-1-9 me-2"></i>Efectos finales</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <div class="form-floating">
                                    <select name="actualizar_seleccion_estatus" id="actualizar_seleccion_estatus" class="form-select">
                                        <option value="" selected>Selecciona el estatus</option>
                                    </select>
                                    <label for="actualizar_seleccion_estatus" class="text-primary text-small"><i class="fa-solid fa-rectangle-ad me-2"></i>Estatus</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_guardar_cambios">Guardar cambios</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>