const inputRange = () => {
    $("#rango_matriculas").val($("#num_matriculas").val());
}

const range = () => {
    $("#num_matriculas").val($("#rango_matriculas").val());
}

$(document).ready(() => {
    // funciona
    const valorInicial = 50; //Valor por defecto de matriculas
    $("#num_matriculas").val(valorInicial);
    $("#rango_matriculas").val(valorInicial);
    caracter_numeros("num_matriculas");//limita los caracteres a solo numeros
    // funciona

    const status_solicitud = ()=> { //funcion para cambiar el estatus de la solicitud
        if($("#id_solicitud").val() != 0){
            if($("#estado_solicitud").val() == 0){
                $("#alerta").remove()
                $("#status_solicitud").append(
                    `<div id="alerta" class="alert alert-warning texto-alerta contenedor-alerta" role="alert">
                        <h4 class="alert-heading"><i class="fas fa-clock"></i> Pendiente</h4>
                        <hr>
                        <span>Tu solicitud de numeros de control fue enviada.</span>
                        <span class="mb-2">Espera la aprobacion para generar una nueva solicitud.</span>
                    </div>`
                );
                $("#enviar_solicitud").attr("disabled", true);
            } else {
                $("#alerta").remove()
                $("#status_solicitud").append(
                    `<div id="alerta" class="alert alert-secondary texto-alerta contenedor-alerta" role="alert">
                        <h4 class="alert-heading mb-3"><i class="fas fa-envelope-open-text"></i> Sin Enviar</h4>
                        <hr>
                        <span >No tienes solicitudes de numeros de control enviadas.</span>
                        <span class="mb-2">Para generar una nueva solicitud de numeros de control selecciona un rango de matriculas y da click en "Enviar solicitud"</span>
                    </div>
                `)
            }
        } else {
            $("#alerta").remove()
            $("#status_solicitud").append(
                `<div id="alerta" class="alert alert-secondary texto-alerta contenedor-alerta" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-envelope-open-text"></i> Sin Enviar</h4>
                    <p>No tienes solicitudes de numeros de control enviadas.</p>
                    <hr>
                    <span class="mb-2">Para generar una nueva solicitud de numeros de control selecciona un rango de matriculas y da click en "Enviar solicitud"</span>
                </div>`
            );
        }
    }
    const consultar_estado_solicitud = async () => {
        bootstrap.Itma2.start_loader();
        let datos = new FormData($('#frm_num_ctrl')[0]);
        datos.append('funcion', "consultar_estado_solicitud");
        const ejecucion = new Consultas("CreacionNumerosControl", datos);
        let respuesta = await ejecucion.consulta();
        bootstrap.Itma2.end_loader();
        $("#estado_solicitud").val(respuesta.estado_solicitud);
        $("#id_solicitud").val(respuesta.id_solicitud);
        status_solicitud();
    }

    const enviar_solicitud = ()=> { //funcion para enviar solicitud
        let datos = new FormData($('#frm_num_ctrl')[0]);
        datos.append('funcion', "enviar_solicitud");
        const ejecucion = new Consultas("CreacionNumerosControl", datos);
        ejecucion.insercion();
        consultar_estado_solicitud();
        listado_solicitud();
        status_solicitud();
    }

    const validar = ()=> {  //funcion para validar el input de numeros de control
        // if(validar_campo(["num_matriculas"],"numeros")){

        // } 
        
        if(limitar_valor("num_matriculas", 1, 200, "Solo puedes ingresar números entre 1 y 200")){
            enviar_solicitud();
        }
    }  

    const cancelar_solicitud = ()=> { //funcion para cancelar y eliminar la solicitud actual
        swal({
            title: "¿Estas seguro de cancelar la solicitud?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                let datos = new FormData($('#frm_num_ctrl')[0]);
                datos.append('funcion', "cancelar_solicitud");
                const ejecucion = new Consultas("CreacionNumerosControl", datos);
                ejecucion.insercion();
                consultar_estado_solicitud();
                $('#tabla_datos').DataTable().ajax.reload();
            } else {
                swal("¡La solicitud sigue activa!");
            }
        });
    }
    consultar_estado_solicitud();
    $("#enviar_solicitud").click( ()=>{
        validar();
    });

    $("#cancelar_solicitud").click(() => {
        $("#funcion").val("cancelar_solicitud");
        cancelar_solicitud();
    });
});