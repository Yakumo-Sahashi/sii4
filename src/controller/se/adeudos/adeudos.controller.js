let vista_actual = '';
let registro = ['num_ctrl_registro','periodo_registro','tipo_adeudo','observaciones'];
let fecha_img1 = 0;

const obtener_informacion_alumno = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($("#seccion_consultar_adeudo")[0]);
    datos.append('funcion',"obtener_alumno");
    const ejecucion = new Consultas("HistorialAcademico", datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] == 1){
        fecha_img1 ++;
        $("#seccion_datos_alumno").removeClass('d-none');
        let {fk_persona,nombre_persona,apellido_paterno,apellido_materno,numero_control,fk_numero_control,semestre,identificacion_corta,carrera,promedio_aritmetico_acumulado,especialidad,id_usuario,periodos_revalidados} = resultado[1];
        $('[name=nombre_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
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
        $('#seccion_consultar_adeudo').addClass('d-none');
        vista_actual = 'seccion_adeudo';
        bootstrap.Itma2.end_loader();
    }else{
        bootstrap.Itma2.end_loader();
        msj_error(resultado[1]);
    }
}

const eliminar_adeudo = (id) =>{
    swal({
        title: "Advertencia!",
        text: "Desea eliminar el adeudo seleccionado?\nUna vez eliminado no se podra recuperar.",
        icon: "warning",
        buttons: [`Cancelar`,`Aceptar`],
        dangerMode: true,
    }).then((accion) => {
        if (accion) {
            let datos = new FormData();
            datos.append('funcion','eliminar_adeudo');
            datos.append('id',id);
            const ejecucion = new Consultas("Adeudos", datos);
            ejecucion.insercion();
            listado_adeudos($('[name=num_ctrl]').val());
        }
    });
}

const listado_adeudos = async (num) => {
    $(`#contenido_tabla_adeudo`).html(``);  
    $('#tabla_adeudo').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_adeudos');
    datos.append('num_ctrl',num);
    const ejecucion = new Consultas("Adeudos", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    if(!respuesta){
        tabla += `
        <tr> 
            <td class="align-middle"></td>
            <td class="align-middle"></td>
            <td class="align-middle"></td>
            <td class="align-middle text-uppercase"></td>
        </tr>`;
    }else{
        respuesta.map(adeudo => {
            let {id_adeudos,identificacion_corta,tipo,observaciones} = adeudo;
            tabla += `
            <tr> 
                <td class="align-middle">${identificacion_corta}</td>
                <td class="align-middle">${tipo}</td>
                <td class="align-middle">${observaciones}</td>
                <td class="align-middle text-uppercase"><button type="button" class="btn btn-danger rounded-3 mb-2" onclick="eliminar_adeudo(${id_adeudos})"><i class="fa-solid fa-trash-can"></i></button></td>
            </tr>`;
        });
    }
    $(`#contenido_tabla_adeudo`).html(`${tabla}`);  
    $('#tabla_adeudo').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    
}

const agregar_adeudo = () => {
    let datos = new FormData($('#frm_registro_adeudo')[0]);
    datos.append('funcion','agregar_adeudo');
    const ejecucion = new Consultas("Adeudos", datos);
    ejecucion.insercion();
    $('#frm_registro_adeudo')[0].reset();
}

$('#btn_registrar_adeudo').on('click',() =>{
    $('#seccion_registrar').removeClass('d-none');
    vista_actual = 'seccion_registrar';
    $('#botones').addClass('d-none');
});

$('#btn_consultar_adeudo').on('click',() =>{
    $('#seccion_consultar_adeudo').removeClass('d-none');
    vista_actual = 'seccion_consultar_adeudo';
    $('#botones').addClass('d-none');
});


$('#btn_cancelar_registro').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#frm_registro_adeudo')[0].reset();
    $('#botones').removeClass('d-none');
});

$('#btn_canc_consulta').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = '';
    $('#seccion_consultar_adeudo')[0].reset();
    $('#botones').removeClass('d-none');
    $('#seccion_adeudo').addClass('d-none');
});

$('#btn_canc_lista').on('click',() =>{
    $(`#${vista_actual}`).addClass('d-none');    
    vista_actual = 'seccion_consultar_adeudo';
    $('[name=num_ctrl]').val("");
    $('#seccion_consultar_adeudo').removeClass('d-none');
});

const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('periodo_registro','codigo_html');  
}

obtener_periodos();
primer_mayuscula('observaciones');
caracter_numeros('num_ctrl_registro');
caracter_numeros('num_crtl_consulta');

$(document).ready(() => {
    let control = /^[0-1]$2/;
    $('#frm_registro_adeudo').on('submit', (e) => {
        e.preventDefault();
        if (validar_campo(registro,'vacios')) {
            agregar_adeudo();
        }
    });

    $('#seccion_consultar_adeudo').on('submit', (e) => {
        e.preventDefault();
        if (validar_campo(['num_ctrl'],'vacios')) {
            obtener_informacion_alumno();
            listado_adeudos($('[name=num_ctrl]').val());
            $('#seccion_adeudo').removeClass('d-none');
        }
    });
});