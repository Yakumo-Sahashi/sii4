let input_creacion_personal = [];

let regCurp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
let estados = ["aguascalientes", "baja california", "baja california sur", "campeche", "chiapas", "chihuahua", "coahuila", "colima", "ciudad de mexico", "distrito federal", "durango", "guanajuato", "guerrero", "hidalgo", "jalisco", "estado de mexico", "michoacan", "morelos", "nayarit", "nuevo leon", "oaxaca", "puebla", "queretaro", "quintana roo", "san luis potosi", "sinaloa", "sonora", "tabasco", "tamaulipas", "tlaxcala", "veracruz", "yucatan", "zacatecas"];
let abreviacion = ["AS", "BC", "BS", "CC", "CS", "CH", "CL", "CM", "CX", "DF", "DG", "GT", "GR", "HG", "JC", "MC", "MN", "MS", "NT", "NL", "OC", "PL", "QT", "QR", "SP", "SL", "SR", "TC", "TS", "TL", "VZ", "YN", "ZS"];

primer_mayuscula('apellido_paterno_empleado');
primer_mayuscula('apellido_materno_empleado');
primer_mayuscula('nombres_empleado');
caracter_mayus('curp_empleado');
caracter_mayus('rfc_empleado');
caracter_mayus('plaza_empleado');

const validar_nombre = () => {
    let comunes, nombres, primer_nombre;
    comunes = ['MARIA', 'MA', 'MA.', 'JOSE', 'J', 'J.'];
    nombres = $('#nombres_empleado').val().toUpperCase().trim().split(/\s+/);
    primer_nombre = (nombres.length > 1 && comunes.indexOf(nombres[0]) > -1);

    if (primer_nombre) {
        return nombres[1].substring(0, 1);
    }
    if (!primer_nombre) {
        return nombres[0].substring(0, 1);
    }
}
const encontrar_vocales = () => {
    let vocales = $('#apellido_paterno_empleado').val();
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
const generarCURP = () => {
    let abc = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let random09a = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
    let random09b = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
    let randomAZ = Math.floor(Math.random() * (26 - 0 + 1)) + 0;
    let year = Number($("#fecha_nacimiento_empleado").val().slice(2, 4));
    var CURP = [];
    CURP[0] = $("#apellido_paterno_empleado").val().charAt(0).toUpperCase();
    CURP[1] = encontrar_vocales();
    CURP[2] = $("#apellido_materno_empleado").val().charAt(0).toUpperCase();
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
    CURP[5] = $("#fecha_nacimiento_empleado").val().slice(5, 7);
    CURP[6] = $("#fecha_nacimiento_empleado").val().slice(8, 10);
    CURP[7] = $("#selector_sexo_empleado").val() == 1 ? "H" : $("#selector_sexo_empleado").val() == 2 ? "M" : "";
    CURP[8] = abreviacion[estados.indexOf($("#lugar_nacimiento_empleado").val().toLowerCase())];
    CURP[9] = $("#apellido_paterno_empleado").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
    CURP[10] = $("#apellido_materno_empleado").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
    CURP[11] = $("#nombres_empleado").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
    let cambiar_caracter_final = CURP[9] + CURP[10] + CURP[11];
    CURP[9] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(0, 1).toUpperCase();
    CURP[10] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(1, 2).toUpperCase();
    CURP[11] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(2, 3).toUpperCase();
    return CURP.join("");
}
$('#selector_sexo_empleado').change(() => {
    $("#curp_empleado").val(generarCURP());
});

const limitacion_caracteres = () => {
    caracter_letras('apellido_paterno_empleado');
    caracter_letras('apellido_materno_empleado');
    caracter_letras('nombres_empleado');
    $('#lugar_nacimiento_empleado').on('input', function () {
        this.value = this.value.replace(/[^A-Za-z0-9ñÑ# ]/g, '');
        this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
    });
    caracter_numeros('telefono_empleado');
    caracter_varios('curp_empleado');
    caracter_numeros('codigo_postal_empleado');
    caracter_letras('estado_empleado');
    caracter_letras('alcaldia_empleado');
    caracter_letras('colonia_empleado');
    primer_mayuscula('calle_empleado');
    caracter_numeros('no_calle');
    caracter_numeros('no_exterior_empleado');
    caracter_numeros('no_interior_empleado');
}
limitacion_caracteres();
const comprobarVisualBotones = () => {
    if (estadoFormulario == 0) {
        $("#atras").hide()
        $("#crear_empleado").hide();
        $("#siguiente").show();
    } else {
        $("#atras").show()
    }
    if (estadoFormulario != 2) {
        $("#siguiente").text("Siguiente")
        $("#siguiente").show();
        $("#crear_empleado").hide();
    } else {
        $("#siguiente").hide();
        $("#crear_empleado").show();
    }
}
const comprobarEstadoForm = (edoForm) => {
    if (edoForm == 0) {
        $("#progreso-form").css("width", "1%")
    } else if (edoForm == 1) {
        $("#progreso-form").css("width", "50%")
    } else if (edoForm == 2) {
        $("#progreso-form").css("width", "100%")
    }
}

const validar_vacios_datos_generales = () => {
    let campos = ['rfc_empleado', 'apellido_paterno_empleado', 'apellido_materno_empleado', 'nombres_empleado', 'lugar_nacimiento_empleado', 'fecha_nacimiento_empleado', 'selector_sexo_empleado', 'selector_edo_civil_empleado', 'telefono_empleado', 'curp_empleado', 'correo_electronico_empleado'];
    if (validar_campo(campos, "vacios")) {
        if (validar_campo('correo_electronico_empleado', 'email')) {
            if (validar_campo(['curp_empleado'], 'curp')) {
                if(validar_campo(['rfc_empleado'],'rfc')){
                    estadoFormulario = 1;
                    $('#rfc_empleado').prop('readonly', true);
                    $("#form-part").text("Datos del Domicilio");
                    $("#form_part_uno").hide();
                    $("#form_part_dos").show();
                }
            }
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
    $('#fecha_nacimiento_empleado').attr('max', year_valido);
    $('#fecha_nacimiento_empleado').attr('min', year_valido_min);

}
$('#escritura_manual').on('click', function () {
    if ($(this).is(':checked')) {
        $('#estado_empleado').prop('readonly', false);
        $('#alcaldia_empleado').prop('readonly', false);
        // $('#colonia').prop('readonly', true);
        $('#colonia_empleado').replaceWith('<input type="text" class="form-control break_size" name="colonia_empleado" id="colonia_empleado">');
        $('#codigo_postal_empleado').val("");
        $('#estado_empleado').val("");
        $('#alcaldia_empleado').val("");
        $('#check_ditar').html('<input class="form-control" type="text" id="escritura" name="escritura" value="1" hidden>');
        $('#colonia_empleado').on('input', function () {
            this.value = this.value.replace(/[^a-zA-Z ñÑ]/g, '');
            this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
        });
    } else {
        $('#estado_empleado').prop('readonly', true);
        $('#alcaldia_empleado').prop('readonly', true);
        // $('#colonia').prop('readonly', false);
        $('#colonia_empleado').replaceWith('<select name="colonia_empleado" class="form-control break_size" id="colonia_empleado"></select>');
        $('#codigo_postal_empleado').val("");
        $('#estado_empleado').val("");
        $('#alcaldia_empleado').val("");
        $('#check_ditar').html('');
    }
});

input_fecha_nacimiento();
/* Informacion Inicial */
let estadoFormulario = 0;
$("#progreso-form").css("width", "1%")
$("#form-part").text("Datos Generales")
$("#form_part_dos").hide()
$("#form_part_tres").hide()
$("#form_part_uno").show()
$("#atras").hide()
$("#crear_personal").hide();
$("#siguiente").click(() => {
    if (estadoFormulario == 0) {
        validar_vacios_datos_generales();
    } else if (estadoFormulario == 1) {
        validar_vacios_datos_domicilio();
    }
    comprobarEstadoForm(estadoFormulario)
    comprobarVisualBotones()
});
comprobarVisualBotones();

$("#atras").click(() => {
    if (estadoFormulario == 1) {
        estadoFormulario = 0;
        $("#form-part").text("Datos Generales")
        $('#rfc_empleado').prop('readonly', false);
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
const validar_vacios_datos_domicilio = () => {
    let campos = ['codigo_postal_empleado', 'estado_empleado', 'alcaldia_empleado', 'colonia_empleado', 'calle_empleado', 'no_exterior_empleado'];
    if (validar_campo(campos, "vacios")) {
        if(longitud_campo_exacta('codigo_postal_empleado', 5, "El codigo postal debe tener 5 digitos exactos!")){
            estadoFormulario = 2;
            $("#form-part").text("Datos Escolares");
            $("#form_part_dos").hide();
            $("#form_part_tres").show();
        }
    }
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
const obtener_escuela = async()=>{
    let datos = new FormData();
    datos.append('funcion','consulta_nivel_estudios');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('nivel_escolar_empleado','codigo_html');
}
obtener_escuela();
const reset_formulario = () => {
    $('#colonia_personal').replaceWith('<select name="colonia_personal" class="form-control break_size" id="colonia_personal"></select>');
    $('#codigo_postal_personal').val("");
    $('#estado_personal').prop('readonly', true);
    $('#alcaldia_personal').prop('readonly', true);
    $('#check_ditar').html('');

    estadoFormulario = 0
    comprobarVisualBotones()
    $("#progreso-form").css("width", "1%")
    $("#form-part").text("Datos Generales")
    $("#form_part_dos").hide()
    $("#form_part_tres").hide()
    $("#form_part_uno").show()
    $("#atras").hide()
    $("#crear_personal").hide();
}
const crear_personal = () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_creacion_empleado')[0]);
    datos.append('funcion', "crear_personal");
    const ejecucion = new Consultas("RhPersonal",datos);
    ejecucion.insercion();
    $('#frm_creacion_empleado')[0].reset();
    reset_formulario();
    bootstrap.Itma2.end_loader(); 
}
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
const mostrarOrganigrama = async()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerArea');
    const ejecucion = new Consultas('RhPersonal',datos);
    ejecucion.catalogo('departamento_ads_acad_empleado','codigo_html');
}
const validar_vacios_trabajador = ()=>{
    let campos = ['seleccion_tipo_trabajador','nombramiento_empleado','departamento_ads_acad_empleado','nivel_escolar_empleado','estatus_empleado','numero_tarjeta','ingreso_subS_year_empleado','ingreso_subS_periodo_empleado','inicio_gobierno_year_empleado','inicio_gobierno_periodo_empleado','inicio_sep_year_empleado','inicio_sep_periodo_empleado','inicio_plantel_year_empleado','inicio_plantel_periodo_empleado'];
    if(validar_campo(campos,"vacios")){
        crear_personal();
    }
}
$("#crear_empleado").click(() => {
    validar_vacios_trabajador();
});
mostrarOrganigrama();

$(document).on('keyup', '#codigo_postal_empleado', ()=> {
    let codigo_postal= $('#codigo_postal_empleado').val();
    if(codigo_postal != ""){
        obtener_estado(codigo_postal);
    }else{
        obtener_estado("");
    }
});
