let pagina_actual = 1, preguntas = [];
const respuestas = [];

const validar_respuestas = (inicio) => {
    let mensaje = ``, cont = 0;
    for(let i = 0; i < preguntas[inicio-1].length; i++){
        ++cont;
        if ($(`input[name=${preguntas[inicio-1][i]}]:checked`).length == 0) {
            mensaje = mensaje == '' ? `La pregunta No. ${inicio}, Docentente No. ${cont} no ha sido respondida!` : mensaje;
        }        
    }
    return mensaje == '' ?  true : msj_error(mensaje);
}

const mostrar_pagina_siguiente = () => {
    if(validar_respuestas(pagina_actual)){
        $(`#pagina_${pagina_actual}`).addClass('d-none')
        pagina_actual++;
        $(`#pagina_${pagina_actual}`).removeClass('d-none');
        if(pagina_actual > 1){
            $('#btn_pagina_anterior').removeClass('d-none');
        }else{
            $('#btn_pagina_anterior').addClass('d-none');
        }
    }

    if(pagina_actual >= 48){
        $('#btn_pagina_siguiente').addClass('d-none');
    }
}

const mostrar_pagina_anterior = () => {
    if(pagina_actual > 1){
        $(`#pagina_${pagina_actual}`).addClass('d-none')
        pagina_actual--;
        $(`#pagina_${pagina_actual}`).removeClass('d-none');
        if(pagina_actual <= 1){
            $('#btn_pagina_anterior').addClass('d-none'); 
        }
    }else{
        $('#btn_pagina_anterior').addClass('d-none');
    }

    if(pagina_actual < 48){
        $('#btn_pagina_siguiente').removeClass('d-none');
    }
}

const mostrar_preguntas = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion','obtener_preguntas'); 
    const ejecucion = new Consultas("EvaluacionDocente", datos);
    let respuesta = await ejecucion.consulta();
    let contenido = ``, i = 1, cont = 0;
    respuesta[0].map(({id_cat_preguntas,no_pregunta,pregunta} = examenes) => {
        preguntas.push([]);
        contenido += `
            <div class="${i > 1 ? 'd-none': ''}" id="pagina_${i}">
                <hr>
                <h2><b>${no_pregunta}.- ${pregunta}</b></h2>`;
                respuesta[1].map(({nombre,docente,id_personal,id_cat_materias} = docente) => {
                    preguntas[cont].push(`respuesta${id_cat_preguntas}_${id_cat_materias}_${id_personal}`);
                    contenido += `
                    <div class="row mt-3">
                        <div class="col-md-12 text-start">
                            <p class="h6 text-primary">Docente: <b>${docente}</b> | Materia: <b>${nombre}</b></p>
                        </div>
                        <div class="col-md-12">
                            <div class="radio">
                                <input type="radio" name="respuesta${id_cat_preguntas}_${id_cat_materias}_${id_personal}" id="TA${id_cat_preguntas}_${id_cat_materias}"  value="5">
                                <label for="TA${id_cat_preguntas}_${id_cat_materias}"> 5) Totalmente de acuerdo</label>

                                <input type="radio" name="respuesta${id_cat_preguntas}_${id_cat_materias}_${id_personal}" id="DA${id_cat_preguntas}_${id_cat_materias}" value="4">
                                <label for="DA${id_cat_preguntas}_${id_cat_materias}"> 4) De acuerdo</label>

                                <input type="radio" name="respuesta${id_cat_preguntas}_${id_cat_materias}_${id_personal}" id="IN${id_cat_preguntas}_${id_cat_materias}" value="3">
                                <label for="IN${id_cat_preguntas}_${id_cat_materias}"> 3) Indiferente</label>

                                <input type="radio" name="respuesta${id_cat_preguntas}_${id_cat_materias}_${id_personal}" id="ED${id_cat_preguntas}_${id_cat_materias}" value="2">
                                <label for="ED${id_cat_preguntas}_${id_cat_materias}"> 2) En desacuerdo</label>

                                <input type="radio" name="respuesta${id_cat_preguntas}_${id_cat_materias}_${id_personal}" id="AD${id_cat_preguntas}_${id_cat_materias}" value="1">
                                <label for="AD${id_cat_preguntas}_${id_cat_materias}"> 1) Altamente en desacuerdo</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>`;
                });
        contenido +=` ${i== 48 ? `<div class="row justify-content-center mb-5">
        <div class="col">
             <button type="submit" class="btn btn-primary btn-lg">Finalizar Evaluacion <i class="fa-solid fa-check"></i></button>
         </div></div>`: '' }
        </div>
        `;
        i++;
        cont++;
    });
    contenido += `
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" id="btn_pagina_anterior" onclick="mostrar_pagina_anterior()" class="btn btn-secondary d-none text-white">Anterior</button>
                    <button type="button" id="btn_pagina_siguiente" onclick="mostrar_pagina_siguiente()" class="btn btn-primary">Siguiente</i></a>
                </div>
            </div>
        </div>
    `;
    respuesta[1].map(({nombre,docente,id_personal,id_cat_materias} = docente) => {
        respuestas.push({'docente':id_personal,'materia':id_cat_materias,'respuestas':''});
    });
    $(`#cuestionario`).html(contenido);
    bootstrap.Itma2.end_loader();       
}

const validar_registros_evaluacion = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion','consultar_evaluacion'); 
    const ejecucion = new Consultas("EvaluacionDocente", datos);
    let respuesta = await ejecucion.consulta();
    if(respuesta[0] == 1){
        $(`#cuestionario`).html(`
            <h1 class="mt-5 text-primary">${respuesta[1]} <i class="fa-regular fa-clock"></i></h1>
        `);
    }else{
        mostrar_preguntas();
    }
    bootstrap.Itma2.end_loader();       
}

const comprobar_fechas = (fecha_inicio,fecha_fin) =>{
    let currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
    let day = ('0' + currentDate.getDate()).slice(-2);
    let formattedDate = year + '-' + month + '-' + day;

    let fecha_actual = new Date(formattedDate);
    let fecha_evaluacion = new Date(fecha_inicio);
    let fecha_fin_evaluacion = new Date(fecha_fin);

    if (fecha_actual.getTime() >= fecha_evaluacion.getTime()) {
        if(fecha_actual.getTime() > fecha_fin_evaluacion.getTime()){
            $(`#cuestionario`).html(`
                <h1 class="mt-5 text-primary">La evaluacion docente ha terminado <i class="fa-regular fa-clock"></i></h1>
                <h3 class="mt-4 text-danger" >Fecha de termino: ${fecha_fin}</h3>
            `);
        }else{
            validar_registros_evaluacion();
        }
    } else {
        $(`#cuestionario`).html(`
            <h1 class="mt-5 text-primary">Aun no es hora de la evaluacion docente <i class="fa-regular fa-clock"></i></h1>
            <h3 class="mt-4 text-danger" >Fecha de inicio: ${fecha_inicio}</h3>
        `);
    }
    console.log(fecha_actual)
    console.log(fecha_fin_evaluacion)
}

const verificar_fecha = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion','obtener_fecha'); 
    const ejecucion = new Consultas("EvaluacionDocente", datos);
    let respuesta = await ejecucion.consulta();
    if(respuesta[0] == 1){
        let {fecha_inicio,fecha_fin} = respuesta[1];
        comprobar_fechas(fecha_inicio,fecha_fin);
    }else{
        $(`#cuestionario`).html(`
            <h1 class="mt-5 text-primary">${respuesta[1]} <i class="fa-regular fa-clock"></i></h1>
        `);
    }
    bootstrap.Itma2.end_loader();       
}

const enviar_evaluacion = async () => {
    bootstrap.Itma2.start_loader();
    preguntas.map( pregunta => {
        let cont = 0
        pregunta.map( individual => {
            respuestas[cont]['respuestas']+=$(`input[name=${individual}]:checked`).val()+',';
            cont++;
        });
    });
    let datos = new FormData();
    datos.append('funcion',"registrar_evaluacion");
    datos.append('encuesta', JSON.stringify(respuestas));
    const ejecucion = new Consultas("EvaluacionDocente",datos);
    let respuesta = await ejecucion.insertar();
    bootstrap.Itma2.end_loader();
    if (respuesta[0] == "1") {
        $('#frm_evaluacion_docente').html(`
            <h1>Evaluacion Docente completada!</>
        `);
        msj_exito(respuesta[1]);       				
    } else {
        msj_error(`Se ha prensentado un error:\n${respuesta[1]}\nPor favor intentalo de nuevo.`);
    }
}

$(document).ready(() => {
    verificar_fecha();    
    $('#frm_evaluacion_docente').on('submit', (e) => {
        e.preventDefault();
        if(validar_respuestas(48)){
            enviar_evaluacion();   
        }
    });
});