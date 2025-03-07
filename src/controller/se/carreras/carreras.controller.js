let input = ['nombre_carrera', 'nombre_reducido', 'siglas', 'clave_oficial', 'reticula', 'fecha_inicio', 'fecha_cierre', 'creditos', 'carga_minima', 'carga_maxima', 'nivel_escolar'];
let input2 = ['nombre_carrera_actualizado', 'nombre_reducido_actualizado', 'siglas_actualizado', 'clave_oficial_actualizado', 'nivel_escolar_actualizado', 'reticula_actualizado', 'fecha_inicio_actualizado', 'fecha_cierre_actualizado', 'creditos_actualizado', 'carga_maxima_actualizado', 'carga_minima_actualizado'];

const mostrar_carreras = async () => {
  bootstrap.Itma2.start_loader();
  $(`#tabla_carrera`).html(``);
  $('#tabla_listado_carreras').DataTable().destroy();
  let datos = new FormData();
  datos.append('funcion', 'consultar_carrera');
  const ejecucion = new Consultas("Carreras", datos);
  let respuesta = await ejecucion.consulta();
  let tabla = ``;
  respuesta.map(carreras => {
    let { id_cat_carrera, nombre_carrera, carrera, siglas, clave_reticula, estatus } = carreras;
    tabla += `
        <tr> 
            <td class="align-middle text-start">${nombre_carrera}</td>
            <td class="align-middle">${carrera}</td>
            <td class="align-middle">${siglas}</td>
            <td class="align-middle">${clave_reticula}</td>
            <td class="align-middle"><button type="button" class="btn btn-primary" onclick="precargar_carrera(${id_cat_carrera})"><i class="fa-regular fa-pen-to-square"></i></button></td>
            <td class="align-middle">${estatus == 0 ? `<button type="button" class="btn btn-danger" onclick="habilitar_carrera(${id_cat_carrera})"><i class="fa-regular fa-circle-xmark"></i></button>` : `<button type="button" class="btn btn-success" onclick="inhabilitar_carrera(${id_cat_carrera})"><i class="fa-solid fa-check"></i></button>`}</td>
        </tr>`;
  });
  $(`#tabla_carrera`).html(`${tabla}`);
  $('#tabla_listado_carreras').DataTable({
    "language": {
      "url": "./json/lenguaje.json"
    }
  });
  bootstrap.Itma2.end_loader();
}


const precargar_carrera = async (id) => {
  bootstrap.Itma2.start_loader();
  let datos = new FormData();
  datos.append('funcion', 'precargar_carrera');
  datos.append('id', id);
  const ejecucion = new Consultas("Carreras", datos);
  let respuesta = await ejecucion.consulta();
  let { id_cat_carrera, nombre_carrera, carrera, siglas, clave_oficial, nivel_escolar, carga_maxima, carga_minima, fecha_inicio, fecha_fin, creditos_totales, clave_reticula, id_cat_reticula } = respuesta;
  $('[name=id_carrera_actualizado]').val(id_cat_carrera);
  $('[name=id_reticula_actualizado]').val(id_cat_reticula);
  $('[name=nombre_carrera_actualizado]').val(nombre_carrera);
  $('[name=nombre_reducido_actualizado]').val(carrera);
  $('[name=siglas_actualizado]').val(siglas);
  $('[name=clave_oficial_actualizado]').val(clave_oficial);
  $('[name=nivel_escolar_actualizado]').val(nivel_escolar);
  $('[name=reticula_actualizado]').val(clave_reticula);
  $('[name=fecha_inicio_actualizado]').val(fecha_inicio);
  $('[name=fecha_cierre_actualizado]').val(fecha_fin);
  console.log(fecha_fin)
  $('[name=creditos_actualizado]').val(creditos_totales);
  $('[name=carga_maxima_actualizado]').val(carga_maxima);
  $('[name=carga_minima_actualizado]').val(carga_minima);
  $('#exampleModal').modal('show');
  bootstrap.Itma2.end_loader();
}


const actualizar_carrera = () => {
  let datos = new FormData($('#frm_actualizar_carrera')[0]);
  datos.append('funcion', "actualizar_carrera");
  if (validar_campo(input2, 'vacios')) {
    if (limitar_valor('creditos_actualizado', 0, 300, "Los creditos totales deben estar en el rango de 1 y 300") && limitar_valor('carga_minima_actualizado', 0, 99, "Los creditos totales deben estar en el rango de 1 y 99") && limitar_valor('carga_maxima_actualizado', 0, 99, "Los creditos totales deben estar en el rango de 1 y 99")) {
      const ejecucion = new Consultas("Carreras", datos);
      ejecucion.insercion();
      mostrar_carreras();
      $('#exampleModal').modal('hide');
    }
  }
}

const inhabilitar_carrera = (id) => {
  swal({
    title: "Atencion!",
    text: "¿Quieres inhabilitar la carrera?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((accion) => {
    if (accion) {
      let datos = new FormData();
      datos.append('funcion', "actualizar_estatus");
      datos.append('id', id);
      datos.append('estatus', '0');
      const ejecucion = new Consultas("Carreras", datos);
      ejecucion.insercion();
      mostrar_carreras();
    }
  });

}

const habilitar_carrera = (id) => {
  swal({
    title: "Atencion!",
    text: "¿Quieres habilitar la carrera?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((accion) => {
    if (accion) {
      let datos = new FormData();
      datos.append('funcion', "actualizar_estatus");
      datos.append('id', id);
      datos.append('estatus', '1');
      const ejecucion = new Consultas("Carreras", datos);
      ejecucion.insercion();
      mostrar_carreras();
    }
  });

}

mostrar_carreras();
caracter_numeros('creditos');
caracter_numeros('carga_minima');
caracter_numeros('carga_maxima');
caracter_mayus('nombre_carrera');
caracter_mayus('nombre_reducido');
caracter_mayus('siglas');
caracter_mayus('clave_oficial');
caracter_mayus('reticula');

caracter_numeros('creditos_actualizado');
caracter_numeros('carga_minima_actualizado');
caracter_numeros('carga_maxima_actualizado');
caracter_mayus('nombre_carrera_actualizado');
caracter_mayus('nombre_reducido_actualizado');
caracter_mayus('siglas_actualizado');
caracter_mayus('clave_oficial_actualizado');
caracter_mayus('retireticula_actualizadocula');

$(document).ready(() => {
  $('#frm_agregar_carrera').on('submit', (e) => {
    e.preventDefault();
    let datos = new FormData($('#frm_agregar_carrera')[0]);
    datos.append('funcion', "crear_carrera");
    if (validar_campo(input, 'vacios')) {
      if (limitar_valor('creditos', 0, 300, "Los creditos totales deben estar en el rango de 1 y 300") && limitar_valor('carga_minima', 0, 99, "Los creditos totales deben estar en el rango de 1 y 99") && limitar_valor('carga_maxima', 0, 99, "Los creditos totales deben estar en el rango de 1 y 99")) {
        const ejecucion = new Consultas("Carreras", datos);
        ejecucion.insercion();
        mostrar_carreras();
        $('#frm_agregar_carrera')[0].reset();
      }
    }
  });

  $('#btn_actualizar').on('click', () => {
    actualizar_carrera();
  });
});
