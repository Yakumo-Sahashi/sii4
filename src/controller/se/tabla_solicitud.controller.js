const listado_solicitud = async () => {
    $(`#tabla_datos`).html(``);  
    $('#table_created_rooms').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarDatos');
    const ejecucion = new Consultas("CreacionNumerosControl", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(control => {
        let {solicitud, descripcion_solicitud,
            estado_solicitud,
            fecha_realizo_solicitud,
            fecha_atencion_solicitud} = control;
        tabla += `
        <tr> 
            <td class="align-middle">${descripcion_solicitud}</td>
            <td class="align-middle">${solicitud}</td>
            <td class="align-middle">${estado_solicitud == 0 ? `<span class="text-primary">En espera</span>` : estado_solicitud == 1 ? `<span class="text-success">Aprobada</span` : `<span class="text-danger">Rechazada</span>` }</td>
            <td class="align-middle">${fecha_realizo_solicitud}</td>
            <td class="align-middle">${fecha_atencion_solicitud == null ? `<span class="text-primary">En espera</span>` : fecha_atencion_solicitud}</td>
        </tr>`;
    });
    $(`#tabla_datos`).html(`${tabla}`);  
    $('#table_created_rooms').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });        
}
listado_solicitud();