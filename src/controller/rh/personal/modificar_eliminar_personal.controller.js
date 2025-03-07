let input_modificar_eliminar_personal = [];

const mostrar_personal = async ()=>{
    bootstrap.Itma2.start_loader();  
    $(`#contenido_tabla_registro_empleados`).html(``);  
    $('#tabla_registro_empleados').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarInfoPersonal');
    const ejecucion = new Consultas("RhPersonal",datos);
    let resultado = await ejecucion.consulta();
    let tabla = ``;
    resultado.map(info=>{
        let{id_personal,apellido_paterno,apellido_materno,rfc,nombre_persona,tipo_trabajador,descripcion_estatus}=info;
        tabla +=`
            <tr>
                <td>${id_personal}</td>
                <td>${rfc}</td>
                <td>${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
                <td>${descripcion_estatus}</td>
                <td>${tipo_trabajador}</td>
                <td><button onclick="precargar_empleado(${id_personal})" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_modificar"><i class="fa-solid fa-pen-to-square"></i></td>
                <td><button class="btn btn-outline-danger" onclick="eliminar_personal(${id_personal})"><i class="fa-solid fa-trash"></i></td>
            </tr>
        `;
    })
    $(`#contenido_tabla_registro_empleados`).html(`${tabla}`);  
    $('#tabla_registro_empleados').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
}
mostrar_personal();
const mostrarOrganigrama = async()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerArea');
    const ejecucion = new Consultas('RhPersonal',datos);
    ejecucion.catalogo('departamento_ads_acad_empleado','codigo_html');
}
mostrarOrganigrama();
const generar_years = () => {
    const fecha = new Date();
    const actual = fecha.getFullYear();
    let years =  ``
    for(let i = actual; i - 2013; i--){
        years += `<option value="${i}"> ${i}</option>`;
    }
    $('[name=ingreso_subS_year_empleado]').html(years);
    $('[name=inicio_gobierno_year_empleado]').html(years);
    $('[name=inicio_sep_year_empleado]').html(years);
    $('[name=inicio_plantel_year_empleado]').html(years);
}
generar_years();
const eliminar_personal = async (id_personal) =>{
    swal({
        title: "Desea eliminar el personal seleccionado?",
        text: `Una vez eliminado no se podra recuperar`,
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
    }).then(eliminar => {
        if (eliminar) {
            let datos = new FormData();
            datos.append('funcion','eliminar_personal');
            datos.append('id_personal', `${id_personal}`);
            const ejecucion = new Consultas("RhPersonal", datos);
            ejecucion.insercion();
            mostrar_personal();
        } else {
            msj_exito("Se ha conservado el historial");
        }
    });
}
const obtener_estado = async (codigo_postal) => {
    let datos = new FormData();
    datos.append('funcion','consultar_estado');
    datos.append('codigo_postal', codigo_postal);
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    let opcion_colonia = ``;
    let {entidad_federativa, colonias, alcaldia} = await ejecucion.consulta();
    $('[name=estado_empleado]').val(`${entidad_federativa == undefined ? "" : entidad_federativa}`);
    $('[name=alcaldia_empleado]').val(`${alcaldia == undefined ? "" : alcaldia}`);
    for (let col in colonias) {
        let {colonia} = colonias[col];
        opcion_colonia += `<option value="${colonia}">${colonia}</option>`;
    }
    $('[name=colonia_empleado]').html(`${opcion_colonia}`);
}
$(document).on('keyup', '#codigo_postal_empleado', ()=> {
    let codigo_postal= $('#codigo_postal_empleado').val();
    if(codigo_postal != ""){
        obtener_estado(codigo_postal);
    }else{
        obtener_estado("");
    }
});
const precargar_empleado = async (id_personal)=>{
    bootstrap.Itma2.start_loader();  
    let datos = new FormData();
    datos.append('funcion','precargar_empleado');
    datos.append('id_empleado',`${id_personal}`);
    const ejecucion = new Consultas("RhPersonal",datos);
    let {rfc,curp,nombre_persona,apellido_paterno,apellido_materno,telefono,correo,fecha_nacimiento,lugar_nacimiento,fk_cat_sexo,fk_cat_estado_civil,codigo_postal,calle,numero_interior,numero_exterior,tipo_trabajador,nombramiento,fk_cat_organigrama,fk_cat_estatus,fk_cat_escolaridad,id_persona,id_direccion} = await ejecucion.consulta();
    $('#id_empleado').val(id_personal)
    $('#rfc_empleado').val(rfc);
    $('#curp_empleado').val(curp);
    $('#apellido_paterno_empleado').val(apellido_paterno);
    $('#apellido_materno_empleado').val(apellido_materno);
    $('#nombres_empleado').val(nombre_persona);
    $('#telefono_empleado').val(telefono);
    $('#correo_electronico_empleado').val(correo);
    $('#fecha_nacimiento_empleado').val(fecha_nacimiento);
    $('#lugar_nacimiento_empleado').val(lugar_nacimiento);
    $('#selector_sexo_empleado').val(fk_cat_sexo);
    $('#selector_edo_civil_empleado').val(fk_cat_estado_civil);
    $('#codigo_postal_empleado').val(codigo_postal);
    obtener_estado(codigo_postal);
    $('#calle_empleado').val();
    $("#calle_empleado").val(calle);
    $("#no_exterior_empleado").val(numero_exterior);
    $("#no_interior_empleado").val(numero_interior);
    $('#seleccion_tipo_trabajador').val(tipo_trabajador);
    $('#nombramiento_empleado').val(nombramiento);
    $('#departamento_ads_acad_empleado').val(fk_cat_organigrama);
    $('#estatus_empleado').val(fk_cat_estatus);
    $('#nivel_escolar_empleado').val(fk_cat_escolaridad);
    $('#identificacion').html('<input type="text" name="id_persona" value="' + id_persona +'" hidden><input type="text" name="id_direccion" value="' + id_direccion +'" hidden>');
    bootstrap.Itma2.end_loader();
}
const crear_personal = () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_modificar_empleado')[0]);
    datos.append('funcion', "actualizar_informacion_personal");
    const ejecucion = new Consultas("RhPersonal",datos);
    ejecucion.insercion();
    mostrar_personal();
    $('#modal_modificar').modal('hide');
    // $('#frm_creacion_empleado')[0].reset();
    // reset_formulario();     
    bootstrap.Itma2.end_loader(); 
}
const validar_vacios_datos_domicilio = () => {
    let campos = ['codigo_postal_empleado', 'estado_empleado', 'alcaldia_empleado', 'colonia_empleado', 'calle_empleado', 'no_exterior_empleado'];
    if (validar_campo(campos, "vacios")) {
        if(longitud_campo_exacta('codigo_postal_empleado', 5, "El codigo postal debe tener 5 digitos exactos!")){
            // estadoFormulario = 2;
           /*  $("#form-part").text("Datos Escolares");
            $("#form_part_dos").hide();
            $("#form_part_tres").show(); */
        }
    }
}
const validar_vacios_datos_generales = () => {
    let campos = ['rfc_empleado', 'apellido_paterno_empleado', 'apellido_materno_empleado', 'nombres_empleado', 'lugar_nacimiento_empleado', 'fecha_nacimiento_empleado', 'selector_sexo_empleado', 'selector_edo_civil_empleado', 'telefono_empleado', 'curp_empleado', 'correo_electronico_empleado'];
    if (validar_campo(campos, "vacios")) {
        if (validar_campo('correo_electronico_empleado', 'email')) {
            if (validar_campo(['curp_empleado'], 'curp')) {
                if(validar_campo(['rfc_empleado'],'rfc')){
                }
            }
        }
    }
}
const validar_vacios_trabajador = ()=>{
    let campos = ['seleccion_tipo_trabajador','nombramiento_empleado','departamento_ads_acad_empleado','nivel_escolar_empleado','estatus_empleado','numero_tarjeta','ingreso_subS_year_empleado','ingreso_subS_periodo_empleado','inicio_gobierno_year_empleado','inicio_gobierno_periodo_empleado','inicio_sep_year_empleado','inicio_sep_periodo_empleado','inicio_plantel_year_empleado','inicio_plantel_periodo_empleado'];
    if(validar_campo(campos,"vacios")){
        crear_personal();
    }
}


$('#btn_guardar_cambios').on('click',()=>{
    validar_vacios_datos_generales();
    validar_vacios_datos_domicilio();
    validar_vacios_trabajador();
})

