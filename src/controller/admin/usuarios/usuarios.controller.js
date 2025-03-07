const color = ['warning','success','danger'];
const icono = ['fa-user-clock','fa-user-check','fa-user-xmark'];
const estado_letrero = ['Desconectado','Activo','Deshabilitado'];

const obtener_rol_usuario = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_roles");
    const selec = new Consultas("UsuariosAdmin",datos);
    selec.catalogo('rol_usuario','codigo_html');
}

const consulta_usuarios_admin = async(tipo) =>{
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData();
    let contenido = ``;
    $("#tabla_contenido_usuario").html(``);
    $("#tabla_usuarios").DataTable().destroy();
    datos.append('funcion',"consultar_usuarios");
    datos.append('filtro',tipo);
    const ejecucion = new Consultas("UsuariosAdmin",datos);
    let resultado = await ejecucion.consulta();
    let cont = 0;
    resultado.map(({id_usuario,correo_usuario,usuario,nombre_persona,apellido_paterno,apellido_materno,telefono,estado,rol,rfc} = lista) =>{
        if(rol != 'DIR'){
            cont++
            contenido += `
            <tr> 
                <td class="align-middle text-small">${cont < 10 ? `0${cont}`:cont}</td>
                <td class="align-middle text-small">${correo_usuario}</td>
                <td class="align-middle text-small">${usuario}</td>
                <td class="align-middle text-small">${apellido_paterno} ${apellido_materno} ${nombre_persona}</td>
                <td class="align-middle text-small">${rfc}</td>
                <td class="align-middle text-small">${telefono}</td>
                <td class="align-middle text-small">${rol}</td>
                <td class="align-middle">
                    <span class="btn btn-outline-${color[estado]} btn-sm rounded-circle" title="${estado_letrero[estado]}"><i class="fa-solid ${icono[estado]} py-1 "></i></span>
                </td>
                <td class="align-middle">
                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="precargar_usuario(${id_usuario})"><i class="fa-solid fa-user-pen"></i></button>
                </td>
            </tr>
            `;
        }else{
            cont++
            contenido += `
            <tr> 
                <td class="align-middle text-small">${cont < 10 ? `0${cont}`:cont}</td>
                <td class="align-middle text-small">${correo_usuario}</td>
                <td class="align-middle text-small">${usuario}</td>
                <td class="align-middle text-small">${apellido_paterno} ${apellido_materno} ${nombre_persona}</td>
                <td class="align-middle text-small">${rfc}</td>
                <td class="align-middle text-small">${telefono}</td>
                <td class="align-middle text-small">${rol}</td>
                <td class="align-middle">
                    <span class="btn btn-outline-${color[estado]} btn-sm rounded-circle" title="${estado_letrero[estado]}"><i class="fa-solid ${icono[estado]} py-1"></i></span>
                </td>
                <td class="align-middle">
                    <button type="button" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-user-pen"></i></button>
                </td>
            </tr>
            `;
        }
    });
    
    $("#tabla_contenido_usuario").html(contenido);
    $("#tabla_usuarios").DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}

const precargar_usuario = async(id) => {
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData();
    datos.append('funcion',"consultar_datos_usuario");
    datos.append('usuario',id);
    const ejecucion = new Consultas("UsuariosAdmin",datos);
    let {nombre_persona,apellido_paterno,apellido_materno,fk_cat_rol,estado,correo_usuario,usuario} = await ejecucion.consulta();

    $('[name=nombre_usuario]').val(`${apellido_paterno} ${apellido_materno} ${nombre_persona}`);
    $('[name=rol_usuario]').val(fk_cat_rol);
    $('[name=correo_inst]').val(correo_usuario);
    $('[name=usuario]').val(usuario);
    $('[name=estado_cuenta]').val(estado == 0 || estado == 1 ? 0 : estado);
    $('[name=id_usuario_upt]').val(id);
    $('#datos_usuario').modal('show');
    bootstrap.Itma2.end_loader(); 
}

const actualizar_usuario = async() => {
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData($('#frm_actualizar_usuario')[0]);
    datos.append('funcion',"actualizar_usuario");
    const ejecucion = new Consultas("UsuariosAdmin",datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader(); 
    if(respuesta[0] == 1){
        $('#datos_usuario').modal('hide');
        consulta_usuarios_admin($('[name=select_rol]').val()); 
        msj_exito(respuesta[1]);
    }else{
        msj_error(respuesta[1]);
    }   
}

obtener_rol_usuario();
consulta_usuarios_admin(0);

$('#select_rol').on('change',() => {
    consulta_usuarios_admin($('[name=select_rol]').val());   
});


$(document).ready(() => {
    $('#frm_actualizar_usuario').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['correo_inst','usuario','rol_usuario'],'vacios')){
            if(validar_campo(['correo_inst'],'email')){
                if($('[name=password_usuario]').val() != ""){
                    if(validar_campo(['password_usuario'],'password')){
                        actualizar_usuario();
                    }
                }else{
                    actualizar_usuario();
                }
            }   
        }
    });
});