
const consultar_periodo = () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo_full");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('periodo','codigo_html');
}

const mostrar_examenes_especiales = async (periodo) => {
    bootstrap.Itma2.start_loader();    
    $(`#tabla_contenido_alumno`).html(``);  
    $('#tabla_alumnos').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_especiales_periodo'); 
    datos.append('periodo',periodo); 
    const ejecucion = new Consultas("Examenes", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(examenes => {
        let {numero_control,nombre_completo_materia,calificacion_especial,tipo_evaluacion,autorizacion,fecha_especial,clave_oficial} = examenes;
        tabla += `
        <tr> 
            <td class="align-middle text-small">${numero_control}</td>
            <td class="align-middle text-small text-start">
                <b>${clave_oficial}</b><br>
                ${nombre_completo_materia}
            </td>
            <td class="align-middle text-small">${calificacion_especial == 0 ? 'Sin calificacion' : calificacion_especial}</td>
            <td class="align-middle text-small">${tipo_evaluacion == 'SI' ? 'Especial Autodidacta' : 'Examen Especial'}</td>
            <td class="align-middle text-small">${fecha_especial}</td>
            <td class="align-middle text-small">${autorizacion}</td>
        </tr>`;
    });
    $(`#tabla_contenido_alumno`).html(`${tabla}`);  
    $('#tabla_alumnos').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader(); 
}

consultar_periodo();

$('#periodo').on('change',() => {
    if($('[name=periodo]').val() != ""){
        mostrar_examenes_especiales($('[name=periodo]').val());
        $('#btn_excel').prop('disabled',false);
    }else{
        mostrar_examenes_especiales($('[name=periodo]').val());
        $('#btn_excel').prop('disabled',true);
    }
});