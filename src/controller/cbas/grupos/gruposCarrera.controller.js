let input_gruposCarrera = ['seleccion_carrera','seleccion_periodo_carrera','seleccion_semestre_carrera'];

const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('seleccion_periodo_carrera','codigo_html');  
}

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('seleccion_carrera','codigo_html');  
}

obtener_periodos();
obtener_carrera();

const consulta_general = async() => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_grupos_carrera`).html(``);  
    $('#tabla_grupos_carreras').DataTable().destroy();
    let datos = new FormData($('#frm_grupo_carrera')[0]);
    datos.append('funcion','consultar_general');
    const ejecucion = new Consultas("CBGruposCarrera", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(horario => {
        let {lunes,martes,miercoles,jueves,viernes,sabado,nombre,nombre_grupo,nombre_docente,rfc,capacidad,clave_oficial,paralelo_de} =  horario;
        tabla += `
        <tr> 
            <td class="align-middle text-small text-start"><b>${clave_oficial}</b><br>${nombre}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle text-small">${capacidad}</td>
            <td class="align-middle text-small"><b>${rfc}</b><br>${nombre_docente}</td>
            <td class="align-middle text-small">${lunes}</td>
            <td class="align-middle text-small">${martes}</td>
            <td class="align-middle text-small">${miercoles}</td>
            <td class="align-middle text-small">${jueves}</td>
            <td class="align-middle text-small">${viernes}</td>
            <td class="align-middle text-small">${sabado}</td>
            <td class="align-middle text-small">${paralelo_de}</td>
        </tr>`;
    });
    $(`#contenido_tabla_grupos_carrera`).html(`${tabla}`);
    $('#tabla_grupos_carreras').DataTable({
        "language": {
        "url": "./json/lenguaje.json"
    }
    });
    bootstrap.Itma2.end_loader();  
};

$(document).ready(() => {
    $('#frm_grupo_carrera').on('submit', (e) => {
      e.preventDefault();
      if(validar_campo(input_gruposCarrera,'vacios')){
        consulta_general();
      }
    });
});
