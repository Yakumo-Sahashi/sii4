let consulta = '';
let periodo = '';
let id_periodo = '';
const funcion = {"k_selec_mat":"update_seleccion_materias","k_ex_esp":"update_examenes_especiales_autodidactas","calc_prom":"calcular_promedios","status_alum":"update_estatus_alumnos","semestre_alum":"update_semestre_alumnos"};
// funcion para mantener la seccion de botones del kardex oculto
$("#seccion_act_materias_kardex").hide();

// funcion para obtener el periodo actual
const periodo_actual = async() =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo_actual");
    const ejecucion = new Consultas("CierreSemestre",datos);
    let resultado = await ejecucion.consulta();
    let {id_periodo_escolar,identificacion_corta} = resultado;
    periodo = identificacion_corta.toLowerCase();
    id_periodo = id_periodo_escolar;
}

// boton Actualizar materias en kardex, mostrara los siguientes 2 botones
$("#btn_act_materias_kardex").on('click',() =>{
    $("#seccion_act_materias_kardex").show();
});

// boton kardex de seleccion de materias
$("#btn_kardex_seleccion_materias").on('click',() =>{
    $("#titulo_modal").html(`Actualización del Kardex del Alumno del periodo ${periodo}`);
    $("#contenido_modal").html(`
        Este proceso se encarga de actualizar el Kardex del alumno agregando las materias cursadas en este periodo.
        <br><br>
        Este proceso puede tardar unos minutos, por favor, sea paciente. 
    `);
    consulta = 'k_selec_mat';
});
// schema -> t_historia_alumnos, sin que entren tipo de evaluacion 'EE', 'EA', 'RU', 'RC'

// boton kardex de exámenes especiales y autodidactas
$("#btn_kardex_ex_esp_autd").on('click',() =>{
    $("#titulo_modal").html(`Actualización del Kardex del Alumno del periodo ${periodo}`);
    $("#contenido_modal").html(`
        Este proceso se encarga de actualizar el Kardex del alumno agregando las materias cursadas en este periodo.
        <br><br>
        Este proceso puede tardar unos minutos, por favor, sea paciente.
    `);
    consulta = 'k_ex_esp';
});
// schema -> t_historia_alumnos, entra el tipo de evaluacion 'EE', 'EA'

// boton calcular promedios de alumnos
$("#btn_calcular_promedios").on('click',() =>{
    $("#titulo_modal").html(`Cálculo de promedios del periodo ${periodo}`);
    $("#contenido_modal").html(`
        <font color="#FF0000"> NOTA: </font> Para iniciar este proceso, primero se debe ejecutar la opción de <b>actualización de materias del Kardex</b>.
        <br><br>
        Este proceso se encarga de actualizar los promedios del periodo y los promedios acumulados por alumno.
        Al final de este proceso, la información generada se verá reflejada al consultar la boleta.
        <br>
        (Recordar que para poder imprimir la boleta, el periodo debe estar inactivo.)
        <br><br>
        Este proceso puede tardar unos minutos, por favor, sea paciente.
    `);
    $("#seccion_act_materias_kardex").hide();
    consulta = 'calc_prom';
});
// schema -> t_control_calificaciones_parciales, t_calificacion_final_periodo llenando acumulado historico

// boton actualizar estatus de alumnos
$("#btn_status_alumnos").on('click',() =>{
    $("#titulo_modal").html(`Actualización de estatus de alumnos del periodo ${periodo}`);
    $("#contenido_modal").html(`
        <font color="#FF0000"> NOTA: </font>Para iniciar este proceso, primero se debe de ejecutar la opción <b>cálculo de promedios</b>.
        <br><br>
        Este proceso se encarga de actualizar el estatus del alumno, dependiendo del desempeño del semestre.
        <br><br>
        Este proceso puede tardar unos minutos, por favor, sea paciente.
    `);
    $("#seccion_act_materias_kardex").hide();
    consulta = 'status_alum';
});
// schema -> t_alumno en el campo fk_cat_estatus omitir -> usar el 1 activo 

// boton actualizar semestre de alumnos
$("#btn_semestre_alumnos").on('click',() =>{
    $("#titulo_modal").html(`Actualizanción de semestres de alumnos del periodo ${periodo}`);
    $("#contenido_modal").html(`
        Este proceso se encarga de actualizar el semestre del alumno, tomando en cuenta su fecha de ingreso y el semestre en curso.
        <br><br>
        Este proceso puede tardar unos minutos, por favor, sea paciente.
    `);
    $("#seccion_act_materias_kardex").hide();
    consulta = 'semestre_alum';
});
// schema -> t_alumno en el campo semestre omitir

periodo_actual();

$("#btn_aceptar").on('click', () =>{
    let datos = new FormData();
    datos.append('id_periodo',id_periodo);
    datos.append('funcion',funcion[consulta]);
    const ejecucion = new Consultas("CierreSemestre",datos);
    ejecucion.insercion();
    $("#modal_mensaje").modal('hide');
});

// const tipo_evaluacion = (id_tipo_evaluacion) =>{
//     // if(id_tipo_evaluacion !=  1 && id_tipo_evaluacion != 8 && id_tipo_evaluacion != 14 && id_tipo_evaluacion != 15){
//     //     console.log("entra otros tipos de evaluaciones");
//     // }else{
//     //     console.log('este es especial');
//     // }

//     if(id_tipo_evaluacion ==  1 || id_tipo_evaluacion == 8){
//         console.log("entra evaluacion especial");
//     }else{
//         console.log('este es otra evaluacion');
//     }
// }