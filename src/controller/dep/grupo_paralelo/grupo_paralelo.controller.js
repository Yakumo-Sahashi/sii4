let campos = ['carrera_origen','carrera_paralelo','materia_origen', 'semestre_paralelo', 'grupo_origen', 'semestre_paralelo', 'nombre_grupo_paralelo'];

const consultar_paralelos = async()=> {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_grupo_paralelo`).html(``);  
    $('#tabla_grupos_paralelos').DataTable().destroy();
    let tabla = ``;
    let datos = new FormData();
    datos.append('funcion','consulta_grupo_paralelo');
    const ejecucion = new Consultas("GrupoParalelo",datos);
    let resultado = await ejecucion.consulta();
    resultado.map(paralelo =>{
        let{nombre_carrera,id_grupo,nombre_grupo,semestre,nombre_completo_materia,paralelo_de} = paralelo;
        tabla +=`
            <tr>
                <td class="align-middle text-small text-start">${nombre_carrera}</td>
                <td class="align-middle text-small">${nombre_completo_materia}</td>
                <td class="align-middle text-small">${paralelo_de}</td>
                <td class="align-middle text-small">${nombre_grupo}</td>
                <td class="align-middle text-small">${semestre}</td>
                <td class="align-middle"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_grupo_paralelo(${id_grupo})"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
        `;
    });
    $(`#contenido_grupo_paralelo`).html(`${tabla}`);  
    $('#tabla_grupos_paralelos').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader();
}
caracter_mayus('nombre_grupo_paralelo');
$('[name=materia_origen]').prop('disabled', true);
$('[name=grupo_origen]').prop('disabled', true);
$('[name=carrera_paralelo]').prop('disabled', true);

const obtener_carrera = () => {
    let datos = new FormData();
    datos.append('funcion', "consultar_carrera");
    const select = new Consultas("InformacionCatalogos", datos);
    select.catalogo('carrera_origen','codigo_html');
    select.catalogo('carrera_paralelo','codigo_html');
}

const obtener_materia = (carrera) => {
    let datos = new FormData();
    datos.append('funcion', "obtener_materias_carrera");
    datos.append('filtro', `${carrera}`);
    const ejecucion = new Consultas("GrupoParalelo", datos);
    ejecucion.catalogo('materia_origen','codigo_html');
    $('[name=materia_origen]').prop('disabled', false);
}

const obtener_grupo = (carrera, materia) => {
    let datos = new FormData();
    datos.append('funcion', "consultar_grupo");
    datos.append('carrera', `${carrera}`);
    datos.append('materia', `${materia}`);
    const ejecucion = new Consultas("GrupoParalelo", datos);
    ejecucion.catalogo('grupo_origen','codigo_html');
    $('[name=grupo_origen]').prop('disabled', false);
}

const exclusivo_carrera = async() =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion', "consultar_exclusivo_carrera");
    datos.append('id_cat_materia', `${$(`[name=materia_origen`).val()}`);
    const ejecucion = new Consultas("GrupoParalelo",datos);
    let resultado = await ejecucion.consulta();
    let {exclusivo_carrera} = resultado;
    if(exclusivo_carrera != 0){
        $('[name=carrera_paralelo]').val($(`[name=carrera_origen`).val());
        $('[name=carrera_paralelo]').prop('disabled', true);
    }else {
        $('[name=carrera_paralelo]').val("");
        $('[name=carrera_paralelo]').prop('disabled', false);
    }
    bootstrap.Itma2.end_loader();
}

consultar_paralelos();
obtener_carrera();

$(`[name=carrera_origen`).on('change', () => {
    obtener_materia($(`[name=carrera_origen`).val());
});

$(`[name=materia_origen`).on('change', () => {
    obtener_grupo ($(`[name=carrera_origen`).val(), $(`[name=materia_origen`).val());
    exclusivo_carrera();
});

const crear_grupo_paralelo = () => {
    let datos = new FormData($("#frm_agregar_paralelo")[0]);
    datos.append('funcion', "agregar_grupo_paralelo");
    const ejecucion = new Consultas("GrupoParalelo", datos);
    ejecucion.insercion();
    $("#frm_agregar_paralelo")[0].reset();
    $('[name=materia_origen]').prop('disabled', true);
    $('[name=grupo_origen]').prop('disabled', true);
    $('[name=carrera_paralelo]').prop('disabled', true);
    consultar_paralelos();
}

const eliminar_grupo_paralelo = (id) => {
    swal({
        title: "Desea eliminar el grupo paralelo",
        text: `Una vez eliminado no se podra recuperar`,
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
    }).then(eiminar => {
        if (eiminar) {
            let datos = new FormData();
            datos.append('funcion', "eliminar_grupo_paralelo");
            datos.append('id', `${id}`);
            const ejecucion = new Consultas("GrupoParalelo", datos);
            ejecucion.insercion();
            consultar_paralelos();
        }
    });		
}

$('#frm_agregar_paralelo').on('submit', (e) => {
    e.preventDefault();
    if(validar_campo(campos, 'vacios')){
        crear_grupo_paralelo();
    }
});