const consultar_horario_docente = async ()=> {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_horarios`).html(``);  
    $('#table_created_rooms').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_horarios');
    const ejecucion = new Consultas('InformacionDocente',datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(horario => {
        let {lunes,martes,miercoles,jueves,viernes,sabado,nombre,nombre_grupo,creditos_totales,clave} =  horario;
        tabla += `
        <tr> 
            <td class="align-middle text-small">${clave}</td>
            <td class="align-middle text-small text-start">${nombre}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle text-small">${creditos_totales}</td>
            <td class="align-middle text-small">${lunes}</td>
            <td class="align-middle text-small">${martes}</td>
            <td class="align-middle text-small">${miercoles}</td>
            <td class="align-middle text-small">${jueves}</td>
            <td class="align-middle text-small">${viernes}</td>
            <td class="align-middle text-small">${sabado}</td>
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

consultar_horario_docente();