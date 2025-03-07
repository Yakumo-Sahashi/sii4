let input = ['select_autorizacion'];

$("#tabla_motivos").hide();
$("#autorizacion").hide();

const consultar_tipo_autorizacion = () =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_tipo_autorizacion");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('select_autorizacion','codigo_html');
}
const consultar_periodo = async() =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo");
    const ejecucion = new Consultas("InformacionCatalogos",datos);
    let resultado = await ejecucion.consulta();
    let{identificacion_corta,id_periodo_escolar} = resultado;
    $("#periodo").val(`${identificacion_corta}`);
    $("#fk_periodo").val(`${id_periodo_escolar}`);
}

primer_mayuscula('motivo_autorizacion');
consultar_tipo_autorizacion();
consultar_periodo();

const consultar_motivos = async(id_control,id_periodo) =>{
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData();
    let tabla = ``;
    $("#tabla_contenido_autorizaciones").html(``);
    $("#tabla_autorizaciones").DataTable().destroy();
    datos.append('funcion',"consultar_motivos");
    datos.append('id_numero_control',id_control);
    datos.append('id_periodo',id_periodo);
    const ejecucion = new Consultas("AutorizacionesAcademicas",datos);
    let resultado = await ejecucion.consulta();
    $("#tabla_motivos").show();
    resultado.map(motivos =>{
        let {nombre_persona,apellido_paterno,apellido_materno,identificacion_corta,descripcion,motivo_autorizacion} = motivos;
        tabla += `
        <tr> 
            <td class="align-middle">${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
            <td class="align-middle">${identificacion_corta}</td>
            <td class="align-middle">${descripcion}</td>
            <td class="align-middle">${motivo_autorizacion}</td>
        </tr>
        `;
    });
    
    $("#tabla_contenido_autorizaciones").html(`${tabla}`);
    $("#tabla_autorizaciones").DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}

const consultar_alumno = async() =>{
    let datos = new FormData($("#frm_consulta_autorizacion")[0]);
    datos.append('funcion',"consultar_alumno");
    const ejecucion = new Consultas("AutorizacionesAcademicas",datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] != 0){
        let {nombre_persona,apellido_paterno,apellido_materno,fk_numero_control} = resultado[1];
        $("#fk_numero_control").val(`${fk_numero_control}`);
        $("#nombre_alumno").val(`${nombre_persona+' '+apellido_paterno+' '+apellido_materno}`);
        consultar_motivos(fk_numero_control,$("#fk_periodo").val());
        $("#autorizacion").show();
        $("#frm_consulta_autorizacion").hide();
    }else{
        msj_error(resultado[1]);
    }
}

$("#frm_consulta_autorizacion").on('submit',(e) =>{
    e.preventDefault();
    if(validar_campo('num_ctrl','vacios')){
        consultar_alumno();
    }
});

$("#atras").on('click',()=>{
    $("#tabla_motivos").hide();
    $("#autorizacion").hide();
    $("#frm_consulta_autorizacion")[0].reset();
    $("#frm_consulta_autorizacion").show();
});

$("#frm_autorizaciones_academicas").on('submit',(e) =>{
    e.preventDefault();
    if(validar_campo(input,'vacios')){
        let datos = new FormData($("#frm_autorizaciones_academicas")[0]);
        datos.append('funcion',"insertar_motivo");
        const ejecucion = new Consultas("AutorizacionesAcademicas",datos);
        ejecucion.insercion();
        $("#select_autorizacion").val('');
        $("#motivo_autorizacion").val('');
        consultar_motivos($("#fk_numero_control").val(),$("#fk_periodo").val());
    }
});