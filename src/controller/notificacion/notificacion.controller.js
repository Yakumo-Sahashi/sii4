let numero_notificacion = 0;

const comprobar_notificacion = () => {
  let datos = new FormData();
  datos.append('funcion','verificacion_notificacion');
  fetch(`model/notificacion/notificacion.model.php`, {
      method: `POST`,
      body: datos
  }).then(respuesta => respuesta.json())
  .then(respuesta => {
    let noti = ``;
    let noti2 = ``;
    let total = 0;

    respuesta.map(notify => {
      let {tipo} = notify;
      let {id} = notify;
      let {descripcion} = notify;
      let {fecha} = notify;
      let {rol} = notify;
      //let {url} = notify;

      if(tipo == "1") {
        noti += `
        <div class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1 text-primary"><i class="fas fa-bell text-warning"></i> Solicitud respondida</h5>
            <small class="text-primary">Atendida <button type="button" class="btn btn-link text-danger btn-sm" onclick="marcar_leida(${id})"><i class="far fa-times-circle"></i></button></small>
          </div>
          <div class="d-flex w-100 justify-content-between">
            <p class="mb-1 text-justify"><i class="fa-solid fa-circle-info text-info"></i> <b>Solicitaste:</b> ${descripcion}</p>
            <small class="text-end text-muted"> ${fecha}</small>
          </div>
        </div>`;
        noti2 += `
        <li class="notification-item">
          <div>
              <h4>Solicitaste:</h4>
              <p><i class="fa-solid fa-circle-info text-info"></i> ${descripcion}</p>
              <p>${fecha} <small class="text-primary">Atendida <button type="button" class="btn btn-link text-danger btn-sm" onclick="marcar_leida(${id})"><i class="far fa-times-circle"></i></button></small></p>
          </div>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>`;
      }else{
        noti += `<a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1 text-primary"><i class="fas fa-bell text-warning"></i> ${rol}</h5>
              <small class="text-muted">Pendiente</small>
          </div>
          <div class="d-flex w-100 justify-content-between">
              <p class="mb-1 text-justify"><b>A solicitado:</b> ${descripcion}</p>
              <small class="text-end text-muted">${fecha}</small>
          </div>
        </a>`; 
        noti2 += `
        <li class="notification-item">
          <div>
            <h5 class="mb-1 text-primary"><i class="fas fa-bell text-warning"></i> ${rol}</h5>
            <h4>A solicitado:</h4>
            <p><i class="fa-solid fa-circle-info text-info"></i> ${descripcion}</p>
            <p>${fecha}</p>
          </div>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>`;
      }
      total ++;
    });  
      $('#contenido-notificacion').html(noti);
      $('#notificacion_2').html(noti2);
      $("#contenedor").html("");
      $('#noti').html(total);
      $('#noti_2').html(total);
      if(total >= 1){
        $('#avisar').html('<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"></span>');
      }else{
        $('#contenido-notificacion').html(`<h3 class="text-center py-4">No tienes notificaciones pendientes <i class="fas fa-bell-slash text-warning"></i></h3>`);
        $('#avisar').html('');
      }
      numero_notificacion = total;   
  }).catch(error => {
      msj_error(`${error}`);
  });
}

const marcar_leida = (noti) => {
  let datos = new FormData();
  datos.append('funcion', "marcar_notificacion");
  datos.append('id_solicitud', `${noti}`);
  const ejecucion = new Consultas("notificacion/notificacion", datos);
  ejecucion.insercion();
  comprobar_notificacion();
}

/* const toast_notificacion = () => {
  $.ajax({
    type: 'post',
    data: 'funcion=toast_notificacion',
    url: 'model/notificacion/notificacion.model.php',
    success: (r) => {
      if(!(r == "")){
        $('#toast_notifiacion').html(r);
        if(r){
          $("#sonido_notificacion").trigger("click");
        }
        $('#toas_noti').toast('show');    
      }
    }
  });

}
 */

/* const sonido_notificacion = ()=> {
  let sonido = document.getElementById("audio");
  sonido.play();
}

$("#sonido_notificacion").click(()=>{
  sonido_notificacion();
}); */

comprobar_notificacion();
/* toast_notificacion(); */


setInterval(() => {
  comprobar_notificacion();;
  //toast_notificacion();
}, 10000);