const filtrar_contenido =  async () => {
    //bootstrap.Itma2.start_loader();   
    $(`#tabla_aula`).html(``);  
    $('#tabla_aula_contenido').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_aulas'); 
    const ejecucion = new Consultas("Aulas", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(aulas => {
        let {id_cat_aulas,aula,capacidad,ubicacion,estatus_aula,observaciones} = aulas;
        tabla += `
        <tr> 
            <td>${aula}</td>
            <td>${capacidad}</td>
            <td>${ubicacion == "" ? "Sin ubicacion" : ubicacion}</td>
            <td>${estatus_aula == 'A' ? 'ACTIVA' : 'INACTIVA'}</td>
            <td>${observaciones == "" ? "Sin Observaciones" : observaciones }</td>
            <td>
                <button type="button" class="btn btn-success rounded-3 mb-2" id="btn_modal" data-bs-toggle="modal" data-bs-target="#aulaActualizar" onclick="precargar_aula(${id_cat_aulas})"><i class="far fa-edit"></i></button>
            </td>
            <td>
                <button type="button" class="btn btn-danger rounded-3 mb-2" id="btn_borrar" onclick="eliminar_aula(${id_cat_aulas})"><i class="far fa-trash-alt"></i></button>
            </td>
        </tr>`;
    });
    $(`#tabla_aula`).html(`${tabla}`);  
    $('#tabla_aula_contenido').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
}

filtrar_contenido();