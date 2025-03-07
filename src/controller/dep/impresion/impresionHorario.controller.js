let input_impresionHorario = ['periodo','carrera'];

const obtener_periodos = () => {
    let datos = new FormData();
    datos.append('funcion', "obtener_periodos");
    const ejecucion = new Consultas("Examenes", datos);
    ejecucion.catalogo('periodo','codigo_html');  
}

const obtener_carrera = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('carrera','codigo_html');
}


$("#frm_horario_carrera").on('submit', (e) =>{
    if(validar_campo(input_impresionHorario,'vacios')){
        $("#frm_horario_carrera")[0].reset();
    }else{
        e.preventDefault();
    }
});

obtener_periodos();
obtener_carrera();
