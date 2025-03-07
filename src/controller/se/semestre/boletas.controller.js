let input_boletas = [];


caracter_numeros('num_ctrl');

const obtener_periodo_escolar = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_periodo");
    const selec = new Consultas("HistorialAcademico",datos);
    selec.catalogo('periodo_bloque','codigo_html');
    selec.catalogo('periodo','codigo_html'); 
}

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera_bloque','codigo_html');  
}

const obtener_informacion_alumno = async() =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData($("#frm_consulta_boleta")[0]);
    datos.append('funcion',"obtener_alumno");
    const ejecucion = new Consultas("HistorialAcademico", datos);
    let resultado = await ejecucion.consulta();
    bootstrap.Itma2.end_loader();
    if(resultado[0] == 1){
        let {id_usuario,fk_persona,nombre_persona,apellido_paterno,apellido_materno,numero_control,fk_numero_control,semestre,identificacion_corta,fk_cat_carrera,carrera,promedio_aritmetico_acumulado,especialidad,periodos_revalidados} = resultado[1];
        $('[name=nombre_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
        $('[name=numero_control]').val(`${numero_control}`); 
        $('[name=id_alumno_boleta]').val(`${fk_numero_control}`);
        $('[name=id_periodo_boleta]').val($('[name=periodo]').val());
        $('[name=semestre]').val(`${semestre + periodos_revalidados}`);
        $('[name=periodo_escolar]').val(`${identificacion_corta}`);  
        $('[name=carrera]').val(`${carrera}`);
        $('[name=prom_acumulado]').val(`${promedio_aritmetico_acumulado  == null ? '0' : promedio_aritmetico_acumulado}`);   
        $('[name=especialidad]').val(`${especialidad}`);
        $('#img_foto').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`);
        $('#seccion_consulta_boleta_individual').addClass('d-none');
        $('#seccion_resultado_calificaciones_individual').removeClass('d-none');
    }else{
        msj_error(resultado[1])
    }
}

const consultar_calificaciones = async () => {
    bootstrap.Itma2.start_loader();
    $(`#tabla_calificaciones_cont`).html(``);
    $('#tabla_calificaciones').DataTable().destroy();
    let datos = new FormData($('#frm_consulta_boleta')[0]);
    datos.append('funcion', 'consultar_calificaciones_alumno');
    const ejecucion = new Consultas("CalificacionesActas", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(alumno => {
        let {nombre_completo_materia,creditos_totales,calificacion,descripcion_corto,clave_oficial} = alumno;
        tabla += `
        <tr>
            <td class="align-middle text-start"><b class="text-small">${clave_oficial}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle">${creditos_totales}</td>
            <td class="align-middle">${calificacion}</td>
            <td class="align-middle">${descripcion_corto}</td>
            <td class="align-middle">Sin Observaciones</td>
        </tr>
        `;
    });
    $(`#tabla_calificaciones_cont`).html(`${tabla}`);
    $('#tabla_calificaciones').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}


obtener_periodo_escolar();
obtener_carrera();

$('#op_boleta_individual').on('click',() => {
    //$('#seccion_resultado_calificaciones_individual').removeClass('d-none'),
    $('#seccion_consulta_boleta_individual').removeClass('d-none');
    $('#seccion_opciones').addClass('d-none');
});

$('#op_boleta_bloque').on('click',() => {
    $('#seccion_boleta_bloque').removeClass('d-none');
    $('#seccion_opciones').addClass('d-none');
});

$('#btn_cancelar_consulta').on('click',() => {
    $('#seccion_consulta_boleta_individual').addClass('d-none');
    $('#seccion_opciones').removeClass('d-none');
    $('#frm_consulta_boleta')[0].reset();
});

$('#btn_cancelar_bloque').on('click',() => {
    $('#seccion_boleta_bloque').addClass('d-none');
    $('#seccion_opciones').removeClass('d-none');
    $('#frm_boleta_bloque')[0].reset();
});

$('#btn_cancelar_resultado').on('click',() => {
    $('#seccion_resultado_calificaciones_individual').addClass('d-none');
    $('#seccion_consulta_boleta_individual').removeClass('d-none');    
    $('#frm_consulta_boleta')[0].reset();
});

$(document).ready(() => {
    $('#frm_consulta_boleta').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['num_ctrl','periodo'],'vacios')){
            obtener_informacion_alumno();
            consultar_calificaciones();
        }
    });

    /* $('#frm_boleta_bloque').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['periodo_bloque','carrera_bloque','semestre_bloque'],'vacios')){
            
        }
    }); */
});