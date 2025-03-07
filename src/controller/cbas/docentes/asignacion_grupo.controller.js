const consultar_organigrama = async () =>{
    let datos = new FormData();
    datos.append('funcion',"organigrama_materias");
    const ejecucion = new Consultas("PlazasAsignadas",datos);
    let resultado = await ejecucion.consulta();
    $('[name=seleccion_departamento_plaza]').val(resultado.descripcion);
}

const consultar_periodo = async () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo");
    const ejecucion = new Consultas("AsignacionGrupo",datos);
    let resultado = await ejecucion.consulta();
    $('[name=periodo]').val(resultado.identificacion_corta);
}

const obtener_carrera = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera_reticula','codigo_html');
}

const obtener_docentes_area = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_docentes");
    const ejecucion = new Consultas("AsignacionGrupo", datos);
    ejecucion.catalogo('select_docente','codigo_html');
}


consultar_organigrama();
obtener_carrera();
consultar_periodo();
obtener_docentes_area();

const precargar_materia = async (id_grupo,docente) => {
    bootstrap.Itma2.start_loader();    
    let datos = new FormData();
    datos.append('funcion','precargar_materia');
    datos.append('id',id_grupo);
    const ejecucion = new Consultas('AsignacionGrupo',datos);
    let respuesta = await ejecucion.consulta();
    let {nombre_grupo,nombre_completo_materia} = respuesta;
    $('[name=grupo]').val(nombre_grupo);
    $('[name=materia]').val(nombre_completo_materia);
    $('[name=select_docente]').val(docente);
    $('[name=id_grupo_add]').val(id_grupo);
    $('#permitir_cruce').prop('checked', false);
    $('#docentes_area').modal('show');
    bootstrap.Itma2.end_loader(); 
}

const filtrar_contenido = async ()=> {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_horario_grupos_contenido`).html(``);  
    $('#tabla_horario_grupos').DataTable().destroy();
    let datos = new FormData($('#frm_asignacion_grupo')[0]);
    datos.append('funcion','consultar_horarios');
    const ejecucion = new Consultas('AsignacionGrupo',datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(horario => {
        let {id_horario,lunes,martes,miercoles,jueves,viernes,sabado,nombre,nombre_grupo,capacidad,id_grupo,paralelo_de,docente,alumnos_inscritos,fk_personal,rfc} =  horario;
        tabla += `
        <tr> 
            <td class="align-middle text-small text-start">${nombre}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle text-small">${capacidad}</td>
            <td class="align-middle text-small"><span class="text-primary" type="button"onclick="precargar_materia(${id_grupo},${fk_personal})"><b>${rfc}</b><br>${docente}</span></td>
            <td class="align-middle text-small">${lunes}</td>
            <td class="align-middle text-small">${martes}</td>
            <td class="align-middle text-small">${miercoles}</td>
            <td class="align-middle text-small">${jueves}</td>
            <td class="align-middle text-small">${viernes}</td>
            <td class="align-middle text-small">${sabado}</td>
            <td class="align-middle text-small">
                ${paralelo_de == 'NP' ? `No` : `<b class="text-primary">${paralelo_de}</b>`}
            </td>
            <td class="align-middle text-small"> ${alumnos_inscritos}</td>
        </tr>`;
    });
    $(`#tabla_horario_grupos_contenido`).html(`${tabla}`);  
    $('#tabla_horarios_m').removeClass('d-none');
    $('#tabla_horario_grupos').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader(); 
}

const asignar_docente = async () => {
    bootstrap.Itma2.start_loader();    
    let datos = new FormData($('#frm_asignacion_docente')[0]);
    datos.append('funcion','asignar_docente');
    const ejecucion = new Consultas('AsignacionGrupo',datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader(); 
    if(respuesta[0] == 1){
        $('#docentes_area').modal('hide');
        $('#permitir_cruce').prop('checked', false);
        msj_exito(respuesta[1]);
    }else{
        msj_error(respuesta[1]);
    }
    filtrar_contenido();
}

$(document).ready(() => {
    $('#frm_asignacion_grupo').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['carrera_reticula','semestre'],'vacios')){
            filtrar_contenido();
        }
    });

    $('#frm_asignacion_docente').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['select_docente'],'vacios')){
            asignar_docente();
        }
    });
});