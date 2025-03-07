<?php
    use config\Router;
    use config\Token;
    use config\Sesion;
    require_once realpath('./vendor/autoload.php');
    date_default_timezone_set('America/Mexico_City');
	$hora = date("i:s");
?>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="staticBackdropLabel">Fotografia del alumno</h2>
            </div>
            <div class="modal-body" id="crear">
                <input type="text" name="alumno" hidden>
                <div>
                    <h1 class="text-center mb-3">Click sobre el circulo para cargar la fotografia</h1>
                    <div class="container-ft">
                        <div class="group">
                            <img src="<?=DEP_IMG?>/<?= Sesion::datos_sesion('rol')?>/fotografia.webp?img=<?=$hora?>" alt="" class="crop-image" id="crop-image">
                            <input type="file" name="input-file" id="input-file" accept=".png,.jpg,.jpeg">
                            <label for="input-file" class="label-file"><i class="fas fa-camera fa-3x"></i><br> Haz click
                                aquí para subir una fotografia</label>
                        </div>
                    </div>
                    <div class="modall">
                        <div class="modall-content">
                            <div class="modall-header">
                                <p>Recorta tu foto</p>
                            </div>
                            <div class="modall-body">
                                <div class="content-imagen-cropper">
                                    <img src="" alt="" class="img-cropper" id="img-cropper">
                                </div>
                                <div class="content-imagen-sample">
                                    <div src="" alt="" class="img-sample" id="img-croppered"></div>
                                </div>
                            </div>
                            <div class="modall-footer">
                                <button class="btn primary" id="cut">Recortar y cargar</button>
                                <button class="btn secundary" id="close">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cerrar_modal" class="btn btn-primary btn-lg"
                    data-bs-dismiss="modal">Finalizar</button>
                <button type="button" id="cancelar_modal" class="btn btn-danger btn-lg d-none"
                    data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- 
    FORMS 
- 
    BOTONES 
- cut
- close
- cerrar_modal
- cancelar_modal
 -->