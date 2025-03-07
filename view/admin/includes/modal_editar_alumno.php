<div class="modal fade" id="modal_editar_alumno" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_editar_alumno_label">Editar Alumno</h4>
                <button type="button" id="close" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Cancelar</button>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <?php
                    require_once './view/se/creacion_alumnos.php'
                ?>
            </div>
        </div>
    </div>
</div>