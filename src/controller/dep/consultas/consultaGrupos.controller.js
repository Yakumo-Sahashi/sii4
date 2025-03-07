let input_dep = ['departamento','carrera_departamento','periodo_departamento','semestre_departamento','orden_departamento'];
let input_carr = ['carrera','periodo_carrera','semestre_carrera'];

$("#seccion_deparamento").hide();
$("#seccion_carrera").hide();

$("#op_grupo_deparamento").on('click',() =>{
    $("#seccion_opciones").hide();
    $("#seccion_deparamento").show();
    $("#seccion_carrera").hide();
});

$("#op_grupo_carrera").on('click',() =>{
    $("#seccion_opciones").hide();
    $("#seccion_deparamento").hide();
    $("#seccion_carrera").show();
});

$("#btn_atras_departamento").on('click',() =>{
    $("#seccion_opciones").show();
    $("#seccion_deparamento").hide();
    $("#seccion_carrera").hide();
    $("#frm_consulta_grupo_departamento")[0].reset();
});

$("#btn_atras_carrera").on('click',() =>{
    $("#seccion_opciones").show();
    $("#seccion_deparamento").hide();
    $("#seccion_carrera").hide();
    $("#frm_consulta_grupo_carrera")[0].reset();
});

const consultar_periodo = () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo_full");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('periodo_departamento','codigo_html');
    selec.catalogo('periodo_carrera','codigo_html');
}

const consultar_organigrama = () =>{
    let datos = new FormData();
    datos.append('funcion', "consultar_area_academica");
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('departamento','codigo_html');
}


const consultar_carrera = () =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_carrera");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('carrera_departamento','codigo_html');
    selec.catalogo('carrera','codigo_html');
}

consultar_periodo();
consultar_organigrama();
consultar_carrera();

$("#frm_consulta_grupo_departamento").on('submit',(e) =>{
    e.preventDefault();
    if(validar_campo(input_dep,'vacios')){
        console.log('validado cons dep');
    }
})

$("#frm_consulta_grupo_carrera").on('submit',(e) =>{
    e.preventDefault();
    if(validar_campo(input_carr,'vacios')){
        console.log('validado cons carr');
    }
})