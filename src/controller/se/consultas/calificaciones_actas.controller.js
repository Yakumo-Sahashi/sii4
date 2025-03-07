
const obtener_periodo_escolar = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_periodo");
    const selec = new Consultas("HistorialAcademico",datos);
    selec.catalogo('periodo','codigo_html');
}

obtener_periodo_escolar();

const mostrar_act_normal = async (periodo) => {
    bootstrap.Itma2.start_loader();    
    $(`#cotenido_tabla_actas`).html(``);  
    $('#tabla_actas').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_materias_sin_cal'); 
    datos.append('periodo',periodo); 
    const ejecucion = new Consultas("CalificacionesActas", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(materias => {
        let {nombre_grupo,nombre_persona,apellido_paterno,apellido_materno,rfc,nombre_completo_materia,clave_oficial,descripcion} = materias;
        tabla += `
        <tr> 
            <td class="align-middle texte-start text-small"><b>${clave_oficial}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle text-small"><b>${rfc}</b><br>${apellido_paterno} ${apellido_materno} ${nombre_persona}</td>
            <td class="align-middle text-small">${descripcion}</td>
        </tr>`;
    });
    $(`#cotenido_tabla_actas`).html(`${tabla}`);  
    $('#tabla_actas').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader(); 
}

const mostrar_examenes_especiales = async (periodo) => {
    bootstrap.Itma2.start_loader();    
    $(`#cotenido_tabla_actas`).html(``);  
    $('#tabla_actas').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_examenes_periodo'); 
    datos.append('periodo',periodo); 
    const ejecucion = new Consultas("CalificacionesActas", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(examenes => {
        let {nombre_completo_materia,clave_oficial,descripcion} = examenes;
        tabla += `
        <tr> 
            <td class="align-middle text-start text-small"><b>${clave_oficial}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle text-small">Sin Grupo</td>
            <td class="align-middle text-small">Sin Profesor Asignado</td>
            <td class="align-middle text-small">${descripcion}</td>
        </tr>`;
    });
    $(`#cotenido_tabla_actas`).html(`${tabla}`);  
    $('#tabla_actas').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader(); 
}

$(document).ready(() => {
    $('#frm_actas').on('submit', (e) => {
      e.preventDefault();
      if(validar_campo(['periodo','tipo'],'vacios')){
        if($('[name=tipo]').val() == 1){
            mostrar_act_normal($('[name=periodo]').val());
        }else{
            mostrar_examenes_especiales($('[name=periodo]').val());
        }
      }
    });
});