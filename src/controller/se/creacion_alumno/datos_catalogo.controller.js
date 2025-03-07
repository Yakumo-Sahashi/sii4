
let plan_id = '';
let curp = Array;
let lugar_naciemiento = "";

$('#lugar_naciemiento').change(function() {
    var dt = $(this).val();
    $('#curp').val(dt);
    console.log(dt);
});

const obtener_carrera = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera_reticula','codigo_html');
}

const obtener_especialidad = (carrera) => {  
    let datos = new FormData();
    datos.append('funcion', "consultar_especialidad");
    datos.append('carrera_reticula', `${carrera}`);
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('especialidad','codigo_html');  
}

const obtener_tipo_ingreso = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_ingreso");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('tipo_ingresos','codigo_html');  
} 
const obtener_semestre = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "obtener_periodo_se");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('periodo_ingreso','valor_input');  
}

const obtener_semestre_id = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "obtener_periodo_id");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('periodo_ingreso_id','valor_input');  
}

const obtener_plan_estudios = async (carrera) => {
    let datos = new FormData();
    datos.append('funcion','consultar_plan_estudios');
    datos.append('carrera', carrera);
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    let {id_cat_reticula, clave_reticula} = await ejecucion.consulta();
    $('[name=plan_estudios]').val(`${clave_reticula}`);
    $('[name=plan_est]').val(`${id_cat_reticula}`);    
}

const obtener_nivel_estudios = ()=> {    
    let datos = new FormData();
    datos.append('funcion', "consulta_nivel_estudios");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('nivel_escolar','codigo_html');
}

const obtener_estatus_alumno = ()=> {    
    let datos = new FormData();
    datos.append('funcion', "consulta_estatus_alumno");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('estatus_alumno','codigo_html');
}
const obtener_estado = async (codigo_postal) => {
    let datos = new FormData();
    datos.append('funcion','consultar_estado');
    datos.append('codigo_postal', codigo_postal);
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    let opcion_colonia = ``;
    let {entidad_federativa, colonias, alcaldia} = await ejecucion.consulta();
    $('[name=estado]').val(`${entidad_federativa == undefined ? "" : entidad_federativa}`);
    $('[name=alcaldia]').val(`${alcaldia == undefined ? "" : alcaldia}`);
    for (let col in colonias) {
        let {colonia} = colonias[col];
        opcion_colonia += `<option value="${colonia}">${colonia}</option>`;
    }
    $('[name=colonia]').html(`${opcion_colonia}`);
}

obtener_carrera();
obtener_tipo_ingreso();
obtener_nivel_estudios();
obtener_estatus_alumno();
obtener_semestre();

$(document).on('keyup', '#codigo_postal', ()=> {
    let codigo_postal= $('#codigo_postal').val();
    if(codigo_postal != ""){
        obtener_estado(codigo_postal);
    }else{
        obtener_estado("");
    }
});

$('#carrera_reticula').on('change', () => {
    let carrera = $('#carrera_reticula').val();
    obtener_especialidad(carrera);
    obtener_plan_estudios(carrera);
});