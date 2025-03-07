<!-- Modal -->
<div class="modal fade" id="modal_notificaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg modal-fullscreen-md-down">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center" id="exampleModalLabel">Notificaciones |
          <?=Sesion::datos_sesion("descripcion_rol")?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="list-group pricing" id="contenido-notificacion">
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button id="btn-marcar-noty" type="button" class="btn btn-info"><i class="fas fa-check-double"></i> Marcar Todo Como Leido</button> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-sign-out-alt"></i>
          Salir</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn" id="sonido_notificacion" hidden>sonido</button>

<audio id="audio" src="<?=AUDIO?>sonido_noti.mp3"></audio>