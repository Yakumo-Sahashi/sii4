let input = ['num_ctrl','nombre_alumno','numero_control','semestre','periodo_escolar','carrera','prom_acumulado','especialidad','calificacion_actualizado','nombre_alumno','agregar_fecha_calificacion'];

$("#datos_alumno").hide();
$("#datos_historial").hide();

// limitacion de caracteres
caracter_numeros('num_ctrl');
caracter_numeros('calificacion_actualizado');
caracter_numeros('agregar_calificacion');

// validacion de fecha
$("[name=agregar_periodo]").on('change',()=>{
    $("[name=agregar_fecha_calificacion]").val(0);
    validar_fecha_calificacion($("[name=agregar_periodo]").val());
});

const validar_fecha_calificacion = async (id_periodo) =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_fechas_periodo");
    datos.append('id_periodo',id_periodo);
    const ejecucion = new Consultas("HistorialAcademico",datos);
    let resultado = await ejecucion.consulta();
    let {fecha_inicio,fecha_termino} = resultado;
    $('#agregar_fecha_calificacion').attr('max', fecha_termino);
    $('#agregar_fecha_calificacion').attr('min', fecha_inicio);
    $('#agregar_fecha_calificacion').on('input', () => {
        let fecha_teclado = $("#agregar_fecha_calificacion").val();
        if(fecha_teclado <= fecha_inicio){
            // msj_error('La fecha que intentas ingresar no está dentro del rango del periodo seleccionado.');
            $("#agregar_fecha_calificacion").val(fecha_inicio);
        }else if(fecha_teclado >= fecha_termino){
            // msj_error('La fecha que intentas ingresar no está dentro del rango del periodo seleccionado.');
            $("#agregar_fecha_calificacion").val(fecha_termino);
        }
    });
}

// catalogo tipo de evaluacion para seleccion
const obtener_tipo_evaluacion = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_tipo_evaluacion");
    const selec = new Consultas("HistorialAcademico",datos);
    selec.catalogo('agregar_evaluacion','codigo_html');
    selec.catalogo('evaluacion_actualizado','codigo_html');
}

// catalogo de materia para seleccion
const obtener_materia = (id_carrera) => {
    let datos = new FormData();
    datos.append('funcion',"consultar_materias");
    datos.append('filtro',id_carrera);
    const selec = new Consultas("HistorialAcademico",datos);
    selec.catalogo('agregar_materia','codigo_html');
}

// catalogo de periodo para seleccion
const obtener_periodo_escolar = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_periodo");
    const selec = new Consultas("HistorialAcademico",datos);
    selec.catalogo('agregar_periodo','codigo_html');
}

// consultar datos por numero de control
const consultar_informacion_alumno = async() =>{
    if(validar_campo(['num_ctrl'],'vacios')){
        bootstrap.Itma2.start_loader();
        let datos = new FormData($("#frm_historial")[0]);
        datos.append('funcion',"obtener_alumno");
        const ejecucion = new Consultas("HistorialAcademico", datos);
        let resultado = await ejecucion.consulta();
        bootstrap.Itma2.end_loader();
        if(resultado[0] == 1){
            $("#datos_alumno").show();
            $("#datos_historial").show();
            let {id_usuario,fk_persona,nombre_persona,apellido_paterno,apellido_materno,numero_control,fk_numero_control,semestre,identificacion_corta,fk_cat_carrera,carrera,promedio_aritmetico_acumulado,especialidad,periodos_revalidados} = resultado[1];
            $('[name=nombre_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
            $('[name=numero_control]').val(`${numero_control}`); 
            $('[name=fk_numero_control]').val(`${fk_numero_control}`);
            $('[name=semestre]').val(`${semestre + periodos_revalidados}`);
            $('[name=periodo_escolar]').val(`${identificacion_corta}`);  
            $('[name=carrera]').val(`${carrera}`);
            $('[name=prom_acumulado]').val(`${promedio_aritmetico_acumulado  == null ? '0' : promedio_aritmetico_acumulado}`);   
            $('[name=especialidad]').val(`${especialidad}`);
            $('#img_foto').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`)
            mostrar_historial(fk_numero_control);
            obtener_materia(fk_cat_carrera);
            $('#form_numero_ctrl').addClass('d-none');
        }else{
            msj_error(resultado[1])
        }
    }
}

// datos obtenidos para llenar el update
const precargar_historial = async (id) =>{
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData();
    datos.append('funcion','precargar_historial');
    datos.append('id',id);
    const ejecucion = new Consultas("HistorialAcademico",datos);
    let resultado = await ejecucion.consulta();
    bootstrap.Itma2.end_loader();
    let {id_historia_alumno,nombre_completo_materia,calificacion,fk_cat_tipo_evaluacion} = resultado;
    $('[name=id_materia_actualizado]').val(id_historia_alumno);
    $('[name=materia_fija]').val(nombre_completo_materia);
    $('[name=calificacion_actualizado]').val(calificacion == 'NA' ? 0 : calificacion );
    $('[name=evaluacion_actualizado]').val(fk_cat_tipo_evaluacion);
}

// actualizar materias
const actualizar_materia = () =>{
    let campos = ['evaluacion_actualizado','calificacion_actualizado'];
    if(validar_campo(campos,'vacios')){
        if(limitar_valor('calificacion_actualizado',-1,101,"La calificacion debe de estar en el rango 0 a 100")){
            let datos = new FormData($("#frm_actualizar_materia")[0]);
            datos.append('funcion','actualizar_historial');
            const actualiza = new Consultas("HistorialAcademico",datos);
            actualiza.insercion();
            mostrar_historial($('#fk_numero_control').val());
            $('#modal_actualizar_materia').modal('hide');
        }
    }
}

// elimina el historial desde el boton de la tabla
const eliminar_historial = async (id_historia_alumno) =>{
    swal({
        title: "Desea eliminar el historial seleccionado?",
        text: `Una vez eliminado no se podra recuperar`,
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
    }).then(eliminar => {
        if (eliminar) {
            let datos = new FormData();
            datos.append('funcion','eliminar_historial');
            datos.append('id_historia_alumno', `${id_historia_alumno}`);
            const ejecucion = new Consultas("HistorialAcademico", datos);
            ejecucion.insercion();
            mostrar_historial($('#fk_numero_control').val());
        } else {
            msj_exito("Se ha conservado el historial");
        }
    });
}

// obtener datos para mostrarlos en la tabla
const mostrar_historial = async (numero_control) =>{
    bootstrap.Itma2.start_loader();
    $('#contenido_historial').html(``);
    $('#tabla_historial').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_historial');
    datos.append('id_numero_control',numero_control);
    const mostrar = new Consultas("HistorialAcademico",datos);
    let respuesta = await mostrar.consulta();
    let tabla = ``;
    respuesta.map(historial => {
        let {id_historia_alumno,clave_oficial,nombre_completo_materia,calificacion,descripcion_corto,identificacion_corta} = historial;
        tabla += `
            <tr>
                <td class="align-middle">${clave_oficial}</td>
                <td class="align-middle">${nombre_completo_materia}</td>
                <td class="align-middle">${calificacion}</td>
                <td class="align-middle">${descripcion_corto}</td>
                <td class="align-middle">${identificacion_corta}</td>
                <td class="align-middle"><button type="button" class="btn btn-primary" onclick="precargar_historial(${id_historia_alumno})" data-bs-toggle="modal" data-bs-target="#modal_actualizar_materia"><i class="fa-regular fa-pen-to-square"></i></button></td>
                <td class="align-middle"><button type="button" class="btn btn-danger" onclick="eliminar_historial(${id_historia_alumno})"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
        `;
    });
    $('#contenido_historial').html(`${tabla}`);
    $('#tabla_historial').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}

obtener_tipo_evaluacion();
obtener_periodo_escolar();

// boton consultar 
$("#frm_historial").on('submit',(e) =>{
    e.preventDefault();
    consultar_informacion_alumno();
});

// boton actualizar
$("#frm_actualizar_materia").on('submit',(e) =>{
    e.preventDefault();
    actualizar_materia();
});

$('#btn_cancelar_historial').on('click',() => {
    $('[name=num_ctrl]').val('');
    $('#form_numero_ctrl').removeClass('d-none');
    $('#datos_alumno').hide();
    $('#datos_historial').hide();
});

// boton agregar
$('#frm_agregar_materia').on('submit',(e) =>{
    e.preventDefault();
    let campos = ['agregar_materia','agregar_calificacion','agregar_evaluacion','agregar_periodo','agregar_fecha_calificacion'];
    if(validar_campo(campos,'vacios')){
        if(limitar_valor('agregar_calificacion',-1,101,"La calificacion debe de estar en el rango 0 a 100")){
            let datos = new FormData($("#frm_agregar_materia")[0]);
            datos.append('funcion',"agregar_materia");
            datos.append('fk_numero_control',$('#fk_numero_control').val());
            const ejecucion = new Consultas("HistorialAcademico",datos);
            ejecucion.insercion();
            $('[name=agregar_materia]').val('');
            $('[name=agregar_calificacion]').val('');
            $('[name=agregar_evaluacion]').val('');
            $('[name=agregar_periodo]').val('');
            $('[name=agregar_fecha_calificacion]').val('');
            //$('#modal_agregar_materia').modal('hide');
            mostrar_historial($('#fk_numero_control').val());

        }
    }
});