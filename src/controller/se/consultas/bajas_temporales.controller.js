let input_bajas_temporales = ['carrera'];

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera','codigo_html');  
}

const mostrar_bajas = async () => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_estadisticas`).html(``);  
    $('#tabla_estadisticas').DataTable().destroy();
    let datos = new FormData($('#frm_estadisticas')[0]);
    datos.append('funcion','consultar_alumnos');
    const ejecucion = new Consultas("BajasTemporales", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(alumnos => {
        let {numero_control, nombre_persona, apellido_paterno, apellido_materno, descripcion_estatus, semestre} = alumnos;
        tabla += `
        <tr> 
            <td class="align-middle">${numero_control}</td>
            <td class="align-middle">${nombre_persona}</td>
            <td class="align-middle">${apellido_paterno}</td>
            <td class="align-middle">${apellido_materno}</td>
            <td class="align-middle">${semestre}</td>
            <td class="align-middle">${descripcion_estatus}</td>
        </tr>`;
    });
    $(`#contenido_estadisticas`).html(`${tabla}`);  
    $('#tabla_estadisticas').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader();       
}

obtener_carrera();

$('[name=carrera]').on('change',() => {
    mostrar_bajas();
});
