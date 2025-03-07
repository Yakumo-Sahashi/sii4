let campos = ['periodo_consulta','estadistico_consulta'];
const consultas = {
    "inscripcion": (respuesta) => {
        $(`#contenido_tabla_inscripcion`).html(``);  
        $('#tabla_inscripcion').DataTable().destroy();
        let contenido = ``, total = 0;
        const carrera = Object.keys(respuesta);
        carrera.map(nombre => {
            let {M,F}= respuesta[nombre];
            contenido += `
                <tr>
                    <th>${nombre}</th>
                    <th>M</th>
                    ${M.map(valor => `<th>${valor}</th>`)}
                    <th>${M.reduce((total, cantidadSemestre) => total + cantidadSemestre, 0)}</th>
                </tr>
                <tr>
                    <th>${nombre}</th>
                    <th>F</th>
                    ${F.map(valor => `<th>${valor}</th>`)}
                    <th>${F.reduce((total, cantidadSemestre) => total + cantidadSemestre, 0)}</th>
                </tr>
            `; 
        });
    
        $('#contenido_tabla_inscripcion').html(contenido);
        $('#tabla_inscripcion').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });  
        $('#seccion_inscripcion').removeClass('d-none');
        $('#periodo_estadistico').text($('select[name="periodo_consulta"] option:selected').text());
    },
    "edad_alumno": (respuesta) => {
        $(`#contenido_tabla_edades_alumnos`).html(``);  
        $('#tabla_edades_alumnos').DataTable().destroy();
        let contenido = ``, total = 0;
        const carrera = Object.keys(respuesta);
        carrera.map(nombre => {
            let {M,F}= respuesta[nombre];
            contenido += `
                <tr>
                    <th>${nombre}</th>
                    <th>M</th>
                    ${M.map(valor => `<th>${valor}</th>`)}
                    <th>${M.reduce((total, cantidadSemestre) => total + cantidadSemestre, 0)}</th>
                </tr>
                <tr>
                    <th>${nombre}</th>
                    <th>F</th>
                    ${F.map(valor => `<th>${valor}</th>`)}
                    <th>${F.reduce((total, cantidadSemestre) => total + cantidadSemestre, 0)}</th>
                </tr>
            `; 
        });
    
        $('#contenido_tabla_edades_alumnos').html(contenido);
        $('#tabla_edades_alumnos').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });  
        $('#seccion_edades_alumnos').removeClass('d-none');
        $('#periodo_edades_alumnos').text($('select[name="periodo_consulta"] option:selected').text());        
    },
    "edad_docente": (respuesta) => {
        $(`#contenido_tabla_edades_docentes`).html(``);  
        $('#tabla_edades_docentes').DataTable().destroy();
        let contenido = ``, total = 0;
        const carrera = Object.keys(respuesta);
        carrera.map(nombre => {
            let {M,F}= respuesta[nombre];
            contenido += `
                <tr>
                    <th>${nombre == "A" ? 'Administrativo' : 'Docente'}</th>
                    <th>M</th>
                    ${M.map(valor => `<th>${valor}</th>`)}
                </tr>
                <tr>
                    <th>${nombre == "A" ? 'Administrativo' : 'Docente'}</th>
                    <th>F</th>
                    ${F.map(valor => `<th>${valor}</th>`)}
                </tr>
            `; 
        });
    
        $('#contenido_tabla_edades_docentes').html(contenido);
        $('#tabla_edades_docentes').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });  
        $('#seccion_edades_docentes').removeClass('d-none');
        $('#periodo_edades_docentes').text($('select[name="periodo_consulta"] option:selected').text());        
    },
    "reprobacion_materia": (respuesta) => {
        $(`#contenido_tabla_rep_carrera`).html(``);  
        $('#tabla_rep_carrera').DataTable().destroy();
        let contenido = ``, porcentaje = 0;
        const materia = Object.keys(respuesta);
        materia.map(clave => {
            contenido += `
                <tr>
                    <th class="text-start">${respuesta[clave][0]}</th>
                    <th>${clave}</th>
                    <th>${respuesta[clave][1][0]}</th>
                    <th>${(respuesta[clave][1][0] * 100) / (respuesta[clave][1][0]+respuesta[clave][1][1])}%</th>
                    <th>${respuesta[clave][1][1]}</th>
                    <th>${(respuesta[clave][1][1] * 100) / (respuesta[clave][1][0]+respuesta[clave][1][1])}%</th>
                    <th>${respuesta[clave][1][2]}</th>
                    <th>${(respuesta[clave][1][2] * 100) / (respuesta[clave][1][0]+respuesta[clave][1][1])}%</th>
                </tr>
            `; 
        });
    
        $('#contenido_tabla_rep_carrera').html(contenido);
        $('#tabla_rep_carrera').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });  
        $('#seccion_reprobacion_carrera').removeClass('d-none');
        $('#carrera_reprobacion').text($('select[name="carrera_rep_carrera"] option:selected').text());    
        $('#periodo_reprobacion').text($('select[name="periodo_consulta"] option:selected').text());    
    },
    "reprobacion_carrera": (respuesta) => {
        $(`#contenido_tabla_alumnos_rep`).html(``);  
        $('#tabla_alumnos_rep').DataTable().destroy();
        let contenido = ``, porcentaje = 0;
        const carrera = Object.keys(respuesta);
        carrera.map(nombre => {
            porcentaje = respuesta[nombre].reduce((total, cantidadSemestre) => total + cantidadSemestre, 0) ;
            contenido += `
                <tr>
                    <th>${nombre}</th>
                    ${respuesta[nombre].map(valor => `<th>${valor}</th>`)}
                    <th>${ (porcentaje - respuesta[nombre][0]) > 0 ? (porcentaje * 100) / (porcentaje - respuesta[nombre][0]) : 0}%</th>
                    <th>${porcentaje - respuesta[nombre][0]}</th>
                </tr>
            `; 
        });
    
        $('#contenido_tabla_alumnos_rep').html(contenido);
        $('#tabla_alumnos_rep').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });  
        $('#seccion_materias_rep').removeClass('d-none');
        $('#periodo_materias_rep').text($('select[name="periodo_consulta"] option:selected').text());        
    },
    "promedio_cal": (respuesta) => {
        $(`#contenido_tabla_promedios`).html(``);  
        $('#tabla_promedios').DataTable().destroy();
        let contenido = ``, incremento = 0, cal = 0;
        const carrera = Object.keys(respuesta);
        carrera.map(nombre => {
            incremento = 0;
            contenido += `
                <tr>
                    <th>${nombre}</th>
                    ${respuesta[nombre][0].map(valor =>{ 
                        cal = valor == 0 ? 0 : valor / respuesta[nombre][1][incremento];
                        incremento++;
                       return `<th>${cal}</th>`;
                    })}
                </tr>
            `; 
        });
    
        $('#contenido_tabla_promedios').html(contenido);
        $('#tabla_promedios').DataTable({
            "language": {
                "url": "./json/lenguaje.json"
            }
        });  
        $('#seccion_promedio').removeClass('d-none');
        $('#periodo_promedio').text($('select[name="periodo_consulta"] option:selected').text());        
    }
}

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
    selec.catalogo('carrera_rep_carrera','codigo_html');
}

const consultar = async(tipo) => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_consulta')[0]);
    datos.append('funcion', tipo);
    const ejecucion = new Consultas('Estadisticas',datos);
    let respuesta = await ejecucion.consulta();
    consultas[tipo](respuesta);
    $('#seccion_consulta').addClass('d-none');   
    bootstrap.Itma2.end_loader();
}

consultar_periodo();
consultar_carrera();

$('#btn_regresar_inscripcion').on('click',() => {
    $('#frm_consulta')[0].reset();
    $('#seccion_consulta').removeClass('d-none');
    $('#seccion_inscripcion').addClass('d-none');
    $('#select_carrera').addClass('d-none');
    if(campos.length > 2){
        campos.pop();
    }
});

$('#btn_regresar_edades_alumno').on('click',() => {
    $('#frm_consulta')[0].reset();
    $('#seccion_consulta').removeClass('d-none');
    $('#seccion_edades_alumnos').addClass('d-none');
    $('#select_carrera').addClass('d-none');
    if(campos.length > 2){
        campos.pop();
    }
});

$('#btn_regresar_edades_docentes').on('click',() => {
    $('#frm_consulta')[0].reset();
    $('#seccion_consulta').removeClass('d-none');
    $('#seccion_edades_docentes').addClass('d-none');
    $('#select_carrera').addClass('d-none');
    if(campos.length > 2){
        campos.pop();
    }
});

$('#btn_regresar_rep_carrera').on('click',() => {
    $('#frm_consulta')[0].reset();
    $('#seccion_consulta').removeClass('d-none');
    $('#seccion_reprobacion_carrera').addClass('d-none');
    $('#select_carrera').addClass('d-none');
    if(campos.length > 2){
        campos.pop();
    }
});

$('#btn_regresar_alumnos_rep').on('click',() => {
    $('#frm_consulta')[0].reset();
    $('#seccion_consulta').removeClass('d-none');
    $('#seccion_materias_rep').addClass('d-none');
    $('#select_carrera').addClass('d-none');
    if(campos.length > 2){
        campos.pop();
    }
});

$('#btn_regresar_alumnos_promedio').on('click',() => {
    $('#frm_consulta')[0].reset();
    $('#seccion_consulta').removeClass('d-none');
    $('#seccion_promedio').addClass('d-none');
    $('#select_carrera').addClass('d-none');
    if(campos.length > 2){
        campos.pop();
    }
});

$('[name=estadistico_consulta]').on('change',() => {
    if($('[name=estadistico_consulta]').val() == "reprobacion_materia"){
        $('#select_carrera').removeClass('d-none');
        campos.push('carrera_rep_carrera');
    }else{
        $('#select_carrera').addClass('d-none');
        if(campos.length > 2){
            campos.pop();
        }
    }
});

$(document).ready(() => {
    $('#frm_consulta').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(campos,'vacios')){
            consultar($('[name=estadistico_consulta]').val());
        }
    });
});