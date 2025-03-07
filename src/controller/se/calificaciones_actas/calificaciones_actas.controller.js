let input_calificaciones_actas1 = [];
let input_calificaciones_actas2 = [];
let vista_actual = '';

const obtener_periodo_escolar = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_periodo");
    const selec = new Consultas("HistorialAcademico",datos);
    selec.catalogo('select_exam_esp_glob','codigo_html');
    selec.catalogo('select_periodo','codigo_html');

}

const actualizar_cal_especiales = () =>{
    let datos = new FormData($('#frm_calificacion_especial')[0]);
    datos.append('funcion',"actualizar_calificacion_esp");
    const ejecucion = new Consultas("CalificacionesActas",datos);
    ejecucion.insercion();
}

const mostrar_examenes_especiales = async (periodo) => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_exam_esp_glo`).html(``);  
    $('#tabla_exam_esp_glo').DataTable().destroy();
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
            <td class="align-middle"><button type="button" class="btn btn-primary" onclick="precargar_examenes_especiales(${fk_cat_materias})"><i class="fa-solid fa-file-pen"></i></butto></td>
            <td class="align-middle">
                <form action="app/docs/acta_calificacion_especial.doc.php" method="POST" targe="_blank">
                    <input type="text" name="periodo" value="${$('[name=select_exam_esp_glob]').val()}" hidden>
                    <input type="text" name="materia" value="${fk_cat_materias}" hidden>
                    <button type="submit" class="btn btn-secondary text-white"><i class="fa-solid fa-file-lines"></i></butto>
                </form>
            </td>
        </tr>`;
    });
    $(`#contenido_tabla_exam_esp_glo`).html(`${tabla}`);  
    $('#tabla_exam_esp_glo').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader(); 
}

const precargar_examenes_especiales = async (id) => {
    input_calificaciones_actas1 = [];
    bootstrap.Itma2.start_loader();
    let periodo = $('[name=select_exam_esp_glob]').val();
    let datos = new FormData();
    datos.append('funcion','consultar_examenes_cal'); 
    datos.append('materia',id);
    datos.append('periodo',periodo); 
    const ejecucion = new Consultas("Examenes", datos);
    let respuesta = await ejecucion.consulta();
    let contenido = ``, cont = 1;
    let materia = '',n_carrera = '';
    respuesta.map(examenes => {
        let {id_solicitudes_ex_especiales,calificacion_especial,nombre_completo_materia,carrera,nombre,numero_control} = examenes;
        materia = nombre_completo_materia;
        n_carrera = carrera;
        contenido += `
            <hr class="my-2">
            <input type="text" name="id_${cont}" value="${id_solicitudes_ex_especiales}" hidden>
            <div class="col-lg-2 col-md-4 col-sm-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="No." value="${cont}" readonly>
                    <label for="" class="small">No.</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-8 col-sm-9">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " placeholder="No. Control" value="${numero_control}" readonly>
                    <label for="" class="small">No. Control</label>
                </div>
            </div>
            <div class="col-lg-5 col-md-9">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Alumno" value="${nombre}" readonly>
                    <label for="" class="small">Alumno</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" name="ex_esp_calificacion${cont}" class="form-control" placeholder="Calificación" value="${calificacion_especial == 'NA' ? 0 : calificacion_especial}" minlength="1" maxlength="3">
                    <label for="ex_esp_calificacion${cont}" class="small">Calificación</label>
                </div>
            </div>
            <hr class="my-2">
        `;
        input_calificaciones_actas1.push(`ex_esp_calificacion${cont}`);
        cont++;
    });
    contenido += `<input type="text" name="cantidad" value="${cont}" hidden></input>`;
    $('#periodo_ex_esp').val($('select[name="select_exam_esp_glob"] option:selected').text());
    $('#materia_ex_esp').val(materia);
    $('#seccion_calificaciones_esp').html(contenido);
    $('#modal_capturar_cal_ex').modal('show');
    bootstrap.Itma2.end_loader();   
}

const precargar_act_normal = async (id) => {
    bootstrap.Itma2.start_loader();
    input_calificaciones_actas2 = [];
    let periodo = $('[name=select_periodo]').val();
    let datos = new FormData();
    datos.append('funcion','precargar_alumnos'); 
    datos.append('materia',id);
    datos.append('periodo',periodo); 
    const ejecucion = new Consultas("CalificacionesActas", datos);
    let respuesta = await ejecucion.consulta();
    let {nombre_grupo,nombre_persona,apellido_paterno,apellido_materno,nombre_completo_materia} = respuesta[1];
    $('#periodo_normal').val($('select[name="select_periodo"] option:selected').text());
    $('[name=materia_normal]').val(nombre_completo_materia);
    $('[name=grupo_normal]').val(nombre_grupo);
    $('[name=docente_normal]').val(`${apellido_paterno} ${apellido_materno} ${nombre_persona}`);
    let contenido = ``, cont = 1;
    respuesta[0].map(alumnos => {
        let {id_seleccion_materias,numero_control,nombre_persona,apellido_paterno,apellido_materno,calificacion,fk_tipo_evaluacion,presento,repeticion} = alumnos;
        contenido += `
            <hr class="my-2">
            <input type="text" name="id_${cont}" value="${id_seleccion_materias}" hidden>
            <div class="col-lg-1 col-md-4 col-sm-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="No." value="${cont}" readonly>
                    <label for="" class="small">No.</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-8 col-sm-9">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-small" placeholder="No. Control" value="${numero_control}" readonly>
                    <label for="" class="small">No. Control</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-9">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-small" placeholder="Alumno" value="${apellido_paterno} ${apellido_materno} ${nombre_persona}" readonly>
                    <label for="" class="small">Alumno</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="calificacion${cont}" id="calificacion${cont}" placeholder="Calificación" value="${calificacion == 'NA' ? 0 : calificacion}"  minlength="1" maxlength="3">
                    <label for="calificacion${cont}" class="small">Calificación</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-control" name="tipo_evaluacion${cont}" id="tipo_evaluacion${cont}">
                        <option value="4" ${fk_tipo_evaluacion == '4' ? 'Selected' : ''}>Ev.Ord.1ra</option>
                        <option value="12" ${fk_tipo_evaluacion == '12' ? 'Selected' : ''}>Ev.Reg.1ra</option>
                        <option value="7" ${fk_tipo_evaluacion == '7' ? 'Selected' : ''}>Ev.Ext.1ra</option>
                    </select>
                    <label for="tipo_evaluacion${cont}" class="small">Tipo Evaluacion</label>
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-12 text-center align-self-center">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" ${presento == 0 ? 'checked' : ''} name="no_presento${cont}" id="no_presento${cont}">
                    <label for="no_presento" class="form-check-label text-small">No Presento</label>
                </div>
            </div>
            <div class="col-lg-1 col-md-3 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-center" readonly placeholder="Repite" value="${repeticion}">
                    <label for="" class="small">Repite</label>
                </div>
            </div>
            <hr class="my-2">
        `;
        input_calificaciones_actas2.push(`calificacion${cont}`);
        cont++;
    });
    contenido += `<input type="text" name="cantidad_normal" value="${cont}" hidden></input>`;
    $('#seccion_calificaciones').html(contenido);
    $('#modal_capturar').modal('show');
    bootstrap.Itma2.end_loader();   
}

const mostrar_act_normal = async (periodo) => {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_periodo_n`).html(``);  
    $('#tabla_periodo').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_materias_normal'); 
    datos.append('periodo',periodo); 
    const ejecucion = new Consultas("CalificacionesActas", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(materias => {
        let {id_grupo,fk_cat_materias,nombre_grupo,nombre_persona,apellido_paterno,apellido_materno,nombre_completo_materia,clave_oficial,alumnos_inscritos} = materias;
        tabla += `
        <tr> 
            <td class="align-middle text-small">${apellido_paterno} ${apellido_materno} ${nombre_persona}</td>
            <td class="align-middle text-small"><b>${clave_oficial}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle ">${alumnos_inscritos}</td>
            <td class="align-middle"><button type="button" class="btn btn-primary btn-sm" onclick="precargar_act_normal(${fk_cat_materias})"><i class="fa-solid fa-file-pen"></i></td>
            <td class="align-middle">
                <form action="app/docs/acta_calif_individual.doc.php" method="POST" targe="_blank">
                    <input type="text" name="periodo" value="${$('[name=select_periodo]').val()}" hidden>
                    <input type="text" name="materia" value="${fk_cat_materias}" hidden>
                    <button type="submit" class="btn btn-secondary text-white"><i class="fa-solid fa-file-lines"></i></butto>
                </form>
            </td>
            <td class="align-middle"><button class="btn btn-success btn-sm"><i class="fa-regular fa-file-excel" id="btn_generar_excel"></i></button></td>
        </tr>`;
    });
    $(`#contenido_tabla_periodo_n`).html(`${tabla}`);  
    $('#tabla_periodo').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader(); 
}

const actualizar_cal_normales = () =>{
    let datos = new FormData($('#frm_captura_cal_normal')[0]);
    datos.append('funcion',"actualizar_calificacion_normal");
    const ejecucion = new Consultas("CalificacionesActas",datos);
    ejecucion.insercion();
}

obtener_periodo_escolar();

/*   mostrar secciones */

$('#btn_periodo_normal').on('click',() => {
    $('#seccion_periodo').removeClass('d-none');
    vista_actual = 'seccion_periodo';
    $('#seccion_botones_menu').addClass('d-none');
});

$('#btn_examenes_esp_glo').on('click',() => {
    $('#seccion_botones_menu').addClass('d-none');
    $('#seccion_examens_esp_glo').removeClass('d-none');
    vista_actual = 'seccion_examens_esp_glo';
});

$('#btn_generar_folios').on('click',() => {
    $('#seccion_folios').removeClass('d-none');
    vista_actual = 'seccion_folios';
    $('#seccion_botones_menu').addClass('d-none');
});

/*  ocultar secciones */

$('#btn_canc_periodo').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#seccion_botones_menu').removeClass('d-none');
    $('#select_periodo').val('');
    $(`#contenido_tabla_periodo_n`).html(``);
});

$('#btn_canc_ex_especial').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#seccion_botones_menu').removeClass('d-none');
    $(`#select_exam_esp_glob`).val('');
    $(`#contenido_tabla_exam_esp_glo`).html(``);
});

$('#btn_canc_folio').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#seccion_botones_menu').removeClass('d-none');
});

$('#select_exam_esp_glob').on('change',() => {
    mostrar_examenes_especiales($('#select_exam_esp_glob').val());
});

$('#select_periodo').on('change',() => {
    mostrar_act_normal($('#select_periodo').val());
});

$(document).ready(() => {
    $('#frm_calificacion_especial').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(input_calificaciones_actas1,'vacios')){
            if(validar_campo(input_calificaciones_actas2,"calificacion")){
                actualizar_cal_especiales();
            }else{
                msj_error("Las calificaciones validas estan en el rango de 0 y 100");
            }
        }
    });
    $('#frm_captura_cal_normal').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(input_calificaciones_actas2,'vacios')){
            if(validar_campo(input_calificaciones_actas2,"calificacion")){
                actualizar_cal_normales();
            }else{
                msj_error("Las calificaciones validas estan en el rango de 0 y 100");
            }
        }
    });
});