$(document).ready(() => {
    var numCtrl, dia, mes;
    var ultimoNumero, anioCtrl;

    const status_botones = () => { //funcion para cambiar el estatus de los botones si no hay una solicitud o si ya se aprobo
        if($("#num_matriculas").val() == ""){
            $("#btn_generar").attr("disabled", true);
            $("#btn_aprobar").attr("disabled", true);
            $("#btn_rechazar").attr("disabled", true);
            $("#num_matriculas").attr("placeholder", "No tienes solicitudes");
        } else {
            $("#btn_generar").removeAttr("disabled");
            $("#btn_aprobar").removeAttr("disabled");
            $("#btn_rechazar").removeAttr("disabled");
        }
    }

    const consultar_solicitud = async () => {
        let datos = new FormData($('#frm_actualizar_aula')[0]);
        datos.append('funcion','consultar_solicitud');
        const ejecucion = new Consultas("NumerosControlAcad", datos);
        let respuesta = await ejecucion.consulta();
        let {solicitud} = respuesta;
        let {id_solicitud} = respuesta;
        $("#num_matriculas").val(solicitud);
        $("#id_solicitud").val(id_solicitud);
        status_botones();
        bootstrap.Itma2.end_loader();       
    }

    const consultar_numeros = () => { //funcion para consultar los numeros de control
        let datos = new FormData();
        datos.append('funcion', 'consultar_numero_ctrl');
        const ejecucion = new Consultas("NumerosControlAcad", datos);
        ejecucion.catalogo("num_ctrl","valor_input");
    }

    const crear_numeros = () => { //funcion para generar los numeros de control y mostrarlos en la tabla (esto solo es visual, los numeros reales se generan en php)
        let fecha = new Date();
        let num = $("#num_matriculas").val();
        ultimoNumero = $("#num_ctrl").val();
        ultimoNumero ++;
        // console.log(ultimoNumero);
        // console.log(numSolicitado);
        // console.log(totalSolicitado);
        // anioCtrl = fecha.getFullYear().toString().slice(-2);
        dia = fecha.getDate() < 10 ? "0" + fecha.getDate() : fecha.getDate();
        mes = fecha.getMonth() < 10 ? "0" + (fecha.getMonth()+1) : (fecha.getMonth()+1);
        for(let i = 0; i < num; i++){
            // numCtrl = ultimoNumero < 10 ? anioCtrl + "119000" : anioCtrl + "11900";
            $("#tabla_num_ctrl tbody").append(`<tr><th scope="row">${ultimoNumero}</th><td>${dia}-${mes}-${fecha.getFullYear()}</td></tr>`);
            // $("#tabla_num_ctrl tbody").append(`<tr><th scope="row">${numCtrl + ultimoNumero}</th><td>${dia}-${mes}-${fecha.getFullYear()}</td></tr>`);
            ultimoNumero++;
        }
    }

    const enviar_numeros = () => { //esta funcion aprueba la solicitud y envia la cantidad de numeros que necesitamos al modelo
        let datos = new FormData($("#frm_aprobar_ctrl")[0]);
        datos.append('funcion', 'generar_num_ctrl');
        const ejecucion = new Consultas("NumerosControlAcad", datos);
        ejecucion.insercion();
        mostrar_contenido();
        status_botones();
    }

    const rechazar_numeros = () => { //funcion para rechazar la solicitud 
        bootstrap.Itma2.start_loader();
        let datos = new FormData($("#frm_aprobar_ctrl")[0]);
        datos.append('funcion', 'rechazar_solicitud');
        const ejecucion = new Consultas("NumerosControlAcad", datos);
        swal({
            title: "¿Estas seguro de rechazar la solicitud?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                ejecucion.insercion();
                consultar_solicitud();
                mostrar_contenido();
                bootstrap.Itma2.end_loader();
            } else {
               bootstrap.Itma2.end_loader();
                msj_exito("¡La solicitud sigue activa!");
            }
        });
    }
    consultar_solicitud();
    consultar_numeros();
    status_botones();

    $("#btn_generar").click( ()=>{
        crear_numeros();
        $("#btn_generar").prop('disabled', true);
    });

    $("#btn_aprobar").click( ()=>{
        enviar_numeros();
        consultar_solicitud();
        status_botones();
        $("#previo_control").html(``);
    });

    $("#btn_rechazar").click(() => {
        rechazar_numeros();
        status_botones();
    })
})