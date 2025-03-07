let total_actual= 0;//variable para llevar conteo de horas asignadas
let aulas = new Array();
let horas_totales_horario = 0;
let ids_actuales = [];
caracter_numeros('capacidad_actualizar');
caracter_mayus('grupo_actualizar');

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const select = new Consultas("InformacionCatalogos", datos);
    select.catalogo('carrera_reticula','codigo_html');
}

const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('periodo','codigo_html');  
}

const obtener_aula = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_aula");
    const ejecucion = new Consultas("Horarios", datos);
    for(let i = 0; i < 7; i++){
        ejecucion.catalogo(`aula${i}`,'codigo_html');
    }
}

const filtrar_contenido = async ()=> {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_horario_grupos_contenido`).html(``);  
    $('#tabla_horario_grupos').DataTable().destroy();
    let datos = new FormData($('#frm_actualizar_horario_grupo')[0]);
    datos.append('funcion','consultar_horarios');
    const ejecucion = new Consultas('ListadoHorario',datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(horario => {
        let {id_horario,lunes,martes,miercoles,jueves,viernes,sabado,nombre,nombre_grupo,capacidad,id_grupo,paralelo_de,docente} =  horario;
        tabla += `
        <tr> 
            <td class="align-middle text-small text-start">${nombre}</td>
            <td class="align-middle text-small">${nombre_grupo}</td>
            <td class="align-middle text-small">${capacidad}</td>
            <td class="align-middle text-small">${docente}</td>
            <td class="align-middle text-small">${lunes}</td>
            <td class="align-middle text-small">${martes}</td>
            <td class="align-middle text-small">${miercoles}</td>
            <td class="align-middle text-small">${jueves}</td>
            <td class="align-middle text-small">${viernes}</td>
            <td class="align-middle text-small">${sabado}</td>
            <td class="align-middle text-small">
                ${paralelo_de == 'NP' ? `No` : `<b class="text-primary">${paralelo_de}</b>`}
            </td>
            <td class="align-middle text-small"> ${paralelo_de == 'NP' ? `<button class="btn btn-outline-primary btn-sm"" title="Editar" onclick="editar_horario(${id_grupo})"><i class="fa-solid fa-pen-to-square"></i></button>` : `<i class="fa-solid fa-ban text-danger"></i>`}</td>
            <td class="align-middle text-small"><button class="btn btn-outline-danger btn-sm"" title="Eliminar" onclick="eliminar_horario(${id_grupo})"><i class="fa-solid fa-trash"></i></button></td>
        </tr>`;
    });
    $(`#tabla_horario_grupos_contenido`).html(`${tabla}`);  
    $('#tabla_horarios_m').removeClass('d-none');
    $('#tabla_horario_grupos').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader(); 
}

const editar_horario = async (id) =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion', "precargar_horario");
    datos.append('id',id);
    const ejecucion = new Consultas('Horarios',datos);
    let respuesta = await ejecucion.consulta();
    bootstrap.Itma2.end_loader();
    let contenido = ``;
    let {lunes,martes,miercoles,jueves,viernes,sabado,creditos_totales,id_grupo,nombre_completo_materia,nombre_grupo,capacidad,exclusivo_carrera,fk_cat_materias} = respuesta[0];
    $('[name=materia_actualizar]').val(nombre_completo_materia);
    $('[name=id_materia_actualizar]').val(fk_cat_materias);
    $('[name=grupo_actualizar]').val(nombre_grupo);
    $('[name=id_actualizar_grupo]').val(id_grupo);
    $('[name=capacidad_actualizar]').val(capacidad);
    $('#total_horas').text(`Hrs totales: ${creditos_totales}`);
    horas_totales_horario = parseInt(creditos_totales);
    $('#contador_horas').text(`Horas por asignar: ${creditos_totales}`);
    if(exclusivo_carrera != 0){
        $("#materia_exclusiva_act").prop("checked", true);
    }else {
        $("#materia_exclusiva_act").prop("checked", false);              
    }
    lunes = lunes.split('-');
    martes = martes.split('-');
    miercoles = miercoles.split('-');
    jueves = jueves.split('-');
    viernes = viernes.split('-');
    sabado = sabado.split('-');
    ids_actuales = [lunes[3],martes[3],miercoles[3],jueves[3],viernes[3],sabado[3]];
    contenido += `
        <tr>
            <th>Inicial</th>
            <th>${lunes[0]}</th>
            <th>${martes[0]}</th>
            <th>${miercoles[0]}</th>
            <th>${jueves[0]}</th>
            <th>${viernes[0]}</th>
            <th>${sabado[0]}</th>
        </tr>
        <tr>
            <th>Final</th>
            <th>${lunes[1]}</th>
            <th>${martes[1]}</th>
            <th>${miercoles[1]}</th>
            <th>${jueves[1]}</th>
            <th>${viernes[1]}</th>
            <th>${sabado[1]}</th>
        </tr>
        <tr>
            <th>Aula</th>
            <th>${lunes[2]}</th>
            <th>${martes[2]}</th>
            <th>${miercoles[2]}</th>
            <th>${jueves[2]}</th>
            <th>${viernes[2]}</th>
            <th>${sabado[2]}</th>
        </tr>
    `;
    $('#tabla_horario_contenido').html(contenido);
    $('#lista_horarios_seleccion').addClass('d-none');
    $('#editar_horario_grupo_select').removeClass('d-none');
};

/* --------------------- inico edicion de horas ---------------------- */

//funcion para obtener la disponibilidad de un aula en el dia y horario seleccionado
const obtener_disponibilidad = async (aula, dia, hora_inicio, hora_fin, id) => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion', "obtener_disponibilidad_act");
    datos.append('aula',`${aula}`);
    datos.append('dia',`${dia}`);
    datos.append('hora_inicio',`${hora_inicio}`);
    datos.append('hora_fin',`${hora_fin}`);
    datos.append('actual_id',JSON.stringify(ids_actuales));
    const ejecucion = new Consultas('Horarios',datos);
    let respuesta = await ejecucion.consulta();
    bootstrap.Itma2.end_loader();
    if(respuesta != "1")	{
        msj_error("El aula seleccionada no esta disponible en el horario ingresado!");
        $('#aula' + id).val("");                    
    }		
}
//funciones change para detectar la hora iniciar de la clase cada, funcion es para un dia de la semana
$('#hora_inicio1').bind('change', () => {
    actualizar_hora_final($('#hora_inicio1').val(), 1);
    contar_horas_seleccionadas(1);
    $('#aula1').val("");
    $('#aula1').prop('disabled', true);
});

$('#hora_inicio2').bind('change', () => {
    actualizar_hora_final($('#hora_inicio2').val(), 2);
    contar_horas_seleccionadas(2);
    $('#aula2').val("");
    $('#aula2').prop('disabled', true);
});

$('#hora_inicio3').bind('change', () => {
    actualizar_hora_final($('#hora_inicio3').val(), 3);
    contar_horas_seleccionadas(3);
    $('#aula3').val("");
    $('#aula3').prop('disabled', true);
});

$('#hora_inicio4').bind('change', () => {
    actualizar_hora_final($('#hora_inicio4').val(), 4);
    contar_horas_seleccionadas(4);
    $('#aula4').val("");
    $('#aula4').prop('disabled', true);
});

$('#hora_inicio5').bind('change', () => {
    actualizar_hora_final($('#hora_inicio5').val(), 5);
    contar_horas_seleccionadas(5);
    $('#aula5').val("");
    $('#aula5').prop('disabled', true);
});

$('#hora_inicio6').bind('change', () => {
    actualizar_hora_final($('#hora_inicio6').val(), 6);
    contar_horas_seleccionadas(6);
    $('#aula6').val("");
    $('#aula6').prop('disabled', true);
});

//funciones change para detectar la hora de finalizacion de clase, cada funcion es para un dia de la semana
$('#hora_fin1').bind('change', () => {
    contar_horas_seleccionadas(1);
    if($('#hora_fin1').val() != ""){
        $('#aula1').val("");
        $('#aula1').prop('disabled', false);
    }else{
        $('#aula1').val("");
        $('#aula1').prop('disabled', true);
    }
});

$('#hora_fin2').bind('change', () => {
    contar_horas_seleccionadas(2);
    if($('#hora_fin2').val() != ""){
        $('#aula2').val("");
        $('#aula2').prop('disabled', false);
    }else{
        $('#aula2').val("");
        $('#aula2').prop('disabled', true);
    }
});

$('#hora_fin3').bind('change', () => {
    contar_horas_seleccionadas(3);
    if($('#hora_fin3').val() != ""){
        $('#aula3').val("");
        $('#aula3').prop('disabled', false);
    }else{
        $('#aula3').val("");
        $('#aula3').prop('disabled', true);
    }
});

$('#hora_fin4').bind('change', () => {
    contar_horas_seleccionadas(4);
    if($('#hora_fin4').val() != ""){
        $('#aula4').val("");
        $('#aula4').prop('disabled', false);
    }else{
        $('#aula4').val("");
        $('#aula4').prop('disabled', true);
    }
});

$('#hora_fin5').bind('change', () => {
    contar_horas_seleccionadas(5);
    if($('#hora_fin5').val() != ""){
        $('#aula5').val("");
        $('#aula5').prop('disabled', false);
    }else{
        $('#aula5').val("");
        $('#aula5').prop('disabled', true);
    }
});

$('#hora_fin6').bind('change', () => {
    contar_horas_seleccionadas(6);
    if($('#hora_fin6').val() != ""){
        $('#aula6').val("");
        $('#aula6').prop('disabled', false);
    }else{
        $('#aula6').val("");
        $('#aula6').prop('disabled', true);
    }
});
//funciones change para detectar la hora de finalizacion de clase, cada funcion es para un dia de la semana
$('#aula1').bind('change', () => {
    obtener_disponibilidad($('#aula1').val(), "lunes", $('#hora_inicio1').val(), $('#hora_fin1').val(), 1);
});

$('#aula2').bind('change', () => {
    obtener_disponibilidad($('#aula2').val(), "martes", $('#hora_inicio2').val(), $('#hora_fin2').val(), 2);
});

$('#aula3').bind('change', () => {
    obtener_disponibilidad($('#aula3').val(), "miercoles", $('#hora_inicio3').val(), $('#hora_fin3').val(), 3);
});

$('#aula4').bind('change', () => {
    obtener_disponibilidad($('#aula4').val(), "jueves", $('#hora_inicio4').val(), $('#hora_fin4').val(), 4);
});

$('#aula5').bind('change', () => {
    obtener_disponibilidad($('#aula5').val(), "viernes", $('#hora_inicio5').val(), $('#hora_fin5').val(), 5);
});

$('#aula6').bind('change', () => {
    obtener_disponibilidad($('#aula6').val(), "sabado", $('#hora_inicio6').val(), $('#hora_fin6').val(), 6);
});
//funcion para actualizar las horas finales de la clase en base a la seleccion de la hora de inicio
const actualizar_hora_final = (inicio, fin) => { 
    inicio = parseInt(inicio) + 1;       
    let opciones = '<option value="">--:--</option>';
    for (let i = inicio; i < (22); i++) {
        if(i >= (inicio+4)){
            continue;
        }
        if (i < 10) {
            opciones = opciones + '<option value="0' + i + ':00">0' + i + ':00</option>';
        } else {
            opciones = opciones + '<option value="' + i + ':00">' + i + ':00</option>';
        }
    }         
    $('#hora_fin' + fin).html(opciones);
    if($('#hora_inicio' + fin).val() == ""){
        $('#aula' + fin).val("");
        $('#aula' + fin).prop('disabled', true);
        $('#aula' + fin).val("");
    }
};
//funcion para contar el numero de horas que se aignan por dia
const contar_horas_seleccionadas = (dia) => {   
    let horas_por_dia = $('#hora_inicio' + dia).val() != "" &&  $('#hora_fin' + dia).val() != "" ? parseInt($('#hora_fin' + dia).val()) - parseInt($('#hora_inicio' + dia).val()) : "";
    $('#horas_dia' + dia).val(horas_por_dia);
    contador_horas_materia(dia);
}
//funcion para obtener y validar la ca|ntidad de horas aignadas no pueden ser mayor a la cantidad de horas disponibles
const contador_horas_materia = (dia) => {
    let asignadas = 0;
    for (let i = 1; i < 7; i++){
        if(/[0-9]/.test($('#horas_dia' + i).val())){
            asignadas += parseInt($('#horas_dia' + i).val());
        }          
    }
    let calcular = horas_totales_horario - asignadas;
    let total =  calcular < 1 ? "<b>Horas por asignar: 0</b>" : "<b>Horas por asignar: " + calcular + "</b>";   
    if(calcular == 0){
        total_actual = calcular;
        $('#contador_horas').removeClass("alert-success").addClass("alert-danger");
        $('#contador_horas').removeClass("border-success").addClass("border-danger");
        $('#contador_horas').html(total);
    }else if(calcular < 0){        
        msj_error("Tienes " + total_actual + "hr(s) disponible(s) para asignar!\n Por favor intentalo de nuevo." );
        actualizar_hora_final("", dia);         
        $('#horas_dia' + dia).val("");
        contador_horas_materia(dia);
        $('#hora_inicio' + dia).val("");
        $('#aula' + dia).val("");
        $('#aula' + dia).prop('disabled', true);
    }else{
        total_actual = calcular;
        $('#contador_horas').html(total);
        $('#contador_horas').removeClass("alert-danger").addClass("alert-success");
        $('#contador_horas').removeClass("border-danger").addClass("border-success");         
    }
}
//funcion para evaluar si se asigno un aula a los dias que tienen un horario asignado
const validar_total = () => {
    aulas = new Array();
    let total = 0, horas_totales = horas_totales_horario;
    for (let i = 1; i < 7; i++) {
        if($('#horas_dia' + i).val() != ""){
            aulas.push(`aula${i}`);
            total +=  parseInt($('#horas_dia' + i).val());
        }
    }
    if (total != horas_totales) {
        msj_error("Debes asignar un total de " + horas_totales + " hrs.");
        return false;
    } else {
        return true;
    }
}

//funcion para reiniciar el conteo de horas asignadas
const reiniciar_contenido_tabla = () => {
    $('#contador_horas').removeClass("alert-danger").addClass("alert-success");
    $('#contador_horas').removeClass("border-danger").addClass("border-success");
    ids_actuales = [];
    horas_totales_horario = 0;
    for(let i = 1; i < 7; i++){
        actualizar_hora_final("", i);
        $(`[name=horas_dia${i}`).val("");
        $(`[name=hora_inicio${i}`).val("");
        $(`[name=hora_fin${i}`).prop('disabled', true);
        $(`[name=aula${i}`).val("");
        $(`[name=aula${i}`).prop('disabled', true);
    }
}

const actualizar_horario_actual = async() => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_act_horario')[0]);
    datos.append("funcion","actualizar_horario");
    datos.append('actual_id',JSON.stringify(ids_actuales));
    const ejecucion = new Consultas("Horarios", datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader();
    if(respuesta[0] == '1'){
        $('#frm_act_horario')[0].reset();
        reiniciar_contenido_tabla();
        filtrar_contenido();
        obtener_aula();
        $('#lista_horarios_seleccion').removeClass('d-none');
        $('#editar_horario_grupo_select').addClass('d-none');
        msj_exito(respuesta[1]);
    }else{
        msj_error(respuesta[1]);
    }
}

/* --------------------- fin edicion de horas ---------------------- */

const eliminar_horario = (id_grupo) => {
    swal({
        title: "Desea eliminar el horario seleccionado?",
        text: `Una vez eliminado no se podra recuperar`,
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
    }).then(borrar => {
        if (borrar) {
            let datos = new FormData();
            datos.append('funcion','eliminar_horario');
            datos.append('id_grupo', `${id_grupo}`);
            const ejecucion = new Consultas("ListadoHorario", datos);
            ejecucion.insercion();
            filtrar_contenido();
        }
    });		
}

obtener_carrera();
obtener_periodos();
obtener_aula(); 

$('#btn_cancelar_act').on('click',() => {
    reiniciar_contenido_tabla();
    $('#lista_horarios_seleccion').removeClass('d-none');
    $('#editar_horario_grupo_select').addClass('d-none');
});

$(document).ready(() => {
    $('#frm_actualizar_horario_grupo').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['carrera_reticula','semestre'],'vacios')){
            filtrar_contenido();
        }
    });

    $('#frm_act_horario').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['grupo_actualizar','capacidad_actualizar'],'vacios')){
            if(validar_total()){
                if(validar_campo(aulas,"vacios", "Debes asignar un aula a todos los dias designados para clase.")){
                    actualizar_horario_actual();
                }
            }
        }
    });
});
