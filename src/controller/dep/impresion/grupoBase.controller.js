let input = ['periodo','tipo','carrera'];

const consultar_periodo = () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo_full");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('periodo','codigo_html');
}

const consultar_tipo = () =>{
    
}

const consultar_carrera = () =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_carrera");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('carrera','codigo_html');
}

const filtrar_contenido = async (carrera) =>{
    bootstrap.Itma2.start_loader();
    $('#tabla_contenido_grupos').html(``);
    $('#tabla_grupos').DataTable().destroy();
    let datos = new FormData($('#frm_grupo_base')[0]);
    datos.append('funcion',"filtrar_contenido");
    if(carrera != 0){
        datos.append('tipo_filtro',"carrera")
        datos.append('filtro_carrera',`${carrera}`);
    }
    const ejecucion = new Consultas("GrupoBase",datos);
    let resultado = await ejecucion.consulta();
    let tabla = ``;
    resultado.map(grupo => {
        let {clave_oficial,nombre_grupo,nombre_completo_materia,nombre_persona,apellido_paterno,apellido_materno,capacidad,estatus_grupo,alumnos_inscritos} = grupo;
        tabla += `
            <tr>
                <td class="align-middle">${clave_oficial}</td>
                <td class="align-middle">${nombre_grupo}</td>
                <td class="align-middle">${nombre_completo_materia}</td>
                <td class="align-middle">${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
                <td class="align-middle">${capacidad}</td>
                <td class="align-middle">${(alumnos_inscritos == null)? '0' : alumnos_inscritos}</td>
                <td class="align-middle">
                    ${
                        (estatus_grupo != 0) ? (alumnos_inscritos != 0 && alumnos_inscritos != null) ? (alumnos_inscritos != capacidad) ? (alumnos_inscritos <= capacidad) ? '<div class="text-success">Abierto</div>':'<div class="text-danger">Limite de capacidad superada</div>':'<div class="text-primary">Grupo lleno</div>':'<div class="text-warning">Sin alumnos registrados</div>':'<div class="text-danger">Cerrado</div>'
                    }
                </td>
            </tr>
        `;
    });
    $('#tabla_contenido_grupos').html(`${tabla}`);
    $('#tabla_grupos').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}

consultar_carrera();
filtrar_contenido(0);

// $("#frm_grupo_base").on('submit',(e) =>{
//     e.preventDefault();
//     if(validar_campo(input,'vacios')){
//         filtrar_contenido($("#carrera").val());
//     }
// });
$("#carrera").on('change',(e) =>{
    e.preventDefault();
    filtrar_contenido($("#carrera").val());
});