let input = ['fecha_atencion','carrera_atencion','minutos_turno_atencion','cantidad_alumnos_atencion','hora_inicio_atencion','hora_cierre_atencion','hora_inicio_comida','hora_cierre_comida'];

caracter_numeros('minutos_turno_atencion');
caracter_numeros('cantidad_alumnos_atencion');

$("#seccion_programar_fechas").hide();
$("#seccion_seguimiento_problemas").hide();

$("#op_programar_fechas").on('click',(e)=>{
    e.preventDefault();
    $("#seccion_opciones").hide();
    $("#seccion_programar_fechas").show();
    $("#seccion_seguimiento_problemas").hide();
});

$("#op_seguimiento_problemas").on('click',(e)=>{
    e.preventDefault();
    $("#seccion_opciones").hide();
    $("#seccion_programar_fechas").hide();
    $("#seccion_seguimiento_problemas").show();
});

$("#btn_atras_atencion").on('click',()=>{
    $("#seccion_opciones").show();
    $("#seccion_programar_fechas").hide();
    $("#seccion_seguimiento_problemas").hide();
});

$("#btn_atras_seguimiento").on('click',()=>{
    $("#seccion_opciones").show();
    $("#seccion_programar_fechas").hide();
    $("#seccion_seguimiento_problemas").hide();
});

const validar_fecha_calificacion = async (id_periodo) =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_fechas_periodo");
    datos.append('id_periodo',id_periodo);
    const ejecucion = new Consultas("HistorialAcademico",datos);
    let resultado = await ejecucion.consulta();
    let {fecha_inicio,fecha_termino} = resultado;
    $('#fecha_atencion').attr('max', fecha_termino);
    $('#fecha_atencion').attr('min', fecha_inicio);
    $('#fecha_atencion').on('input', () => {
        let fecha_teclado = $("#fecha_atencion").val();
        if(fecha_teclado <= fecha_inicio){
            $("#fecha_atencion").val(fecha_inicio);
        }else if(fecha_teclado >= fecha_termino){
            $("#fecha_atencion").val(fecha_termino);
        }
    });
}

const consultar_periodo = async() =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo");
    const ejecucion = new Consultas("InformacionCatalogos",datos);
    let resultado = await ejecucion.consulta();
    let{identificacion_corta,id_periodo_escolar} = resultado;
    $("#periodo_atencion").val(`${identificacion_corta}`);
    $("#fk_periodo_atencion").val(`${id_periodo_escolar}`);
    validar_fecha_calificacion(id_periodo_escolar);
}

const consultar_carrera = () =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_carrera");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('carrera_atencion','codigo_html');
}

consultar_carrera();
consultar_periodo();

const crear_fecha = () =>{
    let datos = new FormData($("#frm_programar_fecha")[0]);
    datos.append('funcion',"programar_fecha");
    console.log(datos);
}

$("#frm_programar_fecha").on('submit',(e)=>{
    e.preventDefault();
    if(validar_campo(input,'vacios')){
        if(limitar_valor('minutos_turno_atencion',0,91,"Ha sobrepasado el limite de minutos") && limitar_valor('cantidad_alumnos_atencion',0,51,"ha sobrepasado la cantidad de alumnos")){
            crear_fecha();
        }
    }
});

// los minutos no pueden ser mas de 100 (99)
// alumnos por turno no mas de 100 (99)
// hora inicial 7-22
// hora final 7-22
// hora de comida 7-22
// cantidad de horas no puede ser mas 100 (99), quiero cambiarlo 10hrs
