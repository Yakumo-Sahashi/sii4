let datos_generales = ['apellido_p_alumno','apellido_m_alumno','nombre_alumno','num_ctrl_alumno','lugar_nacimiento_alumno','fecha_nac_alumno','sexo_alumno','estado_civil_alumno','telefono_alumno','curp_alumno','correo_alumno','codigo_p_alumno','calle_generales','no_exterior_generales'];
let datos_escolares = ['carrera_alumno','especialidad_alumno','plan_estudios_alumno','tipo_ingreso_alumno','nivel_escolar_alumno','escuela_alumno','estatus_alumno'];
let vista_actual = '';
let fecha_img1 = 0;

caracter_numeros('num_ctrl');
primer_mayuscula('escuela_alumno');

/*   precarga de informacion alumno */

const obtener_informacion_alumno = async () => {
    if(validar_campo(['num_ctrl'],'vacios')){
        bootstrap.Itma2.start_loader();
        let datos = new FormData($("#frm_act")[0]);
        datos.append('funcion',"obtener_alumno");
        const ejecucion = new Consultas("HistorialAcademico", datos);
        let resultado = await ejecucion.consulta();
        if(resultado[0] == 1){
            fecha_img1 ++;
            $("#seccion_datos_alumno").removeClass('d-none');
            let {fk_persona,nombre_persona,apellido_paterno,apellido_materno,numero_control,fk_numero_control,semestre,identificacion_corta,carrera,promedio_aritmetico_acumulado,especialidad,id_usuario,periodos_revalidados} = resultado[1];
            $('[name=nombre_completo_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
            $('[name=numero_control]').val(`${numero_control}`); 
            $('[name=fk_control]').val(`${fk_numero_control}`);
            $('[name=semestre]').val(`${semestre + periodos_revalidados}`);
            $('[name=periodo_escolar]').val(`${identificacion_corta}`);  
            $('[name=carrera]').val(`${carrera}`);
            $('[name=prom_acumulado]').val(`${promedio_aritmetico_acumulado  == null ? '0' : promedio_aritmetico_acumulado}`);   
            $('[name=especialidad]').val(`${especialidad}`);
            $('[name=id_usuario_alumno]').val(id_usuario);
            let crop_image = document.getElementById('crop-image');
            crop_image.src = `public/img/alumno/${id_usuario}/fotografia.webp?img=${fecha_img1}`;
            //$('#img_foto').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`);
            let div = document.getElementById("img_foto");
            div.style.backgroundImage = `url(public/img/alumno/${id_usuario}/fotografia.webp?img=${fecha_img1})`;
            $("#seccion_consulta").addClass('d-none');
            bootstrap.Itma2.end_loader();
        }else{
            bootstrap.Itma2.end_loader();
            msj_error(resultado[1]);
        }
    }
}

const obtener_datos_generales = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"precargar_generales");
    datos.append('id',$('[name=fk_control]').val());
    const ejecucion = new Consultas("ModificacionAlumno", datos);
    let resultado = await ejecucion.consulta();
    let {apellido_paterno,apellido_materno,nombre_persona,lugar_nacimiento,fecha_nacimiento, fk_cat_sexo,fk_cat_estado_civil,telefono,curp,correo,codigo_postal, colonia, calle, numero_interior, numero_exterior,numero_control,id_usuario,id_direccion, id_alumno,id_persona} = resultado;
    $('[name=codigo_p_alumno]').val(codigo_postal);
    obtener_estado(codigo_postal);  
    $('[name=id_persona_alumno]').val(id_persona);
    $('[name=id_direccion_alumno]').val(id_direccion);
    $('[name=apellido_p_alumno]').val(apellido_paterno);
    $('[name=apellido_m_alumno]').val(apellido_materno);
    $('[name=nombre_alumno]').val(nombre_persona);
    $('[name=num_ctrl_alumno]').val(numero_control);
    $('[name=lugar_nacimiento_alumno]').val(lugar_nacimiento);
    $('[name=fecha_nac_alumno]').val(fecha_nacimiento);
    $('[name=sexo_alumno]').val(fk_cat_sexo);
    $('[name=estado_civil_alumno]').val(fk_cat_estado_civil);
    $('[name=telefono_alumno]').val(telefono);
    $('[name=curp_alumno]').val(curp);
    $('[name=correo_alumno]').val(correo);
    $('[name=calle_generales]').val(calle);
    $('[name=no_exterior_generales]').val(numero_exterior);
    $('[name=no_interior_generales]').val(numero_interior);
    setTimeout(() => {
        $('[name=colonia_generales]').val(colonia);
    }, 1000); 
    $("#seccion_datos_generales").removeClass('d-none');
    bootstrap.Itma2.end_loader();    
}

const obtener_datos_escolares = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"precargar_escolares");
    datos.append('id',$('[name=fk_control]').val());
    const ejecucion = new Consultas("ModificacionAlumno", datos);
    let resultado = await ejecucion.consulta();
    let {escuela_procedencia,fk_cat_carrera, fk_cat_especialidad, periodo_ingreso, periodos_revalidados, fk_cat_tipo_ingreso, fk_cat_estatus,fk_escolaridad,id_alumno} = resultado;
    $('[name=carrera_alumno]').val(fk_cat_carrera);
    obtener_especialidad(fk_cat_carrera);
    obtener_plan_estudios(fk_cat_carrera);
    $('[name=id_escolar_alumno]').val(id_alumno);
    $('[name=periodo_ingreso_alumno]').val(periodo_ingreso);
    $('[name=periodos_revalidados_alumno]').val(periodos_revalidados);
    $('[name=tipo_ingreso_alumno]').val(fk_cat_tipo_ingreso);
    $('[name=nivel_escolar_alumno]').val(fk_escolaridad);
    $('[name=estatus_alumno]').val(fk_cat_estatus);
    $('[name=escuela_alumno]').val(escuela_procedencia);
    setTimeout(() => {
        $("#seccion_datos_escolares").removeClass('d-none');
        $('[name=especialidad_alumno]').val(fk_cat_especialidad);
    }, 1000); 
    bootstrap.Itma2.end_loader();    
}

const obtener_datos_familiares = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"precargar_escolares");
    datos.append('id',$('[name=fk_control]').val());
    const ejecucion = new Consultas("ModificacionAlumno", datos);
    let resultado = await ejecucion.consulta();
    let {fk_cat_carrera, fk_cat_especialidad, periodo_ingreso, periodos_revalidados, fk_cat_tipo_ingreso, fk_cat_estatus,fk_escolaridad,id_alumno} = resultado;
    $('[name=carrera_alumno]').val(fk_cat_carrera);
    obtener_especialidad(fk_cat_carrera);
    obtener_plan_estudios(fk_cat_carrera);
    $('[name=id_escolar_alumno]').val(id_alumno);
    $('[name=periodo_ingreso_alumno]').val(periodo_ingreso);
    $('[name=periodos_revalidados_alumno]').val(periodos_revalidados);
    $('[name=tipo_ingreso_alumno]').val(fk_cat_tipo_ingreso);
    $('[name=nivel_escolar_alumno]').val(fk_escolaridad);
    $('[name=estatus_alumno]').val(fk_cat_estatus);
    setTimeout(() => {
        $("#seccion_datos_escolares").removeClass('d-none');
        $('[name=especialidad_alumno]').val(fk_cat_especialidad);
    }, 1000); 
    bootstrap.Itma2.end_loader();    
}


const actualizar_datos_generales = () => {
    if (validar_campo(datos_generales,"vacios")) {
        if(validar_campo('correo_alumno','email')){
            if(validar_campo(['curp_alumno'],'curp')){
                bootstrap.Itma2.start_loader();
                let datos = new FormData($('#frm_datos_generales')[0]);
                datos.append("funcion","actualizar_persona");
                const ejecucion = new Consultas("ModificacionAlumno", datos);
                ejecucion.insercion();
                obtener_informacion_alumno();
                bootstrap.Itma2.start_loader();
            }
        }
    }
}

const actualizar_datos_escolares = () => {
    if (validar_campo(datos_escolares,"vacios")) {
        bootstrap.Itma2.start_loader();
        let datos = new FormData($('#frm_datos_escolares')[0]);
        datos.append("funcion","actualizar_alumno");
        const ejecucion = new Consultas("ModificacionAlumno", datos);
        ejecucion.insercion();
        obtener_informacion_alumno();
        bootstrap.Itma2.start_loader();
    }
}


$(document).ready(() => {
    $('#frm_act').on('submit', (e) => {
      e.preventDefault();
      if (validar_campo(['numero_crl'],'vacios')) {
        obtener_informacion_alumno();
      }
    });
    $('#frm_datos_generales').on('submit', (e) => {
        e.preventDefault();
        actualizar_datos_generales();
    });
    $('#frm_datos_escolares').on('submit', (e) => {
        e.preventDefault();
        actualizar_datos_escolares();
    });
});

/*   mostrar secciones */

$('#op_datos_generales').on('click',() =>{
    $('#seccion_datos_generales').removeClass('d-none');
    vista_actual = 'seccion_datos_generales';
    obtener_datos_generales();
    $('#opciones_alumno').addClass('d-none');
});

$('#op_datos_escolares').on('click',() =>{
    $('#seccion_datos_escolares').removeClass('d-none'); 
    vista_actual = 'seccion_datos_escolares';
    obtener_datos_escolares();
    $('#opciones_alumno').addClass('d-none');
});

$('#op_datos_familiares').on('click',() =>{
    $('#seccion_datos_familiares').removeClass('d-none');  
    vista_actual = 'seccion_datos_familiares';
    $('#opciones_alumno').addClass('d-none');
});

$('#op_datos_trabajo').on('click',() =>{
    $('#seccion_datos_trabajo').removeClass('d-none');    
    vista_actual = 'seccion_datos_trabajo';
    $('#opciones_alumno').addClass('d-none');
});

$('#op_datos_instituto').on('click',() =>{
    $('#seccion_cambio_instituto_equivalencia').removeClass('d-none'); 
    vista_actual = 'seccion_cambio_instituto_equivalencia';
    $('#opciones_alumno').addClass('d-none');
});

$('#op_datos_socieconomicos').on('click',() =>{
    $('#seccion_datos_socioeconomicos').removeClass('d-none');    
    vista_actual = 'seccion_datos_socioeconomicos';
    $('#opciones_alumno').addClass('d-none');
});

$('#op_datos_emergencia').on('click',() =>{
    $('#seccion_datos_emergencia').removeClass('d-none');    
    vista_actual = 'seccion_datos_emergencia';
    $('#opciones_alumno').addClass('d-none');
});


/*  ocultar secciones */

$('#btn_cancelar_emergencia').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#opciones_alumno').removeClass('d-none');
});

$('#btn_canc_cambio_instituto').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#opciones_alumno').removeClass('d-none');
});

$('#btn_cancelar_escolares').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#opciones_alumno').removeClass('d-none');
});

$('#btn_canc_familiares').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#opciones_alumno').removeClass('d-none');
});

$('#btn_cancelar_alumno').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#opciones_alumno').removeClass('d-none');
    $('#estado_generales').prop('readonly', true);
    $('#alcaldia_generales').prop('readonly', true);
    $('#colonia_generales').replaceWith('<select name="colonia_generales" class="form-control break_size" id="colonia_generales"></select>');
    $('#codigo_p_alumno').val("");
    $('#estado_generales').val("");
    $('#alcaldia_generales').val("");
    $("#escritura_manual_generales").prop("checked",false);
});

$('#btn_canc_socioeconomicos').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#opciones_alumno').removeClass('d-none');
});

$('#btn_canc_trabajo_alumno').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#opciones_alumno').removeClass('d-none');
});

$('#btn_cancelar_info').on('click',() =>{
    $(`#seccion_datos_alumno`).addClass('d-none');
    $("#num_ctrl").val('');
    $("#seccion_consulta").removeClass('d-none');
});