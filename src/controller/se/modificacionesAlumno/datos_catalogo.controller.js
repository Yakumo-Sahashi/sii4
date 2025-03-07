let plan_id = '';
let curp = Array;
let lugar_naciemiento = "";

let regCurp = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
let estados = ["aguascalientes", "baja california", "baja california sur", "campeche", "chiapas", "chihuahua", "coahuila", "colima", "ciudad de mexico", "distrito federal", "durango", "guanajuato", "guerrero", "hidalgo", "jalisco", "estado de mexico", "michoacan", "morelos", "nayarit", "nuevo leon", "oaxaca", "puebla", "queretaro", "quintana roo", "san luis potosi", "sinaloa", "sonora", "tabasco", "tamaulipas", "tlaxcala", "veracruz", "yucatan", "zacatecas"];
let abreviacion = ["AS", "BC", "BS", "CC", "CS", "CH", "CL", "CM", "CX", "DF", "DG", "GT", "GR", "HG", "JC", "MC", "MN", "MS", "NT", "NL", "OC", "PL", "QT", "QR", "SP", "SL", "SR", "TC", "TS", "TL", "VZ", "YN", "ZS"];

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
    $('#fecha_nac_alumno').attr('max', year_valido);
    $('#fecha_nac_alumno').attr('min', year_valido_min);
    $('#fecha_nac_alumno').on('input', () => {
        let year_teclado = $('#fecha_nac_alumno').val().slice(0, 4);
        year_teclado = parseInt(year_teclado);
        let year_length = year_teclado.toString().length;
        if (year_length == "4") {
            //console.log(year_length);
            if (year_teclado < year_min) {
                $('#fecha_nac_alumno').val(year_valido_min);
            } else if (year_teclado > year_max) {
                $('#fecha_nac_alumno').val(year_valido);
            }
        }
    });
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
    $('#fecha_nac_alumno').attr('max', year_valido);
    $('#fecha_nac_alumno').attr('min', year_valido_min);
}

/*  validaciones */
$('#lugar_naciemiento').change(function() {
    let dt = $(this).val();
    $('#curp').val(dt);
});

primer_mayuscula('apellido_p_alumno');
primer_mayuscula('apellido_m_alumno');
primer_mayuscula('nombre_alumno');
caracter_mayus('curp_alumno');

caracter_numeros('telefono_alumno');
caracter_varios('curp_alumno');
caracter_numeros('codigo_p_alumno');
caracter_letras('estado');
caracter_letras('alcaldia_generales');
caracter_letras('colonia_generales');
primer_mayuscula('calle_generales');
caracter_numeros('no_exterior_generales');
caracter_numeros('no_interior_generales');
caracter_numeros('periodos_revalidados_alumno');
fecha_nacimiento();
input_fecha_nacimiento();

const obtener_carrera = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera_alumno','codigo_html');
}

const obtener_especialidad = (carrera) => {  
    let datos = new FormData();
    datos.append('funcion', "consultar_especialidad");
    datos.append('carrera_reticula', `${carrera}`);
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('especialidad_alumno','codigo_html');  
}

const obtener_tipo_ingreso = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_ingreso");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('tipo_ingreso_alumno','codigo_html');  
}

const obtener_semestre = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "obtener_periodo");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('periodo_ingreso_alumno','valor_input');  
}

const obtener_semestre_id = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "obtener_periodo_id");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('periodo_ingreso_id','valor_input');  
}

const obtener_plan_estudios = async (carrera) => {
    let datos = new FormData();
    datos.append('funcion','consultar_plan_estudios');
    datos.append('carrera', carrera);
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    let {id_cat_reticula, clave_reticula} = await ejecucion.consulta();
    $('[name=plan_estudios_alumno]').val(`${clave_reticula}`);
    $('[name=plan_est]').val(`${id_cat_reticula}`);    
}

const obtener_nivel_estudios = ()=> {    
    let datos = new FormData();
    datos.append('funcion', "consulta_nivel_estudios");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('nivel_escolar_alumno','codigo_html');
}

const obtener_estatus_alumno = ()=> {    
    let datos = new FormData();
    datos.append('funcion', "consulta_estatus_alumno");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('estatus_alumno','codigo_html');
}

const obtener_estado = async (codigo_postal) => {
    let datos = new FormData();
    datos.append('funcion','consultar_estado');
    datos.append('codigo_postal', codigo_postal);
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    let opcion_colonia = ``;
    let {entidad_federativa, colonias, alcaldia} = await ejecucion.consulta();
    $('[name=estado_generales]').val(`${entidad_federativa == undefined ? "" : entidad_federativa}`);
    $('[name=alcaldia_generales]').val(`${alcaldia == undefined ? "" : alcaldia}`);
    for (let col in colonias) {
        let {colonia} = colonias[col];
        opcion_colonia += `<option value="${colonia}">${colonia}</option>`;
    }
    $('[name=colonia_generales]').html(`${opcion_colonia}`);
}


obtener_carrera();
obtener_tipo_ingreso();
obtener_nivel_estudios();
obtener_estatus_alumno();
obtener_semestre();

$(document).on('keyup', '#codigo_p_alumno', ()=> {
    let codigo_postal= $('#codigo_p_alumno').val();
    if(codigo_postal != ""){
        obtener_estado(codigo_postal);
    }else{
        obtener_estado("");
    }
});

$('#carrera_alumno').on('change', () => {
    let carrera = $('#carrera_alumno').val();
    obtener_especialidad(carrera);
    obtener_plan_estudios(carrera);
});

$('#escritura_manual_generales').on('click', function () {
    if ($(this).is(':checked')) {
        $('#estado_generales').prop('readonly', false);
        $('#alcaldia_generales').prop('readonly', false);
        $('#colonia_generales').replaceWith('<input type="text" class="form-control break_size" name="colonia_generales" id="colonia_generales">');
        $('#codigo_p_alumno').val("");
        $('#estado_generales').val("");
        $('#alcaldia_generales').val("");
        $('#colonia_generales').on('input', function () {
            this.value = this.value.replace(/[^a-zA-Z ñÑ]/g, '');
            this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);
        });
    } else {
        $('#estado_generales').prop('readonly', true);
        $('#alcaldia_generales').prop('readonly', true);
        $('#colonia_generales').replaceWith('<select name="colonia_generales" class="form-control break_size" id="colonia_generales"></select>');
        $('#codigo_p_alumno').val("");
        $('#estado_generales').val("");
        $('#alcaldia_generales').val("");
    }
});

/*   generacion curp */

const encontrar_vocales = () => {
    let vocales = $('#apellido_p_alumno').val();
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
    nombres = $('#nombre_alumno').val().toUpperCase().trim().split(/\s+/);
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
    let year = Number($("#fecha_nac_alumno").val().slice(2, 4));
    var CURP = [];
    CURP[0] = $("#apellido_p_alumno").val().charAt(0).toUpperCase();
    CURP[1] = encontrar_vocales();
    CURP[2] = $("#apellido_m_alumno").val().charAt(0).toUpperCase();
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
    CURP[5] = $("#fecha_nac_alumno").val().slice(5, 7);
    CURP[6] = $("#fecha_nac_alumno").val().slice(8, 10);
    CURP[7] = $("#sexo_alumno").val() == 1 ? "H" : $("#sexo_alumno").val() == 2 ? "M" : "";
    CURP[8] = abreviacion[estados.indexOf($("#lugar_nacimiento_alumno").val().toLowerCase())];
    CURP[9] = $("#apellido_p_alumno").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
    CURP[10] = $("#apellido_m_alumno").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
    CURP[11] = $("#nombre_alumno").val().slice(1).replace(/[aeiou]/gi, "").charAt(0).toUpperCase();
    let cambiar_caracter_final = CURP[9] + CURP[10] + CURP[11];
    CURP[9] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(0, 1).toUpperCase();
    CURP[10] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(1, 2).toUpperCase();
    CURP[11] = cambiar_caracteres_especiales(cambiar_caracter_final).slice(2, 3).toUpperCase();
    return CURP.join("");
}
$('#sexo_alumno').change(() => {
    $("#curp_alumno").val(generarCURP());
});

/* $('#periodos_revalidados_alumno').on('input', function () {
    if (this.value > 12) {
        this.value = 12;
    } else if (this.value < 1) {
        this.value = 1;
    }
}); */

$('#cb_revalidado').on('click', function () {
    if ($(this).is(':checked')) {
        $("#periodos_revalidados_alumno").prop('readonly', false);
        $("#periodos_revalidados_alumno").val(1);
    } else {
        $("#periodos_revalidados_alumno").prop('readonly', true);
        $("#periodos_revalidados_alumno").val(0);
    }
});