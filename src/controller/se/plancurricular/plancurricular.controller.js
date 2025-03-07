let actualizar_materia_dt = ['clave_oficial_actualizar','select_especialidad_actualizar','orden_certificado_actualizar','estatus_materia_actualizar','horas_teoricas_actualizar','horas_practicas_actualizar','creditos_totales_actualizar','creditos_prerrequisito_actualizar'];

let agregar_materia = ['area_academica','materia','clave_oficial','select_especialidad_agregar','orden_certificado','estatus_materia','horas_teoricas','horas_practicas','creditos_totales','creditos_prerrequisito','nivel_escolar','tipo_materia','nombre_completo','nombre_abreviado','clasificacion_acredi'];
caracter_numeros('orden_certificado_actualizar');
caracter_numeros('horas_teoricas_actualizar');
caracter_numeros('horas_practicas_actualizar');
caracter_numeros('creditos_totales_actualizar');
caracter_numeros('creditos_prerrequisito_actualizar');
caracter_mayus('clave_oficial_actualizar');

caracter_numeros('orden_certificado');
caracter_numeros('horas_teoricas');
caracter_numeros('horas_practicas');
caracter_numeros('creditos_totales');
caracter_numeros('creditos_prerrequisito');
caracter_numeros('clasificacion_acredi');

caracter_mayus('clave_oficial');
caracter_mayus('nombre_completo');
caracter_mayus('nombre_abreviado');

const obtener_tipo_materia = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_tipo_materia");
    const ejecucion = new Consultas("Materias", datos);
    ejecucion.catalogo('tipo_materia','codigo_html');
}

const obtener_carrera = ()=> {  
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('select_carrera','codigo_html');
}

const obtener_especialidad = (carrera) => {  
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion', "consultar_especialidad");
    datos.append('carrera_reticula', `${carrera}`);
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('select_especialidad','codigo_html');  
    ejecucion.catalogo('select_especialidad','codigo_html');  
    bootstrap.Itma2.end_loader();
}

const obtener_especialidad_materia = (carrera) => {  
    let datos = new FormData();
    datos.append('funcion', "consultar_especialidad_materia");
    datos.append('carrera_reticula', `${carrera}`);
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('select_especialidad_actualizar','codigo_html');  
    ejecucion.catalogo('select_especialidad_agregar','codigo_html');  
}

const obtener_area_academica = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_area_academica");
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('area_academica','codigo_html');  
}

const obtener_materias_area = () => {
    let id = $('[name=select_carrera]').val();
    let datos = new FormData();
    datos.append('funcion', "consultar_materias_area");
    datos.append('carrera',id);
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('materia','codigo_html');  
}

const precargar_materia = async (id) =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"precargar_materia");
    datos.append('materia',id);
    const ejecucion = new Consultas("PlanCurricular",datos);
    let resultado = await ejecucion.consulta();
    let {id_cat_materias,clave_oficial,nombre_completo_materia,creditos_teorica,creditos_practica,creditos_totales,creditos_prerequisitos,orden_certificado,fk_cat_especialidad,estatus_materias_carrera,descripcion} = resultado;
    $('[name=id_materia]').val(id_cat_materias);
    $('[name=materia_actualizar]').val(nombre_completo_materia);
    $('[name=area_academica_actualizar]').val(descripcion);
    $('[name=clave_oficial_actualizar]').val(clave_oficial);
    $('[name=select_especialidad_actualizar]').val(fk_cat_especialidad);
    $('[name=orden_certificado_actualizar]').val(orden_certificado);
    $('[name=estatus_materia_actualizar]').val(estatus_materias_carrera);
    $('[name=horas_teoricas_actualizar]').val(creditos_teorica);
    $('[name=horas_practicas_actualizar]').val(creditos_practica);
    $('[name=creditos_totales_actualizar]').val(creditos_totales);
    $('[name=creditos_prerrequisito_actualizar]').val(creditos_prerequisitos);
    $('#editar_materia_modal').modal('show');
    bootstrap.Itma2.end_loader();
}

const seleccionar_materia = (espacio) => {
    obtener_materias_area();
    $('[name=id_espacio]').val(espacio);
    $('#frm_agregar_materia')[0].reset();
    $('#btn_agregar_amateria_plan').addClass('disabled');
    $('#agregar_materia_modal').modal('show');
}

const asiganar_materia = () => {
    let datos = new FormData();
    let materia = $('[name=materia]').val();
    let id = $('[name=id_espacio]').val();

    $(`[data-id=${id}]`).html(`
        <div class="mt-1">
            ${$('[name=nombre_abreviado]').val()}<br>
            <b>${ $('[name=clave_oficial]').val()}</b>
            <br>
            ${ $('[name=horas_teoricas]').val()}-${$('[name=horas_practicas]').val()}-${ $('[name=creditos_totales]').val()}
        </div>
    `);

    $(`[data-id=${id}]`).attr('onclick',`precargar_materia(${$('[name=id_materia]').val()})`);
    $(`[data-id=${id}]`).addClass('p-1 text-center border cuadricula text-small sin-scroll  bg-cuadricula-azul');
    $(`[data-id=${id}]`).attr('data-id',$('[name=id_materia]').val());

    datos.append('funcion', "actualizar_plan_materia");
    datos.append('materia', materia);
    datos.append('ubicar', id);
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.insercion();
    $('#frm_agregar_materia')[0].reset();
    $('#agregar_materia_modal').modal('hide');
}

const precargar_materia_seleccionada = async (id) =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"precargar_materia_add");
    datos.append('materia',id);
    const ejecucion = new Consultas("PlanCurricular",datos);
    let resultado = await ejecucion.consulta();
    let {id_cat_materias,clave_oficial,clave,nombre_completo_materia,nombre_abreviado_materia,creditos_teorica,creditos_practica,creditos_totales,creditos_prerequisitos,orden_certificado,fk_cat_especialidad,estatus_materias_carrera,fk_cat_organigrama,fk_cat_tipo_materia,nivel_escolar} = resultado;
    $('[name=id_materia]').val(id_cat_materias);
    $('[name=area_academica]').val(fk_cat_organigrama);
    $('[name=clave_oficial]').val(clave_oficial);
    $('[name=clave]').val(clave);
    $('[name=select_especialidad_agregar]').val(fk_cat_especialidad);
    $('[name=orden_certificado]').val(orden_certificado);
    $('[name=estatus_materia]').val(estatus_materias_carrera);
    $('[name=horas_teoricas]').val(creditos_teorica);
    $('[name=horas_practicas]').val(creditos_practica);
    $('[name=creditos_totales]').val(creditos_totales);
    $('[name=creditos_prerrequisito]').val(creditos_prerequisitos);
    $('[name=nivel_escolar]').val(nivel_escolar);
    $('[name=tipo_materia]').val(fk_cat_tipo_materia);
    $('[name=nombre_completo]').val(nombre_completo_materia);
    $('[name=nombre_abreviado]').val(nombre_abreviado_materia);
    $('[name=clasificacion_acredi]').val('N/A');
    bootstrap.Itma2.end_loader();
}

const obtener_plan_curricular = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_consulta')[0]);
    datos.append('funcion',"obtener_movimientos");
    const ejecucion = new Consultas("PlanCurricular",datos);
    let resultado = await ejecucion.consulta();
    let cont = 0, temp = 1;
    let contenido = ``;
    const semestres = [];
    for(let i = 1; i < 10; i++){
        semestres[i] = new Array();
        for(let j = 1 ; j < 10; j++){
            semestres[i][j] = '';
        }
    }
    resultado.map(({semestre,renglon} = reticula_carrera) =>{
        semestres[semestre][renglon] = resultado[cont];
        cont++;
    });
    cont = 0;
    semestres.map(materias_plan => {
        if(materias_plan != ''){
            materias_plan.map(({id_cat_materias,clave,nombre_abreviado_materia,creditos_teorica,creditos_practica,creditos_totales} = info) =>{
                if(nombre_abreviado_materia != undefined){
                contenido += `
                    <div data-id="${id_cat_materias}" class="p-1 text-center border cuadricula text-small sin-scroll  bg-cuadricula-azul align-middle" onclick="precargar_materia(${id_cat_materias})">
                        <div class="mt-1">
                            ${nombre_abreviado_materia}<br>
                            <b>${clave}</b>
                            <br>
                            ${creditos_teorica}-${creditos_practica}-${creditos_totales}
                        </div>
                    </div>
                `;
                }else{
                    contenido +=`
                    <div data-id="s-${temp}-${cont}" class="p-1 text-center border cuadricula small sin-scroll align-middle" onclick="seleccionar_materia('s-${temp}-${cont}')">
                        <div class="mt-4">
                            Seleccionar materia
                        </div>
                    </div>
                `;
                }
                cont++;
            });
            /* for(let i = cont; i < 10; i++){
                contenido +=`
                    <div data-id="s-${temp}-${i}" class="p-1 text-center border cuadricula small sin-scroll " onclick="seleccionar_materia('s-${temp}-${i}')">
                        <div class="mt-4">
                            Seleccionar materia
                        </div>
                    </div>
                `;
            } */
            cont = 0;
            $(`#seccion_materias_${temp}`).html(contenido);
            contenido = ``;
            temp ++;
        }
    });
    $('#carrera_elegida').text($('select[name="select_carrera"] option:selected').text());
    $('#especialidad_elegida').text($('select[name="select_especialidad"] option:selected').text());
    $('#seccion_consulta').addClass('d-none');
    $('#seccion_tabla_materias').removeClass('d-none');
    bootstrap.Itma2.end_loader();
}

const actualizar_materia = () => {
    let datos = new FormData($('#frm_actualizar_materia')[0]);
    datos.append('funcion',"actualizar_materia");
    const ejecucion = new Consultas("PlanCurricular",datos);
    ejecucion.insercion();
    obtener_plan_curricular();

}

const aplicar_cambios = (ids,semestre) => {
    let datos = new FormData();
    datos.append('funcion',"actualizar_plan");
    datos.append('materias_id',ids);
    datos.append('semestre',semestre);
    fetch(`app/Controllers/PlanCurricular.php`, {
        method: `POST`,
        body: datos
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0] == "1") {
            //msj_exito(`Proceso finalizado correctamente!\n${respuesta[1]}`);					
        } else {
            msj_error(`Se ha prensentado un error:\n${respuesta[1]}\nPor favor intentalo de nuevo.`);
        }
    }).catch(error => {
        console.log(`${error}`);
    });
}

const lista1 = document.getElementById('seccion_materias_1');
const lista2 = document.getElementById('seccion_materias_2');
const lista3 = document.getElementById('seccion_materias_3');
const lista4 = document.getElementById('seccion_materias_4');
const lista5 = document.getElementById('seccion_materias_5');
const lista6 = document.getElementById('seccion_materias_6');
const lista7 = document.getElementById('seccion_materias_7');
const lista8 = document.getElementById('seccion_materias_8');
const lista9 = document.getElementById('seccion_materias_9');

new Sortable(lista1, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {

    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            console.log(orden)
            aplicar_cambios(orden,1);
        }
    }
});

new Sortable(lista2, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {

    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            aplicar_cambios(orden,2);
        }
    }
});

new Sortable(lista3, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {

    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            aplicar_cambios(orden,3);
        }
    }
});

new Sortable(lista4, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {

    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            aplicar_cambios(orden,4);
        }
    }
});

new Sortable(lista5, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {

    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            aplicar_cambios(orden,5);
        }
    }
});

new Sortable(lista6, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {

    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            aplicar_cambios(orden,6);
        }
    }
});

new Sortable(lista7, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {

    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            aplicar_cambios(orden,7);
        }
    }
});

new Sortable(lista8, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {

    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            aplicar_cambios(orden,8);
        }
    }
});

new Sortable(lista9, {
    group: 'shared',
    animation: 150,
    chosenClass: "seleccionado",
    dragClass: "drag",
    onEnd: () => {
        
    },
    group: "semestre",
    store: {
        set: (sortable) => {
            const orden = sortable.toArray();
            aplicar_cambios(orden,9);
        }
    }
});

obtener_carrera();
obtener_area_academica();
obtener_tipo_materia();

$('[name=select_carrera]').on('change',() =>{
    obtener_especialidad($('[name=select_carrera]').val());
    obtener_especialidad_materia($('[name=select_carrera]').val());
    bootstrap.Itma2.start_loader();
    setTimeout(() => {
        bootstrap.Itma2.end_loader();
    }, 1000);
});

$('#materia').on('change',() => {
    if($('[name=materia]').val() != ""){
        precargar_materia_seleccionada($('[name=materia]').val());
        $('#btn_agregar_amateria_plan').removeClass('disabled'); 
    }else{
        $('#frm_agregar_materia')[0].reset();
        $('#btn_agregar_amateria_plan').addClass('disabled'); 
    }
});

$('#btn_regresar').on('click',() =>{
    $("#frm_consulta")[0].reset();
    $('#seccion_tabla_materias').addClass('d-none');
    $('#seccion_consulta').removeClass('d-none');
});

$('#btn_agregar_amateria_plan').on('click',() => {
    asiganar_materia();
});

$(document).ready(() => { 
    $("#frm_consulta").on('submit',(e)=>{
        e.preventDefault();
        if(validar_campo(['select_carrera','select_especialidad'],'vacios')){
            obtener_plan_curricular();
        }
    });

    $("#frm_actualizar_materia").on('submit',(e)=>{
        e.preventDefault();
        if(validar_campo(actualizar_materia_dt,'vacios')){
            actualizar_materia();
        }
    });
});
