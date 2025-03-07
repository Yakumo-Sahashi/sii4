let input_horarios = [];

const mostrar_personal = async ()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerPersonal');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_personal','codigo_html');
}

const toTimestamp = (time) => {
    if (!time || time === '00:00:00') return null;
    let [hours, minutes, seconds] = time.split(":").map(Number);
    let date = new Date();
    date.setHours(hours, minutes, seconds, 0);
    return date.getTime();
}

// Función para calcular estado de entrada
const calcularEstadoEntrada = (entrada, horaEntradaAsignada) => {
    if (entrada === null || horaEntradaAsignada === null) return "Falta";
    let diffEntrada = (entrada - horaEntradaAsignada) / 60000; // Convertir a minutos
    if (diffEntrada <= 0 || diffEntrada <= 10) return `<span class="text-success">OK</span>`;
    if (diffEntrada <= 20) return `<span class="text-primary">Retardo</span>`;
    if (diffEntrada <= 30) return `<span class="text-warning">Retardo Mayor</span>`;
    return `<span class="text-danger">Falta</span>`;
}

// Función para calcular estado de salida
const calcularEstadoSalida = (salida, horaSalidaAsignada) => {
    if (salida === null) return `<span class="text-danger">No registrada</span>`;
    let diffSalida = (salida - horaSalidaAsignada) / 60000; // Convertir a minutos
    if (diffSalida >= 0 || diffSalida >= -10) return `<span class="text-success">OK</span>`;
    return `<span class="text-warning">Salida Anticipada</span>`;
}

const mostrar_incidencias = async ()=>{
    bootstrap.Itma2.start_loader();
    $(`#tabla_incidencias`).html(``);  
    $('#table_created_rooms').DataTable().destroy();
    let datos = new FormData();
    datos.append('fecha_inicio',$(`[name=fecha_inicio]`).val());
    datos.append('fecha_fin',$(`[name=fecha_fin]`).val());
    datos.append('funcion','revisar_incidencias');
    const ejecucion = new Consultas("RhHorarios", datos);
    let respuesta = await ejecucion.insertar();
    let tabla = ``;
    respuesta.map(registro => {
        let {nombre_persona,apellido_paterno,apellido_materno,fecha,entrada,salida,dia,checador_id,hora_inicio,hora_fin} =  registro;
        let entrada_val = toTimestamp(entrada);
        let salida_val = toTimestamp(salida);
        let horaEntradaAsignada = toTimestamp(hora_inicio);
        let horaSalidaAsignada = toTimestamp(hora_fin);

        let estadoEntrada = calcularEstadoEntrada(entrada_val, horaEntradaAsignada);
        let estadoSalida = calcularEstadoSalida(salida_val, horaSalidaAsignada);
        tabla += `
        <tr> 
            <td>${checador_id}</td>
            <td>${nombre_persona} ${apellido_paterno} ${apellido_materno}</td>
            <td>${dia}</td>
            <td>${fecha}</td>
            <td>${entrada}</td>
            <td>${estadoEntrada}</td>
            <td>${salida === "00:00:00" ? `<span class="text-danger"> --:--:-- </span>` : salida}</td>
            <td>${estadoSalida}</td>
        </tr>`;
    });
    $(`#tabla_incidencias`).html(tabla);  
    $('#table_created_rooms').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    $("#btn_excel").removeClass("d-none");
    bootstrap.Itma2.end_loader();
}

const cargar_archivo = async () =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData($("#frm_incidencias")[0]);
    datos.append('funcion','insercion_registro');
    const ejecucion = new Consultas("RhHorarios", datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader();
    mostrar_incidencias();
}


$('#btn_reiniciar').on('click',() => {
    $("#frm_incidencias")[0].reset();
    $(`#tabla_incidencias`).html(``);  
    $('#table_created_rooms').DataTable().destroy();  
    $('#table_created_rooms').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    $("#btn_excel").addClass("d-none");
    msj_exito("Formulario reiniciado!");
});

$(document).ready(() => {
    $('#frm_incidencias').on('submit', (e) => {
        let btn = document.activeElement.id;
        e.preventDefault();
        if(validar_campo(['fecha_inicio','fecha_fin','archivo'],'vacios')){
            if( btn == "btn_inicar_proceso"){
                cargar_archivo();
            }else{
                e.target.submit();
            } 
        }
    });
});