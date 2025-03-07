let input_consulta_grupos = ['carrera','carrera_periodo','carrera_semestre'];
$('#btn_consulta_carrera').on("click",()=>{
    $('#consulta_carrera').removeClass("d-none");
    $('#consulta_docentes').addClass("d-none");
    $('#consulta_departamento').addClass("d-none");
});
$('#btn_consulta_docente').on("click",()=>{
    $('#consulta_docentes').removeClass("d-none");
    $('#consulta_carrera').addClass("d-none");
    $('#consulta_departamento').addClass("d-none");
    consulta_docente();
});
$('#btn_consulta_departamento').on("click",()=>{
    $('#consulta_departamento').removeClass("d-none");
    $('#consulta_docentes').addClass("d-none");
    $('#consulta_carrera').addClass("d-none");
});

const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('carrera_periodo','codigo_html');  
}

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera','codigo_html');  
}

obtener_periodos();
obtener_carrera();

const consulta_general = async() => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_consulta`).html(``);  
    $('#tabla_docente').DataTable().destroy();
    let datos = new FormData($('#frm_consulta_grupo')[0]);
    datos.append('funcion','consultar_general'); 
    const ejecucion = new Consultas("ConsultarGrupos", datos);
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
    $(`#contenido_tabla_consulta`).html(`${tabla}`);
    $('#tabla_docente').DataTable({
        "language": {
        "url": "./json/lenguaje.json"
    }
    });
    $('#seccion_tabla_consulta').removeClass('d-none');
    $('#btn_cancelar_consulta').removeClass('disabled');
    bootstrap.Itma2.end_loader();  
};

$('#btn_cancelar_consulta').on('click',() => {
    bootstrap.Itma2.start_loader();  
    $('#frm_consulta_grupo')[0].reset();
    $('#seccion_tabla_consulta').addClass('d-none');
    $(`#contenido_tabla_consulta`).html(``);  
    $('#tabla_docente').DataTable().destroy();
    $('#btn_cancelar_consulta').addClass('disabled');
    bootstrap.Itma2.end_loader();  
});

$(document).ready(() => {
    $('#frm_consulta_grupo').on('submit', (e) => {
      e.preventDefault();
      if(validar_campo(input_consulta_grupos,'vacios')){
        consulta_general();
      }
    });
});
