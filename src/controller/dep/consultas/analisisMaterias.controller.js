let input_analisisMaterias = ['periodo_consulta','carrera_consulta','especialidad_consulta'];

const consultar_periodo = () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo_full");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('periodo_consulta','codigo_html');
}

const consultar_carrera = () =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_carrera");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('carrera_consulta','codigo_html');
}

const obtener_especialidad = (carrera) => {  
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion', "consultar_especialidad");
    datos.append('carrera_reticula', `${carrera}`);
    const ejecucion = new Consultas("PlanCurricular", datos);
    ejecucion.catalogo('especialidad_consulta','codigo_html');  
    bootstrap.Itma2.end_loader();
}

const precargar_materia = async (id) =>{
    
}

const obtener_plan_curricular = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_consulta')[0]);
    datos.append('funcion',"obtener_materias");
    const ejecucion = new Consultas("AnalisisMaterias",datos);
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
                    <div class="p-1 text-center border cuadricula small sin-scroll ">
                        <div class="mt-4">
                        </div>
                    </div>
                `;
                }
                cont++;
            });
            cont = 0;
            $(`#seccion_materias_${temp}`).html(contenido);
            contenido = ``;
            temp ++;
        }
    });
    $('#carrera_escogida').text($('select[name="carrera_consulta"] option:selected').text());
    $('#especialidad_escogida').text($('select[name="especialidad_consulta"] option:selected').text());
    $('#periodo_escogido').text($('select[name="periodo_consulta"] option:selected').text());
    $('#seccion_tabla_materias').removeClass('d-none');
    $('#seccion_consulta_materias').addClass('d-none');
    bootstrap.Itma2.end_loader();
}

consultar_periodo();
consultar_carrera();


$('[name=carrera_consulta]').on('change',() =>{
    obtener_especialidad($('[name=carrera_consulta]').val());
    bootstrap.Itma2.start_loader();
    setTimeout(() => {
        bootstrap.Itma2.end_loader();
    }, 1000);
});

$('#btn_regresar').on('click',() => {
    $('#seccion_tabla_materias').addClass('d-none');
    $('#seccion_consulta_materias').removeClass('d-none');
    $('#frm_consulta')[0].reset();
});


$(document).ready(() => {
    $('#frm_consulta').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(input_analisisMaterias,'vacios')){
            obtener_plan_curricular();
        }
    });
});