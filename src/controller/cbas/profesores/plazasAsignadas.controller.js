const consultar_plazas = async(id) => {
    bootstrap.Itma2.start_loader();
    $(`#contenido_tabla_plaza_asignada`).html(``);  
    $('#tabla_plaza_asignada').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion',"plazas_basicas");
    datos.append('id_area',id);
    const ejecucion = new Consultas("PlazasAsignadas",datos);
    let resultado = await ejecucion.consulta();
    let contenido = ``, i = 0;
    resultado.map(({nombre_persona,apellido_paterno,apellido_materno,nombramiento,estudios,escolaridad,clave_centro_seit} = plaza) => {
        contenido += `
            <tr>
                <th class="align-self-center text-small">${++i}</th>
                <th class="text-start align-self-center text-small">${apellido_paterno} ${apellido_materno} ${nombre_persona}</th>
                <th class="align-self-center text-small">${escolaridad}</th>
                <th class="align-self-center text-small">${estudios}</th>
                <th class="align-self-center text-small">${clave_centro_seit}</th>
                <th class="align-self-center text-small">${nombramiento == 'D' ? 'Docente' : ''}</th>
            </tr>
        `;
    });
    $('#contenido_tabla_plaza_asignada').html(contenido);
    $('#tabla_plaza_asignada').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader();
}

const consultar_organigrama = async () =>{
    let datos = new FormData();
    datos.append('funcion',"organigrama_materias");
    const ejecucion = new Consultas("PlazasAsignadas",datos);
    let resultado = await ejecucion.consulta();
    $('[name=seleccion_departamento_plaza]').val(resultado.descripcion);
    consultar_plazas(resultado.id_cat_organigrama);
}


consultar_organigrama();

$(document).ready(() => {
});