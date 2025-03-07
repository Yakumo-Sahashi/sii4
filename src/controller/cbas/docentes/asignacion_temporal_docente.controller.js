const consultar_organigrama = async () =>{
    let datos = new FormData();
    datos.append('funcion',"organigrama_materias");
    const ejecucion = new Consultas("PlazasAsignadas",datos);
    let resultado = await ejecucion.consulta();
    $('[name=seleccion_departamento_plaza]').val(resultado.descripcion);
    $('[name=id_departamento_plaza]').val(resultado.id_cat_organigrama);
}

const consultar_periodo = async () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo");
    const ejecucion = new Consultas("AsignacionGrupo",datos);
    let resultado = await ejecucion.consulta();
    $('[name=periodo]').val(resultado.identificacion_corta);
}

const obtener_docentes_area = (area)=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_docentes_area");
    datos.append('area',area);
    const ejecucion = new Consultas("AsignacionTemporalDocente", datos);
    ejecucion.catalogo('select_docente','codigo_html');
}

const obtener_area_academica = (validar = 0) => {
    let datos = new FormData();
    datos.append('funcion', "consultar_area_academica");
    const ejecucion = new Consultas("AsignacionTemporalDocente", datos);
    ejecucion.catalogo('area_academica','codigo_html');
    if(validar == 0){
        ejecucion.catalogo('area_academica_org','codigo_html');
    }
}

const consultar_docentes_prestamo = async ()=> {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_docentes_temp_contenido`).html(``);  
    $('#tabla_docentes_temp').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_docentes');
    const ejecucion = new Consultas('AsignacionTemporalDocente',datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(personal => {
        let {id_prestamos_maestros,nombre_persona,apellido_paterno,apellido_materno,rfc,origen,temp} =  personal;
        tabla += `
        <tr> 
            <td class="align-middle text-start">
                <b>${rfc}</b><br>
                ${apellido_paterno} ${apellido_materno} ${nombre_persona}</td>
            <td class="align-middle text-success">${origen}</td>
            <td class="align-middle text-primary">${temp}</td>
            <td class="align-middle"><button type="button" class="btn btn-outline-danger" onclick="retirar_asignacion(${id_prestamos_maestros})"><i class="fa-solid fa-ban"></i></button></td>
        </tr>`;
    });
    $(`#tabla_docentes_temp_contenido`).html(tabla);
    $('#tabla_docentes_temp').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader(); 
}

const asignar_prestamo = async () => {
    bootstrap.Itma2.start_loader();    
    let datos = new FormData($('#frm_asig_temporal_depto')[0]);
    datos.append('funcion','asignar_docente');
    const ejecucion = new Consultas('AsignacionTemporalDocente',datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader(); 
    if(respuesta[0] == 1){
        $('[name=select_docente]').val('');
        $('[name=area_academica]').val('');
        $('[name=area_academica_org]').val('');
        msj_exito(respuesta[1]);
    }else{
        msj_error(respuesta[1]);
    }
    consultar_docentes_prestamo();
}

const retirar_asignacion = async (id) => {
    swal({
        title: "Advertencia!",
        text: "Desea retirar la asiganción temporal del docente?\nUna vez eliminado no se podra recuperar.",
        icon: "warning",
        buttons: [`Cancelar`,`Aceptar`],
        dangerMode: true,
    }).then((accion) => {
        if (accion) {
            let datos = new FormData();
            datos.append('funcion','retirar_asignacion');
            datos.append('id_docente',id);
            const ejecucion = new Consultas('AsignacionTemporalDocente',datos);
            ejecucion.insercion();
            consultar_docentes_prestamo();
            $('[name=select_docente]').val('');
            $('[name=area_academica]').val('');
            $('[name=area_academica_org]').val('');
        }
    });
}

consultar_organigrama();
consultar_periodo();
obtener_docentes_area();
obtener_area_academica();
consultar_docentes_prestamo();


$('#area_academica_org').on('change',() => {
    obtener_docentes_area($('[name=area_academica_org]').val());
    if($('[name=area_academica_org]').val() != $('[name=id_departamento_plaza]').val()){
        $('[name=area_academica]').html(`
            <option value="" Selected>Seleccionar area</option>
            <option value="${$('[name=id_departamento_plaza]').val()}">${$('[name=seleccion_departamento_plaza]').val()}</option>
        `);   
    }else{
        obtener_area_academica(1);
    }
});

$(document).ready(() => {
    $('#frm_asig_temporal_depto').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['area_academica_org','select_docente','area_academica'],'vacios')){
            if($('[name=area_academica]').val() == $('[name=area_academica_org]').val()){
                msj_error('No puedes asignar al docente a la misma area a la que pertenece!');
            }else{
                asignar_prestamo();
            }
        }
    });
});