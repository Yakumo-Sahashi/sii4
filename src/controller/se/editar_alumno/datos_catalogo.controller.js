let plan_id = '';
let curp = Array;
let lugar_naciemiento = "";
let fecha_img1 = 1;

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
    datos.append('funcion', "obtener_periodo");
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

const precargar_alumno = async (buscar) => {
    //bootstrap.Itma2.start_loader(); 
    fecha_img1 ++;
    $(`#ver_img`).removeClass(`d-none`);
    let datos = new FormData();
    datos.append('funcion','precargar_alumno');
    datos.append('id_alumno', buscar);
    const ejecucion = new Consultas("Alumnos", datos);
    let {apellido_paterno,apellido_materno,nombre_persona,lugar_nacimiento,fecha_nacimiento,fk_cat_sexo,fk_cat_estado_civil,telefono,curp,correo,codigo_postal,colonia,calle,numero_interior,numero_exterior,fk_cat_carrera,fk_cat_especialidad,periodo_ingreso,periodos_revalidados,fk_cat_tipo_ingreso,fk_cat_escuela_procedencia,fk_cat_estatus,numero_control,id_usuario,id_direccion,id_alumno,id_persona} = await ejecucion.consulta();
    $("#codigo_postal").val(codigo_postal);
    obtener_estado(codigo_postal);  
    setTimeout
    //$("#colonia").val(datos_alumno['colonia']);   
    $("#apellido_paterno").val(apellido_paterno);
    $("#apellido_materno").val(apellido_materno);
    $("#nombres").val(nombre_persona);
    $("#lugar_nacimiento").val(lugar_nacimiento);
    $("#fecha_nacimiento").val(fecha_nacimiento);
    $("#selector_sexo").val(fk_cat_sexo);
    $("#selector_edo_civil").val(fk_cat_estado_civil);
    $("#telefono").val(telefono);
    $("#curp").val(curp);
    $("#correo_electronico").val(correo);
    //parte dos                  
    $("#calle").val(calle);
    $("#no_exterior").val(numero_exterior);
    $("#no_interior").val(numero_interior);
    //parte tre
    $("#carrera_reticula").val(fk_cat_carrera);
    obtener_especialidad(fk_cat_carrera);
    obtener_plan_estudios(fk_cat_carrera);
    //$("#especialidad").val(fk_cat_especialidad);
    $("#periodo_ingreso").val(periodo_ingreso);
    $("#periodos_revalidados").val(periodos_revalidados);
    $("#tipo_ingresos").val(fk_cat_tipo_ingreso);
    $("#nivel_escolar").val(fk_cat_escuela_procedencia);
    $("#estatus_alumno").val(fk_cat_estatus);
    $("#no_control").val(numero_control);  
    let img_prev = document.getElementById("img_foto");
    img_prev.src = `public/img/ALUMNO/${id_usuario}/fotografia.webp?img=${fecha_img1}`;
    img_prev.title = `${numero_control}`;
    let crop_image = document.getElementById('crop-image');
    crop_image.src = `public/img/alumno/${id_usuario}/fotografia.webp?img=${fecha_img1}`;
    //precargar_foto(id_usuario,numero_control);
    setTimeout(() => {
        $("#colonia").val(colonia); 
        $("#especialidad").val(fk_cat_especialidad);
    }, 500);   
    $('#identificacion').html('<input type="text" name="id_usuario" value="' + id_usuario +'" hidden><input type="text" name="id_persona" value="' + id_persona +'" hidden><input type="text" name="id_direccion" value="' + id_direccion +'" hidden><input type="text" name="id_alumno" value="' + id_alumno +'" hidden>');
    $('#listado_titulo').prop('hidden', true);
    $('#listado_info').prop('hidden', true);
    $('#editar_info').prop('hidden', false);   
    bootstrap.Itma2.end_loader(); 
}