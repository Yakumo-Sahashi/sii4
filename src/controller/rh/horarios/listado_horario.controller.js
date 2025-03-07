const filtrar_contenido = async ()=> {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_horarios`).html(``);  
    $('#table_created_rooms').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostar_horarios');    
    const ejecucion = new Consultas('RhHorarios',datos);
    let respuesta = await ejecucion.consulta();
    console.log(respuesta)
    let tabla = ``;
    respuesta.map(horario => {
        let {lunes,martes,miercoles,jueves,viernes,sabado,nombre,checador_id} =  horario;
        tabla += `
        <tr> 
            <td class="align-middle text-small text-center">${checador_id}</td>
            <td class="align-middle text-small">${nombre}</td>
            <td class="align-middle text-small">${lunes}</td>
            <td class="align-middle text-small">${martes}</td>
            <td class="align-middle text-small">${miercoles}</td>
            <td class="align-middle text-small">${jueves}</td>
            <td class="align-middle text-small">${viernes}</td>
            <td class="align-middle text-small">${sabado}</td>
            <td class="align-middle text-small">
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_horario(${checador_id})"><i class="fa-solid fa-trash-can"></i></button>
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

const eliminar_horario = (id) => {
    swal({
        title: "Desea eliminar el horario",
        text: `Una vez eliminado no se podra recuperar`,
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
    }).then(eiminar => {
        if (eiminar) {
            let datos = new FormData();
            datos.append('funcion', "eliminar_horario");
            datos.append('id', `${id}`);
            const ejecucion = new Consultas("RhHorarios", datos);
            ejecucion.insercion();
            filtrar_contenido();
        }
    });		
}

filtrar_contenido();