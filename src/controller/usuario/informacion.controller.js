let input_informacion = [];

$('#seccion_cambio_pass').addClass('d-none');
$('#botones_editar').addClass('d-none');

$('#btn_cambiar_pass').on('click',()=>{
    $('#seccion_cambio_pass').removeClass('d-none');
    $('#botones_prin').addClass('d-none');
})
$('#btn_cancel_act_pass').on('click',()=>{
    $('#botones_prin').removeClass('d-none');
    $('#seccion_cambio_pass').addClass('d-none');
});

const foto_usuario = () => {
    let img_prev = document.getElementById("img_foto");
    img_prev.src = `public/img/${id_usuario}/fotografia.webp?img=${fecha_img1}`;
    img_prev.title = `${numero_control}`;
    let crop_image = document.getElementById('crop-image');
    crop_image.src = `public/img/alumno/${id_usuario}/fotografia.webp?img=${fecha_img1}`;
}

$(document).ready(() => {
    $('#frm_cambio_pass').on('submit', (e) => {
        e.preventDefault();
        let expresion_pass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!\.\-_%*?&])([A-Za-z\d$@$\.\-_!%*?&]|[^ ]){8,15}$/gm;
        if(validar_campo(['password_actual','nueva_password','confirmar_password'],'vacios')){
            if(expresion_pass.test($('[name=nueva_password]').val())){
                if($('[name=nueva_password]').val() == $('[name=confirmar_password]').val()){
                    let datos = new FormData($('#frm_cambio_pass')[0]);
                    datos.append('funcion', "actualizar_pass");
                    const ejecucion = new Consultas("Usuario", datos);
                    ejecucion.insercion();
                    $('[name=password_actual]').va('');
                    $('[name=nueva_password]').va('');
                    $('[name=confirmar_password]').va('');
                }else{
                    msj_error('Las contraseñas no son iguales!')
                }
            }else{
                msj_error("Estructura de Contraseña no valida! en campo Nueva contraseña!\n\nRequisitos para una contraseña:\n-Minimo 8 caracteres\n-Maximo 15 caracteres\n-Al menos una letra mayuscula\n-Al menos una letra minuscula\n-Al menos un dígito\n-No espacios en blanco\n-Al menos 1 caracter especial : @ $ ! % * ? &");
            }    
        }
    });
});