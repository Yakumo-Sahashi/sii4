let input_actas_calificaciones = [];

const obtener_periodo_escolar = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_periodo");
    const selec = new Consultas("HistorialAcademico",datos);
    selec.catalogo('periodo_exam_docente','codigo_html');
    selec.catalogo('periodo_exam_periodo','codigo_html'); 
    selec.catalogo('periodo_docente_normal','codigo_html'); 
    selec.catalogo('periodo_periodo_normal','codigo_html'); 
}

const obtener_docente = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_docentes");
    const ejecutar = new Consultas("ActasCalificacionesDoc",datos);
    ejecutar.catalogo('docente_exam_docente','codigo_html');
    ejecutar.catalogo('docente_docente_normal','codigo_html'); 
}

obtener_periodo_escolar();
obtener_docente();

const consultar_actas_docente_normal = async () => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_actas`).html(``);  
    $('#tabla_actas').DataTable().destroy();
    let datos = new FormData($('#frm_docente_normal')[0]);
    datos.append('funcion','consultar_materias_normal');
    const ejecucion = new Consultas("ActasCalificacionesDoc", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(materias => {
        let {id_grupo,fk_cat_materias,nombre_grupo,nombre_completo_materia,clave_oficial,alumnos_inscritos} = materias;
        tabla += `
        <tr> 
            <td class="align-middle text-start text-small"><b>${clave_oficial}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle ">${alumnos_inscritos}</td>
            <td class="align-middle">
                <form action="app/docs/acta_calif_periodo_normal_docente.doc.php" method="POST" targe="_blank">
                    <input type="text" name="periodo" value="${$('[name=periodo_docente_normal]').val()}" hidden>
                    <input type="text" name="materia" value="${fk_cat_materias}" hidden>
                    <button type="submit" class="btn btn-secondary text-white"><i class="fa-solid fa-file-lines"></i></butto>
                </form>
            </td>
            <td class="align-middle"><button class="btn btn-success btn-sm"><i class="fa-regular fa-file-excel" id="btn_generar_excel"></i></button></td>
        </tr>`;
    });
    $(`#contenido_tabla_actas`).html(`${tabla}`);  
    $('#tabla_actas').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    $('#seccion_tabla_actas').removeClass('d-none');
    bootstrap.Itma2.end_loader(); 
}

const consultar_actas_docente_especial = async () => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_actas_esp`).html(``);  
    $('#tabla_actas_esp').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_examenes_periodo'); 
    datos.append('periodo',periodo); 
    const ejecucion = new Consultas("Examenes", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(examenes => {
        let {id_solicitudes_ex_especiales,nombre_completo_materia,fk_cat_materias,inscritos} = examenes;
        tabla += `
        <tr> 
            <td class="align-middle">${nombre_completo_materia}</td>
            <td class="align-middle">${inscritos}</td>
            <td class="align-middle">
                <form action="app/docs/acta_calificacion_especial.doc.php" method="POST" targe="_blank">
                    <input type="text" name="periodo" value="${$('[name=select_exam_esp_glob]').val()}" hidden>
                    <input type="text" name="materia" value="${fk_cat_materias}" hidden>
                    <button type="submit" class="btn btn-secondary text-white"><i class="fa-solid fa-file-lines"></i></butto>
                </form>
            </td>
        </tr>`;
    });
    $(`#contenido_tabla_actas_esp`).html(`${tabla}`);  
    $('#tabla_actas_esp').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    $('#seccion_tabla_actas_esp').removeClass('d-none');
    bootstrap.Itma2.end_loader(); 
}

$('#op_examenes_docente').on('click',() => {
    $('#seccion_exam_docente').removeClass('d-none');  
    $('#seccion_opciones').addClass('d-none');    
});

$('#op_examenes_periodo').on('click',() => {
    $('#seccion_exam_periodo').removeClass('d-none');  
    $('#seccion_opciones').addClass('d-none');    
});

$('#op_docente_normal').on('click',() => {
    $('#seccion_docente_normal').removeClass('d-none');  
    $('#seccion_opciones').addClass('d-none');    
});

$('#op_periodo_normal').on('click',() => {
    $('#seccion_periodo_normal').removeClass('d-none');  
    $('#seccion_opciones').addClass('d-none');    
});

/* ----------ocultar----------------- */

$('#btn_cancelar_exam_docente').on('click',() => {
    $('#frm_exam_docente')[0].reset();
    $('#seccion_exam_docente').addClass('d-none');  
    $('#seccion_opciones').removeClass('d-none');    
    $('#seccion_tabla_actas_esp').addClass('d-none');
});

$('#btn_cancelar_exam_periodo').on('click',() => {
    $('#frm_exam_periodo')[0].reset();
    $('#seccion_exam_periodo').addClass('d-none');  
    $('#seccion_opciones').removeClass('d-none');    
});

$('#btn_cancelar_docente_normal').on('click',() => {
    $('#frm_docente_normal')[0].reset();
    $('#seccion_docente_normal').addClass('d-none');  
    $('#seccion_opciones').removeClass('d-none');  
    $('#seccion_tabla_actas').addClass('d-none');  
});

$('#btn_cancelar_periodo_normal').on('click',() => {
    $('#frm_periodo_normal')[0].reset();
    $('#seccion_periodo_normal').addClass('d-none');  
    $('#seccion_opciones').removeClass('d-none');    
});


$(document).ready(() => {
    $('#frm_exam_docente').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['periodo_exam_docente','docente_exam_docente'],'vacios')){
            
        }
    });

    /* $('#frm_exam_periodo').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['periodo_exam_periodo'],'vacios')){
            
        }
    });
 */
    $('#frm_docente_normal').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['periodo_docente_normal','docente_docente_normal'],'vacios')){
            consultar_actas_docente_normal();            
        }
    });

    /* $('#frm_periodo_normal').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['periodo_periodo_normal'],'vacios')){
            
        }
    }); */
});