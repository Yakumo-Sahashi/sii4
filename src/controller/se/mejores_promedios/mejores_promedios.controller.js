let input_mejores_promedios = ['periodo','tipo','carrera'];

const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('periodo','codigo_html');  
}

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera','codigo_html');  
}

const mostrar_mejores_promedios = async (tipo) => {
    bootstrap.Itma2.start_loader();
    $(`#tabla_listado_promedios`).html(``);
    $('#tabla_promedios').DataTable().destroy();
    let datos = new FormData($('#frm_mejores_promedios')[0]);
    if(tipo == '2'){
        datos.append('funcion', 'consultar_mejor_promedio_semestre');
    }else{
        datos.append('funcion', 'consultar_mejor_promedio_gral');
    }
    const ejecucion = new Consultas("MejoresPromedios", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(alumno => {
        let {periodos_revalidados,promedio_aritmetico,nombre_persona,apellido_paterno,apellido_materno,semestre,numero_control,carrera,promedio_certificado} = alumno;
        tabla += `
        <tr>
            <td class="align-middle text-small">${numero_control}</td>
            <td class="align-middle text-small">${apellido_paterno} ${apellido_materno} ${nombre_persona}</td>
            <td class="align-middle text-small">${carrera}</td>
            <td class="align-middle text-small">${semestre + periodos_revalidados}</td>
            <td class="align-middle text-small">${ tipo == 2 ? promedio_aritmetico : promedio_certificado}</td>            
        </tr>
        `;
    });
    $(`#tabla_listado_promedios`).html(tabla);
    $('#tabla_promedios').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}

obtener_periodos();
obtener_carrera();


$(document).ready(() => {
    $('#frm_mejores_promedios').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(input_mejores_promedios,'vacios')){
            mostrar_mejores_promedios($('[name=tipo]').val());
        }
    });
});