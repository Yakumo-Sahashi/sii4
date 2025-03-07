caracter_numeros('recibo_pago_inscripcion');

const obtener_periodos = async ()=>{
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('seleccion_periodo_inscripcion','codigo_html');
}

const realizar_autorizacion = () =>{
    let datos = new FormData($("#frm_autorizar_inscripcion")[0]);
    datos.append('funcion','acutorizacion_inscripcion');
    const ejecucion = new Consultas('AutorizacionesAcademicas',datos);
    ejecucion.insercion();
    $("#frm_autorizar_inscripcion")[0].reset();
}

obtener_periodos();

$(document).ready(() => {
    $('#frm_autorizar_inscripcion').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['seleccion_periodo_inscripcion','numero_control_inscripcion','recibo_pago_inscripcion'],'vacios')){
            realizar_autorizacion();   
        }
    });
});