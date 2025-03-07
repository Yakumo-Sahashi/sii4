let input_estadisticas = ['carrera', 'periodo'];

const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('periodo', 'codigo_html');
}

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera', 'codigo_html');
}

const mostrar_estadisticas = async () => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_estadisticas`).html(``);  
    $('#tabla_estadisticas').DataTable().destroy();
    let datos = new FormData($('#frm_estadisticas')[0]);
    datos.append('funcion',"consultar_estadistica"); 
    const ejecucion = new Consultas("Estadisticas", datos);
    let respuesta = await ejecucion.consulta();
    
    let tabla = ``;
    respuesta.map(estadisticas => {
        let {id_alumno,numero_control,nombre_persona,apellido_paterno,apellido_materno,semestre,creditos_aprobados,creditos_cursados, promedio_final_alcanzado} = estadisticas;
            tabla += `
            <tr> 
                
                <td class="align-middle">${numero_control}</td>
                <td class="align-middle">${nombre_persona +" "+ apellido_paterno+" "+apellido_materno}</td>
                <td class="align-middle">${semestre}</td>
                <td class="align-middle">${creditos_aprobados}</td>
                <td class="align-middle">${creditos_cursados}</td>
                <td class="align-middle">${promedio_final_alcanzado}</td>
                <td class="align-middle"><button type="button" class="btn btn-primary" onclick="precargar_carrera(${id_alumno})"><i class="fa-regular fa-pen-to-square"></i></button></td>
                <td class="align-middle"><button type="button" class="btn btn-primary" onclick="precargar_carrera(${id_alumno})"><i class="fa-regular fa-pen-to-square"></i></button></td>
                <td class="align-middle"><button type="button" class="btn btn-primary" onclick="precargar_carrera(${id_alumno})"><i class="fa-regular fa-pen-to-square"></i></button></td>

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


//let datos = new FormData($("#frm_estadisticas")[0]);
obtener_periodos();
obtener_carrera();
$(document).ready(() => {
    $('#frm_estadisticas').on('submit', (e) => {
        e.preventDefault();
        if (validar_campo(input_estadisticas, 'vacios')) {
            mostrar_estadisticas();
        }
    });

});