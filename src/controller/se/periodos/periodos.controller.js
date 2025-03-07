/* let input = ['year','periodo','dias_clase','inicio_periodo','fin_periodo','inicio_vacaciones','fin_vacaciones','inicio_encuesta','fin_encuesta','inicio_seleccion','fin_seleccion'];
let input3 = ['year_actualizado', 'periodo_actualizado', 'inicio_periodo_actualizado', 'fin_periodo_actualizado', 'dias_clase_actualizado', 'inicio_vacaciones_actualizado', 'fin_vacaciones_actualizado','inicio_encuesta_actualizado', 'fin_encuesta_actualizado', 'inicio_seleccion_actualizado', 'fin_seleccion_actualizado']; */
let input = ['year','periodo','dias_clase','inicio_periodo','fin_periodo','inicio_vacaciones','fin_vacaciones','inicio_encuesta','fin_encuesta'];
let input3 = ['year_actualizado', 'periodo_actualizado', 'inicio_periodo_actualizado', 'fin_periodo_actualizado', 'dias_clase_actualizado', 'inicio_vacaciones_actualizado', 'fin_vacaciones_actualizado','inicio_encuesta_actualizado', 'fin_encuesta_actualizado'];
let hoy = new Date();
let dd = hoy.getDate();
let mm = hoy.getMonth()+1;
let yyyy = hoy.getFullYear();
dd = dd < 10 ? "0"+dd : dd;
mm = mm < 10 ? "0"+mm : mm;
let fechaFormato = yyyy+"-"+mm+"-"+dd;

const mostrar_periodos = async () => {
  bootstrap.Itma2.start_loader();    
  $(`#tabla_periodo`).html(``);  
  $('#tabla_listado_periodos').DataTable().destroy();
  let datos = new FormData();
  datos.append('funcion','consultar_periodo'); 
  const ejecucion = new Consultas("PeriodosEscolares", datos);
  let respuesta = await ejecucion.consulta();
  let tabla = ``, cont = 1;
  respuesta.map(periodos => {
      let {id_periodo_escolar,identificacion_larga,fecha_inicio,fecha_termino,num_dias_clases,estado} = periodos;
      tabla += `
      <tr>
        <td class="align-middle text-small">${cont < 10 ? `0${cont}` : cont}</td> 
        <td class="align-middle text-small text-start">${identificacion_larga}</td>
        <td class="align-middle">${num_dias_clases}</td>
        <td class="align-middle">${fecha_inicio}</td>
        <td class="align-middle">${fecha_termino}</td>
        <td class="align-middle"><button type="button" class="btn btn-primary" onclick="precargar_periodo(${id_periodo_escolar})"><i class="fa-regular fa-pen-to-square"></i></button></td>
        <td class="align-middle">${estado == 0 ? `<button type="button" class="btn btn-danger" onclick="habilitar_periodo(${id_periodo_escolar})"><i class="fa-regular fa-circle-xmark"></i></button>` : `<button type="button" class="btn btn-success" onclick="inhabilitar_periodo(${id_periodo_escolar})"><i class="fa-solid fa-check"></i></button>`}</td>
      </tr>`;
      cont++;
  });
  $(`#tabla_periodo`).html(`${tabla}`);  
  $('#tabla_listado_periodos').DataTable({
      "language": {
          "url": "./json/lenguaje.json"
      }
  });  
  bootstrap.Itma2.end_loader();       
}

const precargar_periodo = async (id) => {
  bootstrap.Itma2.start_loader();    
  let datos = new FormData();
  datos.append('funcion','precargar_periodo');
  datos.append('id',id); 
  const ejecucion = new Consultas("PeriodosEscolares", datos);
  let {id_periodo_escolar,periodo,fecha_inicio,fecha_termino,inicio_vacacional,termino_vacacional,num_dias_clases,inic_encuesta_estudiantil,fin_encuesta_estudiantil,inic_seleccion_alumnos,fin_seleccion_alumnos} = await ejecucion.consulta();
  periodo += "";
  $('[name=id_periodo_escolar]').val(id_periodo_escolar);
  $('[name=year_actualizado]').val(periodo.substring(0,4));
  $('[name=periodo_actualizado]').val(periodo.substring(4,5));
  $('[name=inicio_periodo_actualizado]').val(fecha_inicio);
  $('[name=fin_periodo_actualizado]').val(fecha_termino);
  $('[name=dias_clase_actualizado]').val(num_dias_clases);
  $('[name=inicio_vacaciones_actualizado]').val(inicio_vacacional);
  $('[name=fin_vacaciones_actualizado]').val(termino_vacacional);
  $('[name=inicio_encuesta_actualizado]').val(inic_encuesta_estudiantil);
  $('[name=fin_encuesta_actualizado]').val(fin_encuesta_estudiantil);
  /* $('[name=inicio_seleccion_actualizado]').val(inic_seleccion_alumnos);
  $('[name=fin_seleccion_actualizado]').val(fin_seleccion_alumnos); */
  $('#modal_modificar_perido').modal('show');
  bootstrap.Itma2.end_loader(); 
}

const generar_years = () => {
  const fecha = new Date();
  const actual = fecha.getFullYear();
  $('[name=year]').val(actual);
}

$(`[name=inicio_periodo]`).on('change', () => {
  $(`[name=fin_periodo]`).attr('min',$(`[name=inicio_periodo]`).val());
  $(`[name=fin_periodo]`).val('');
});

$(`[name=fin_periodo]`).on('change', () => {
  $(`[name=inicio_vacaciones]`).attr('max',$(`[name=fin_periodo]`).val());
  $(`[name=inicio_vacaciones]`).attr('min',$(`[name=inicio_periodo]`).val());
  $(`[name=inicio_vacaciones]`).val('');
});

mostrar_periodos();
caracter_numeros('dias_clase');
generar_years();

const validar_part = () => {
  if($(`[name=inicio_periodo]`).val() >= $(`[name=fin_periodo]`).val()){
    msj_error('La fecha de finalizacion de periodo no puede ser menor o igual a la de inicio!');
    return false;
  }else if($(`[name=inicio_vacaciones]`).val() >= $(`[name=fin_vacaciones]`).val()){
    msj_error('La fecha de finalizacion de periodo vacacional no puede ser menor o igual a la de inicio!');
    return false;
  }else{
    return true;
  }
}

const crear_periodo = () => {
  if (validar_campo(input,'vacios')) {
    if(limitar_valor('dias_clase',0,365,"Los dias de clase deben estar en el rango 1 y 365")){
      if(validar_part()){
        let datos = new FormData($('#frm_creacion_periodo')[0]);
        datos.append('funcion', "creacion_periodo");
        const ejecucion = new Consultas("PeriodosEscolares", datos);
        ejecucion.insercion();
        generar_years();
        mostrar_periodos();
        $('#frm_creacion_periodo')[0].reset();
      }
    }
  }
}

const actualizar_periodo = () => {
  if (validar_campo(input3,'vacios')) {
    if(limitar_valor('dias_clase_actualizado',0,365,"Los dias de clase deben estar en el rango 1 y 365")){
      let datos = new FormData($('#frm_actualizar_periodo')[0]);
      datos.append('funcion', "actualizar_periodo");
      const ejecucion = new Consultas("PeriodosEscolares", datos);
      ejecucion.insercion();
      mostrar_periodos();
      $('#modal_modificar_perido').modal('hide');
    }
  }
}


const inhabilitar_periodo = (id) => {
  swal({
      title:"Atencion!",
      text:"¿Quieres inhabilitar la periodo?",
      icon:"warning",
      buttons:true,
      dangerMode:true,
  }).then((accion)=>{
      if(accion){
          let datos = new FormData();
          datos.append('funcion', "actualizar_estatus");
          datos.append('id', id);
          datos.append('estatus', '0');
          const ejecucion = new Consultas("PeriodosEscolares", datos);
          ejecucion.insercion();
          mostrar_periodos();       
      }
  });
  
}

const habilitar_periodo = (id) => {
  swal({
      title:"Atencion!",
      text:"¿Quieres habilitar la periodo?",
      icon:"warning",
      buttons:true,
      dangerMode:true,
  }).then((accion)=>{
      if(accion){
          let datos = new FormData();
          datos.append('funcion', "actualizar_estatus");
          datos.append('id', id);
          datos.append('estatus', '1');
          const ejecucion = new Consultas("PeriodosEscolares", datos);
          ejecucion.insercion();
          mostrar_periodos();       
      }
  });
  
}

$(document).ready(() => {
  $('#frm_creacion_periodo').on('submit', (e) => {
    e.preventDefault();
    crear_periodo();
  });
});

$('#btn_limpiar').on('click',() => {
  $('#frm_creacion_periodo')[0].reset();
  msj_exito('Se ha cancelado el proceso');
});

$('#btn_cancelar').on('click',() => {
  $('#frm_creacion_periodo')[0].reset();
  //$('#form_part_uno').removeClass('d-none');
  $('#form_part_dos').addClass('d-none');
  msj_exito('Se ha cancelado el proceso');
});

$('#btn_atras').on('click',() => {
  $('#form_part_uno').removeClass('d-none');
  $('#form_part_dos').addClass('d-none');
});

$('#btn_actualizar').on('click',() => {
  actualizar_periodo();
});