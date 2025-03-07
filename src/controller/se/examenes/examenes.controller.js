let input = [
    'numero_de_control','nombre_alumno','numero_control','semestre','periodo_escolar',
    'carrera','prom_acumulado','especialidad','autorizacion',
    'examen_global','nombre_carrera_actualizado','nombre_reducido_actualizado',
    'siglas_actualizado','clave_oficial_actualizado','reticula_actualizado',
    'fecha_inicio_actualizado','fecha_cierre_actualizado','creditos_actualizado',
    'carga_minima_actualizado','carga_maxima_actualizado'
];

const mostrar_examenes = async () => {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_examenes`).html(``);  
    $('#tabla_listado_examenes').DataTable().destroy();
    let datos = new FormData($('#frm_solicitud')[0]);
    datos.append('funcion','consultar_examenes'); 
    const ejecucion = new Consultas("Examenes", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    if(respuesta.length == 0){
        $('#btn_imprimir').addClass('d-none'); 
    }else{
        $('#btn_imprimir').removeClass('d-none'); 
    }
    respuesta.map(examenes => {
        let {id_solicitudes_ex_especiales,identificacion_corta,tipo_evaluacion,autorizacion,nombre_completo_materia} = examenes;
        tabla += `
        <tr> 
            <td class="align-middle">${nombre_completo_materia}</td>
            <td class="align-middle">${identificacion_corta}</td>
            <td class="align-middle">${autorizacion}</td>
            <td class="align-middle">${tipo_evaluacion}</td>
            <td class="align-middle"><button type="button" class="btn btn-danger" onclick="eliminar_examen(${id_solicitudes_ex_especiales})"><i class="fa-solid fa-trash-can"></i></butto></td>
        </tr>`;
    });
    $(`#tabla_examenes`).html(`${tabla}`);  
    $('#tabla_listado_examenes').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    $('[name=ex_numero_de_control]').val($('[name=numero_de_control]').val());
    $('[name=ex_periodo]').val($('[name=periodo]').val());
    bootstrap.Itma2.end_loader();       
}

const obtener_informacion_alumno = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_solicitud')[0]);
    datos.append('funcion','consultar_alumno');
    const ejecucion = new Consultas("Examenes", datos);
    let resultado = await ejecucion.consulta();
    bootstrap.Itma2.end_loader();
    if(resultado[0] == 1){
        let {fk_persona,id_usuario,nombre_persona,apellido_paterno,apellido_materno,numero_control,semestre,carrera,promedio_aritmetico_acumulado,especialidad,fk_numero_control,fk_cat_carrera,identificacion_corta,periodos_revalidados} = resultado[1];
        $('[name=id_num_control]').val(`${fk_numero_control}`);
        $('[name=nombre_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
        $('[name=numero_control]').val(`${numero_control}`);  
        $('[name=semestre]').val(`${semestre + periodos_revalidados}`);
        $('[name=carrera]').val(`${carrera}`);
        $('[name=periodo_escolar]').val(identificacion_corta);
        $('[name=prom_acumulado]').val(`${promedio_aritmetico_acumulado == null ? '0':promedio_aritmetico_acumulado}`);   
        $('[name=especialidad]').val(`${especialidad}`);   
        $('[name=img_foto]').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`);
        $('#datos_alumno').removeClass('d-none');
        $('#solicitud_examen_expecial_sol').addClass('d-none');
        obtener_materia(fk_cat_carrera);
        mostrar_examenes();
    }else{
        msj_error(resultado[1])
    }
}

const eliminar_examen = (id) => {
    swal({
        title: "Advertencia!",
        text: "Desea eliminar el examen seleccionado?\nUna vez eliminado no se podra recuperar.",
        icon: "warning",
        buttons: [`Cancelar`,`Aceptar`],
        dangerMode: true,
    }).then((accion) => {
        if (accion) {
            let datos = new FormData();
            datos.append('funcion','eliminar_examen');
            datos.append('id',id);
            const ejecucion = new Consultas('Examenes',datos);
            ejecucion.insercion();
            mostrar_examenes();
        }
    });
}

const obtener_periodos = async ()=>{
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('periodo','codigo_html');
}
obtener_periodos();
const obtener_materia = (id_materia) =>{
    let datos = new FormData();
    datos.append('funcion', "consultar_materias");
    datos.append('filtro',id_materia);
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('materia','codigo_html');
}
$('#btn_cancelar').on('click',() =>{
    $('#frm_solicitud')[0].reset();
    $('#frm_examen_solicitud')[0].reset();
    $('#datos_alumno').addClass('d-none');
    $('#solicitud_examen_expecial_sol').removeClass('d-none');
});
$(document).ready(() => {
    // obtener_periodos();
    caracter_numeros('numero_de_control');
    caracter_numeros('autorizacion');
    $('#frm_solicitud').on('submit', (e) => {
      e.preventDefault();
      if(validar_campo(['numero_de_control','periodo'],'vacios')){
        obtener_informacion_alumno();
      }
    });
    $('#frm_examen_solicitud').on('submit',(e)=>{
        e.preventDefault();
        if (validar_campo(['materia','autorizacion'],'vacios')) {
            let datos = new FormData($("#frm_examen_solicitud")[0]);
            datos.append('funcion','crear_examen');
            let periodo = $('[name=periodo]').val();
            datos.append('id_periodo_escolar',periodo);
            if ($('[name=examen_global]').is(':checked')) {
                datos.append('global','SI');
            }else{
                datos.append('global','NO');
            }
            const ejecucion = new Consultas('Examenes',datos);
            ejecucion.insercion();
            mostrar_examenes();
            $('[name=materia]').val('');
            $('[name=autorizacion]').val('');
        }
    });
});

