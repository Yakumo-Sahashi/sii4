const filtrar_contenido = async (filtro)=> {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_horarios`).html(``);  
    $('#table_created_rooms').DataTable().destroy();
    let datos = new FormData();
    if(filtro != 0){
        datos.append('funcion','consulta_filtrada');    
        datos.append('filtro', `${filtro}`)
    }else{
        datos.append('funcion','consulta_filtrada');    
    }
    const ejecucion = new Consultas('ListadoHorario',datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(horario => {
        let {id_horario,lunes,martes,miercoles,jueves,viernes,sabado,nombre,nombre_grupo,creditos_totales,id_grupo,paralelo_de} =  horario;
        tabla += `
        <tr> 
            <td class="align-middle text-small text-start">${nombre}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle text-small">${creditos_totales}</td>
            <td class="align-middle text-small">${lunes}</td>
            <td class="align-middle text-small">${martes}</td>
            <td class="align-middle text-small">${miercoles}</td>
            <td class="align-middle text-small">${jueves}</td>
            <td class="align-middle text-small">${viernes}</td>
            <td class="align-middle text-small">${sabado}</td>
            <td class="align-middle text-small">
                ${paralelo_de == 'NP' ? `No` : `<b class="text-primary">${paralelo_de}</b>`}
            </td>
        </tr>`;
    });
    $(`#tabla_horarios`).html(`${tabla}`);  
    $('#table_created_rooms').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader(); 
}

$(document).ready(() => {
    filtrar_contenido(0);
    $(`[name=carrera_horario]`).on('change', ()=>{
        filtrar_contenido(($(`[name=carrera_horario]`).val()));
    });
});