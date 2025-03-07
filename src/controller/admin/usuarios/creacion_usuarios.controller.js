let input_creacion_usuarios = [];

const obtener_rol_usuario = () => {
    let datos = new FormData();
    datos.append('funcion',"consultar_roles");
    const selec = new Consultas("UsuariosAdmin",datos);
    selec.catalogo('rol_usuario','codigo_html');
}

const obtener_personas = (tipo) => {
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData();
    datos.append('funcion',"obtener_personas");
    datos.append('tipo',tipo);
    const selec = new Consultas("UsuariosAdmin",datos);
    selec.catalogo('persona','codigo_html');
    bootstrap.Itma2.end_loader(); 
}

const crear_usuario = async() => {
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData($('#frm_crear_usuario_nuevo')[0]);
    datos.append('funcion',"crear_usuario_nuevo");
    const ejecucion = new Consultas("UsuariosAdmin",datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader(); 
    if(respuesta[0] == 1){
        $('#frm_crear_usuario_nuevo')[0].reset();
        msj_exito(respuesta[1]);
    }else{
        msj_error(respuesta[1]);
    }
}

obtener_rol_usuario();

$('[name=tipo_persona]').on('change',() => {
    obtener_personas($('[name=tipo_persona]').val());
});

$(document).ready(() => {
    $('#frm_crear_usuario_nuevo').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['tipo_persona','persona','correo_inst','usuario','rol_usuario','password_usuario'],'vacios')){
            if(validar_campo(['correo_inst'],'email')){
                if(validar_campo(['password_usuario'],'password')){
                    crear_usuario();
                }            
            }
        }
    });
});