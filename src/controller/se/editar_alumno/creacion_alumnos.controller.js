$(document).ready(() => {
    let numeros_control = "";
    let posicion = 0;
    
    let regCurp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
    let estados = ["aguascalientes", "baja california", "baja california sur", "campeche", "chiapas", "chihuahua", "coahuila", "colima", "ciudad de mexico", "distrito federal", "durango", "guanajuato", "guerrero", "hidalgo", "jalisco", "estado de mexico", "michoacan", "morelos", "nayarit", "nuevo leon", "oaxaca", "puebla", "queretaro", "quintana roo", "san luis potosi", "sinaloa", "sonora", "tabasco", "tamaulipas", "tlaxcala", "veracruz", "yucatan", "zacatecas"];
    let abreviacion = ["AS", "BC", "BS", "CC", "CS", "CH", "CL", "CM", "CX", "DF", "DG", "GT", "GR", "HG", "JC", "MC", "MN", "MS", "NT", "NL", "OC", "PL", "QT", "QR", "SP", "SL", "SR", "TC", "TS", "TL", "VZ", "YN", "ZS"];

    primer_mayuscula('apellido_paterno');
    primer_mayuscula('apellido_materno');
    primer_mayuscula('nombres');
    caracter_mayus('curp');
    $("#crear_alumno").text("Actualizar Informacion");
    $("#crear_alumno").show();

    const comprobarVisualBotones = () => {
        if (estadoFormulario == 0) {
            $("#atras").hide()
            $("#crear_alumno").show();
            $("#crear_alumno").text("Actualizar Informacion");
            $("#siguiente").show();
        } else {
            $("#atras").show()
        }
        if (estadoFormulario != 2) {
            $("#siguiente").text("Siguiente");
            $("#siguiente").show();
            $("#crear_alumno").show();
            $("#crear_alumno").text("Actualizar Informacion");
        } else {
            $("#siguiente").hide();
            $("#crear_alumno").show();
            $("#crear_alumno").text("Actualizar Informacion");
            //$("#siguiente").text("Crear Alumno")
        }
    }
    //Validacion de campos alumno
    const validar_vacios_datos_generales = () => {
        let campos = ['apellido_paterno', 'apellido_materno', 'nombres', 'lugar_nacimiento', 'fecha_nacimiento', 'selector_sexo', 'selector_edo_civil', 'telefono', 'curp', 'correo_electronico'];
        if (validar_campo(campos, "vacios")) {
           if(validar_campo('correo_electronico','email')){
                if(validar_campo(['curp'],'curp')){
                    estadoFormulario = 1;
                    //$('#numero_control').prop('redonly', true);
                    $("#form-part").text("Datos del Domicilio");
                    $("#form_part_uno").hide();
                    $("#form_part_dos").show();
                }
           }
        }
    }

    const encontrar_vocales = () => {
        let vocales = $('#apellido_paterno').val();
        if (vocales.slice(0, 1).match(/[aeiou]/gi)) {
            vocales = vocales.replace(/[^a,e,i,o,u,A,E,I,O,U]/g, '');
            vocales = vocales.slice(1).charAt(0).toUpperCase();
        } else {
            vocales = vocales.slice(1).charAt(0).toUpperCase();
        }
        return vocales;
    }

    const filtra_inconvenientes = (str) => {
        let inconvenientes = ['BACA', 'LOCO', 'BUEI', 'BUEY', 'MAME', 'CACA', 'MAMO',
            'CACO', 'MEAR', 'CAGA', 'MEAS', 'CAGO', 'MEON', 'CAKA', 'MIAR', 'CAKO', 'MION',
            'COGE', 'MOCO', 'COGI', 'MOKO', 'COJA', 'MULA', 'COJE', 'MULO', 'COJI', 'NACA',
            'COJO', 'NACO', 'COLA', 'PEDA', 'CULO', 'PEDO', 'FALO', 'PENE', 'FETO', 'PIPI',
            'GETA', 'PITO', 'GUEI', 'POPO', 'GUEY', 'PUTA', 'JETA', 'PUTO', 'JOTO', 'QULO',
            'KACA', 'RATA', 'KACO', 'ROBA', 'KAGA', 'ROBE', 'KAGO', 'ROBO', 'KAKA', 'RUIN',
            'KAKO', 'SENO', 'KOGE', 'TETA', 'KOGI', 'VACA', 'KOJA', 'VAGA', 'KOJE', 'VAGO',
            'KOJI', 'VAKA', 'KOJO', 'VUEI', 'KOLA', 'VUEY', 'KULO', 'WUEI', 'LILO', 'WUEY',
            'LOCA'
        ];
        if (inconvenientes.indexOf(str) > -1) {
            str = str.replace(/^(\w)\w/, '$1X');
        }
        return str;
    }

    const cambiar_caracteres_especiales = (str) => {
        let caracter_especial, caracter, respuesta;
        caracter_especial = ['Ã', 'À', 'Á', 'Ä', 'Â', 'È', 'É', 'Ë', 'Ê', 'Ì', 'Í', 'Ï', 'Î',
            'Ò', 'Ó', 'Ö', 'Ô', 'Ù', 'Ú', 'Ü', 'Û', 'ã', 'à', 'á', 'ä', 'â',
            'è', 'é', 'ë', 'ê', 'ì', 'í', 'ï', 'î', 'ò', 'ó', 'ö', 'ô', 'ù',
            'ú', 'ü', 'û', 'Ñ', 'ñ', 'Ç', 'ç'
        ];
        caracter = ['A', 'A', 'A', 'A', 'A', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I',
            'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'a', 'a', 'a', 'a', 'a',
            'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'u',
            'u', 'u', 'u', 'n', 'n', 'c', 'c'
        ];
        str = str.split('');
        respuesta = str.map((char) => {
            let pos = caracter_especial.indexOf(char);
            return (pos > -1) ? caracter[pos] : char;
        });

        return respuesta.join('');
    }

    const validar_nombre = () => {
        let comunes, nombres, primer_nombre;
        comunes = ['MARIA', 'MA', 'MA.', 'JOSE', 'J', 'J.'];
        nombres = $('#nombres').val().toUpperCase().trim().split(/\s+/);
        primer_nombre = (nombres.length > 1 && comunes.indexOf(nombres[0]) > -1);

        if (primer_nombre) {
            return nombres[1].substring(0, 1);
        }
        if (!primer_nombre) {
            return nombres[0].substring(0, 1);
        }
    }

    const generarCURP = () => {
        let abc = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        let random09a = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
        let random09b = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
        let randomAZ = Math.floor(Math.random() * (26 - 0 + 1)) + 0;
        let year = Number($("#fecha_nacimiento").val().slice(2, 4));
        var CURP = [];
        CURP[0] = $("#apellido_paterno").val().charAt(0).toUpperCase();
        CURP[1] = encontrar_vocales();
        CURP[2] = $("#apellido_materno").val().charAt(0).toUpperCase();
        CURP[3] = validar_nombre().charAt(0);
        let antisonante = CURP[0] + CURP[1] + CURP[2] + CURP[3];
        CURP[0] = filtra_inconvenientes(antisonante).slice(0, 1);
        CURP[1] = filtra_inconvenientes(antisonante).slice(1, 2);
        CURP[2] = filtra_inconvenientes(antisonante).slice(2, 3);
        CURP[3] = filtra_inconvenientes(antisonante).slice(3, 4);
        let cambiar_caracter = CURP[0] + CURP[1] + CURP[2] + CURP[3];
        CURP[0] = cambiar_caracteres_especiales(cambiar_caracter).slice(0, 1).toUpperCase();
        CURP[1] = cambiar_caracteres_especiales(cambiar_caracter).slice(1, 2).toUpperCase();
        CURP[2] = cambiar_caracteres_especiales(cambiar_caracter).slice(2, 3).toUpperCase();
        CURP[3] = cambiar_caracteres_especiales(cambiar_caracter).slice(3, 4).toUpperCase();
        CURP[4] = year.toString().length == 1 ? "0" + year.toString() : year.toString();
        CURP[5] = $("#fecha_nacimiento").val().slice(5, 7);
        CURP[6] = $("#fecha_nacimiento").val().slice(8, 10);
        CURP[7] = $("#selector_sexo").val() == 1 ? "H" : $("#selector_sexo").val() == 2 ? "M" : "";
        CURP[8] = abreviacion[estados.indexOf($("#lugar_nacimiento").val().toLowerCase())];
        CURP[9] = $("#apellido_paterno").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
        CURP[10] = $("#apellido_materno").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
        CURP[11] = $("#nombres").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
        let cambiar_caracter_final = CURP[9] + CURP[10] + CURP[11];
        CURP[9] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(0, 1).toUpperCase();
        CURP[10] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(1, 2).toUpperCase();
        CURP[11] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(2, 3).toUpperCase();
        return CURP.join("");
    }
    $('#selector_sexo').change(() => {
        $("#curp").val(generarCURP());
    });
    //Datos del Domicilio
    const validar_vacios_datos_domicilio = () => {
        let campos = ['codigo_postal', 'estado', 'alcaldia', 'colonia', 'calle', 'no_exterior'];
        if (validar_campo(campos, "vacios")) {
            if(longitud_campo_exacta('codigo_postal', 5, "El codigo postal debe tener 5 digitos exactos!")){
                estadoFormulario = 2;
                $("#form-part").text("Datos Escolares");
                $("#form_part_dos").hide();
                $("#form_part_tres").show();
            }
        }
    }

    const input_fecha_nacimiento = () => {
        let year = new Date();
        let yyyy = year.getFullYear();
        let year_valido = yyyy - 17;
        year_valido = year_valido.toString();
        year_valido = year_valido + "-12-31";
        let year_valido_min = yyyy - 80;
        year_valido_min = year_valido_min.toString();
        year_valido_min = year_valido_min + "-01-01";
        //console.log(year_valido_min);
        $('#fecha_nacimiento').attr('max', year_valido);
        $('#fecha_nacimiento').attr('min', year_valido_min);

    }
    input_fecha_nacimiento();
    //funciones del apartado de numero de control
    const mostrarDatosControl = () => {
        posicion = 0;
        bootstrap.Itma2.start_loader(); 
        let datos = new FormData();
        datos.append('funcion', "mostrar_num_control");
		fetch(`model/se/creacion_alumno/creacion_alumno.model.php`, {
				method: `POST`,
				body: datos
			}).then(respuesta => respuesta.json())
			.then(respuesta => {
				bootstrap.Itma2.end_loader();               
                insertarDatosControl(respuesta);
			}).catch(error => {
				bootstrap.Itma2.end_loader(); 
				console.log(`${error}`);
			});
    }

    const insertarDatosControl = (respuesta) => {
        numeros_control = respuesta;
        $('#no_control').val(numeros_control[posicion].numero_control);
        $('#numero_control').val(numeros_control[posicion].id_numero_control);
    }
    //mostrarDatosControl();
    //Limitacion de caracteres
    const limitacion_caracteres = () => {
        caracter_letras('apellido_paterno');
        caracter_letras('apellido_materno');
        caracter_letras('nombres');
        $('#lugar_nacimiento').on('input', function () {
            this.value = this.value.replace(/[^A-Za-z0-9ñÑ# ]/g, '');
            this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
        });
        caracter_numeros('telefono');
        caracter_varios('curp');
        caracter_numeros('codigo_postal');
        caracter_letras('estado');
        caracter_letras('alcaldia');
        caracter_letras('colonia');
        primer_mayuscula('calle');
        caracter_numeros('no_calle');
        caracter_numeros('no_exterior');
        caracter_numeros('no_interior');
        $('#periodos_revalidados').on('input', function () {
            if (this.value > 12) {
                this.value = 12;
            } else if (this.value < 1) {
                this.value = 1;
            }
        });
        $('#cb_revalidado').on('click', function () {
            if ($(this).is(':checked')) {
                $("#periodos_revalidados").prop('disabled', false);
                $("#periodos_revalidados").val(1);
            } else {
                $("#periodos_revalidados").prop('disabled', true);
                $("#periodos_revalidados").val(0);
            }
        });
    }

    $('#escritura_manual').on('click', function () {
        if ($(this).is(':checked')) {
            $('#estado').prop('readonly', false);
            $('#alcaldia').prop('readonly', false);
            // $('#colonia').prop('readonly', true);
            $('#colonia').replaceWith('<input type="text" class="form-control break_size" name="colonia" id="colonia">');
            $('#codigo_postal').val("");
            $('#estado').val("");
            $('#alcaldia').val("");
            $('#check_ditar').html('<input class="form-control" type="text" id="escritura" name="escritura" value="1" hidden>');
            $('#colonia').on('input', function () {
                this.value = this.value.replace(/[^a-zA-Z ñÑ]/g, '');
                this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
            });
        } else {
            $('#estado').prop('readonly', true);
            $('#alcaldia').prop('readonly', true);
            // $('#colonia').prop('readonly', false);
            $('#colonia').replaceWith('<select name="colonia" class="form-control break_size" id="colonia"></select>');
            $('#codigo_postal').val("");
            $('#estado').val("");
            $('#alcaldia').val("");
            $('#check_ditar').html('');
        }
    });

    //Informacion Inicial
    let estadoFormulario = 0
    $("#progreso-form").css("width", "1%")
    $("#form-part").text("Datos Generales")
    $("#form_part_dos").hide()
    $("#form_part_tres").hide()
    $("#form_part_uno").show()
    $("#atras").hide()
    $("#crear_alumno").show();
    $("#siguiente").click(() => {
        if (estadoFormulario == 0) {
            validar_vacios_datos_generales();
        } else if (estadoFormulario == 1) {
            validar_vacios_datos_domicilio();
        }
        comprobarEstadoForm(estadoFormulario)
        comprobarVisualBotones()
    });

    const comprobarEstadoForm = (edoForm) => {
        if (edoForm == 0) {
            $("#progreso-form").css("width", "1%")
        } else if (edoForm == 1) {
            $("#progreso-form").css("width", "50%")
        } else if (edoForm == 2) {
            $("#progreso-form").css("width", "100%")
        }
    }

    $("#atras").click(() => {
        if (estadoFormulario == 1) {
            estadoFormulario = 0;
            $("#form-part").text("Datos Generales")
            $('#numero_control').prop('disabled', false);
            $("#form_part_dos").hide()
            $("#form_part_tres").hide()
            $("#form_part_uno").show()
        } else if (estadoFormulario == 2) {
            estadoFormulario = 1;
            $("#form-part").text("Datos del Domicilio")
            $("#form_part_uno").hide()
            $("#form_part_tres").hide()
            $("#form_part_dos").show()
        }
        comprobarEstadoForm(estadoFormulario)
        comprobarVisualBotones()
    });
    limitacion_caracteres();

    const reset_formulario = () => {
        $('#colonia').replaceWith('<select name="colonia" class="form-control break_size" id="colonia"></select>');
        $('#codigo_postal').val("");
        $('#estado').prop('readonly', true);
        $('#alcaldia').prop('readonly', true);
        $('#check_ditar').html('');

        estadoFormulario = 0
        comprobarVisualBotones()
        $("#progreso-form").css("width", "1%")
        $("#form-part").text("Datos Generales")
        $("#form_part_dos").hide()
        $("#form_part_tres").hide()
        $("#form_part_uno").show()
        $("#atras").hide()
        $("#crear_alumno").show();
    }

    const limpiar_foto = () => {
        let img_prev = document.getElementById("img_foto");
        img_prev.src = `public/img/user.png`;
        img_prev.title = `fotografia`;
    }

    const crear_alumno = () => {
        bootstrap.Itma2.start_loader(); 
        let datos = new FormData($('#frm_creacion_alumno')[0]);
        datos.append('funcion', "actualizar_inf_alumno");
        fetch(`app/Controllers/Alumnos.php`, {
            method: `POST`,
            body: datos
        }).then(respuesta => respuesta.json())
        .then(respuesta => {
            bootstrap.Itma2.end_loader(); 
            if (respuesta[0] == "1") {
                $('#frm_creacion_alumno')[0].reset();
                limpiar_foto();
                posicion = 0;
                reset_formulario();  
                $('#identificacion').html("");  
                $('#listado_titulo').prop('hidden', false);
                $('#listado_info').prop('hidden', false);
                $('#editar_info').prop('hidden', true);    
                filtrar_contenido(0);
                msj_exito(`La actualizacion de informacion del alumno ha sido correcta!`);					
            } else {
                msj_error(`Se ha prensentado un error:\n${respuesta[1]}\nPor favor intentalo de nuevo.`);
            }
        }).catch(error => {
            bootstrap.Itma2.end_loader(); 
            msj_error(`${error}`);
        });
    }
    //Datos Escolares
    const validar_vacios_datos_escolares = () => {
        let campos = ['carrera_reticula', 'especialidad', 'periodo_ingreso', 'plan_estudios', 'nivel_escolar', 'estatus_alumno'];
        if (validar_campo(campos, 'vacios')) {
            crear_alumno();
        }
    }

    $("#crear_alumno").click(() => {
        validar_vacios_datos_escolares();
    });

    const fecha_nacimiento = () => {
        let year = new Date();
        let yyyy = year.getFullYear();
        let year_valido = yyyy - 17;
        let year_max = yyyy - 17;
        year_valido = year_valido.toString();
        year_valido = year_valido + "-12-31";
        let year_valido_min = yyyy - 80;
        let year_min = yyyy - 80;
        year_valido_min = year_valido_min.toString();
        year_valido_min = year_valido_min + "-01-01";
        $('#fecha_nacimiento').attr('max', year_valido);
        $('#fecha_nacimiento').attr('min', year_valido_min);
        $('#fecha_nacimiento').on('input', () => {
            let year_teclado = $('#fecha_nacimiento').val().slice(0, 4);
            year_teclado = parseInt(year_teclado);
            let year_length = year_teclado.toString().length;
            if (year_length == "4") {
                //console.log(year_length);
                if (year_teclado < year_min) {
                    $('#fecha_nacimiento').val(year_valido_min);
                } else if (year_teclado > year_max) {
                    $('#fecha_nacimiento').val(year_valido);
                }
            }


        });
    }
    fecha_nacimiento();

    $('#close').click(()=>{
        $('#frm_creacion_alumno')[0].reset();
        limpiar_foto();
        posicion = 0;
        reset_formulario();  
        $('#identificacion').html("");    
    });

    $('#cancelar_edicion').click(()=>{
        filtrar_contenido(0);
        $('#identificacion').html("");  
        $('#listado_titulo').prop('hidden', false);
        $('#listado_info').prop('hidden', false);
        $('#editar_info').prop('hidden', true);   
    });

    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    let tooltipList = tooltipTriggerList.map((tooltipTriggerEl) => {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});