
const mostrar_examenes = async () => {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_examenes`).html(``);  
    $('#tabla_listado_examenes').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_examenes_alumno'); 
    const ejecucion = new Consultas("Examenes", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    if(respuesta.length == 0){
        $('#btn_imprimir').addClass('d-none'); 
    }else{
        $('#btn_imprimir').removeClass('d-none'); 
    }
    respuesta.map(examenes => {
        let {tipo_evaluacion,nombre_completo_materia,clave_oficial,calificacion_especial} = examenes;
        tabla += `
        <tr> 
            <td class="align-middle text-start"><b>${clave_oficial}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle">${calificacion_especial == 0 ? 'Sin calificacion capturada' : calificacion_especial}</td>
            <td class="align-middle">${tipo_evaluacion == 'SI' ? 'EA' : 'EE'}</td>
        </tr>`;
    });
    $(`#tabla_examenes`).html(`${tabla}`);  
    $('#tabla_listado_examenes').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    $('[name=ex_numero_de_control]').val($('[name=numero_de_control]').val());
    $('[name=ex_periodo]').val($('[name=periodo]').val());
    bootstrap.Itma2.end_loader();       
}

$(document).ready(() => {
    mostrar_examenes();
});
