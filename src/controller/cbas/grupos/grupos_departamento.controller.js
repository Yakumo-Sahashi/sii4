const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('seleccion_periodo_dep','codigo_html');  
}

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('seleccion_carrera_dep','codigo_html');  
}

const obtener_area_academica = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_area_academica");
    const ejecucion = new Consultas("AsignacionTemporalDocente", datos);
    ejecucion.catalogo('seleccion_departamento','codigo_html');
}

const consulta_depto = async() => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_grupos_dep`).html(``);  
    $('#tabla_grupos_dep').DataTable().destroy();
    let datos = new FormData($('#frm_grupo_departamento')[0]);
    datos.append('funcion','consultar_depto');
    const ejecucion = new Consultas("CBGruposCarrera", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(horario => {
        let {lunes,martes,miercoles,jueves,viernes,sabado,nombre,nombre_grupo,nombre_docente,rfc,capacidad,clave_oficial,paralelo_de,alumnos_inscritos} =  horario;
        tabla += `
        <tr> 
            <td class="align-middle text-small text-start"><b>${clave_oficial}</b><br>${nombre}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle text-small"><b>${rfc}</b><br>${nombre_docente}</td>
            <td class="align-middle text-small">${lunes}</td>
            <td class="align-middle text-small">${martes}</td>
            <td class="align-middle text-small">${miercoles}</td>
            <td class="align-middle text-small">${jueves}</td>
            <td class="align-middle text-small">${viernes}</td>
            <td class="align-middle text-small">${sabado}</td>
            <td class="align-middle text-small">${paralelo_de}</td>
            <td class="align-middle text-small">${capacidad}</td>
            <td class="align-middle text-small">${alumnos_inscritos}</td>
        </tr>`;
    });
    $(`#contenido_tabla_grupos_dep`).html(`${tabla}`);
    $('#tabla_grupos_dep').DataTable({
        "language": {
        "url": "./json/lenguaje.json"
    }
    });
    bootstrap.Itma2.end_loader();  
};

obtener_periodos();
obtener_carrera();
obtener_area_academica();

$(document).ready(() => {
    $('#frm_grupo_departamento').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['seleccion_departamento','seleccion_carrera_dep','seleccion_periodo_dep'],'vacios')){
            consulta_depto();
        }
    });
});
