    let bandera = true;
    let input = ['nombre_aula','capacidad','ubicacion'];
    let input2 = ['actualizar_nombre_aula','actualizar_capacidad','actualizar_ubicacion'];

    $("#contenedor_observaciones").hide();
    $('#agregar_observacion').click(() => {
        showAndhide();
    });

    let showAndhide = () => {
        if (bandera == true) {
            bandera = false;
            console.log(bandera);
            $("#contenedor_observaciones").show();

        } else {
            bandera = true;
            console.log(bandera);
            $("#contenedor_observaciones").hide();
        }
    }

    const agregar_aulas = () => {
        if(validar_campo(input,'vacios')){
            let datos = new FormData($('#frm_agregar_aula')[0]);
            datos.append('funcion', 'agregar_aula');
            const ejecucion = new Consultas("Aulas", datos);
            ejecucion.insercion();
            filtrar_contenido();
            $('#frm_agregar_aula')[0].reset();
            $('#funcion_actualizar').removeAttr('name');
            //posicion = 0;
        }
    }

    const actualizar_aula = () => {
        if(validar_campo(input2,'vacios')){
            bootstrap.Itma2.start_loader();
            $('#funcion_actualizar').attr('name', 'funcion');
            $('#funcion_actualizar').val("actualizar_aula");
            if (!($('#actualizar_btn_inactivo').prop('checked'))) {
                $('#actualizar_btn_inactivo').val('I');
            } else {
                $('#actualizar_btn_inactivo').val('A');
            }
            let datos = new FormData($('#frm_actualizar_aula')[0]);
            datos.append('funcion', 'actualizar_aula');
            const ejecucion = new Consultas("Aulas", datos);
            ejecucion.insercion();
            $("#aulaActualizar").modal("hide");
            $('#frm_actualizar_aula')[0].reset();
            $('#funcion_actualizar').removeAttr('name');
            //posicion = 0;
            filtrar_contenido();
            bootstrap.Itma2.end_loader();
        }
    }

    const precargar_aula = async (buscar) => {
        bootstrap.Itma2.start_loader();
        let datos = new FormData();
        datos.append('funcion','precargar_aula');
        datos.append('id_cat_aulas',`${buscar}`);
        const ejecucion = new Consultas("Aulas", datos);
        let respuesta = await ejecucion.consulta();
        let {id_cat_aulas, aula, capacidad, ubicacion, estatus_aula, observaciones} = respuesta;
        $("#id_cat_aula").val(id_cat_aulas);
        $("#actualizar_nombre_aula").val(aula);
        $("#actualizar_capacidad").val(capacidad);
        $("#actualizar_ubicacion").val(ubicacion);
        if (estatus_aula == "A") {
            $("#actualizar_btn_inactivo").prop("checked", true);
            $('#actualizar_cambio_texto').text('Activo');
            $("#actualizar_btn_inactivo").val('A');
        } else {
            $("#actualizar_btn_inactivo").prop("checked", false);
            $('#actualizar_cambio_texto').text('Inactivo');
            $("#actualizar_btn_inactivo").val('I');
        }
        colores_actualizar_capacidad();
        $("#actualizar_observaciones").val(observaciones);
        bootstrap.Itma2.end_loader();
    }

    const eliminar_aula = (buscar) => {
        swal({
            icon: "warning",
            title: "Seguro que quieres eliminar el aula?",
            html: true,
            text: '\n\n Una vez eliminado no lo podras recuperar',
            closeOnClickOutside: false,
            closeOnEsc: false,
            value: true,
            showCancelButton: true,
            buttons: ["Cancelar", "Eliminar Aula"],
        }).then((eliminar) => {
            if (eliminar) {
                let datos = new FormData($('#frm_actualizar_aula')[0]);
                datos.append('funcion', 'eliminar_aula');
                datos.append('id_cat_aula', `${buscar}`);
                const ejecucion = new Consultas("Aulas", datos);
                ejecucion.insercion();
                filtrar_contenido();
            }
        });
    }

    caracter_mayus('nombre_aula');
    caracter_mayus('ubicacion');
    primer_mayuscula('observaciones');
    caracter_numeros('capacidad');

    caracter_mayus('actualizar_nombre_aula');
    caracter_mayus('actualizar_ubicacion');
    primer_mayuscula('actualizar_observaciones');
    caracter_numeros('actualizar_capacidad');

    $('#btn_cambiar').change(() => {
        $('#btn_inactivo').is(':checked') ? $('#cambio_texto').text('Activo') : $('#cambio_texto').text('Inactivo');
    })

    $('#actualizar_btn_cambiar').change(() => {
        $('#actualizar_btn_inactivo').is(':checked') ? $('#actualizar_cambio_texto').text('Activo') : $('#actualizar_cambio_texto').text('Inactivo');
    })

    $('#button_create').click(() => {
        agregar_aulas();
    });

    $('#btn_actualizar').click(() => {
        actualizar_aula();
    });

    $('#capacidad')[0].oninput = () => {
        if ($('#capacidad').val() > 0 && $('#capacidad').val() <= 50) {
            $('#background_ability').addClass('bg-success').addClass('text-white');
            $('#capacidad').addClass('bg-success').addClass('text-white');
            $('#capacidad').removeClass('bg-warning');
            $('#capacidad').removeClass('bg-danger');
            $('#background_ability').removeClass('bg-warning');
            $('#background_ability').removeClass('bg-danger');
            $('#message_label').addClass('text-success');
            $('#message_label').removeClass('text-primary');
            $('#message_label').removeClass('text-danger');
            $('#message_label').text('Limite aceptable.');
        } else if ($('#capacidad').val() > 50 && $('#capacidad').val() <= 60) {
            $('#background_ability').removeClass('bg-success').removeClass('text-white');
            $('#capacidad').removeClass('bg-success').removeClass('text-white');
            $('#background_ability').addClass('bg-warning');
            $('#capacidad').addClass('bg-warning');
            $('#background_ability').removeClass('bg-danger');
            $('#message_label').removeClass('text-success');
            $('#message_label').addClass('text-primary');
            $('#message_label').removeClass('text-danger');
            $('#message_label').text('Limite aceptable excedido.');
        } else if ($('#capacidad').val() > 60 && $('#capacidad').val() <= 80) {
            $('#background_ability').removeClass('bg-success');
            $('#background_ability').removeClass('bg-warning');
            $('#background_ability').addClass('bg-danger').addClass('text-white');
            $('#capacidad').removeClass('bg-success');
            $('#capacidad').removeClass('bg-warning');
            $('#capacidad').addClass('bg-danger').addClass('text-white');
            $('#message_label').removeClass('text-success');
            $('#message_label').removeClass('text-primary');
            $('#message_label').addClass('text-danger');
            $('#message_label').text('¡Sobre población de alumnos!');
        } else {
            $('#capacidad').val('');
            $('#capacidad').removeClass('bg-success').removeClass('text-white');
            $('#capacidad').removeClass('bg-warning');
            $('#capacidad').removeClass('bg-danger').removeClass('text-white');
            $('#background_ability').removeClass('bg-success').removeClass('text-white');
            $('#background_ability').removeClass('bg-warning');
            $('#background_ability').removeClass('bg-danger').removeClass('text-white');
            $('#message_label').removeClass('text-success');
            $('#message_label').removeClass('text-primary');
            $('#message_label').removeClass('text-danger');
            $('#message_label').text('');
        }
    }
    const remover_colores_capacidad = () => {
        $('#capacidad').val('');
        $('#capacidad').removeClass('bg-success').removeClass('text-white');
        $('#capacidad').removeClass('bg-warning');
        $('#capacidad').removeClass('bg-danger').removeClass('text-white');
        $('#background_ability').removeClass('bg-success').removeClass('text-white');
        $('#background_ability').removeClass('bg-warning');
        $('#background_ability').removeClass('bg-danger').removeClass('text-white');
        $('#message_label').removeClass('text-success');
        $('#message_label').removeClass('text-primary');
        $('#message_label').removeClass('text-danger');
        $('#message_label').text('');
    }

    $('#actualizar_capacidad')[0].oninput = () => {
        colores_actualizar_capacidad();
    }

const colores_actualizar_capacidad = () => {
    if ($('#actualizar_capacidad').val() > 0 && $('#actualizar_capacidad').val() <= 50) {
        $('#background_abilit_actualizar').addClass('bg-success').addClass('text-white');
        $('#actualizar_capacidad').addClass('bg-success').addClass('text-white');
        $('#actualizar_capacidad').removeClass('bg-warning');
        $('#actualizar_capacidad').removeClass('bg-danger');
        $('#background_abilit_actualizar').removeClass('bg-warning');
        $('#background_abilit_actualizar').removeClass('bg-danger');
        $('#message_label_actualizar').addClass('text-success');
        $('#message_label_actualizar').removeClass('text-primary');
        $('#message_label_actualizar').removeClass('text-danger');
        $('#message_label_actualizar').text('Limite aceptable.');
    } else if ($('#actualizar_capacidad').val() > 50 && $('#actualizar_capacidad').val() <= 60) {
        $('#background_abilit_actualizar').removeClass('bg-success').removeClass('text-white');
        $('#actualizar_capacidad').removeClass('bg-success').removeClass('text-white');
        $('#background_abilit_actualizar').addClass('bg-warning');
        $('#actualizar_capacidad').addClass('bg-warning');
        $('#background_abilit_actualizar').removeClass('bg-danger');
        $('#message_label_actualizar').removeClass('text-success');
        $('#message_label_actualizar').addClass('text-primary');
        $('#message_label_actualizar').removeClass('text-danger');
        $('#message_label_actualizar').text('Limite aceptable excedido.');
    } else if ($('#actualizar_capacidad').val() > 60 && $('#actualizar_capacidad').val() <= 80) {
        $('#background_abilit_actualizar').removeClass('bg-success');
        $('#background_abilit_actualizar').removeClass('bg-warning');
        $('#background_abilit_actualizar').addClass('bg-danger').addClass('text-white');
        $('#actualizar_capacidad').removeClass('bg-success');
        $('#actualizar_capacidad').removeClass('bg-warning');
        $('#actualizar_capacidad').addClass('bg-danger').addClass('text-white');
        $('#message_label_actualizar').removeClass('text-success');
        $('#message_label_actualizar').removeClass('text-primary');
        $('#message_label_actualizar').addClass('text-danger');
        $('#message_label_actualizar').text('¡Sobre población de alumnos!');
    } else {
        $('#actualizar_capacidad').val('');
        $('#actualizar_capacidad').removeClass('bg-success').removeClass('text-white');
        $('#actualizar_capacidad').removeClass('bg-warning');
        $('#actualizar_capacidad').removeClass('bg-danger').removeClass('text-white');
        $('#background_abilit_actualizar').removeClass('bg-success').removeClass('text-white');
        $('#background_abilit_actualizar').removeClass('bg-warning');
        $('#background_abilit_actualizar').removeClass('bg-danger').removeClass('text-white');
        $('#message_label_actualizar').removeClass('text-success');
        $('#message_label_actualizar').removeClass('text-primary');
        $('#message_label_actualizar').removeClass('text-danger');
        $('#message_label_actualizar').text('');
    }
}