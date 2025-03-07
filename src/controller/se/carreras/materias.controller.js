let input_materia_atualizar = ['area_academica_act','nombre_completo_act','clave_oficial_act','clave_act','select_especialidad_act','orden_certificado_act','estatus_materia_act','horas_teoricas_act','horas_practicas_act','creditos_totales_act','creditos_prerrequisito_act','nivel_escolar_act','tipo_materia_act','nombre_abreviado_act','select_unidades','clasificacion_acredi_act'];
let input_materia_agregar = ['area_academica','nombre_completo','clave_oficial','clave','select_especialidad_agregar','orden_certificado','estatus_materia','horas_teoricas','horas_practicas','creditos_totales','creditos_prerrequisito','nivel_escolar','tipo_materia','nombre_abreviado','select_unidades_act','clasificacion_acredi'];
let pagina_actual = 1;
caracter_numeros('orden_certificado_act');
caracter_numeros('horas_teoricas_act');
caracter_numeros('horas_practicas_act');
caracter_numeros('creditos_totales_act');
caracter_numeros('creditos_prerrequisito_act');
caracter_mayus('clave_oficial_act');
caracter_mayus('clave_act');
caracter_mayus('nombre_abreviado_act');
caracter_mayus('nombre_completo_act');
caracter_mayus('clasificacion_acredi_act');
caracter_mayus('buscador');

caracter_numeros('orden_certificado');
caracter_numeros('horas_teoricas');
caracter_numeros('horas_practicas');
caracter_numeros('creditos_totales');
caracter_numeros('creditos_prerrequisito');
caracter_mayus('clave_oficial');
caracter_mayus('clave');
caracter_mayus('nombre_abreviado');
caracter_mayus('nombre_completo');
caracter_mayus('clasificacion_acredi');

const obtener_carrera = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera','codigo_html');
}

const obtener_especialidad = (carrera) => {  
    let datos = new FormData();
    datos.append('funcion', "consultar_especialidad_materia");
    datos.append('carrera_reticula', `${carrera}`);
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('select_especialidad_agregar','codigo_html'); 
    ejecucion.catalogo('select_especialidad_act','codigo_html');
}

const obtener_area_academica = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_area_academica");
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('area_academica','codigo_html');
    ejecucion.catalogo('area_academica_act','codigo_html');
}

const obtener_tipo_materia = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_tipo_materia");
    const ejecucion = new Consultas("Materias", datos);
    ejecucion.catalogo('tipo_materia','codigo_html');
    ejecucion.catalogo('tipo_materia_act','codigo_html');
}

const precargar_materia = async (id) => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"precargar_materia");
    datos.append('materia',id);
    const ejecucion = new Consultas("Materias",datos);
    let resultado = await ejecucion.consulta();
    let {id_cat_materias,clave_oficial,clave,nombre_completo_materia,nombre_abreviado_materia,creditos_teorica,creditos_practica,creditos_totales,creditos_prerequisitos,orden_certificado,fk_cat_especialidad,estatus_materias_carrera,fk_cat_organigrama,fk_cat_tipo_materia,nivel_escolar,no_unidades} = resultado;
    $('[name=id_materia]').val(id_cat_materias);
    $('[name=nombre_completo_act]').val(nombre_completo_materia);
    $('[name=area_academica_act]').val(fk_cat_organigrama);
    $('[name=clave_oficial_act]').val(clave_oficial);
    $('[name=clave_act]').val(clave);
    $('[name=select_especialidad_act]').val(fk_cat_especialidad);
    $('[name=orden_certificado_act]').val(orden_certificado);
    $('[name=estatus_materia_act]').val(estatus_materias_carrera);
    $('[name=horas_teoricas_act]').val(creditos_teorica);
    $('[name=horas_practicas_act]').val(creditos_practica);
    $('[name=creditos_totales_act]').val(creditos_totales);
    $('[name=creditos_prerrequisito_act]').val(creditos_prerequisitos);
    $('[name=nivel_escolar_act]').val(nivel_escolar);
    $('[name=tipo_materia_act]').val(fk_cat_tipo_materia);
    $('[name=nombre_abreviado_act]').val(nombre_abreviado_materia);
    $('[name=select_unidades_act]').val(no_unidades);
    $('[name=clasificacion_acredi_act]').val('N/A');
    $('#modal_editar_materia').modal('show');
    bootstrap.Itma2.end_loader();
}

const mostrar_pagina = (pagina) => {
    $(`#pagina_${pagina_actual}`).addClass('d-none')
    $(`#btn_pagina_${pagina_actual}`).removeClass('active');
    $(`#pagina_${pagina}`).removeClass('d-none');
    $(`#btn_pagina_${pagina}`).addClass('active');
    pagina_actual =  pagina;
}

const obtener_materias = async () => {
    bootstrap.Itma2.start_loader();
    pagina_actual = 1;
    let datos = new FormData($('#frm_seleccionar_carrera')[0]);
    datos.append('funcion', 'consultar_materias');
    const ejecucion = new Consultas("Materias", datos);
    let respuesta = await ejecucion.consulta();
    let contenido = ``, cont = 0, pagina = ``, i = 1, botones = ``, total = 0;
    respuesta.map(materia => {
        cont++;
        let {id_cat_materias,nombre_completo_materia,clave_oficial,creditos_teorica,creditos_practica,creditos_totales,estatus_materias_carrera} = materia;
        contenido += `
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="container col-materia" onclick="precargar_materia(${id_cat_materias})" type="button" style="height:263px;">
                    <div class="row p-0">
                        <div class="col p-0 text-center">
                            <img class="icono-materia fa-solid fa-book overflow-hidden ${estatus_materias_carrera == 'A' ? 'text-primary' :'text-secondary'} my-4"></i>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-4 p-0">
                        <div class="col-12 p-0 text-center">
                            <div class="${estatus_materias_carrera == 'A' ? 'text-primary' :'text-secondary'} small" id="nombre_materia_info">${nombre_completo_materia}</div>
                        </div>
                        <div class="col-12 text-center">
                            <div class="text-muted small" id="clave_materia_info">${clave_oficial}</div>
                        </div>
                        <div class="col-12 text-center">
                            <div class="text-muted small" id="creditos_materia_info">${creditos_teorica}-${creditos_practica}-${creditos_totales}</div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        if(cont > 7){
            pagina += `
                <div class="row justify-content-center row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-3 g-4 mt-3 p-5 ${i > 1 ? 'd-none': ''}" id="pagina_${i}">
                    ${contenido}
                </div>
            `;
            botones += `<li id="btn_pagina_${i}" class="page-item ${i == 1 ? 'active': ''}"><button onclick="mostrar_pagina(${i})" class="page-link">${i}</button></li>`;
            contenido = ``;
            cont = 0;
            i++;
            total += 8;
        }
    });
    if(respuesta.length > total){
        pagina += `
            <div class="row justify-content-center row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-3 g-4 mt-3 p-5 ${i > 1 ? 'd-none': ''}" id="pagina_${i}">
                ${contenido}
            </div>
        `;
        botones += `<li id="btn_pagina_${i}" class="page-item ${i == 1 ? 'active': ''}"><button onclick="mostrar_pagina(${i})" class="page-link">${i}</button></li>`;
    }
    pagina += `
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        ${botones}
                    </ul>
                </nav>
            </div>
        </div>
    `;
    $('#info_carrera').text($('select[name="carrera"] option:selected').text());
    $(`#listado_materias`).html(pagina);
    $('#seccion_seleccionar_carrera').addClass('d-none');
    $('#seccion_materias').removeClass('d-none');
    bootstrap.Itma2.end_loader();
    obtener_especialidad($('#carrera').val());
}

const actualizar_materia = () => {
    let datos = new FormData($('#frm_act_materia')[0]);
    datos.append('funcion',"actualizar_materia");
    const ejecucion = new Consultas("Materias",datos);
    ejecucion.insercion();
    setTimeout(() => {;
        $('[name=buscador]').val("");
        obtener_materias();
    }, 500); 
    $('#modal_editar_materia').modal('hide');
}

const agregar_materia = () => {
    let datos = new FormData($('#frm_agregar_materia')[0]);
    let carrera = $('[name=carrera]').val();
    datos.append('funcion',"agregar_materia");
    datos.append('carrera',carrera);
    const ejecucion = new Consultas("Materias",datos);
    ejecucion.insercion();
    setTimeout(() => {;
        obtener_materias();
    }, 500);
    $('#frm_agregar_materia')[0].reset();
}

const buscar_materias = async (materia) => {
    let datos = new FormData($('#frm_seleccionar_carrera')[0]);
    datos.append('funcion', 'consultar_materias');
    datos.append('buscar',materia);
    const ejecucion = new Consultas("Materias", datos);
    let respuesta = await ejecucion.consulta();
    let contenido = ``, cont = 0, pagina = ``, i = 1, botones = ``, total = 0;
    respuesta.map(materia => {
        cont++;
        let {id_cat_materias,nombre_completo_materia,clave_oficial,creditos_teorica,creditos_practica,creditos_totales,estatus_materias_carrera} = materia;
        contenido += `
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="container col-materia" onclick="precargar_materia(${id_cat_materias})" type="button" style="height:263px;">
                    <div class="row p-0">
                        <div class="col p-0 text-center">
                            <img class="icono-materia fa-solid fa-book overflow-hidden ${estatus_materias_carrera == 'A' ? 'text-primary' :'text-secondary'} my-4"></i>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-4 p-0">
                        <div class="col-12 p-0 text-center">
                            <div class="${estatus_materias_carrera == 'A' ? 'text-primary' :'text-secondary'} small" id="nombre_materia_info">${nombre_completo_materia}</div>
                        </div>
                        <div class="col-12 text-center">
                            <div class="text-muted small" id="clave_materia_info">${clave_oficial}</div>
                        </div>
                        <div class="col-12 text-center">
                            <div class="text-muted small" id="creditos_materia_info">${creditos_teorica}-${creditos_practica}-${creditos_totales}</div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        if(cont > 7){
            pagina += `
                <div class="row justify-content-center row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-3 g-4 mt-3 p-5 ${i > 1 ? 'd-none': ''}" id="pagina_${i}">
                    ${contenido}
                </div>
            `;
            botones += `<li id="btn_pagina_${i}" class="page-item ${i == 1 ? 'active': ''}"><button onclick="mostrar_pagina(${i})" class="page-link">${i}</button></li>`;
            contenido = ``;
            cont = 0;
            i++;
            total += 8;
        }
    });
    if(respuesta.length > total){
        pagina += `
            <div class="row justify-content-center row-cols-4 row-cols-sm-3 row-cols-md-4 row-cols-lg-3 g-4 mt-3 p-5 ${i > 1 ? 'd-none': ''}" id="pagina_${i}">
                ${contenido}
            </div>
        `;
        botones += `<li id="btn_pagina_${i}" class="page-item ${i == 1 ? 'active': ''}"><button onclick="mostrar_pagina(${i})" class="page-link">${i}</button></li>`;
    }
    pagina += `
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        ${botones}
                    </ul>
                </nav>
            </div>
        </div>
    `;
    $(`#listado_materias`).html(pagina);
}

obtener_carrera();
obtener_area_academica();
obtener_tipo_materia();

$('#btn_regresar').on('click',() => {
    $('#seccion_seleccionar_carrera').removeClass('d-none');
    $('#seccion_materias').addClass('d-none');
    $('#frm_seleccionar_carrera')[0].reset();
    $('[name=buscador]').val("");
});

$(document).ready(() => {
    $('#frm_seleccionar_carrera').on("submit", (e) => {
        e.preventDefault();
        if (validar_campo(['carrera'],'vacios')) {
            obtener_materias();
        }
    });

    $('#frm_act_materia').on("submit", (e) => {
        e.preventDefault();
        if (validar_campo(input_materia_atualizar,'vacios')) {
            actualizar_materia();
        }
    });

    $('#frm_agregar_materia').on("submit", (e) => {
        e.preventDefault();
        if (validar_campo(input_materia_agregar,'vacios')) {
            agregar_materia();
        }
    });

    $('#buscador').on('keyup',() => {
        if($('[name=buscador]').val() == ""){
            obtener_materias();        
        }else{
            buscar_materias($('[name=buscador]').val());
        }
    });

    $('#btn_limpiar').on('click',() => {
        if($('[name=buscador]').val() != ""){
            $('[name=buscador]').val("");
            obtener_materias();  
        }
    });
});