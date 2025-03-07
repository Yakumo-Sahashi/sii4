let input = ['nueva_contraseña','num_ctrl'];

$("#datos_alumno").hide();
$("#cancelar").hide();

const consulta_alumno = async() =>{
    let datos = new FormData($("#frm_consulta_contraseña")[0]);
    datos.append('funcion',"consulta_alumno");
    const ejecucion = new Consultas("ContraseñaAlumnos",datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] != 0){
        let {nombre_persona,apellido_paterno,apellido_materno,numero_control,id_usuario} = resultado[1];
        $("#nombre_alumno").val(`${nombre_persona+' '+apellido_paterno+' '+apellido_materno}`);
        $("#numero_control").val(`${numero_control}`);
        $("#id_usuario").val(`${id_usuario}`);
        $("#datos_alumno").show();
        $("#consulta_alumnos").hide();
    }else{
        msj_error(`${resultado[1]}`);
    }
};

$("#frm_consulta_contraseña").on('submit',(e)=>{
    e.preventDefault();
    if(validar_campo('num_ctrl','vacios')){
        consulta_alumno();
    }
});

$("#regresar").on('click',()=>{
    $("#datos_alumno").hide();
    $("#consulta_alumnos").show();
    $("#num_ctrl").val('');
});

$("#frm_actualiza_contraseña").on('submit',(e)=>{
    e.preventDefault();
    let expresion_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!\.\-_%*?&])([A-Za-z\d$@$\.\-_!%*?&]|[^ ]){8,15}$/gm;
    if(validar_campo('nueva_contraseña','vacios')){
        if(expresion_pass.test($("[name=nueva_contraseña]").val())){
            let datos = new FormData($("#frm_actualiza_contraseña")[0]);
            datos.append('funcion',"actualizar_contraseña");
            const ejecucion = new Consultas("ContraseñaAlumnos",datos);
            ejecucion.insercion();
            $("#nueva_contrasenia").val('');
        }else{
            msj_error("Estructura de Contraseña no valida! \nen el campo Nueva contraseña!\n\nRequisitos para una contraseña:\n-Minimo 8 caracteres\n-Maximo 15 caracteres\n-Al menos una letra mayuscula\n-Al menos una letra minuscula\n-Al menos un dígito\n-No espacios en blanco\n-Al menos 1 caracter especial : @ $ ! % * ? &");
        }
    }
});