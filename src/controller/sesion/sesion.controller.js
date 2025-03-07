$(document).ready(()=> {

  const cerrar_sesion = () => {
    let datos = new FormData();
    datos.append('funcion', 'cerrar_sesion');
    const ejecucion = new Consultas("login", datos);
    ejecucion.sesion();
  }

  const cerrar_sesion_anterior = () => {
    let datos = new FormData();
    datos.append('funcion', 'cerrar_sesion_anterior');
    const ejecucion = new Consultas("login", datos);
    ejecucion.sesion();
  }

  $('#btn_cerrar_sesion').on('click', (e) => { 
    cerrar_sesion();
	});  
  
  const comprobar_inicio_sesion = () => {
    let datos = new FormData();
    datos.append('funcion', 'comprobar_sesion')
		fetch(`app/Controllers/Login.php`, {
				method: `POST`,
				body: datos
			}).then(respuesta => respuesta.json())
			.then(respuesta => {
				if (respuesta[0] != "1") {
					cerrar_sesion_anterior();	
				}
			}).catch(error => {
        window.location = "login";
        return false;
			});
  }
  
  /* setInterval(() => {
    comprobar_inicio_sesion();
  }, 5000); */
});