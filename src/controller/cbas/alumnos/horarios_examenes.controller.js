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

const obtener_aula = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_aula");
    const ejecucion = new Consultas("Horarios", datos);
    ejecucion.catalogo('aula','codigo_html');
}

const obtener_docentes_area = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_docentes");
    const ejecucion = new Consultas("AsignacionGrupo", datos);
    ejecucion.catalogo('select_presidente','codigo_html');
    ejecucion.catalogo('select_secretario','codigo_html');
    ejecucion.catalogo('select_vocal','codigo_html');
}

const consultar_examenes = async ()=> {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_examenes_contenido`).html(``);  
    $('#tabla_examenes').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_examenes');
    const ejecucion = new Consultas('HorariosExamenes',datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(({id_materia,materia,alumnos,solicitud} = examen) => {
        let {id_materia_solicitada_especial = 0,aula = "-",apellido_paterno = "---",apellido_materno = "",nombre_persona = "",rfc = "",hora_inicio ="-",hora_fin ="-",fecha_examen = "---"} = solicitud;
        tabla += `
        <tr> 
            <td class="align-middle text-small text-start" id="materia_${id_materia}">${materia}</td>
            <td class="align-middle text-small">${alumnos}</td>
            <td class="align-middle text-small">
                <b>${rfc}</b><br>
                ${apellido_paterno} ${apellido_materno} ${nombre_persona}
            </td>
            <td class="align-middle text-small">${fecha_examen}</td>
            <td class="align-middle text-small">${hora_inicio}-${hora_fin}/<b>${aula}</b></td>
            <td class="align-middle text-small">
                <button type="button" class="btn btn-outline-primary" onclick="precargar_informacion(${id_materia_solicitada_especial},${id_materia})"><i class="fa-regular fa-calendar-plus"></i></button>
            </td>
        </tr>`;
    });
    $(`#tabla_examenes_contenido`).html(tabla);
    $('#tabla_examenes').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader(); 
}

const asignar_horario = async () => {
    bootstrap.Itma2.start_loader();    
    let datos = new FormData($('#frm_asignacion_horario')[0]);
    datos.append('funcion','asignar_horario');
    const ejecucion = new Consultas('HorariosExamenes',datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader(); 
    if(respuesta[0] == 1){
        $('#solicitud_examen').modal('hide');
        msj_exito(respuesta[1]);
    }else{
        msj_error(respuesta[1]);
    }
    consultar_examenes();
}

const precargar_informacion = async (id,id_materia) => {
    $('[name=materia]').val($(`#materia_${id_materia}`).text());
    $('[name=id_materia]').val(id_materia);
    if(id != 0){
        bootstrap.Itma2.start_loader();    
        let datos = new FormData($('#frm_asignacion_horario')[0]);
        datos.append('funcion','consultar_solicitud');
        datos.append('id_solicitud',id);
        const ejecucion = new Consultas('HorariosExamenes',datos);
        let respuesta = await ejecucion.consulta();
        let {id_materia_solicitada_especial,fk_cat_aulas,fk_personal_presidente,fk_personal_secretaria,fk_personal_vocal,hora_inicio,hora_fin,fecha_examen} = respuesta;
        $('[name=id_sol_examen]').val(id_materia_solicitada_especial);
        $('[name=select_presidente]').val(fk_personal_presidente);
        $('[name=select_secretario]').val(fk_personal_secretaria);
        $('[name=select_vocal]').val(fk_personal_vocal);
        $('[name=fecha_examen]').val(fecha_examen);
        $('[name=hora_inicio]').val(parseInt(hora_inicio));
        actualizar_hora_final(parseInt(hora_inicio));
        $('[name=aula]').val(fk_cat_aulas);
        setTimeout(()=>{
            $('[name=hora_fin]').val(hora_fin);
        },500);
        bootstrap.Itma2.end_loader(); 
    }
    $('#solicitud_examen').modal('show');
}

const actualizar_hora_final = (inicio) => { 
    inicio = parseInt(inicio) + 1;       
    let opciones = '<option value="">--:--</option>';
    for (let i = inicio; i < (22); i++) {
        if(i >= (inicio+4)){
            continue;
        }
        if (i < 10) {
            opciones = opciones + '<option value="0' + i + ':00">0' + i + ':00</option>';
        } else {
            opciones = opciones + '<option value="' + i + ':00">' + i + ':00</option>';
        }
    }         
    $('[name=hora_fin]').html(opciones);
};

consultar_organigrama();
consultar_periodo();
consultar_examenes();
obtener_docentes_area();
obtener_aula();

$('[name=hora_inicio]').on('change', () => {
    actualizar_hora_final($('#hora_inicio').val());
    $('#aula').val("");
});

const validar_duplicidad = arreglo => { 
    return new Set(arreglo).size < arreglo.length ? msj_error('Un docente no puede ocupar mas de un cargo!') : true;
}

$(document).ready(() => {
    $('#frm_asignacion_horario').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['select_presidente','select_secretario','select_vocal','fecha_examen','hora_inicio','hora_fin','aula'],'vacios')){
            if(validar_duplicidad([$('[name=select_presidente]').val(), $('[name=select_secretario]').val(), $('[name=select_vocal]').val()])){
                asignar_horario();
            }
        }
    });
});