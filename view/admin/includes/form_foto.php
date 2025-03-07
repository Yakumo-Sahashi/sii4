<div>
    <h1 class="text-center mb-3">Click sobre el circulo para cargar la fotografia</h1>
    <div class="container-ft">
        <div class="group">
            <img src="<?=DEP_IMG?>/user.png" alt="" class="crop-image" id="crop-image">
            <input type="file" name="input-file" id="input-file" accept=".png,.jpg,.jpeg">
            <label for="input-file" class="label-file"><i class="fas fa-camera fa-3x"></i><br> Haz click aquí para subir una fotografia</label>
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