<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="staticBackdropLabel">Fotografia del alumno</h2>
      </div>
      <div class="modal-body" id="crear">
        <input type="text" name="alumno" hidden>
        <?php require_once 'form_foto.php'; ?>      
      </div>
      <div class="modal-footer">
        <button type="button" id="cerrar_modal" class="btn btn-primary btn-lg" data-bs-dismiss="modal">Finalizar</button>
        <button type="button" id="cancelar_modal" class="btn btn-danger btn-lg d-none" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>